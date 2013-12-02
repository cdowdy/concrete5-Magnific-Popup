<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 
$page = Page::getCurrentPage();
$v 	  = View::GetInstance();
$ih = Loader::helper('image');
?>
<?php if ($images !== false): ?>
<ul id="<?php echo $magnific_type . '-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
   <?php foreach ($images as $image): ?>
   <?php $thumbnail = $ih->getThumbnail($image,intval($controller->thumbnailWidth), intval($controller->thumbnailHeight)); ?>
   <?php $fileName = $image->getFileName(); ?>
   <?php $fileDescription = $image->getAttribute('description');?>
	<li>
		<a title="<?php echo $fileName; ?>" href="<?php echo $image->getRelativePath() ?>">
			<img src="<?php echo $thumbnail->src ?>" width="<?php echo $thumbnailWidth; ?>" height="<?php echo $thumbnailHeight; ?>" alt="<?php echo $fileDescription; ?>" />
		</a>
	</li>
<?php endforeach; ?>
</ul>
<?php else: ?>
   <p><?php echo t('There are no images!') ?></p>
<?php endif; ?>
<?php
   echo $thumbnailHeight. ','. $thumbnailWidth;
?>
<?php
if (!$page->isEditMode()) {
	$v->addFooterItem('<script>
$(document).ready(function() {
$(\'.popup-gallery\').magnificPopup({
	delegate: \'a\',
	type: \'image\',
	tLoading: \'Loading image #%curr%...\',
	mainClass: \'mfp-img-mobile\',
	gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	},
	image: {
		tError: \'<a href=\"%url%\">The image #%curr%</a> could not be loaded.\',
		titleSrc: function(item) {
			return item.el.attr(\'title\');
		}
	}
});
});
</script>');
}
?>