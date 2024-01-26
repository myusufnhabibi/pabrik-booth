<?php

class Template
{
    var $template_data = [];

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = [], $return = false)
    {
        $ci = get_instance();
        $this->set('contents', $ci->load->view($view, $view_data, true));
        return $ci->load->view($template, $this->template_data, $return);
    }
}
