<?php

/*
    Plugin Name: Search Datalist by Q2A Market
    Plugin URI: http://store.q2amarket.com/q2a-free-plugins/search-datalist
    Plugin Description: Set predefined search datalist and guide your user what to search with less typing.
    Plugin Version: 1.0
    Plugin Date: 2014-03-01
    Plugin Author: Q2A Market
    Plugin Author URI: http://www.q2amarket.com/
    Plugin License: GPLv2
    Plugin Minimum Question2Answer Version: 1.6
    Plugin Update Check URI: https://raw.github.com/q2amarket/qam-search-datalist/master/qa-plugin.php
*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

        // register modules
	qa_register_plugin_layer('qam-search-datalist-layer.php', 'Search Datalist by Q2A Market Layer');
        qa_register_plugin_module('module', 'qam-search-datalist-options.php', 'qam_search_datalist_options', 'Search Datalist Options by Q2A Market Layer');
		

/*
	Omit PHP closing tag to help avoid accidental output
*/