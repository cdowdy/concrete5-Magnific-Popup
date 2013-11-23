<?php defined('C5_EXECUTE') or die(_("Access Denied."));
	$defaultDelay = 700;

	$url = $vidMapURL;
	$str = substr(strrchr($url, '='), 1);
	$vimStr = substr(strrchr($url, '/'), 1);
?>
	<a class="popup-<?php echo $videoOptions; ?>" href="<?php echo $vidMapURL; ?>"><?php echo $vidMapLinkText; ?>
<?php if ($videoOptions == 'youtubeThumb') :?>
		<img src="http://img.youtube.com/vi/<?php echo $str. '/'. $youtubeThumbnailOption;?>.jpg" /></a>
<?php endif;?>
<?php if ($videoOptions == 'vimeoThumb') :?>
	<img src="http://placehold.it/350x150" data-vimeo-id="<?php echo $vimStr;?>" class="<?php echo $vimeoThumbnailOption;?>"/></a>
<?php endif; ?>
</div>
<script>
$(document).ready(function() {
$('.popup-<?php echo $videoOptions;?>').magnificPopup({
	disableOn: <?php echo $defaultDelay;?>,
	type: 'iframe',
	mainClass: 'mfp-fade',
	removalDelay: 160,
	preloader: false,

	fixedContentPos: false
});
$('img').VimeoThumb();
});
</script>
