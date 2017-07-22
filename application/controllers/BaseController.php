<?php

class BaseController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Muserlevel', 'Maccess'));
    }

    function isAccess($roleId = NULL, $controller = NULL, $method = NULL) {
        if ($roleId == NULL)
            $roleId = $this->session->userdata('userlevelId');
        if ($controller == NULL)
            $controller = $this->router->class;
        if ($method == NULL)
            $method = $this->router->method;

        $r = $this->Maccess->checked($roleId, $controller, $method);

        if ($r)
            return true;
        else
            return false;
    }

    function checkAccess($method = NULL) {
        $roleId = $this->session->userdata('userlevelId');
        $controller = $this->router->class;
        if ($method == NULL)
            $method = $this->router->method;

        $r = $this->isAccess();
        if (!$r) {
            redirect(site_url('dashboard'));
        }
    }

}
