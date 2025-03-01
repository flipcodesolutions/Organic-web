/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
	// Enable required extra plugins
	config.extraPlugins = 'font,justify,clipboard,pastetools';

	// Define toolbar with Font Size, Font Family, Justify, and Paste tools
	config.toolbar = [
		{ name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] }, // Clipboard/Paste tools
		{ name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] }, // Basic text formatting
		{ name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] }, // Paragraph formatting
		{ name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] }, // Justify options
		{ name: 'styles', items: ['Format', 'Font', 'FontSize'] }, // Font family & size
		{ name: 'colors', items: ['TextColor', 'BGColor'] }, // Text & background color
		{ name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] }, // Insert options
		{ name: 'links', items: ['Link', 'Unlink'] }, // Link options
		{ name: 'tools', items: ['Maximize'] }, // Other tools
		{ name: 'about', items: ['About'] } // About CKEditor
	];

	// Remove default buttons that are not needed
	config.removeButtons = 'Subscript,Superscript';

	// Set default font options
	config.font_names = 'Arial/Arial, Helvetica, sans-serif;' +
		'Times New Roman/Times New Roman, serif;' +
		'Courier New/Courier New, Courier, monospace;';

	// Set default font size options
	config.fontSize_sizes = '12px/12px;14px/14px;16px/16px;18px/18px;24px/24px;36px/36px;';

	// Allow paste from Word (keep formatting)
	config.pasteFromWordPromptCleanup = true;
	config.pasteFromWordRemoveFontStyles = false;
	config.pasteFromWordRemoveStyles = false;
};
