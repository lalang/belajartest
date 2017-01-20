/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
var url_domain = document.domain;
if(url_domain=='localhost'){ 
	CKEDITOR.editorConfig = function( config ) {
		// Define changes to default configuration here. For example:
		// config.language = 'fr';
		// config.uiColor = '#AADC6E';
		
		config.filebrowserBrowseUrl = 'http://localhost/replika_rps/kcfinder/browse.php?type=files';
		config.filebrowserImageBrowseUrl = 'http://localhost/replika_rps/kcfinder/browse.php?type=image';
		config.filebrowserFlashBrowseUrl = 'http://localhost/replika_rps/kcfinder/browse.php?type=flash';
		config.filebrowserUploadUrl = 'http://localhost/replika_rps/kcfinder/upload.php?type=files';
		config.filebrowserImageUploadUrl = 'http://localhost/replika_rps/kcfinder/upload.php?type=image';
		config.filebrowserFlashUploadUrl = 'http://localhost/replika_rps/kcfinder/upload.php?type=flash';
	};
}else{
	CKEDITOR.editorConfig = function( config ) {
		// Define changes to default configuration here. For example:
		// config.language = 'fr';
		// config.uiColor = '#AADC6E';
		
		config.filebrowserBrowseUrl = url_domain+'/kcfinder/browse.php?type=files';
		config.filebrowserImageBrowseUrl = url_domain+'/kcfinder/browse.php?type=image';
		config.filebrowserFlashBrowseUrl = url_domain+'/kcfinder/browse.php?type=flash';
		config.filebrowserUploadUrl = url_domain+'/kcfinder/upload.php?type=files';
		config.filebrowserImageUploadUrl = url_domain+'/kcfinder/upload.php?type=image';
		config.filebrowserFlashUploadUrl = url_domain+'/kcfinder/upload.php?type=flash';
	};
}