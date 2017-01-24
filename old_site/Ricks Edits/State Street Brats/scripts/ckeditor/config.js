/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( c ) {
// Define changes to default configuration here. For example:
//    c.height = $(window).height() - 45;

	c.protectedSource.push( /<\?[\s\S]*?\?>/g );   // PHP Code

	c.removePlugins = 'about,forms,scayt,styles,templates';

	c.toolbar_CMS =
	[
	    ['Format','Font','FontSize'],
	    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['Image','Flash','Table','HorizontalRule','SpecialChar'],
	    '/',
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','TextColor','BGColor'],
	    ['Link','Unlink'],
	    ['Find','Replace','-','Maximize','SpellChecker','PasteFromWord'],
	    ['Undo','Redo'],
	    ['Source']
	];
	c.toolbar = 'CMS';
	
	c.colorButton_colors = c.colorButton_colors + ',c3d730,663700';
	
	// FCKeditor File Manager Integration
	c.filebrowserBrowseUrl			= '/scripts/ckeditor/plugins/fckfilemanager/browser/default/browser.html?Connector=/scripts/ckeditor/plugins/fckfilemanager/connectors/php/connector.php';
	c.filebrowserImageBrowseUrl	= '/scripts/ckeditor/plugins/fckfilemanager/browser/default/browser.html?Type=Image&Connector=/scripts/ckeditor/plugins/fckfilemanager/connectors/php/connector.php';
	c.filebrowserFlashBrowseUrl	= '/scripts/ckeditor/plugins/fckfilemanager/browser/default/browser.html?Type=Flash&Connector=/scripts/ckeditor/plugins/fckfilemanager/connectors/php/connector.php';
	c.filebrowserUploadUrl			= '/scripts/ckeditor/plugins/fckfilemanager/connectors/php/upload.php?Type=File';
	c.filebrowserImageUploadUrl	= '/scripts/ckeditor/plugins/fckfilemanager/connectors/php/upload.php?Type=Image';
	c.filebrowserFlashUploadUrl = '/scripts/ckeditor/plugins/fckfilemanager/connectors/php/upload.php?Type=Flash';

};