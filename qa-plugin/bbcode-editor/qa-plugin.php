<?php


/*
	Plugin Name: BBCode Editor
	Plugin URI: 
	Plugin Description: BBCode text editor
	Plugin Version: 1.0
	Plugin Date: 2011-02-23
	Plugin Author: Iyesus.com
	Plugin Author URI: http://www.iyesus.com/
	Plugin License: GPLv2	
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('editor', 'qa-bbcode-editor.php', 'qa_bbcode_editor', 'BBCode Editor');
	qa_register_plugin_module('viewer', 'qa-bbcode-viewer.php', 'qa_bbcode_viewer', 'BBCode Viewer');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/