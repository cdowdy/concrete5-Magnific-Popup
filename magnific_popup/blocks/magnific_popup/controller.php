<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class MagnificPopupBlockController extends BlockController {
		protected $btTable		= 'btMagnificPopup';
		protected $btInterfaceWidth	= "590";
		protected $btInterfaceHeight	= "450";
		protected $btWrapperClass	= 'ccm-ui';

		public function getBlockTypeDescription() {
			return t('Magnific Popup is a responsive jQuery lightbox & dialog plugin that is focused on performance and providing best experience for user with any device (Zepto.js compatible).');
		}

		public function getBlockTypeName() {
			return t('Magnific Popup');
		}

		public function on_page_view() {
			$html = Loader::helper('html');
			$this->addHeaderItem($html->css('magnific.css'));
			$this->addFooterItem($html->javascript('magnific.js'));
	   }

		public function getJavaScriptStrings() {
			return array(
				'selection-required' => t('Please Select a Magnific Type.'),
				'image-required' => t('Please Select an Image.'),
				'gallery-required' => t('Please Select a Gallery'),
				'url-requried' => t('Please Enter a Video or Map URL'),
				'link-text-required' => t('Please Enter Link Text'),
				'video-map-selection-required' => t('Please Make a Video or Map Selection')
				);
		}

		public function getPicture() {
			if ($this->fIDpicture > 0) {
				return File::getByID($this->fIDpicture);
			}
			return null;
		}

		protected function setFileSets() {
			Loader::model('file_set');
	        $fileSetsList = FileSet::getMySets();
	        $fileSets = array();
	        foreach ($fileSetsList as $fileSet) {
	            $fileSets[$fileSet->getFileSetID()] = $fileSet->getFileSetName();
	        }
	        $this->set('fileSets', $fileSets);
	    }

	    public function edit() {
	        $this->setFileSets();
	    }

	    public function add() {
	        $this->setFileSets();
	    }

		public function view() {
			$fs = FileSet::getByID($this->fsID);
	        $fileList = new FileList();
	        $fileList->filterBySet($fs);
	        $fileList->filterByType(FileType::T_IMAGE);
	        $fileList->sortByFileSetDisplayOrder();

	        $images = $fileList->get(1000, 0);
	        
	        $this->set('images', $images);
			$this->set('picture', $this->getPicture());
		}
	}
?>