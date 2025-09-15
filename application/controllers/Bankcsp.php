<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bankcsp extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        $this->load->model('Bank_model', 'bankModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->helper('transaction_logger');
        $this->load->library("pagination");
    }
    public function add(){
       
        $this->view('admin/bank-csp/add',['districtlist'=>$this->districtlist()]);
    }
    public function registration(){
       
        $this->view('admin/bank-csp/registration');
    }
    public function document_upload($id){
       
        $this->view('admin/bank-csp/document_upload',['id' => $id]);
    }
    public function postaddbankcspApplication(){
        $insertData = $_POST;
        $insertData['applicationForm'] = $image_name1 = $_FILES['applicationForm']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['applicationForm']['tmp_name'], $target_file);

        $insertData['residenceCertificate'] = $image_name2 = $_FILES['residenceCertificate']['name'];
        $target_file = "./uploads/".$image_name2;
        move_uploaded_file($_FILES['residenceCertificate']['tmp_name'], $target_file);

        $insertData['policeVerification'] = $image_name3 = $_FILES['policeVerification']['name'];
        $target_file = "./uploads/".$image_name3;
        move_uploaded_file($_FILES['policeVerification']['tmp_name'], $target_file);
        $this->bankModel->addBankApplication($insertData);
        redirect('bankcsp/list');
    }
    public function details($id){
        
        $applications = $this->bankModel->bankcspdalldataById($id);
        $this->view('admin/bank-csp/details',['data'=>$applications,'districtlist'=>$this->districtlist()]);
    }
    public function edit($id){
        
        $applications = $this->bankModel->bankcspdalldataById($id);
        $this->view('admin/bank-csp/edit',['data'=>$applications,'districtlist'=>$this->districtlist()]);
    }
    public function list(){
        
        $applications = $this->bankModel->allbankcsp();
        $this->view('admin/bank-csp/list',['applications'=>$applications]);
    }
    public function registrationlist(){
        
        $applications = $this->bankModel->allbankcspRegistration();
        $this->view('admin/bank-csp/registration-list',['applications'=>$applications]);
    }
    public function branchs($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
       
        $filters = [
            'bankName' => $this->input->get('bankName'),
            'district' => $this->input->get('district'),
            'ifsc_code' => $this->input->get('ifsc_code'),
            'branch_code' => $this->input->get('branch_code')
        ];
        $branchcode = $this->bankModel->allbranchlist($filters);
        
        //$branchcodelimit = $this->bankModel->branchlist($filters,$rowno,$rowperpage);
        $allcount =  Count($branchcode);
       
    
        $config['base_url'] = site_url('bankcsp/branchs?') . http_build_query($filters);
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        //$config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
    
        $this->pagination->initialize($config);
        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($page != 0){
            $page = ($page-1) * $rowperpage;
        }
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $this->bankModel->branchlist($filters,$rowperpage, $page);
        $data['row'] = $rowno;
        $data['allusers'] = $allusers;
        $this->view('admin/bank-csp/bank-list',['branchcode'=>$data]);
    }
    public function getcardmemberdetail(){
        $customercard = $this->input->post('customercard');
        $users = $this->userModel->getUserDetailsByCardnumber($customercard);
       
        echo json_encode($users);
        die;
    }
    public function getapplicationuserdetails(){
        $customercard = $this->input->post('customercard');
        $users = $this->bankModel->getApllicationUserDetails($customercard);
      
        echo json_encode($users);
        die;
    }
    public function postupdatestatus(){
        $insertData = $_POST;
        $userData = $this->bankModel->allbankcspById($insertData['id']);
        
        $this->bankModel->updateBankStatus($insertData);
        $mailData = array(
            'name' => $userData->firstName.' '.$userData->lastName,
            'email' => $userData->email,
            'msg' => 'Your Bank CSP Application ('.$userData->application_id.') has been sent to '.$insertData['status'].' successfully. You got your user details shortly'
        );
        $this->sendMail($userData->email, 'Bank CSP Application', $mailData, 'paymentactive');
        $this->session->set_flashdata('success', 'Bank CSP Application status has been updated successfully');
        redirect('bankcsp/list');
    }
    public function postaddbankcsp(){
        $insertData = $_POST;
        
        $exist = $this->bankModel->bankCspByID($insertData['userId']);
       
        if(!empty($exist)){
            $this->session->set_flashdata('error', 'Bank CSP Application already sent');
            redirect('bankcsp/add');
        } else {
            $insertData['mark_sheet'] = $image_name1 = $_FILES['mark_sheet']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['mark_sheet']['tmp_name'], $target_file);
    
            $insertData['qualification_certificate'] = $image_name2 = $_FILES['qualification_certificate']['name'];
            $target_file = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['qualification_certificate']['tmp_name'], $target_file);
    
            $insertData['votercard'] = $image_name3 = $_FILES['votercard']['name'];
            $target_file = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['votercard']['tmp_name'], $target_file);
            $insertData['application_id'] = generate_csp_application_reg_id();

            $bankcsp = $this->bankModel->addBankCsp($insertData);
            $usersdetails = $this->bankModel->addBankUserDetails($insertData);
            $address = $this->bankModel->addBankKisokAddress($insertData);
            $mailData = array(
                'name' => $insertData['firstName'].' '.$insertData['lastName'],
                'email' => $insertData['email'],
                'msg' => 'Your Bank CSP Application ('.$insertData['application_id'].') has been sent to processing successfully. You got your user details shortly'
            );
            $this->sendMail($insertData['email'], 'Bank CSP Application', $mailData, 'paymentactive');
            $this->session->set_flashdata('success', 'Bank CSP Application has been created successfully');
           
            redirect('bankcsp/add');
        }
       
    }
    public function postaddbankregistration(){
        $insertData = $_POST;
        
        $userdata = $this->userModel->getUserDetailsbyid($_SESSION['userId']);
        $bankdata = $this->bankModel->getApllicationUserDetails($insertData['cardnumber']);
       
        if($bankdata->status == 'approve'){
            if($userdata[0]->wallet >= $insertData['amount']){
                $insertData['accountProvedDoc'] = $image_name1 = $_FILES['accountProvedDoc']['name'];
                $target_file = "./uploads/".$image_name1;
                move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file);
                
                $insertData['signature'] = $image_name2 = $_FILES['signature']['name'];
                $target_file = "./uploads/".$image_name2;
                move_uploaded_file($_FILES['signature']['tmp_name'], $target_file);

                $insertData['transRefDoc'] = $image_name3 = $_FILES['transRefDoc']['name'];
                $target_file = "./uploads/".$image_name3;
                move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);

                if(!empty($_FILES['ibfCertificate'])){
                    $insertData['ibfCertificate'] = $image_name4 = $_FILES['ibfCertificate']['name'];
                    $target_file = "./uploads/".$image_name4;
                    move_uploaded_file($_FILES['ibfCertificate']['tmp_name'], $target_file);
                } else {
                    $insertData['ibfCertificate'] = '';
                }
                $bankspayout = $this->bankModel->addbanksPayout($insertData);
                $insertData['createdBy'] = $this->session->userdata('userId');
                $insertData['status'] = 'approved';
                $insertData['transType'] = 'csp_registration';
            
                $bankcsptran = $this->transectionModel->createTransaction($insertData);
                $timestamp = date("Y-m-d H:i:s");
                $newBalance = $userdata[0]->wallet - $insertData['amount'];
                logTransaction($insertData['createdBy'], $insertData['userId'], 'Debited', $insertData['amount'], $newBalance, $timestamp, $insertData['transRefNo'], true);
                $insertData['transactionId'] = $bankcsptran;
                $banksregistration = $this->bankModel->addBanksRegistration($insertData);

                $wallet = $userdata[0]->wallet - $insertData['amount'];
                $wallets['wallet'] = $wallet;
                $wallets['userId'] = $_SESSION['userId'];
            
                $this->userModel->updateUser($wallets);

                $this->session->set_flashdata('success', 'Bank CSP Registration has been created successfully. ');
                redirect('bankcsp/registrationlist');
            } else {
                $this->session->set_flashdata('error', 'Have no enough balence in your wallet');
                redirect('bankcsp/registration');
            } 
        } else {
            $this->session->set_flashdata('error', 'Application is not approve.');
            redirect('bankcsp/registration');
        } 
            
        
    }
    public function download(){
        $id = $this->input->post('id');
        $users = $this->bankModel->updateDownloadStatus($id);
        echo json_encode($users);
        die;
    }
    public function fees(){
        $this->view('admin/bank-csp/fees');
    }
    public function postupdatebankcsp(){
        $insertData = $_POST;
        $applications = $this->bankModel->bankcspdalldataById($insertData['id']);
        if(!empty($_FILES['mark_sheet']['name'])){
            $insertData['mark_sheet'] = $image_name1 = $_FILES['mark_sheet']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['mark_sheet']['tmp_name'], $target_file);
        } else {
            $insertData['mark_sheet'] = $applications->mark_sheet;
        }
        if(!empty($_FILES['qualification_certificate']['name'])){
            $insertData['qualification_certificate'] = $image_name2 = $_FILES['qualification_certificate']['name'];
            $target_file = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['qualification_certificate']['tmp_name'], $target_file);
        } else {
            $insertData['qualification_certificate'] = $applications->qualification_certificate;
        }
        if(!empty($_FILES['votercard']['name'])){
            $insertData['votercard'] = $image_name3 = $_FILES['votercard']['name'];
            $target_file = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['votercard']['tmp_name'], $target_file);
        } else {
            $insertData['votercard'] = $applications->votercard;
        }  
        
        $bankcsp = $this->bankModel->updateBankCsp($insertData);
        $usersdetails = $this->bankModel->updateBankUserDetails($insertData);
        $address = $this->bankModel->updateBankKisokAddress($insertData);
        $this->session->set_flashdata('success', 'Bank CSP Application has been updated successfully');
           
            redirect('bankcsp/list');
    }
    public function cspTransactionHistory($rowno = 0)
    {
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        } 
        $allAmount = $this->transectionModel->totalTrasactionCsp();
        // All records count
        $allTransaction = $this->transectionModel->cspRegistrationhistory($userrole, $search);
       
        $allcount = count($allTransaction);
        // Get records
        $transaction_record = $this->transectionModel->csphistoryDeails($userrole, $search, $rowno, $rowperpage);
        
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url() . 'bankcsp/cspTransactionHistory';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $transaction_record;
        $data['row'] = $rowno;
        $data['alldata'] = $allTransaction;
        $data['amount'] = $allAmount;
        
        $this->view('admin/transaction/csp-registration-history', ['data' => $data,'search' => $search]);
    }
}