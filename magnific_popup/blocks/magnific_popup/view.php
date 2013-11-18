<?php
$image = Loader::helper('image'); ?>

<div class="<?php echo $magnific_type; ?>-gallery">

<?php 
if ($magnific_type == 'zoom') { 
	if ($picture) {
	$bigPicture = $image->getThumbnail($picture, 800,800)->src;
	$smallPicture = $image->getThumbnail($picture, 200,200)->src;

	
	echo "<a href=\"{$bigPicture}\" title=\"{$title}\" data-source=\"{$bigPicture}\" >";
	echo "<img src=\"{$smallPicture}\" alt=\"{$title}\" title=\"{$this->controller->title}\"/>";
	echo "</a>";

	echo "<script>
	$(document).ready(function() {
	if (!CCM_EDIT_MODE) { 
		$('.zoom-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			image: {
				verticalFit: true,
				titleSrc: function(item) {
					return item.el.attr('title') + ' &middot; <a class=\"image-source-link\" href=\"'+item.el.attr('data-source')+'\" target=\"_blank\">image source</a>';
				}
			},
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 300, // don't foget to change the duration also in CSS
				opener: function(element) {
					return element.find('img');
				}
			}
			
		});
	}
});";
	echo "</script>";
	}
}

if ($magnific_type == 'popup') {
	foreach ($images as $image) {
	    $fileName = $image->getFileName();
	    $picturePath = $image->getRelativePath();
	    $thumbnail = $image->getThumbnail(2, false);

	    echo "<a title=\"{$fileName}\" href=\"{$picturePath}\">";
	    echo "<img src=\"{$thumbnail}\" />";
	    echo "</a>";
		}
	echo "<script>
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
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
});
</script>";
	}
	
?>
</div>
