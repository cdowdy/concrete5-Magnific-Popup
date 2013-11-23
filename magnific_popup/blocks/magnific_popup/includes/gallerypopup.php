<?php defined('C5_EXECUTE') or die(_("Access Denied."));
foreach ($images as $image) {
	$fileName = $image->getFileName();
	$picturePath = $image->getRelativePath();
	$thumbnail = $image->getThumbnail(2, false);

	echo "<a title=\"{$fileName}\" href=\"{$picturePath}\">";
	echo "<img src=\"{$thumbnail}\" />";
	echo "</a>";
}
?>
</div>
<script>
$(document).ready(function() {
$('.popup-gallery').magnificPopup({
	delegate: 'a',
	type: 'image',
	tLoading: 'Loading image #%curr%...',
	mainClass: 'mfp-img-mobile',
	gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	},
	image: {
		tError: '<a href=\"%url%\">The image #%curr%</a> could not be loaded.',
		titleSrc: function(item) {
			return item.el.attr('title');
		}
	}
});
});
</script>