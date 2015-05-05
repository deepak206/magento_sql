<?php

class Namespace_Module_Helper_Data extends Mage_Core_Helper_Abstract
{

	
	public function resizeImage($imageName, $width=NULL, $height=NULL, $imagePath=NULL)

	{

		$imagePath = str_replace('index.php/','',Mage::getBaseDir('media').'/store_photos/');
		$imagePathFull = $imagePath.$imageName;
		
		if($width == NULL && $height == NULL) {

			$width = 100;

			$height = 100;

		}
		$new_imagePath = str_replace('index.php/','',Mage::getBaseDir('media'));
		$resizeDir = 'store_photos_resize';

		$resizePathFull = $new_imagePath.'/'.$resizeDir.'/'.$imageName;
		
		if (file_exists($imagePathFull) && !file_exists($resizePathFull)) {

					
			$imageObj = new Varien_Image($imagePathFull);

			$imageObj->constrainOnly(TRUE);

			$imageObj->keepAspectRatio(TRUE);

			$imageObj->resize($width,$height);

			$imageObj->save($resizePathFull);
			

		}

		//$imagePath=str_replace(DS, "/", $imagePath);
		$image_url=str_replace('index.php/','',Mage::getUrl('media')).$resizeDir.'/'.$imageName;
		return $image_url;

	}
}

/*
Call : 
<img src="<?php echo Mage::helper('modulename')->resizeImage('imagename.jpg', 100, 100, 'path/image'); ?>" style="padding:10px;">
*/
