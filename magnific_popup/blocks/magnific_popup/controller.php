<?php defined( 'C5_EXECUTE' ) or die( _( "Access Denied." ) );

class MagnificPopupBlockController extends BlockController {
	protected $btTable           = 'btMagnificPopup';
	protected $btInterfaceWidth  = "590";
	protected $btInterfaceHeight = "450";
	protected $btWrapperClass    = 'ccm-ui';
	
	// disabled cache during development
	protected $btCacheBlockRecord                   = false;
	protected $btCacheBlockOutput                   = false;
	protected $btCacheBlockOutputOnPost             = false;
	protected $btCacheBlockOutputForRegisteredUsers = false;
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
		$this->addFooterItem( $html->javascript( $bv->getBlockURL() . '/magnific/magnific-combined-1.0.0.min.js', array('minify' => true)));

	}

	// JavaScript form validation strings
	public function getJavaScriptStrings() {
		return array(
			'selection-required'           => t( 'Please Select a Magnific Type.' ),
			'image-required'               => t( 'Please Select an Image.' ),
			'single-option-required'       => t( 'Please Select a Single Image Option.' ),
			'gallery-required'             => t( 'Please Select a Gallery' ),
			'url-requried'                 => t( 'Please Enter a Video or Map URL' ),
			'link-text-required'           => t( 'Please Enter Link Text' ),
			'video-map-selection-required' => t( 'Please Make a Video or Map Selection' )
		);
	}
	// getting a picture for the file picker
	public function getPicture() {
		return $this->fIDpicture;
	}
	function getPictureObject() {
		 return File::getByID($this->fIDpicture);
	}

	// grabbing file_set / image gallerys in file manager
	protected function setFileSets() {
		Loader::model( 'file_set' );
		$fileSetsList = FileSet::getMySets();
		$fileSets = array();
		foreach ( $fileSetsList as $fileSet ) {
			$fileSets[$fileSet->getFileSetID()] = $fileSet->getFileSetName();
		}
		$this->set( 'fileSets', $fileSets );
	}
	function getGalleryImages() {
		return FileSet::$this->fsID;
	}

	public function add() {
		$this->setFileSets();
	}

	public function edit() {
		$this->setFileSets();
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