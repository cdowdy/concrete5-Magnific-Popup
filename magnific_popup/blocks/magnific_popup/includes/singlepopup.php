<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$page = Page::getCurrentPage();
$v 	  = View::GetInstance();
?>
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
<?php
$image = Loader::helper('image');


if ($picture) {
	$bigPicture = $image->getThumbnail($picture, 800,800)->src;
	$smallPicture = $image->getThumbnail($picture, 200,200)->src;

	
	echo "<a class=\"image-popup-{$singleOption}\" href=\"{$bigPicture}\" title=\"{$title}\" >";
	echo "<img src=\"{$smallPicture}\" alt=\"{$title}\" title=\"{$this->controller->title}\" width=\"{$thumbWidth}\" height=\"{$thumbHeight}\" />";
	echo "</a>";
	}
?>
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