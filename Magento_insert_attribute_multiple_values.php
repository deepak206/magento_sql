<?php

$aManufacturers = array('Sony','Philips','Samsung','LG','Panasonic','Fujitsu','Daewoo','Grundig','Hitachi','JVC','Pioneer','Teac','Bose','Toshiba','Denon','Onkyo','Sharp','Yamaha','Jamo');
				$iProductEntityTypeId = Mage::getModel('catalog/product')->getResource()->getTypeId();

				$aOption = array();
				$aOption['attribute_id'] = $installer->getAttributeId($iProductEntityTypeId, 'family');

				for($iCount=0;$iCount<sizeof($aManufacturers);$iCount++)
				{
				   $aOption['value']['option'.$iCount][0] = $aManufacturers[$iCount];
				}
			
				$installer->addAttributeOption($aOption);

				$installer->endSetup();
?>
