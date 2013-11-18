<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class MagnificZoomBlockController extends BlockController {
		protected $btTable		= 'btMagnificPopup';
		protected $btInterfaceWidth	= "590";
		protected $btInterfaceHeight	= "450";

		public function getBlockTypeDescription() {
			return t('Magnific Zoom');
		}

		public function getBlockTypeName() {
			return t('Magnific Zoom');
		}

		public function on_page_view() {
	      $html = Loader::helper('html');
	      $this->addHeaderItem($html->css('magnific.css'));
	      $this->addFooterItem($html->javascript('magnific.js'));
	   }

		public function getJavaScriptStrings() {
			return array(
				'image-required' => t('Please Select an Image.')
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