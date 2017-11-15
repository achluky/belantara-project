<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        if ($site_lang) {
            $ci->lang->load('label',$ci->session->userdata('site_lang'));
        } else {
            $ci->session->set_userdata('site_lang', 'EN');
        }
        $ci->lang->load('label',$ci->session->userdata('site_lang'));
        $ci->lang->load('navigation',$ci->session->userdata('site_lang'));

        $site_group = $ci->session->userdata('group_name');
        if (!$site_group) {
            $ci->session->set_userdata('group_name', '');
        }

    }
}