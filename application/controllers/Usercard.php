<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Usercard extends MY_Controller
{

    public function __construct(){
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->library('pagination');
        $this->load->library('Pdf');
        $this->load->model('Admin_model','modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('Transaction_model', 'transectionModel');
    }

    public function cardtransaction(){
        $currentUserId = $this->session->userdata('userId');
        $usercard = $this->modd->usercardmembercountbyid($currentUserId);
        $usercarddetails = $this->modd->usercardmemberbyid($currentUserId);
        $user = $this->userModel->getuserdetailbyid($currentUserId);

        $this->db->select('balanceAfter')->from('health_card_transaction');
        $this->db->where('userId', $currentUserId);
        $query1 = $this->db->get();
        $userbalence = $query1->row();

        $this->db->select('balanceAfter')->from('health_card_transaction');
        $this->db->where('usercardId', $currentUserId);
        $query = $this->db->get();
        $usercardbalence = $query->result();


        $this->db->select('*')->from('card_transaction_log');
        $this->db->where('user_id', $currentUserId);
        $this->db->or_where('cardmember_id', $currentUserId);
        $this->db->order_by("id", "desc");
        $query2 = $this->db->get();
        $card_transaction_log = $query2->result();
        $this->view(
            'admin/user-card/transactionHistory',
            [ 
                'usercard' => $usercard,
                'usercarddetails' => $usercarddetails,
                'user' => $user,
                'userbalence' => $userbalence,
                'usercardbalence' => $usercardbalence,
                'card_transaction_log' => $card_transaction_log
            ]
        );
    }
    public function transactionpdf(){
        $currentUserId = $this->session->userdata('userId');
       
        $usercarddetails = $this->modd->usercardmemberbyid($currentUserId);
        $user = $this->userModel->getuserdetailbyid($currentUserId);

        $this->db->select('*')->from('card_transaction_log');
        $this->db->where('user_id', $currentUserId);
        $this->db->or_where('cardmember_id', $currentUserId);
        $this->db->order_by("id", "desc");
        $query2 = $this->db->get();
        $card_transaction_log = $query2->result();

        $this->load->view(
            'admin/user-card/transactionpdf',
            [ 
                'usercarddetails' => $usercarddetails,
                'user' => $user,
                'card_transaction_log' => $card_transaction_log
            ]
        );
         // Get output html
         $html = $this->output->get_output();
        

        // Load HTML content into Dompdf
        $this->pdf->loadHtml($html);

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $this->pdf->render();

        // Output the PDF to the browser
        $this->pdf->stream("cardtransaction.pdf", array("Attachment" => 0));
    }
    public function transactionHistory($rowno = 0)
    {
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        } 
        // all transaction
       $allAmount = $this->transectionModel->totalTrasactionCardActive();
        // All records count
        $allTransaction = $this->transectionModel->cardActivehistory($userrole, $search);
       
        $allcount = count($allTransaction);
        // Get records
        $transaction_record = $this->transectionModel->cardActivehistoryDeails($userrole, $search, $rowno, $rowperpage);
        
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url() . 'usercard/transactionHistory';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $transaction_record;
        $data['row'] = $rowno;
        $data['alldata'] = $allTransaction;
        $data['amount'] = $allAmount;
        
        $this->view('admin/transaction/card-payment-history', ['data' => $data,'search' => $search]);
    }
}