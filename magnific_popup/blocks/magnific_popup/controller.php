<?php defined('C5_EXECUTE') or die('Access denied.');

class MagnificPopupBlockController extends BlockController {
	protected $btTable           = 'btMagnificPopup';
	protected $btInterfaceWidth  = "590";
	protected $btInterfaceHeight = "500";
	protected $btWrapperClass    = 'ccm-ui';

	// disabled cache during development
	// EDITED ON 16-01-2014 (January 16, 2014)
	// turned on block cache
	protected $btCacheBlockRecord                   = true;
	protected $btCacheBlockOutput                   = true;
	protected $btCacheBlockOutputOnPost             = true;
	protected $btCacheBlockOutputForRegisteredUsers = true;
	protected $btCacheBlockOutputLifetime           = CACHE_LIFETIME;


	public function getBlockTypeDescription() {
		return t( 'Magnific Popup is a responsive jQuery lightbox & dialog plugin that is focused on performance and providing best experience for user with any device (Zepto.js compatible).' );
	}

	public function getBlockTypeName() {
		return t( 'Magnific Popup' );
	}
	// on page view insert magnific javascript and vimeo thumb javascript into footer (these are minified)
	public function on_page_view() {
		$html = Loader::helper( 'html' );
		$bv   = new BlockView();
		$bv->setBlockObject( $this->getBlockObject() );
		$this->addFooterItem( $html->javascript( $bv->getBlockURL() . '/magnific/magnific-combined-1.0.0.min.js', array( 'minify' => true ) ) );

	}

	// JavaScript form validation strings
	// these are used in the add and edit dialog window
	// they create a modal/popup if incorrect data or no data is inserted
	// into the text area/ text input.
	public function getJavaScriptStrings() {
		return array(
			'selection-required'           => t( 'Please Select a Magnific Type.' ),
			'image-required'               => t( 'Please Select an Image.' ),
			'single-option-required'       => t( 'Please Select a Single Image Option.' ),
			'gallery-required'             => t( 'Please Select a Gallery' ),
			'url-requried'                 => t( 'Please Enter a Video or Map URL' ),
			'link-text-required'           => t( 'Please Enter Link Text' ),
			'video-map-selection-required' => t( 'Please Make a Video or Map Selection' ),
			'dialog-type-required'         => t( 'Please Choose a Dialog Type' ),
			'dialog-text-required'         => t( 'Please Enter the Dialog Text' ),
			'dialog-link-text-required'    => t( 'Pleaes Enter the Dialog Link Text' )
		);
	}
	// getting a picture for the file picker
	public function getPicture() {
		return $this->fIDpicture;
	}
	function getPictureObject() {
		return File::getByID( $this->fIDpicture );
	}

	public function add() {
		$this->addEdit();
	}
	public function edit() {
		$this->addEdit();
	}

	public function addEdit() {
		$fsList = new FileSetList();
		$sets = $fsList->get();

		$options = array();

		foreach ( $sets as $fs ) {
			$options[$fs->fsID] = $fs->fsName;
		}

		$this->set( 'sets', $options );
	}

	public function view() {
		$fs = FileSet::getByID( $this->fsID );
		$fileList = new FileList();
		$fileList->filterBySet( $fs );
		$fileList->filterByType( FileType::T_IMAGE );
		$fileList->sortByFileSetDisplayOrder();

		$images = $fileList->get( 1000, 0 );

		$this->set( 'images', $images );
		$this->set( 'picture', $this->getPicture() );
	}
}