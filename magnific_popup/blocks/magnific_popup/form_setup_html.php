<?php defined('C5_EXECUTE') or die(_("Access Denied."));
	$al = Loader::helper('concrete/asset_library');

	echo '<div class="ccm-block-field-group">';
	echo '<h2>' . t('Title') . '</h2>';
	echo $form->text('title', $title, array('style' => 'width: 550px'));
	echo '</div>';

?>
<!-- magnific type input --> 
<div class="ccm-block-field-group">
  <h5><?php echo t('Magnific Popup Style'); ?></h5>
  <div class="control-group">
    <label for="magnific_type" class="control-label"><?php   echo t('Magnific Type')?></label>
      <div class="controls">
        <select id="magnific_type" name="magnific_type" class="span3">
           <option><?php echo t('Select Popup Type')?></option>
            <option value="single"<?php  if ($magnific_type == 'single') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Single Image Popup')?></option>
            <option value="popup"<?php  if ($magnific_type == 'popup') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Gallery Popup')?></option>
            <option value="zoom"<?php  if ($magnific_type == 'zoom') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Zoom-Gallery')?></option>
            <option value="vidMap"<?php  if ($magnific_type == 'vidMap') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Video or Map Popup')?></option>
        </select>
      </div>
    </div>


<?php 

	echo '<div class="ccm-block-field-group">';
	echo '<h2>' . t('Picture') . '</h2>';
	echo $al->image('ccm-b-image', 'fIDpicture', t('Choose File'), $this->controller->getPicture());
	echo '</div>';

	echo '<div class="ccm-block-field-group">';
	echo '<h2>' . t('Image Set') . '</h2>';
	echo $form->label('fsID', t('File Set: '));
	echo $form->select('fsID', $fileSets, $fsID);
	echo '</div>';
?>