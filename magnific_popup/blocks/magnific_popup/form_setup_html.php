<?php

 defined('C5_EXECUTE') or die('Access denied.');
 
 // Load TinyMCE 
 Loader::element('editor_config');
 // load asset library (for photos)
 $al              = Loader::helper('concrete/asset_library');
 $bf              = null;
 // default thumbnail height and widths
 $thumbnailWidth  = 200;
 $thumbnailHeight = 200;
?>
<!-- tabs -->
<div class="clearfix">
  <ul id="ccm-magnific-tabs" class="ccm-dialog-tabs tabs">
    <li class="ccm-nav-active"><a href="javascript:void(0)" id="ccm-magnific-type"><?php echo t('Magnific Types');?></a></li>
    <li><a href="javascript:void(0)" id="ccm-thumbnail-options"><?php echo t('Thumbnail Options'); ?></a></li>
    <li><a href="javascript:void(0)" id="ccm-css-frameworks-options"><?php echo t('CSS Framework Classes'); ?></a></li>
  </ul>
</div>
<!-- end tabs -->
<div class="clearfix">
  <div id="ccm-thumbnail-options-tab" class="ui-helper-hidden">
<!--
  Thumbnail Inputs
-->
    <div class="ccm-block-field-group">
      <h5><?php echo t('Thumbnails'); ?></h5>
      <div class="control-group">
        <label for="thumbnailWidth" class="control-label"><?php echo t('Thumbnail Width');?></label>
        <div class="controls">
          <input type="text" class="span3" value="<?php echo $thumbnailWidth; ?>" name="thumbnailWidth" />
        </div>
      </div>
      <div class="control-group">
        <label for="thumbnailHeight" class="control-label"><?php echo t('Thumbnail Height');?></label>
        <div class="controls">
          <input type="text" class="span3" value="<?php echo $thumbnailHeight; ?>" name="thumbnailHeight" />
        </div>
      </div>
    </div>
  </div> <!-- end of #ccm-magnific-options -->
</div><!-- clearfix -->

<div class="clearfix">
  <div id="ccm-css-frameworks-options-tab" class="ui-helper-hidden">
    <!--
  CSS Framework Class Input
-->
    <div class="ccm-block-field-group">
      <h5><?php echo t('CSS Classes'); ?></h5>
      <div class="control-group">
        <label for="cssFrameworkClass" class="control-label"><?php echo t('Container Class'); ?></label>
        <div class="controls">
          <input type="text" class="span3" value="<?php echo $cssFrameworkClass; ?>" name="cssFrameworkClass" />
          <span class="help-block">ex: row or large-12 columns</span>
          <span class="help-block"><code>&ltdiv class="large-12 columns"&gt</code></span>
        </div>
      </div>
      <div id="cssImage" class="control-group">
        <label for="cssImageClass" class="control-label"><?php echo t('Image Class'); ?></label>
        <div class="controls">
          <input type="text" class="span3" value="<?php echo $cssImageClass; ?>" name="cssImageClass" />
          <span class="help-block"><?php echo t('Image Tag Class'); ?></span>
          <span class="help-block"><code><?php echo t('&ltimg src="imagesrc" class="img-centered"&gt'); ?></code></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!--
  magnific type input
-->
<div id="ccm-magnific-type-tab">
  <div class="ccm-block-field-group">
    <h5><?php echo t('Magnific Popup Style'); ?></h5>
     <div class="control-group">
      <label for="magnific_type" class="control-label"><?php   echo t('Magnific Type')?></label>
      <div class="controls">
        <select id="magnific_type" name="magnific_type" class="span3">
          <option value="select1"><?php echo t('Select Popup Type')?></option>
          <option id="single"    value="single"<?php  if ($magnific_type == 'single') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Single Image Popup')?></option>
          <option id="popup"     value="popup"<?php  if ($magnific_type == 'popup') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Gallery Popup')?></option>
          <option id="zoom"      value="zoom"<?php  if ($magnific_type == 'zoom') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Zoom-Image')?></option>
          <option id="videoMap"  value="vidMap"<?php  if ($magnific_type == 'vidMap') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Video or Map Popup')?></option>
          <option id="cssDialog" value="cssdialog"<?php  if ($magnific_type == 'cssdialog') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Dialog With CSS Animation')?></option>
          <option id="modal" value="modal"<?php  if ($magnific_type == 'modal') { ?> selected<?php  } ?> name="magnific_type"><?php echo t('Modal')?></option>
        </select>
      </div>
    </div>
  </div>
<!--
  Single Popup Options
  This seems to be the easiest way to currently implement.
  May go to an options tab but I don't like the options being separate from the choice.
  Checkboxes are being a real case of mudbutt. may Change in future
-->
  <div id="single-options" class="ccm-block-field-group">
    <label for="singleOption" class="control-label"><?php   echo t('Single Popup Style')?></label>
    <div class="controls">
      <select id="singleOption" name="singleOption" class="span3">
        <option value="select-2" name="select-2"><?php echo t('Select Single Type')?></option>
        <option value="vertical-fit"<?php  if ($singleOption == 'vertical-fit') { ?> selected<?php  } ?> name="singleOption"><?php echo t('Vertical Fit')?></option>
        <option value="fit-width"<?php  if ($singleOption == 'fit-width') { ?> selected<?php  } ?> name="singleOption"><?php echo t('Fit To Width')?></option>
        <option value="no-margins"<?php  if ($singleOption == 'no-margins') { ?> selected<?php  } ?> name="singleOption"><?php echo t('No Margins')?></option>
      </select>
    </div>
  </div>
<!--
  Single Image Upload
  Used Currenlty for Single Popup and Zoom Popup
-->
  <div id="singleImage" class="ccm-block-field-group">
    <h5><?php echo t('Single Image'); ?></h5>
    <div class="control-group">
      <label for="singleImage" class="control-label"><?php echo t('Choose an Image'); ?></label>
      <div class="controls">
        <?php echo $al->image('ccm-b-image', 'fIDpicture', t('Choose File'), $this->controller->getPicture()); ?>
      </div>
    </div>
    <div class="control-group">
      <label for="title" class="control-label"><?php echo t('Image Title'); ?></label>
      <div class="controls">
        <input type="text" value="<?php echo $title; ?>" name="title" class="span3" />
      </div>
    </div>
  </div>
<!--
   Image Set Choice Area
  Used currently for Gallery
-->
  <div id="galleryImages" class="ccm-block-field-group">
    <h5><?php echo t('Image Gallery'); ?></h5>
    <div class="control-group">
      <label for="galleryImages" class="control-label"><?php echo t('Choose Image Gallery'); ?></label>
      <div class="controls">
        <?php echo $form->select('fsID', $sets, $fsID, array('class' => 'span3')); ?>
        <span class="help-block"><?php echo t("Choose a Gallery"); ?></span>
      </div>
    </div>
  </div>
<!--
  Video and Map type dropdown menu
  Have to choose one
-->
  <div id="vidMap" style="display:none;">
    <div class="ccm-block-field-group">
      <h5><?php echo t('Video and Map Options'); ?></h5>
      <div class="control-group">
        <label for="videoOptions" class="control-label"><?php   echo t('Video and Map Types')?></label>
        <div class="controls">
          <select id="videoOptions" class="span3" name="videoOptions">
            <option value="select-3"><?php echo t('Select a Type')?></option>
            <option value="youtube"<?php  if ($videoOptions == 'youtube') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('YouTube')?></option>
            <option value="youtubeThumb"<?php  if ($videoOptions == 'youtubeThumb') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('YouTube With Thumbnail')?></option>
            <option value="vimeo"<?php  if ($videoOptions == 'vimeo') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Vimeo')?></option>
            <option value="vimeoThumb"<?php  if ($videoOptions == 'vimeoThumb') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Vimeo With Thumbnail')?></option>
            <option value="gmaps"<?php  if ($videoOptions == 'gmaps') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Google Maps')?></option>
           <!-- <option value="gmapsThumb"<?php  if ($videoOptions == 'gmapsThumb') { ?> selected<?php  } ?> name="videoOptions"><?php echo t('Google Maps With Preview Image')?></option> -->
           <!-- <option value="bingmaps"<?php  if ($videoOptions == 'bingmaps') { ?>selected <?php  } ?> name="videoOptions"><?php echo t('Bing Maps')?></option> -->
          </select>
        </div>
      </div>
<!-- 
  Maps Preview Image 
-->
<!-- not ready yet
      <div id="mapsPreviewImage" class="control-group">
        <label for="mapAddress" class="control-label"><?php   echo t('Map Address')?></label>
        <div class="controls">
         <input id="mapAddress" type="text" name="mapAddress" value="<?php echo $mapAddress; ?>" class="span3" />
        </div>
      </div>
-->
<!--
   YouTube Thumbnail Quality dropdown
-->
      <div id="youtubeThumb" class="control-group">
        <label for="youtubeThumbnailOption" class="control-label"><?php   echo t('YouTube Thumbnail Quality')?></label>
        <div class="controls">
          <select id="youtubeThumbnailOption" class="span3" name="youtubeThumbnailOption">
            <option value="hqdefault"<?php  if ($youtubeThumbnailOption == 'hqdefault') { ?> selected<?php  } ?> name="youtubeThumbnailOption"><?php echo t('High Quality')?></option>
            <option value="mqdefault"<?php  if ($youtubeThumbnailOption == 'mqdefault') { ?> selected<?php  } ?> name="youtubeThumbnailOption"><?php echo t('Medium Quality')?></option>
            <option value="sddefault"<?php  if ($youtubeThumbnailOption == 'sddefault') { ?> selected<?php  } ?> name="youtubeThumbnailOption"><?php echo t('Standard Quality')?></option>
          </select>
        </div>
      </div>
<!--
  Vimeo Thumbnail Size
-->
      <div id="vimeoThumb" class="control-group">
        <label for="vimeoThumbnailOption" class="control-label"><?php   echo t('Vimeo Thumbnail Size')?></label>
        <div class="controls">
          <select id="vimeoThumbnailOption" class="span3" name="vimeoThumbnailOption">
            <option value="large"<?php  if ($vimeoThumbnailOption == 'large') { ?> selected<?php  } ?> name="vimeoThumbnailOption"><?php echo t('Large Thumbnail')?></option>
            <option value="medium"<?php  if ($vimeoThumbnailOption == 'medium') { ?> selected<?php  } ?> name="vimeoThumbnailOption"><?php echo t('Medium Thumbnail')?></option>
            <option value="small"<?php  if ($vimeoThumbnailOption == 'small') { ?> selected<?php  } ?> name="vimeoThumbnailOption"><?php echo t('Small Thumbnail')?></option>
          </select>
        </div>
      </div>
<!--
  video or map link
-->
      <div class="control-group">
        <label for="vidMapURL" class="control-label"><?php   echo t('Video or Map URL')?></label>
        <div class="controls">
          <input id="vidMapURL" type="text" name="vidMapURL" value="<?php echo $vidMapURL; ?>" class="span3" />
        </div>
      </div>
<!--
  video or map link text
-->
      <div class="control-group">
        <label for="vidMapLinkText" class="control-label"><?php   echo t('Video or Map Link Text')?></label>
        <div class="controls">
          <input id="vidMapLinkText" type="text" name="vidMapLinkText" value="<?php echo $vidMapLinkText; ?>" class="span3" />
        </div>
      </div>
    </div><!-- end vidmap block field group -->
  </div><!-- end #vidMap container -->
<!--
  Dialog With CSS Animation
-->
 <div id="animationDialog" class="ccm-block-field-group">
    <h5><?php echo t('Dialog With CSS Animation'); ?></h5>
<!-- 
  CSS Dialog Dropdown
-->
      <div class="control-group">
        <?php echo $form->label('dialogType', "Dialog Type" ); ?> 
        <div class="controls">
          <select id="dialogType" class="span4" name="dialogType">
            <option value="choose"><?php echo t( 'Choose a CSS Dialog Animation Type' ); ?></option>
            <option id="zoom-in" value="zoom-in"<?php  if ($dialogType == 'zoom-in') { ?> selected<?php  } ?>><?php echo t( 'Popup With Zoom-In Animation' ); ?></option>
            <option id="newspaper" value="newspaper"<?php  if ($dialogType == 'newspaper') { ?> selected<?php  } ?>><?php echo t( 'Popup With Newspaper Animation' ); ?></option>
            <option id="newspaper" value="move-horizontal"<?php  if ($dialogType == 'move-horizontal') { ?> selected<?php  } ?>><?php echo t( 'Popup With Move Horizontal Animation' ); ?></option>
            <option id="move-from-top" value="move-from-top"<?php  if ($dialogType == 'move-from-top') { ?> selected<?php  } ?>><?php echo t( 'Popup Move In From Top' ); ?></option>
            <option id="3d-unfold" value="3d-unfold"<?php  if ($dialogType == '3d-unfold') { ?> selected<?php  } ?>><?php echo t( 'Popup With 3d Unfold Animation' ); ?></option>
            <option id="zoom-out" value="zoom-out"<?php  if ($dialogType == 'zoom-out') { ?> selected<?php  } ?>><?php echo t( 'Popup With Zoom-Out Animation' ); ?></option>
            <option id="custom-anim" value="custom-anim"<?php  if ($dialogType == 'custom-anim') { ?> selected<?php  } ?>><?php echo t( 'Popup With Your Custom CSS Animation' ); ?></option>
          </select>
        </div>
      </div>
<!-- 
  Custom Animation input 
-->
      <div id="customAnimation" class="control-group">
        <label for="customAnim" class="control-label"><?php echo t( 'Custom Animation' ); ?></label>
        <div class="controls">
          <input id="customAnim" type="text" name="customAnim" value="<?php echo $customAnim; ?>" class="span3" />
          <span class="help-block"><p><?php echo t( 'Animations are CSS transitions, Set these in your CSS file.' );?></p></span>
          <span class="help-block"><p><?php echo t( 'You Can Find Examples here:' );?><a href="http://codepen.io/dimsemenov/pen/GAIkt" target="_blank">CodePen Examples</a></p></span>
        </div>
      </div>'
<!-- 
  Dialog Link Input
-->
      <div class="control-group">
        <label for="cssDialogLinkText" class="control-label"><?php echo t('CSS Dialog Link Text'); ?></label>
        <div class="controls">
          <?php Loader::element('editor_controls'); ?>
          <textarea id="cssDialogLinkText" name="cssDialogLinkText" class="ccm-advanced-editor"><?php echo $cssDialogLinkText;?></textarea>
        </div>
      </div>
<!--
  Dialog text input 
-->
      <div class="control-group">
        <label for="cssDialogText" class="control-label"><?php echo t('CSS Dialog Text'); ?></label>
        <div class="controls">
          <?php Loader::element('editor_controls'); ?>
          <?php echo $form->textarea('cssDialogText', '', array('class' => 'ccm-advanced-editor')); ?>
        </div>
      </div>
</div> 
 <!-- End #cssDialog -->
<!-- 
  Modal Inputs 
-->
<div id="modalInputs" class="ccm-block-field-group">
    <h5><?php echo t('Modal Window'); ?></h5>
<!-- 
  Modal Link Input
-->
      <div class="control-group">
        <label for="modalLink" class="control-label"><?php echo t('Modal Link Text'); ?></label>
        <div class="controls">
          <?php Loader::element('editor_controls'); ?>
          <textarea id="modalLink" name="modalLink" class="ccm-advanced-editor"><?php echo $modalLink;?></textarea>
        </div>
      </div>
<!--
  Modal text input 
-->
      <div class="control-group">
        <label for="modalText" class="control-label"><?php echo t('Modal Popup Text'); ?></label>
        <div class="controls">
          <?php Loader::element('editor_controls'); ?>
          <textarea id="modalText" name="modalText" class="ccm-advanced-editor"><?php echo $modalText;?></textarea>
        </div>
      </div>
</div> 
 <!-- End #modalInputs -->
</div><!-- end #ccm-magnific-types -->

<script type="text/javascript">
$(document).ready(function() {
    
    $("#magnific_type, #videoOptions").change(handleNewSelection);
    
    // Run the event handler once now to ensure everything is as it should be
    handleNewSelection.apply($("#magnific_type, #videoOptions"));
    $('#customAnimation').hide();
    $('#dialogType').change(function() {
    ($(this).val() == "custom-anim") ? $('#customAnimation').show() : $('#customAnimation').hide();
});
});
</script>
<!-- Tab Setup -->
<script type="text/javascript">
  var magnfic_ActiveTab = "ccm-magnific-type"; 
  $("#ccm-magnific-tabs a").click(function() {
    $("li.ccm-nav-active").removeClass('ccm-nav-active');
    $("#" + magnfic_ActiveTab + "-tab").hide();
    magnfic_ActiveTab = $(this).attr('id');
    $(this).parent().addClass("ccm-nav-active");
    $("#" + magnfic_ActiveTab + "-tab").show();
  });
</script>
