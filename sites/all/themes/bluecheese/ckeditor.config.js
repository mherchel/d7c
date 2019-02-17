/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 WARNING: clear browser's cache after you modify this file.
 If you don't do this, you may notice that browser is ignoring all your changes.
 */
CKEDITOR.editorConfig = function(config) {
  config.indentClasses = [ 'rteindent1', 'rteindent2', 'rteindent3', 'rteindent4' ];

  // [ Left, Center, Right, Justified ]
  config.justifyClasses = [ 'rteleft', 'rtecenter', 'rteright', 'rtejustify' ];

  // The minimum editor width, in pixels, when resizing it with the resize handle.
  config.resize_minWidth = 450;

  // Protect PHP code tags (<?...?>) so CKEditor will not break them when
  // switching from Source to WYSIWYG.
  // Uncommenting this line doesn't mean the user will not be able to type PHP
  // code in the source. This kind of prevention must be done in the server
  // side
  // (as does Drupal), so just leave this line as is.
  config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP Code

  // [#1762328] Uncomment the line below to protect <code> tags in CKEditor (hide them in wysiwyg mode).
  // config.protectedSource.push(/<code>[\s\S]*?<\/code>/gi);
  //config.extraPlugins = '';

  /*
    * Append here extra CSS rules that should be applied into the editing area.
    * Example:
    * config.extraCss = 'body {color:#FF0000;}';
    */
  config.extraCss = '';

  config.templates_files = [Drupal.settings.basePath + 'sites/all/themes/bluecheese/js/ckeditor.custom.templates-v4.js'];
  config.templates_replaceContent = false;

  /**
    * CKEditor's editing area body ID & class.
    * See http://drupal.ckeditor.com/tricks
    * This setting can be used if CKEditor does not work well with your theme by default.
    */
  config.bodyClass = '';
  config.bodyId = '';
  /**
    * Sample bodyClass and BodyId for the "marinelli" theme.
    */
  if (Drupal.settings.ckeditor.theme == "marinelli") {
    config.bodyClass = 'singlepage';
    config.bodyId = 'primary';
  }

  // Make CKEditor's edit area as high as the textarea would be.
  if (this.element.$.rows > 0) {
    config.height = this.element.$.rows * 20 + 'px';
  }

  config.codeSnippet_languages = {'php': 'PHP', 'javascript': 'JavaScript', 'html': 'HTML', 'css': 'CSS', 'yaml': 'YAML'};
  config.FormatSource = false;
  config.format_code = { element: 'code', attributes: { 'class': 'editorCode' } };

  // Allow img data tags to be passed through ACF.
  config.extraAllowedContent = 'img[data-orig-src](aside-half);small';

  // Use the browser’s spell check.
  config.disableNativeSpellChecker = false;

  // Use CSS for image alignment instead of inline styles.
  config.image2_alignClasses = [
    'left',
    'center',
    'right'
  ];

  // No &nbsp; in empty <p>.
  config.fillEmptyBlocks = false;
}

// Set defaults for tables
CKEDITOR.on( 'dialogDefinition', function( ev )
{
   // Take the dialog name and its definition from the event
   // data.
   var dialogName = ev.data.name;
   var dialogDefinition = ev.data.definition;

   // Check if the definition is from the dialog we're
   // interested on (the "Table" dialog).
   if ( dialogName == 'table' )
   {
       // Get a reference to the "Table Info" tab.
       var infoTab = dialogDefinition.getContents( 'info' );
       txtBorder = infoTab.get( 'txtBorder' );
       txtBorder['default'] = '0';
   }

   // Corrects the Image label to notify about local images.
   if ( dialogName == 'image2') {
     var imgData = dialogDefinition.getContents('info');
     urlField = imgData.get('src');
     urlField['label'] = 'URL (must be hosted on Drupal.org, upload with “Add a new file”)';
   }
});
