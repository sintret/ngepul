<?php

class Template {

    protected $_CI;
    
    function __construct() {
        $this->_CI = &get_instance();
        $this->_CI->load->model('Maccess');
    }
    
    public function saythat(){
        return 'saythat';
    }


    public function checkRole($roleId, $controller, $method) {
        $r = $this->_CI->Maccess->checked($roleId, $controller, $method);
        if ($r)
            return true;
        else
            return false;
    }

    function template($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('themes/caplet/header', $data, true);
        $data['_sidebar'] = $this->_CI->load->view('themes/caplet/sidebar', $data, true);
        
        $this->_CI->load->view('/template.php', $data);
    }

    function caplet($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('themes/caplet/header', $data, true);
        $data['_slideleft'] = $this->_CI->load->view('themes/caplet/slideleft', $data, true);
        $data['_modal_message'] = $this->_CI->load->view('themes/caplet/modal_message', $data, true);
        $data['_modal_notification'] = $this->_CI->load->view('themes/caplet/modal_notification', $data, true);
        $data['_leftnav'] = $this->_CI->load->view('themes/caplet/leftnav', $data, true);
        $data['_rightnav'] = $this->_CI->load->view('themes/caplet/rightnav', $data, true);
        $data['_sidebar'] = $this->_CI->load->view('themes/caplet/sidebar', $data, true);
        //$data['Maccess'] =$this->_CI->load->model('Maccess');
        $this->_CI->load->view('themes/caplet.php', $data);
    }

    function capletFile($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('themes/caplet/header', $data, true);
        $data['_slideleft'] = $this->_CI->load->view('themes/caplet/slideleft', $data, true);
        $data['_modal_message'] = $this->_CI->load->view('themes/caplet/modal_message', $data, true);
        $data['_modal_notification'] = $this->_CI->load->view('themes/caplet/modal_notification', $data, true);
        $data['_leftnav'] = $this->_CI->load->view('themes/caplet/leftnav', $data, true);
        $data['_rightnav'] = $this->_CI->load->view('themes/caplet/rightnav', $data, true);
        $data['_sidebar'] = $this->_CI->load->view('themes/caplet/sidebar', $data, true);
        $this->_CI->load->view('themes/filemanager.php', $data);
    }

}
