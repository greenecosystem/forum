<?php

/*
 * 	Search Datalist by Q2A Market
 * 	
 * 	Allow to add datalist for search field
 * 	
 * 	@author			Q2A Market
 * 	@category		Plugin
 * 	@Version: 		1.0
 * 	
 * 	@Q2A Version	1.6+
 *
 * 	Do not modify this file unless you know what you are doing
 */

class qa_html_theme_layer extends qa_html_theme_base {

    private $qam_sdl_prefix = 'qam_sdl_';

    function search_field($search) {

        if (qa_opt($this->qam_sdl_prefix . 'enable')) {
            
            $autocomplete = qa_opt($this->qam_sdl_prefix . 'autocomplete') === 'Off' ? 'autocomplete="off"' : NULL;
            $search_input = '<input type="text" list="q" ' . $search['field_tags'] . ' value="' . @$search['value'] . '" class="qa-search-field" ' . $autocomplete . '/>';
            $search_input .= '<datalist id="q">';

            $data_options = qa_opt($this->qam_sdl_prefix . 'data_options');
            $data_options = explode("\n", $data_options);

            // populate option per line
            foreach ($data_options as $data_option) {
                $search_input .= '<option value="' . $data_option . '">';
            }

            $search_input .= '</datalist>';

            // output search field
            $this->output($search_input);
            
        } else {
            
            qa_html_theme_base::search_field($search);
            
        }
    }

}
