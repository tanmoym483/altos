<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        
    }

    public function index()
    {
        $currentUserId = $this->session->userdata('userId');
       $users=$this->userModel->dashbordUserDetails($currentUserId);
        $this->view('admin/dashboard',['users'=>$users]);
    }
}
