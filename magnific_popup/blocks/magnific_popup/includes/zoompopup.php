<?php defined('C5_EXECUTE') or die('Access denied.');
$page            = Page::getCurrentPage();
$v               = View::GetInstance();

$image           = Loader::helper( 'image' );
$po              = $controller->getPictureObject();

$json            = Loader::helper('json');
$imageSource     = $json->encode(t('image source'));
$fileName        = $po->getRelativePath();
$thumbnail       = $image->getThumbnail( $po, intval( $controller->thumbnailWidth ), intval( $controller->thumbnailHeight ) );
// get file description (in the file manager attributes) of the picture object
$fileDescription = $po->getDescription();
?>
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
    <a href="<?php echo $fileName; ?>" data-source="<?php echo $fileName; ?>" title="<?php echo $title;?>">
        <img class="<?php echo $cssImageClass;?>"  src="<?php  echo $thumbnail->src;?>" width="<?php echo $thumbnail->width;?>" height="<?php echo $thumbnail->height;?>" alt="<?php echo $fileDescription;?>" />
    </a>
</div>
<?php
// send js to footer
if ( !$page->isEditMode() ) {
	$v->addFooterItem( "<script>
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
			return item.el.attr('title') + ' &middot; <a class=\"image-source-link\" href=\"'+item.el.attr('data-source')+'\" target=\"_blank\">$imageSource</a>';
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
</script>" );
}
?>
