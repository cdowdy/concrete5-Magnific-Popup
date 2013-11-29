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
// send js to footer
if (!$page->isEditMode()) {
	$v->addFooterItem('<script>
$(document).ready(function() {
$(\'.zoom-gallery\').magnificPopup({
	delegate: \'a\',
	type: \'image\',
	closeOnContentClick: false,
	closeBtnInside: false,
	mainClass: \'mfp-with-zoom mfp-img-mobile\',
	image: {
		verticalFit: true,
		titleSrc: function(item) {
			return item.el.attr(\'title\') + \' &middot; <a class="image-source-link" href="\'+item.el.attr(\'data-source\')+\'" target="_blank">image source</a>\';
		}
	},
	gallery: {
		enabled: false
	},
	zoom: {
		enabled: true,
		duration: 300, // don\'t foget to change the duration also in CSS
		opener: function(element) {
			return element.find(\'img\');
		}
	}
		
});
});
</script>');
}
?>