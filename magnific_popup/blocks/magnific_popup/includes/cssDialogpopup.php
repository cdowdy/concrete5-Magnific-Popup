<?php defined( 'C5_EXECUTE' ) or die( _( "Access Denied." ) );
$v        = View::GetInstance();
// variables for the standard/stock animations
$zoomAnim = 'my-mfp-zoom-in';
$moveAnim = 'my-mfp-slide-bottom';
$custom   =  $customAnim;

if ($dialogType == 'zoom-anim') {
	$mainClass = $zoomAnim;
} elseif ($dialogType == 'move-anim') {
	$mainClass = $moveAnim;
} else {
	$mainClass = $custom; 
}
?><a class="popup-with-<?php echo $dialogType. '-' . $bID; ?>" href="#small-dialog"><?php echo $cssDialogLinkText; ?></a>

<!-- css dialog popup. mfp-hide makes it hidden -->
<div id="small-dialog" class="<?php echo $dialogType;?>-dialog mfp-hide">
	<?php echo $cssDialogText;?>
</div>
<?php
$page = Page::getCurrentPage();

if(!$page->isEditMode()) {
	$v->addFooterItem("<script>
$(document).ready(function() {
	$('.popup-with-$dialogType-$bID').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: '$mainClass'
	});
});
</script>");
}
?>