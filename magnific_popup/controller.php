<?php defined('C5_EXECUTE') or die('Access denied.');
class MagnificPopupPackage extends Package {

	protected $pkgHandle          = 'magnific_popup';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion         = '0.9.7';

	public function getPackageName() {
		return t( 'Magnific Popup' );
	}

	public function getPackageDescription() {
		return t( 'Magnific Popup is a responsive jQuery lightbox & dialog plugin that is focused on performance and providing best experience for user with any device (Zepto.js compatible).' );
	}

	public function install() {
		$pkg = parent::install();

		BlockType::installBlockTypeFromPackage( 'magnific_popup', $pkg );
	}
}
