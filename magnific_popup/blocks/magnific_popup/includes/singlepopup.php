<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$page = Page::getCurrentPage();
$v 	  = View::GetInstance();

$image = Loader::helper('image');
$po =  $controller->getPictureObject();
	
$fileName = $po->getRelativePath();
$thumbnail = $image->getThumbnail($po,intval($controller->thumbnailWidth), intval($controller->thumbnailHeight));
?>
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
	<a class="image-popup-<?php echo $singleOption;?>" href="<?php echo $fileName; ?>" title="<?php echo $title;?>">
		<img src="<?php  echo $thumbnail->src;?>" width="<?php echo $thumbnail->width;?>" height="<?php echo $thumbnail->height;?>" alt="<?php echo $titlte;?>" />
	</a>
</div>
<div>
	<p><?php echo $thumbnailHeight . ' '. $thumbnailWidth; ?></p>
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