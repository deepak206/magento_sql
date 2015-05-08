<?php
require_once('app/Mage.php'); //Path to Magento
umask(0);
ini_set('display_errors', 1);
Mage::app();
echo "<pre>";



		$_productCOllection = Mage::getModel('catalog/product')->getCollection()
		   ->addAttributeToSelect('*');

		foreach($_productCOllection as $coll){
		echo $coll->getId();

				$product = Mage::getModel('catalog/product')->load($coll->getId());
				$sku=$product->getSku();
				$img=Mage::getBaseDir('media'). DS .'directory/'.$sku.'.jpg';
	
				if(file_exists($img)):
				    $product->addImageToMediaGallery($img, $mode, false, false);
				   $mode = array("small_image","thumbnail","image");   
				   $product->addImageToMediaGallery($img, $mode, false, false);    
				   $product->save();
				else:
					continue;
				endif;
		
		}
?>
