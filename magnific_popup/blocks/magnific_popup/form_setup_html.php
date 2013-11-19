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
				<option value="select1"><?php echo t('Select Popup Type')?></option>
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

<div id="vidMap"  style="display: none;">
  <div class="control-group">
    <label for="videoOptions" class="control-label"><?php   echo t('Video or Map Options')?></label>
      <div class="controls">
        <select id="videoOptions" class="span3" name="videoOptions">
          <option value="youtube"<?php  if ($videoOptions == 'youtube') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('YouTube')?></option>
          <option value="vimeo"<?php  if ($videoOptions == 'vimeo') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Vimeo')?></option>
          <option value="gmaps"<?php  if ($videoOptions == 'gmaps') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Google Maps')?></option>
        </select>
      </div>
  </div>
  <div class="control-group">
    <label for="vidMapURL" class="control-label"><?php   echo t('Video or Map URL')?></label>
    <div class="controls">
      <input type="text" name="vidMapURL" value="<?php echo $vidMapURL; ?>" class="span3" />
    </div>
  </div>
  <div class="control-group">
    <label for="vidMapLinkText" class="control-label"><?php   echo t('Video or Map Link Text')?></label>
    <div class="controls">
      <input type="text" name="vidMapLinkText" value="<?php echo $vidMapLinkText; ?>" class="span3" />
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
$('#singleImage, #galleryImages, #select1').hide();	
$('#magnific_type').on('change', function() {
        if($(this).val() == 'single' || 'zoom') {
            $('#singleImage').show("slow");
            $('#galleryImages').hide("slow");
        } else {
            $('#singleImage').hide("slow");
        }
        if($(this).val() == 'popup') {
        	$('#singleImage').hide("slow");
        	$('#galleryImages').show("slow");
        }
        if($(this).val() == 'vidMap') {
        	$('#vidMap').show("slow");
        	$('#singleImage').hide("slow");
        }
        if($(this).val() == 'select1') {
        	$('#singleImage').hide("slow");
        	$('#galleryImages').hide("slow");
        	$('#vidMap').hide("slow");
        }

 });
});
</script>