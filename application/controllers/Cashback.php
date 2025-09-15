<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashback extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
       
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->model('Cashback_model', 'cashbackModel');
        $this->load->helper('transaction_logger');
        $this->load->library("pagination");
    }
    public function payin(){
        $userrole = $this->session->userdata('role');
        $data = $this->cashbackModel->getAllOfferCashback($userrole);
        $this->view('admin/cashback/payin',['data'=>$data]);
    }
    public function payout(){
        $userrole = $this->session->userdata('role');
        $data = $this->cashbackModel->getAllOfferCashback($userrole);
        $this->view('admin/cashback/payout',['data'=>$data]);
    }
    public function payoutSubmit(){
        $data = (object) $this->input->post();
       
        $this->cashbackModel->updatePaymentStatus($data);
        echo json_encode(["status"=>true, "message"=>"Payout has been done successfully"]);
        redirect('cashback/payout');
    }
    public function cashbackTransactionHistory($rowno = 0)
    {
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        } 
        $allAmount = $this->cashbackModel->totalTrasaction();
        // All records count
        $allTransaction = $this->cashbackModel->history();
       
        $allcount = count($allTransaction);
        // Get records
        $transaction_record = $this->cashbackModel->historyDeails($rowno, $rowperpage);
        
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url() . 'cashback/cashbackTransactionHistory';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $transaction_record;
        $data['row'] = $rowno;
        $data['alldata'] = $allTransaction;
        $data['amount'] = $allAmount;
        
        $this->view('admin/transaction/cashback-history', ['data' => $data,'search' => $search]);
    }
}