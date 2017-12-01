/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config )
{

config.height = '475px'; 
config.extraPlugins = 'eqneditor,pbckcode,youtube,pramukhime';

config.toolbarGroups = [
{ name: 'pbckcode' },
{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
{ name: 'links' },
{ name: 'insert' },
{ name: 'others' },
'/',
{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ] },
{ name: 'styles' },
{ name: 'colors' },
{ name: 'pramukhimeclick' },
{ name: 'pramukhimeconvert' },
{ name: 'pramukhimehelp' },
];

};
config.pbckcode = {	
modes : [ ['C', 'c_pp'] ],
theme : 'clouds',	
highlighter : "PRETTIFY"
};

