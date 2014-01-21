<?php defined( 'C5_EXECUTE' ) or die( _( "Access Denied." ) );
$v    = View::GetInstance();
?><a class="popup-with-<?php echo $dialogType. '-' . $bID; ?>" href="#small-dialog"><?php echo $cssDialogLinkText; ?></a>

<!-- css dialog popup. mfp-hide makes it hidden -->
<div id="small-dialog" class="<?php echo $dialogType;?>-dialog mfp-hide">
	<?php echo $cssDialogText;?>
</div>
<?php 
$page = Page::getCurrentPage();

if(!$page->isEditMode()) {
	switch ($dialogType) {
		case 'zoom-anim':
			$v->addFooterItem("<script>
$(document).ready(function() {
	$('.popup-with-zoom-anim-$bID').magnificPopup({
		
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
});
</script>");
			break;
		case 'move-anim':
			$v->addFooterItem("<script>
$(document).ready(function() {
	$('.popup-with-move-anim-$bID').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom'
	});
});
</script>");
			break;
	}
}
?>
