<?php
/*
*	Search Datalist by Q2A Market
*
*	Plugin option form
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.0
*	
*	@Q2A Version	1.6+
*
*	Do not modify this file unless you know what you are doing
*/

class qam_search_datalist_options {

    private $qam_sdl_prefix = 'qam_sdl_';

    // set default options
    function option_default($option) {

        switch ($option) {
            case $this->qam_sdl_prefix . 'enable':
                return TRUE;

            default:
                return null;
        }
    }

    // generate forms
    function admin_form(&$qa_content) {
        $saved = false;

        if (qa_clicked($this->qam_sdl_prefix . 'save_button')) {
            
            qa_opt($this->qam_sdl_prefix . 'enable', (bool)qa_post_text($this->qam_sdl_prefix . 'enable'));
            qa_opt($this->qam_sdl_prefix . 'autocomplete', qa_post_text($this->qam_sdl_prefix . 'autocomplete'));
            qa_opt($this->qam_sdl_prefix . 'data_options', qa_post_text($this->qam_sdl_prefix . 'data_options'));
            
            $saved = true;
        } else if (qa_clicked($this->qam_sdl_prefix . 'reset_button')) {

            foreach ($_POST as $i => $v) {

                $def = $this->option_default($i);
                if ($def !== null)
                    qa_opt($i, $def);
            }

            $saved = qa_lang_html_sub('admin/options_reset');
        }

        qa_set_display_rules($qa_content, array(
            $this->qam_sdl_prefix . 'data_options' => $this->qam_sdl_prefix . 'enable',
            $this->qam_sdl_prefix . 'autocomplete' => $this->qam_sdl_prefix . 'enable',
        ));

        return array(
            'ok' => $saved ? 'Search Datalist by Q2A Market Options Saved Successfully!' : null,
            'fields' => array(
                array(
                    'label' => 'Enable',
                    'type' => 'checkbox',
                    'value' => (bool)qa_opt($this->qam_sdl_prefix . 'enable'),
                    'tags' => 'NAME="' . $this->qam_sdl_prefix . 'enable" ID="' . $this->qam_sdl_prefix . 'enable"',
                ),
                
                array(
                    'label' => 'Auto Complete',
                    'type' => 'select',
                    'value' => qa_opt($this->qam_sdl_prefix . 'autocomplete'),
                    'tags' => 'NAME="' . $this->qam_sdl_prefix . 'autocomplete" ID="' . $this->qam_sdl_prefix . 'autocomplete"',
                    'options' => array('Off' => 'Off', 'On' => 'On'),
                ),
                
                
                array(
                    'label' => 'Add Options (one option per line)',
                    'type' => 'textarea',
                    'value' => qa_opt($this->qam_sdl_prefix . 'data_options'),
                    'tags' => 'NAME="' . $this->qam_sdl_prefix . 'data_options" ID="' . $this->qam_sdl_prefix . 'data_options"',
                    'rows' => 10,
                ),
                
            ),
            'buttons' => array(
                array(
                    'label' => 'Save Options',
                    'tags' => 'NAME="' . $this->qam_sdl_prefix . 'save_button"',
                ),
                array(
                    'label' => 'Reset Options',
                    'tags' => 'NAME="' . $this->qam_sdl_prefix . 'reset_button"',
                ),
            ),
        );
    }

}
