<?php

/*
	Question2Answer 1.3.1 (c) 2011, Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-include/qa-viewer-basic.php
	Version: 1.3.1
	Date: 2011-02-01 12:56:28 GMT
	Description: Basic viewer module for displaying HTML or plain text


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}


	class qa_bbcode_viewer {
	
		var $htmllineseparators;
		var $htmlparagraphseparators;
		var $urltoroot;
		var $styleAdded;
		
		function load_module($localdir, $urltoroot)
		{
			$this->styleAdded = false;
			$this->urltoroot=$urltoroot;
			$this->htmllineseparators='br|option';
			$this->htmlparagraphseparators='address|applet|blockquote|center|cite|col|div|dd|dl|dt|embed|form|frame|frameset|h1|h2|h3|h4|h5|h6'.
				'|hr|iframe|input|li|marquee|ol|p|pre|samp|select|spacer|table|tbody|td|textarea|tfoot|th|thead|tr|ul';
		}
		
		function calc_quality($content, $format)
		{			
			if ( $format=='BBCODE' )
				return 1.0;
			else
				return 0;
		}
		
		function get_html($content, $format, $options)
		{					
			$html=$content;			
			require_once 'nbbc-bbcode-parser/nbbc.php';			
			$bbcode = new BBCode;			
			$bbcode->SetIgnoreNewlines(false);			
			$bbcode->SetDetectURLs(false);							
			$html = $bbcode->Parse($html);
			$viewerJS = '';
			
			if(!$this->styleAdded){
				//there is no functionality to add styles for the viewer like that of the editor ($qa_content['css_src'][])
				//so we have to do it with javascirpt
				//this style is used to format viewer outputs like Quotes and Codes etc.
				
				$this->styleAdded = true;
				$viewerJS = "<script type='text/javascript'>
								var link = document.createElement( 'link' );
								link.setAttribute( 'href', '" . $this->urltoroot . "nbbc-bbcode-parser/style.css'".  " );
								link.setAttribute( 'rel', 'stylesheet' );
								link.setAttribute( 'type', 'text/css' );
								var head = document.getElementsByTagName('head').item(0);	
								head.appendChild(link);
								</script>\n\n";								
			}
								
			return  $viewerJS . $html; 
			
		}

		function get_text($content, $format, $options)
		{
			if ($format=='html') {
				$text=strtr($content, "\n\r\t", '   '); // convert all white space in HTML to spaces
				$text=preg_replace('/<\s*('.$this->htmllineseparators.')[^A-Za-z0-9]/i', "\n\\0", $text); // tags to single new line
				$text=preg_replace('/<\s*('.$this->htmlparagraphseparators.')[^A-Za-z0-9]/i', "\n\n\\0", $text); // tags to double new line
				$text=strip_tags($text); // all tags removed
				$text=preg_replace('/  +/', ' ', $text); // combine multiple spaces into one
				$text=preg_replace('/ *\n */', "\n", $text); // remove spaces either side new lines
				$text=preg_replace('/\n\n\n+/', "\n\n", $text); // more than two new lines combine into two
				$text=strtr($text, array(
					'&#34;' => "\x22",
					'&#38;' => "\x26",
					'&#39;' => "\x27",
					'&#60;' => "\x3C",
					'&#62;' => "\x3E",
					'&nbsp;' => " ",
					'&quot;' => "\x22",
					'&amp;' => "\x26",
					'&lt;' => "\x3C",
					'&gt;' => "\x3E",
				)); // base HTML entities (others should not be stored in database)
				
				$text=trim($text);

			} else
				$text=$content;
				
			if (isset($options['blockwordspreg'])) {
				require_once QA_INCLUDE_DIR.'qa-util-string.php';
				$text=qa_block_words_replace($text, $options['blockwordspreg']);
			}

			return $text;
		}
	
	};
	

/*
	Omit PHP closing tag to help avoid accidental output
*/