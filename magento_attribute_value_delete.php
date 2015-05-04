<?php

	$attributeId=157; //attribute ID
	$optionCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
            ->setAttributeFilter($attributeId)
            ->setPositionOrder('desc', true)
            ->load();

	foreach($optionCollection as $option)
	{
        	$option->delete();
      }

?>
