<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bdo extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
    }

    public function index()
    {
        $page = 1;
        $users = $this->userModel->getUsers("", $page, $this->limit, ['trans' => true]);
        $this->view('admin/bdo_listing', ['users' => $users]);
    }
}
