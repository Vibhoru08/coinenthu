/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' }//,
		//{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript,about';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.ignoreEmptyParagraph = false;
	config.title = false;
	// Simplify the dialog windows.
	config.image_previewText = ' ';
	config.hideDialogFields="image:info:htmlPreview";
	config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
	config.removeDialogTabs = 'image:advanced;image:Link;link:advanced;link:target;link:upload;html5video:advanced';
  config.removePlugins = 'PasteFromWord';
  config.removeButtons = 'PasteFromWord,Anchor,SpecialChar,Source';
  config.extraPlugins = 'wordcount,notification,embed,embedbase,autolink,textmatch';//,easyimage,cloudservices,balloontoolbar,ajax,balloonpanel,imagebase,filetools,xml';
  config.wordcount = {

    // Whether or not you want to show the Paragraphs Count
    showParagraphs: true,

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,

    // Whether or not you want to count Spaces as Chars
    countSpacesAsChars: true,

    // Whether or not to include Html chars in the Char Count
    countHTML: false,

    // Maximum allowed Word Count, -1 is default for unlimited
    maxWordCount: -1,

    // Maximum allowed Char Count, -1 is default for unlimited
    maxCharCount: 1000,
    minWordCount:1,

    // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
    filter: new CKEDITOR.htmlParser.filter({
        elements: {
            div: function( element ) {
                if(element.attributes.class == 'mediaembed') {
                    return false;
                }
            }
        }
    })
};
};
CKEDITOR.on('dialogDefinition', function(e) {
    if (e.data.name === 'link') {
        var target = e.data.definition.getContents('target');
        var options = target.get('linkTargetType').items;
        for (var i = options.length-1; i >= 0; i--) {
            var label = options[i][0];
            if (!label.match(/new window/i)) {
                options.splice(i, 1);
            }
        }
        var targetField = target.get( 'linkTargetType' );
        targetField['default'] = '_blank';
    }



});
CKEDITOR.on( 'dialogDefinition', function( ev ) {
    // Take the dialog window name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if ( dialogName == 'image' ) {
        dialogDefinition.onShow = function() {
            // This code will open the Link tab.
        //    this.selectPage( 'Upload' );

        };
    }
});

//CKEDITOR.on( 'dialogDefinition', function( ev ) {
    // Take the dialog window name and its definition from the event data.
  //  var dialogName = ev.data.name;
  //  var dialogDefinition = ev.data.definition;
  //  var uploadTab = dialogDefinition.getContents('Upload');
  //  var uploadButton = uploadTab.get('uploadButton');
  //  var dialog = dialogDefinition.dialog;
  //  console.log(dialog);
//if ( dialogName === 'image2') {
  //dialogDefinition.onShow = function() {
      // This code will open the Link tab.
    //  this.selectPage( 'Upload' );

  //};
//var infoTab = dialogDefinition.getContents( 'info' );
  //var filebrowserSe = dialog.getParentEditor()._.filebrowserSe = uploadButton;
  //filebrowserSe.getDialog = function() {return dialog};
  //infoTab.remove('height');
  //infoTab.remove('width');
  //         infoTab.remove('lock');
  //code ...
//}
//});
