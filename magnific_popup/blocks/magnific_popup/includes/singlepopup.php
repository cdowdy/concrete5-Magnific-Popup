<?php defined('C5_EXECUTE') or die('Access denied.');

// for edit mode clash fixes 
	$page      = Page::getCurrentPage();
// v is view. used in switch to place script in footer
	$v         = View::GetInstance();
// Image helper
	$image     = Loader::helper('image');
// po is "pictureObject". used to get thumbnails 
	$po        =  $controller->getPictureObject();
	
	$fileName  = $po->getRelativePath();
	$thumbnail = $image->getThumbnail($po,intval($controller->thumbnailWidth), intval($controller->thumbnailHeight));
// get file description (in the file manager attributes) of the picture object 
	$fileDescription = $po->getDescription();
?>
<!-- Magnific Popup Gallery -->
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
	<a class="image-popup-<?php echo $singleOption;?>" href="<?php echo $fileName; ?>" title="<?php echo $title;?>">
		<img class="<?php echo $cssImageClass;?>" src="<?php  echo $thumbnail->src;?>" width="<?php echo $thumbnail->width;?>" height="<?php echo $thumbnail->height;?>" alt="<?php echo $fileDescription;?>" />
	</a>
</div>
<?php 
if(!$page->isEditMode()) {
	switch ($singleOption) {
		case 'vertical-fit':
			$v->addFooterItem('<script>
$(document).ready(function() {
$(\'.image-popup-vertical-fit\').magnificPopup({
	type: \'image\',
	closeOnContentClick: true,
	mainClass: \'mfp-img-mobile\',
	image: {
		verticalFit: true
	}
});

});
</script>');
			break;
		case 'fit-width':
			$v->addFooterItem('<script>
$(document).ready(function() {
$(\'.image-popup-fit-width\').magnificPopup({
	type: \'image\',
	closeOnContentClick: true,
	image: {
		verticalFit: false
	}
});

});
</script>');
			break;
		case 'no-margins':
			$v->addFooterItem('<script>
$(document).ready(function() {
$(\'.image-popup-no-margins\').magnificPopup({
	type: \'image\',
	closeOnContentClick: true,
	closeBtnInside: false,
	fixedContentPos: true,
	mainClass: \'mfp-no-margins mfp-with-zoom\', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don\'t foget to change the duration also in CSS
		}
});

});
</script>');
			break;
	}
}
?>