hideAllDivs = function() {
	$("#single-options").hide();
	$("#singleImage").hide();
	$("#galleryImages").hide();
	$("#modalInputs").hide();
	$("#youtubeThumb").hide();
	$("#vimeoThumb").hide();
	$("#animationDialog").hide();
};

handleNewSelection = function() {

	hideAllDivs();

	switch ($(this).val()) {
		case 'single':
			$("#single-options").show();
			$("#singleImage").show();
			$("#vidMap").hide();
			break;
		case 'popup':
			$("#galleryImages").show();
			$("#vidMap").hide();
			break;
		case 'zoom':
			$("#singleImage").show();
			$("#vidMap").hide();
			break;
		case 'vidMap':
			$("#vidMap").show();
			break;
		case 'youtubeThumb':
			$("#youtubeThumb").show();
			break;
		case 'vimeoThumb':
			$("#vimeoThumb").show();
			break;
		case 'cssdialog':
			$("#animationDialog").show();
			$("#vidMap").hide();
			break;
		case 'modal':
			$("#modalInputs").show();
			$("#vidMap").hide();
			break;
	}
};

// input validation 
function ccmValidateBlockForm() {

	if ($('#magnific_type').val() == 'select1') {
		ccm_addError(ccm_t('selection-required'));
	}
	if ($('#magnific_type').val() == 'single' && $("#ccm-b-image-fm-value").val() === 0) {
		ccm_addError(ccm_t('image-required'));
	}
	if ($('#magnific_type').val() == 'single' && $('#singleOption').val() == 'select-2') {
		ccm_addError(ccm_t('single-option-required'));
	}
	if ($('#magnific_type').val() == 'popup' && $('#fsID').val() === '') {
		ccm_addError(ccm_t('gallery-required'));
	}
	if ($('#magnific_type').val() == 'zoom' && $("#ccm-b-image-fm-value").val() === 0) {
		ccm_addError(ccm_t('image-required'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#videoOptions').val() == 'select-3') {
		ccm_addError(ccm_t('video-map-selection-required'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#vidMapURL').val() === '') {
		ccm_addError(ccm_t('url-requried'));
	}
	if ($('#magnific_type').val() == 'vidMap' && $('#vidMapLinkText').val() === '') {
		ccm_addError(ccm_t('link-text-required'));
	}
	if ($('#magnific_type').val() == 'cssdialog' && $('#cssDialogLinkText').val() === '') {
		ccm_addError(ccm_t('dialog-link-text-required'));
	}
	if ($('#magnific_type').val() == 'cssdialog' && $('#cssDialogText').val() === '') {
		ccm_addError(ccm_t('dialog-text-required'));
	}
	if ($('#magnific_type').val() == 'cssdialog' && $('#dialogType').val() == 'choose') {
		ccm_addError(ccm_t('dialog-type-required'));
	}

	return false;
}