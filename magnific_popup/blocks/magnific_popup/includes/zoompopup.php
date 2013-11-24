<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
<?php
$image = Loader::helper('image');

if ($picture) {
	$bigPicture = $image->getThumbnail($picture, 800,800)->src;
	$smallPicture = $image->getThumbnail($picture, 200,200)->src;

	
	echo "<a href=\"{$bigPicture}\" title=\"{$title}\" data-source=\"{$bigPicture}\" >";
	echo "<img src=\"{$smallPicture}\" alt=\"{$title}\" title=\"{$this->controller->title}\"/>";
	echo "</a>";
	}
?>
</div>
<?php $page = Page::getCurrentPage(); ?>
<?php if(!$page->isEditMode()): ?>
<script>
$(document).ready(function() {
$('.zoom-gallery').magnificPopup({
	delegate: 'a',
	type: 'image',
	closeOnContentClick: false,
	closeBtnInside: false,
	mainClass: 'mfp-with-zoom mfp-img-mobile',
	image: {
		verticalFit: true,
		titleSrc: function(item) {
			return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
		}
	},
	gallery: {
		enabled: false
	},
	zoom: {
		enabled: true,
		duration: 300, // don't foget to change the duration also in CSS
		opener: function(element) {
			return element.find('img');
		}
	}
		
});
});
</script>
<?php endif; ?>