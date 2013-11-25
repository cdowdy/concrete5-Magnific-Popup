<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<ul id="<?php echo $magnific_type . '-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
<?php
foreach ($images as $image) {
	$fileName = $image->getFileName();
	$picturePath = $image->getRelativePath();
	$thumbnail = $image->getThumbnail(2, false);

	echo "<li><a title=\"{$fileName}\" href=\"{$picturePath}\">";
	echo "<img src=\"{$thumbnail}\" />";
	echo "</a></li>";
}
?>
</ul>
<?php
$page = Page::getCurrentPage();
$v 	  = View::GetInstance();
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

