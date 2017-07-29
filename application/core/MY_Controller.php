<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Muserlevel', 'Maccess'));

        if (in_array($this->router->method, self::methods())) {
            $this->checkAccess();
        }
    }

    static function controllers() {
        return [
            'entity',
            'client',
            'employee',
            'service',
            'global',
            'employee',
            'user',
            'engagement'
        ];
    }

    static function methods() {
        return [
            'index',
            'create',
            'update',
            'view',
            'delete',
            'excel',
            'word',
        ];
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
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong> Sorry You Dont Have The Permission To Access Last Visiting Module..</span>
		</div>');
            redirect(site_url('dashboard'));
        }
    }

    public function checkRole($roleId, $controller, $method) {
        $r = $this->Maccess->checked($roleId, $controller, $method);
        if ($r)
            return true;
        else
            return false;
    }

}
