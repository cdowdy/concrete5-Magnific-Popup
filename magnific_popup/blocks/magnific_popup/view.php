<?php
$image = Loader::helper('image');
/*
	included files are located in the /includes directory
*/
switch ($magnific_type) {
	case 'single':
		$this->inc('includes/singlepopup.php');
		break;

	case 'popup':
		$this->inc('includes/gallerypopup.php');
		break;

	case 'zoom':
		$this->inc('includes/zoompopup.php');
		break;

	case 'vidMap':
		$this->inc('includes/videomapspopup.php');
		break;
}