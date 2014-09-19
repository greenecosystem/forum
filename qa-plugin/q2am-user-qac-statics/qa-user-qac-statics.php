<?php
/*
*	Q2AM User Pie Chart
*
*	Add pie chart for questions, answers and comment statastics for the user.
*	File: Theme output
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.0
*	
*	@Q2A Version	1.5.3
*
*	Do not modify this file unless you know what you are doing
*/

class qa_html_theme_layer extends qa_html_theme_base {

	function head_css(){
		qa_html_theme_base::head_css();
		$plugin_root = qa_opt('site_url').'qa-plugin/q2am-user-qac-statics/'; 
		$this->output('<LINK REL="stylesheet" TYPE="text/css" HREF="'.$plugin_root.'qa-user-qac-static.css"/>');

	}

	function post_meta($post, $class, $prefix=null, $separator='<BR/>') {

		if($class == 'qa-q-view') {

			$handle = strip_tags($post['who']['data']);
			$uids = qa_handles_to_userids(array($handle));
			$uid = $uids[$handle];
			if(!$uid)
				return qa_html_theme_base::post_meta($post, $class, $prefix=null, $separator='<BR/>');

			qa_html_theme_base::post_meta($post, $class, $prefix=null, $separator='<BR/>');

			$this->output('<TABLE ALIGN="right" CLASS="qa-user-qac-static">');
			$this->output('<TR>');			

			$query = qa_db_query_sub(
					'SELECT type, userid, COUNT(type) AS `total_count` FROM ^posts '.
					'WHERE type=$ AND userid=#',
					'Q', $uid
				);

			$td = '<TD>';
			$td_close = '</TD>';				

			while ( ($count=qa_db_read_one_assoc($query,true)) !== null ) {

				$state = $count['total_count'];

				$this->output($td,'Q',$td_close,$td,$state,$td_close);

			}

			$query = qa_db_query_sub(
					'SELECT type, userid, COUNT(type) AS `total_count` FROM ^posts '.
					'WHERE type=$ AND userid=#',
					'A', $uid
				);				

			while ( ($count=qa_db_read_one_assoc($query,true)) !== null ) {

				$state = $count['total_count'];

				$this->output($td,'A',$td_close,$td,$state,$td_close);

			}

			$query = qa_db_query_sub(
					'SELECT type, userid, COUNT(type) AS `total_count` FROM ^posts '.
					'WHERE type=$ AND userid=#',
					'C', $uid
				);				

			while ( ($count=qa_db_read_one_assoc($query,true)) !== null ) {

				$state = $count['total_count'];

				$this->output($td,'C',$td_close,$td,$state,$td_close);

			}			

			$this->output('</TR>');
			$this->output('</TABLE>');
			

		} else {
			qa_html_theme_base::post_meta($post, $class, $prefix=null, $separator='<BR/>');	
		}		

	}

}