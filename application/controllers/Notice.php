<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notice extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('Notice_model','noticeModel');
       
        $this->load->library("pagination");
    }
    public function add(){
        
        $this->view('admin/notice/add');
    }
    public function postaddNotice(){
        $insertData = $_POST;
      
        $this->noticeModel->addNotice($insertData);
        redirect('notice/all');
    }
    public function all($rowno = 0){
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
        $shopping = $this->noticeModel->allNotice($rowno,$rowperpage);
       
        $allcount =count( $this->noticeModel->allNotice(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'notice/all/',$allcount, $rowperpage, 3 );
        $data['result'] = $shopping;

        $this->view('admin/notice/list', $data);
       
    }
    public function delete($id){
        $this->noticeModel->statusUpdate($id);
        redirect('notice/all');
    }
}