hideAllTheDivs = function() {
	$('#single-options, #singleImage, #galleryImages, #youtubeThumb, #vimeoThumb').hide();
};

handleSelection = function() {
	hideAllTheDivs();

	switch ($(this).val()) {
		case 'single': 
			$('#singleImage').show("slow");
			$('#single-options').show("slow");
			break;
		case 'popup':
			$('#galleryImages').show("slow");
			break;
		case 'zoom':
			$('#singleImage').show("slow");
			break;
		case 'vidMap':
			$('#vidMap').show("slow");
			break;
		case 'youtubeThumb':
			$('#youtubeThumb').show("slow");
		case 'vimeoThumb':
			$('#vimeoThumb').show("slow");
	}
};

// input validation 
function ccmValidateBlockForm() {

	if ($('#magnific_type').val() == 'select1') {
		ccm_addError(ccm_t('selection-required'));
	}
	if ($('#magnific_type').val() == 'single' && $("#ccm-b-image-fm-value").val() == 0) {
		ccm_addError(ccm_t('image-required'));
	}
	if ($('#magnific_type').val() == 'single' && $('#singleOption').val() == 'select-2') {
		ccm_addError(ccm_t('single-option-required'));
	}
	if ($('#magnific_type').val() == 'popup' && $('#fsID').val() == '') {
		ccm_addError(ccm_t('gallery-required'));
	}
	if ($('#magnific_type').val() == 'zoom' && $("#ccm-b-image-fm-value").val() == 0) {
		ccm_addError(ccm_t('image-required'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#videoOptions').val() == 'select-3') {
		ccm_addError(ccm_t('video-map-selection-required'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#vidMapURL').val() == '') {
		ccm_addError(ccm_t('url-requried'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#vidMapLinkText').val() == '') {
		ccm_addError(ccm_t('link-text-required'));
	}
	
	return false;
}