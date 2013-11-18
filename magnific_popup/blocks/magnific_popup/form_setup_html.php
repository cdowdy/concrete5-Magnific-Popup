<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$al = Loader::helper('concrete/asset_library');
?>
<!-- CSS Framework Class Input -->
<div class="ccm-block-field-group">
	<h5><?php echo t('CSS Framework Class'); ?></h5>
	<div class="control-group">
		<label for="cssFrameworkClass" class="control-label"><?php echo t('Class'); ?></label>
		<div class="controls">
			<input type="text" class="span3" value="<?php echo $cssFrameworkClass; ?>" name="cssFrameworkClass" />
			<span class="help-block">ex: row or large-12 columns</span>
			<span class="help-block">usually only used for custom themes or css frameworks</span>
		</div>
	</div>
</div>
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
</div>

<div id="singleImage" class="ccm-block-field-group">
	<h5><?php echo t('Single Image'); ?></h5>
	<div class="control-group">
		<label for="singleImage" class="control-label"><?php echo t('Choose an Image'); ?></label>
		<div class="controls">
			<?php echo $al->image('ccm-b-image', 'fIDpicture', t('Choose File'), $this->controller->getPicture()); ?>
		</div>
	</div>
</div>

<div id="galleryImages" class="ccm-block-field-group">
	<h5><?php echo t('Image Gallery'); ?></h5>
	<div class="control-group">
		<label for="galleryImages" class="control-label"><?php echo t('Choose Image Gallery'); ?></label>
		<div class="controls">
			<?php echo $form->select('fsID', $fileSets, $fsID); ?>
			<span class="help-block">Choose a Gallery Set Of Images</span>
		</div>
	</div>
</div>
