<?php

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}


	class qa_bbcode_editor {
		
		var $urltoroot;
		
		function load_module($localdir, $urltoroot)
		{
			$this->urltoroot=$urltoroot;
		}
		
		function calc_quality($content, $format)
		{
			if ($format=='BBCODE')
				return 1.0;
			elseif ($format=='')
				return 0.8;
			else
				return 0;
				
		}

		function get_field(&$qa_content, $content, $format, $fieldname, $rows, $autofocus)
		{
			if ($autofocus)
				$qa_content['focusid']=$fieldname;
			
			//jQuery
			$qa_content['script_src'][] = $this->urltoroot . 'markitup/jquery-1.4.3.min.js';
			//markItUp!
			$qa_content['script_src'][] = $this->urltoroot . 'markitup/jquery.markitup.js';
			//markItUp! toolbar settings
			$qa_content['script_src'][] = $this->urltoroot . 'markitup/sets/bbcode/set.js';
			
			//two skins are included - the standard markitup skin and the simple skin
			//we use the markitup skin here
			
			// markItUp! skin (markitup)
			$qa_content['css_src'][] = $this->urltoroot . 'markitup/skins/markitup/style.css';
			// markItUp! skin (simple)
			//$qa_content['css_src'][] = $this->urltoroot . 'markitup/skins/simple/style.css';
			
			//markItUp! toolbar skin
			$qa_content['css_src'][] = $this->urltoroot . 'markitup/sets/bbcode/style.css';	
			
			$editorJS = ' $(document).ready(function()	{
										// Add markItUp! to your textarea in one line
										// $(\'textarea\').markItUp( { Settings }, { OptionalExtraSettings } );
										$(\'#' . $fieldname . '\').markItUp(mySettings);
										
										// You can add content from anywhere in your page
										// $.markItUp( { Settings } );	
										$(\'.add\').click(function() {
											$.markItUp( { 	openWith:\'<opening tag>\',
															closeWith:\'<\/closing tag>\',
															placeHolder:"New content"
														}
													);
											return false;
										});
										
										// And you can add/remove markItUp! whenever you want
										// $(textarea).markItUpRemove();
										$(\'.toggle\').click(function() {
											if ($("#' . $fieldname . '.markItUpEditor").length === 1) {
												$("#' . $fieldname . '").markItUpRemove();
												$("span", this).text("get markItUp! back");
											} else {
												$(\'#' . $fieldname . '\').markItUp(mySettings);
												$("span", this).text("remove markItUp!");
											}
											return false;
										});
									});';
									
			$qa_content['script_onloads'][]= $editorJS;
			
			return array(
				'type' => 'textarea',
				'tags' => ' NAME="'.$fieldname.'" ID="'.$fieldname.'"',
				'value' => qa_html($content),
				'rows' => $rows,
			);
		}
		
		function read_post($fieldname)
		{
			return array(
				'format' => 'BBCODE',
				'content' => qa_post_text($fieldname),
			);
		}
	
	};
	

/*
	Omit PHP closing tag to help avoid accidental output
*/