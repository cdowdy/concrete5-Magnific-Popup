<?php defined('C5_EXECUTE') or die('Access denied.');
$v    = View::GetInstance(); ?>
<div id="<?php echo $magnific_type .'-'.$bID ?>" class="<?php echo $magnific_type. '-gallery'. ' '. $cssFrameworkClass; ?>">
<?php
$defaultDelay = 700;

$url          = $vidMapURL;
$str          = substr( strrchr( $url, '=' ), 1 );
$vimStr       = substr( strrchr( $url, '/' ), 1 );
?>

	<a class="popup-<?php echo $videoOptions; ?>" href="<?php echo $vidMapURL; ?>"><?php echo $vidMapLinkText; ?>
<?php if ( $videoOptions == 'youtubeThumb' ) :?>
		<img class="<?php echo $cssImageClass;?>" src="http://img.youtube.com/vi/<?php echo $str. '/'. $youtubeThumbnailOption;?>.jpg" /></a>
<?php endif;?>
<?php if ( $videoOptions == 'vimeoThumb' ) :?>
	<img class="<?php echo $cssImageClass;?>"  src="http://placehold.it/350x150" data-vimeo-id="<?php echo $vimStr;?>" class="<?php echo $vimeoThumbnailOption;?>"/></a>
<?php endif; ?>
</div>
<?php
// put these here scripts in the footer
$page = Page::getCurrentPage();
if ( !$page->isEditMode() ) {
	$v->addFooterItem( "<script>
$(document).ready(function() {
$('.popup-$videoOptions').magnificPopup({
	disableOn: $defaultDelay,
	type: 'iframe',
	mainClass: 'mfp-fade',
	removalDelay: 160,
	preloader: false,

	fixedContentPos: false
});
$('img').VimeoThumb();
});
</script>" );
}
?>
