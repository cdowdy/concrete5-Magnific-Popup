<?php defined('C5_EXECUTE') or die('Access denied.');
	
$page         = Page::getCurrentPage();
$v            = View::GetInstance();
$ih           = Loader::helper( 'image' );
$loadingImage = t('Loading image');
$imageError1  = t('The image ');
$imageError2  = t(' could not be loaded.');

?>
<?php if ( $images !== false ): ?>
<ul id="<?php echo $magnific_type . '-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
   <?php foreach ($images as $image): ?>
   <?php $thumbnail = $ih->getThumbnail($image,intval($controller->thumbnailWidth), intval($controller->thumbnailHeight)); ?>
   <?php $fileName = $image->getFileName(); ?>
   <?php $fileDescription = $image->getDescription();?>
	<li>
		<a class="<?php echo $cssAnchorClass; ?>" title="<?php echo $fileDescription; ?>" href="<?php echo $image->getRelativePath() ?>">
			<img class="<?php echo $cssImageClass; ?>" src="<?php echo $thumbnail->src ?>" width="<?php echo $thumbnailWidth; ?>" height="<?php echo $thumbnailHeight; ?>" alt="<?php echo $fileDescription; ?>" />
		</a>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php
if (!$page->isEditMode()) {
	$v->addFooterItem("<script>
$(document).ready(function() {
$('.popup-gallery').magnificPopup({
	delegate: 'a',
	type: 'image' ,
	tLoading: '$loadingImage #%curr%...',
	mainClass: 'mfp-img-mobile',
	gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	},
	image: {
		tError: '<a href=\"%url%\">$imageError1#%curr%</a>$imageError2',
		titleSrc: function(item) {
			return item.el.attr('title');
		}
	}
});
});
</script>");
}
?>
