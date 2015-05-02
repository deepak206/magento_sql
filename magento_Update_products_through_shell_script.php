<?php
require_once 'abstract.php';

/**
 * Magento Compiler Shell Script
 *
 * @category    Mage
 * @package     Mage_Shell
 * @author      Magegeeks<deepakmankotiacse@gmail.com>
 */
class Mage_Shell_Product extends Mage_Shell_Abstract
{
    /**
     * Compiler process object
     *
     * @var Mage_Compiler_Model_Process
     */
  protected $_argname = array();
 
    public function __construct() {
        parent::__construct();
 
        // Time limit to infinity
        set_time_limit(0);     
 
        // Get command line argument named "argname"
        // Accepts multiple values (comma separated)
        if($this->getArg('argname')) {
            $this->_argname = array_merge(
                $this->_argname,
                array_map(
                    'trim',
                    explode(',', $this->getArg('argname'))
                )
            );
        }
    }

    /**
     * Run script
     *
     */
    public function run()
    {
       $path = Mage::getBaseDir()."/read_xls/MOBILIER_pro.xml";
		
		
		$xmlPath = file_get_contents($path);
		$xmlObj = new Varien_Simplexml_Config($xmlPath);
		$xmlData = json_decode(json_encode($xmlObj->getNode()), true);

		$a=json_decode(json_encode($xmlData));
			
		$b=$a->Record;
		
		
		foreach($b as $cat)
		{
				
				try{
					$product = Mage::getModel('catalog/product');	
					$product
	                      ->setWebsiteIds(array(1))
				    ->setTypeId(Mage_Catalog_Model_Product_Type::TYPE_SIMPLE)
				    ->setAttributeSetId(11)
				    ->setCreatedAt(strtotime('now'))
				    ->setSku($cat->Row->{'@attributes'}->C) //SKU
				    ->setName($cat->Row->{'@attributes'}->H)
				    ->setWeight($cat->Row->{'@attributes'}->J)
				    ->setStatus(Mage_Catalog_Model_Product_Status::STATUS_ENABLED)
				    ->setPrice($cat->Row->{'@attributes'}->K)
				    ->setDescription($cat->Row->{'@attributes'}->I)
				    ->setShortDescription($cat->Row->{'@attributes'}->I)
				    ->setProduct_reference($cat->Row->{'@attributes'}->B);	
					
				   
					$category = Mage::getResourceModel('catalog/category_collection')->addFieldToFilter('name', $cat->Row->{'@attributes'}->D);
					$cat_det=$category->getData();
					$main_cat = $cat_det[0]['entity_id'];

					$sub_category = Mage::getResourceModel('catalog/category_collection')->addFieldToFilter('name', $cat->Row->{'@attributes'}->E);
					$sub_cat_det=$sub_category->getData();
					$main_sub_cat = $sub_cat_det[0]['entity_id'];
					
					$product->setCategoryIds(array($main_cat, $main_sub_cat));
					//$product->save();
					//$_product = Mage::getModel('catalog/product')->load($product->getId());
					$brands = Mage::getModel('catalog/resource_eav_attribute')->load(140);
					$brands_values = $brands->getSource()->getAllOptions();  
						foreach ($brands_values as $brands_value) {
								if ($brands_value['label'] ==  $cat->Row->{'@attributes'}->A){
											$product->setBrands($brands_value['value']);
						   	    	 }
						    } 
					$family = Mage::getModel('catalog/resource_eav_attribute')->load(157);
					$family_values = $family->getSource()->getAllOptions();  
						foreach ($family_values as $family_value) {
								if ($family_value['label'] == $cat->Row->{'@attributes'}->G){
											$product->setFamily($family_value['value']);
						   	    	 }
						    }
					$product->save();
				
		


				

			}
			catch(Exception $e){
					echo $e->getMessage();
			}

		}
    }

    /**
     * Retrieve Usage Help Message
     *
     */
    public function usageHelp()
    {
        return <<<USAGE
Usage:  php -f compiler.php -- [options]

  state         Show Compilation State
  compile       Run Compilation Process
  clear         Disable Compiler include path and Remove compiled files
  enable        Enable Compiler include path
  disable       Disable Compiler include path
  help          This help

USAGE;
    }
}

$shell = new Mage_Shell_Product();
$shell->run();
