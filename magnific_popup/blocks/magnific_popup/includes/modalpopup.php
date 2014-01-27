<?php defined('C5_EXECUTE') or die('Access denied.');
$v        = View::GetInstance();
$page     = Page::getCurrentPage();

?>
<a id="mag-modal-<?php echo $bID;?>" href="#magnific_modal-<?php echo $bID;?>"><?php echo $modalLink; ?></a>

<div id="magnific_modal-<?php echo $bID;?>" class="mfp-hide white-popup-block">
	<?php echo $modalText; ?>
	<p><a class="popup-modal-dismiss" href="#">Dismiss</a></p>
</div>


<?php
if(!$page->isEditMode()) {
	$v->addFooterItem("<script>
$(function () {
$('#mag-modal-$bID').magnificPopup({
	type: 'inline',
	preloader: false,
	modal: true
});
$(document).on('click', '.popup-modal-dismiss', function (e) {
	e.preventDefault();
	$.magnificPopup.close();
});
});
</script>");
}
?>