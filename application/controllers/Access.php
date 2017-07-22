<?php

class Access extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Muserlevel', 'Maccess'));
        $this->load->library(array('form_validation', 'template'));

        if (!$this->session->userdata('username')) {
            redirect('site');
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

    function index() {
        //  $data['title']="Access";
        //  $data['userlevels']= $this->Muserlevel->get_all();


        $access = [];
        $as = $this->Muserlevel->get_all();
        $no = 1;
        if ($as)
            foreach ($as as $a) {
                if ($no == 1)
                    $rId = $a->id;
                $no++;
            }


        if (isset($_GET['roleId']))
            $roleId = $_GET['roleId'];
        else
            $roleId = $rId;

        $data = array(
            'title' => 'Access',
            'action' => site_url('access/create'),
            'userlevels' => $this->Muserlevel->get_all(),
            'access' => $this->Muserlevel->get_all(),
            'controllers' => self::controllers(),
            'methods' => self::methods(),
            'modelAccess' => $this->Maccess,
            'roleId' => $roleId,
        );
        $this->template->caplet('access/access_role', $data);
    }

    function create() {
        $userlevelId = $this->input->post('userlevelId', TRUE);
        $this->Maccess->deleteAll($userlevelId);

        foreach ($_POST['Role'] as $key => $val) {
            $controllersVal = $key;
            if ($val)
                foreach (self::methods() as $v) {
                    if (isset($val[$v])) {
                        $data = [
                            'roleId' => $userlevelId,
                            'controller' => $key,
                            'method' => $v
                        ];
                        $this->Maccess->insert($data);
                    }
                }
        }
        redirect(site_url('access?roleId='.$userlevelId));
    }

}
