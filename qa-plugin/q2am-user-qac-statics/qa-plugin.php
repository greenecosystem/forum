<?php

/*
	Plugin Name: Q2AM User QAC Statics
	Plugin URI: https://github.com/q2amarket/q2am-user-qac-statics
	Plugin Update Check URI: https://github.com/q2amarket/q2am-user-qac-statics/raw/master/qa-plugin.php  
	Plugin Description: Display user statics for questions, answers and comment.
	Plugin Version: 1.0
	Plugin Date: 2012-11-29
	Plugin Author: Q2A Market
	Plugin Author URI: http://www.q2amarket.com
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.4
*/


if (!defined('QA_VERSION')){header('Location: ../../'); exit;}

qa_register_plugin_layer('qa-user-qac-statics.php', 'Q2AM User QAC Static');