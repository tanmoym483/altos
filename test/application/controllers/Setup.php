<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userModel');
    }

    public function index()
    {
        $adminData = array(
            'email' => 'puspendu.developer@gmail.com',
            'regId' => 'SBI91000001',
            'password' => 'admin@123',
            'firstName' => 'Admin',
            'lastName' => '',
            'role' => 'superAdmin',
            'status' => 'active',
            'isFirstLogin' => 'n'
        );
        $this->userModel->createAdmin($adminData);
        echo "setup done";
    }
}
