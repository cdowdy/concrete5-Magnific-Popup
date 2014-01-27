<?php defined('C5_EXECUTE') or die('Access denied.');
$v      = View::GetInstance();
$page   = Page::getCurrentPage();
$custom = $customAnim;

if ($dialogType == 'custom-anim') {
  $dialogType = $custom;
}
?>
<div id="dialogPopup-<?php echo $bID; ?>">
  <a href="#dialog-window-<?php echo $bID;?>" data-effect="mfp-<?php echo $dialogType; ?>"><?php echo $cssDialogLinkText; ?></a>
</div>
<!-- css dialog popup. mfp-hide makes it hidden -->
<div id="dialog-window-<?php echo $bID;?>" class="white-popup mfp-with-anim mfp-hide">
	<?php echo $cssDialogText;?>
</div>
<?php
if(!$page->isEditMode()) {
	$v->addFooterItem("<script>
$(document).ready(function() {
 $('#dialogPopup-$bID').magnificPopup({
    delegate: 'a',
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
      beforeOpen: function() {
         this.st.mainClass = this.st.el.attr('data-effect');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });
});
</script>");
}
?>