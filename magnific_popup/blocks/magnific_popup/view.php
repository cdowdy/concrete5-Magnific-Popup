<?php
$image = Loader::helper('image'); ?>

<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
<?php
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