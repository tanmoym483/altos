<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagonostic extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        $this->load->model('Admin_model', 'modd');
        $this->load->model('Dashbord_model', 'dashbordsModel');
        $this->load->model('Commission_model', 'commissionModel');
        $this->load->model('Cashback_model', 'cashbackModel');
        $this->load->model('Bank_model', 'bankModel');
        $this->load->model('Diagonostic_model', 'diagonosticModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->helper('card_transaction_logger');
        $this->load->helper('transaction_logger');
        $this->load->library('Pdf');
    }
    public function calculator(){
        
        $this->view('admin/diagonostic/emi-calculator');
    } 
    public function report(){
        
        $this->view('admin/diagonostic/report');
    }
    public function report_list(){
        $data = $this->diagonosticModel->reportlist();
       //$this->update_status_after_15_minutes();
        $this->view('admin/diagonostic/report-list',[ 'data'=> $data ] );
    }
    public function approve_view($id){
        
        $this->db->select('*')->from('new_user_banks')->where('id',$id);
        $query = $this->db->get();
        $bankdetails = $query->row();
        //$data = $this->diagonosticModel->approvelist();
        $this->view('admin/diagonostic/approve',[ 'bankdetails'=> $bankdetails ] );
    }
    public function edit_approve_view($id){
        $this->db->select('*')->from('diagonostic_member_edit')->where('id',$id);
        $query = $this->db->get();
        $memberdetails = $query->row();
        
        //$data = $this->diagonosticModel->approvelist();
        $this->view('admin/diagonostic/edit-approve',[  'memberdetails' => $memberdetails ] );
    }
    public function approve_list(){
        $data = $this->diagonosticModel->approvelist();
       
        $this->view('admin/diagonostic/approve-list',[ 'data'=> $data ] );
    }
    public function edit_approve_list(){
        $data = $this->diagonosticModel->editapprovelist();
       
        $this->view('admin/diagonostic/edit-approve-list',[ 'data'=> $data ] );
    }
    public function test_list(){
        $data = $this->diagonosticModel->reportlist();
        //$this->update_status_after_15_minutes();
        $this->view('admin/diagonostic/test-list',[ 'data'=> $data ] );
    }
    public function downpayment_list(){
        $totaldiaamount = $this->dashbordsModel->totalDiagonosticAmount(); 
        $data = $this->diagonosticModel->totalDiagonosticAmountlist();
        
        $this->view('admin/diagonostic/downpayment-list',[ 'total' => $totaldiaamount, 'data' => $data ] );
    }
    public function todayamount(){
        $totaldiaamount = $this->dashbordsModel->todayDiagonosticAmount();
        $data = $this->diagonosticModel->todayDiagonosticAmountlist();
        
        $this->view('admin/diagonostic/today-diagonostic',[ 'total' => $totaldiaamount, 'data' => $data ] );
    }
    public function downpayment(){
        $totaldiaamount = $this->dashbordsModel->totalDiagonosticDownpayment(); 
        $data = $this->diagonosticModel->totalDiagonosticdwonpaymentlist();
        
        $this->view('admin/diagonostic/downpayment',[ 'total' => $totaldiaamount, 'data' => $data ] );
    }
    public function todaydownpayment(){
        $totaldiaamount = $this->dashbordsModel->todayDiagonosticDownpayment(); 
        $data = $this->diagonosticModel->totalDiagonostictodaydwonpaymentlist();
        
        $this->view('admin/diagonostic/today-downpayment',[ 'total' => $totaldiaamount, 'data' => $data ] );
    }
    public function duepayments(){
        $totalpayment = $this->dashbordsModel->totalDiagonosticPayment();
        $totaldownpayment = $this->dashbordsModel->totalDiagonosticDownpayment(); 
        $duepayment = ($totalpayment->total_amount - $totaldownpayment->amount);
        $data = $this->diagonosticModel->totalDiagonosticduePayment();
        
        $this->view('admin/diagonostic/duepayment-list',[ 'total' => $duepayment, 'data' => $data ] );
    }
    public function settlement(){
        $currentUserId = $this->session->userdata('userId');
       
        $totaldiaamount = $this->dashbordsModel->totalDiagonosticAmount(); 
        $totalpayment = $this->dashbordsModel->totalDiagonosticPayment();
        $totaldownpayment = $this->dashbordsModel->totalDiagonosticDownpayment(); 
        $usermember = $this->diagonosticModel->viewDiamemberDetails($currentUserId);

        $total_amount = ($totaldiaamount->total_amount == null)?0:$totaldiaamount->total_amount;
        $due_amount = $totalpayment->total_amount - $totaldownpayment->amount;

        $this->db->select_sum('test_commision')->from('diagonostic_report_test')->where('createdBy', $_SESSION['userId']);
        $da = $this->db->get();
        $test = $da->row();
        $test->test_commision;
        //$commision = ($usermember->units == 'percentage')?$usermember->commision.'%': '₹ '.$usermember->commision;
        if($total_amount != 0){
            $settlement = $due_amount - round($test->test_commision);
        } else {
            $settlement = 0;
        }
     
        $data = $this->diagonosticModel->totalDiagonosticAmountlist();
        
        $this->view('admin/diagonostic/settlement',[ 'total' => $settlement, 'data' => $data, 'usermember' => $usermember ,'due_amount' => $due_amount] );
    }
    public function todayduepayments(){
        $totalpayment = $this->dashbordsModel->todayDiagonosticPayment();
        $totaldownpayment = $this->dashbordsModel->todayDiagonosticDownpayment(); 
        
        $duepayment = ($totalpayment->total_amount - $totaldownpayment->amount);
        $data = $this->diagonosticModel->totalDiagonostictodayduePayment();
        
        $this->view('admin/diagonostic/today-due',[ 'total' => $duepayment, 'data' => $data ] );
    }
    public function report_view($id){
       
        $data = $this->diagonosticModel->reportviewById($id);
        $this->view('admin/diagonostic/view-report',[ 'data'=> $data ] );
    }
    public function report_edit($id){
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('id,test_category')->from('diagonostic_commision')->where('userId',$currentUserId);
        $query = $this->db->get();
        $tests = $query->result_array();

        $data = $this->diagonosticModel->reportviewById($id);
        $query1 = $this->db->query("SELECT users.id, users.firstName, users.middleName, users.lastName, health_card_transaction.balanceAfter FROM users left join health_card_transaction on health_card_transaction.userId = users.id WHERE users.`cardnumber` = '$data->cardnumber' and health_card_transaction.usercardId = 0 ");
        $user = $query1->result_array();
        if(empty($user)){
            $user = $this->modd->getcarddetails($data->cardnumber);
        }
        $query = $this->db->query("SELECT user_card.name, user_card.id, health_card_transaction.balanceAfter FROM user_card Left Join `users` on user_card.user_id = users.id left join health_card_transaction on health_card_transaction.userId = user_card.id WHERE users.`cardnumber` = '$data->cardnumber' ");
        $usercarddetails = $query->result_array();
        array_push($user, $usercarddetails); 

        $this->db->select('diagonostic_report_test.test_amount, diagonostic_report_test.test_name, diagonostic_report_test.id, diagonostic_commision.test_category,diagonostic_report_test.test_category as tcategory')->from('diagonostic_report_test')->join('diagonostic_commision','diagonostic_commision.id = diagonostic_report_test.test_category');
        $this->db->where('diagonostic_report_test.reportId', $data->did);
        $query3 = $this->db->get();
        $testnames = $query3->result_array();

        $this->view('admin/diagonostic/report-edit',[ 'data'=> $data, 'user' => $user,'tests' => $tests, 'testnames' => $testnames] );
    }
    public function fund(){
        
        $this->view('admin/diagonostic/add-fund');
    }
    public function add_option(){
        $new_option = $this->input->post('new_option');
        $this->diagonosticModel->addtest($new_option);

        // Respond back
        echo json_encode(['status' => 'success']);
    }
    public function postupdatebankstatus(){
        $insertData = $_POST;
        $this->diagonosticModel->bankstatusupdate($insertData);
        redirect('diagonostic/approve_list');
    }
    public function postupdatedetailsstatus(){
        $insertData = $_POST;
        $this->diagonosticModel->memberstatusupdate($insertData);
        redirect('diagonostic/edit_approve_list');
    }
    public function postdiaupdatestatus(){
        $insertData = $_POST;
       
        $user = $this->modd->getUser($insertData['userId']);
        if($insertData['status'] == 'approved'){
            
             $password = generate_random_password(7);
             $insertData['password'] = $password;
             $this->diagonosticModel->statusupdate($insertData);
             
             $mailData = array(
                'name' => $user[0]->firstName,
                'email' => $user[0]->email,
                'regId' => $user[0]->regId,
                'password' => $password,
                'msg' => 'Your registration has been created successfully.'
            );
            $this->sendMail($user[0]->email, 'Diagonstic Confirmation', $mailData, 'created');
        }
        if($insertData['status'] == 'rejected'){
            $this->diagonosticModel->statusupdatewithreason($insertData);
        }
        if($insertData['status'] == 'processing' || $insertData['status'] == 'verification'){
            $this->diagonosticModel->statusdiaupdate($insertData);
        }
        
        redirect('admin/diagonstic_list');
    }
    public function postupdatestatus(){
        $insertData = $_POST;
        
        if($insertData['status'] == 'approved'){

            $data = $this->diagonosticModel->reportviewById($insertData['id']); 
           
            $createdby = $data->createdBy;
            $transactionType = 'debited';

            $amount = $data->total_amount - $data->paidamount;
            
            // if($insertdata['userid'] == $insertdata['muserid'] || $insertdata['muserid'] == ''){
            //     $userId = $insertdata['userid'];
            //     $cardmemberId = 0;
            // } else {
            //     $userId = $insertdata['userid'];
            //     $cardmemberId = $insertdata['muserid'];
            // }
            if($data->cardId == 0 ){
                $userId = $data->userId;
                $cardmemberId = 0;
            } else {
                $userId = $data->cardId;
                $cardmemberId = $data->userId;
            }
            
            $this->db->select('*')->from('health_card_transaction');
            $this->db->where('userId', $userId);
            $query = $this->db->get();
            $downpayment = $query->result(); 
            
            if(count($downpayment) == 0 ){
                $balanceAfter = 15000 - $amount;
                $_data = array(
                    'userId'=> $userId,
                    'usercardId'=> $cardmemberId,
                    'balanceAfter'=>$balanceAfter,
                );
            
                $this->db->insert('health_card_transaction',$_data);

                // $this->db->where('id', $insertdata['reportId']);
                // $this->db->update('diagonostic_report', array('isFirsttime' => 1));
                
            } else {
                $this->db->select('balanceAfter')->from('health_card_transaction');
                $this->db->where('userId', $userId);
                $this->db->where('usercardId', $cardmemberId);
                $query = $this->db->get();
                $balence = $query->row();
                $balanceAfter = $balence->balanceAfter - $amount;
                $this->db->where('userId', $userId);
                $this->db->where('usercardId', $cardmemberId);
                $this->db->update('health_card_transaction', array('balanceAfter' => $balanceAfter));
            }
            $timestamp = date("Y-m-d H:i:s");
            $currentUserId = $this->session->userdata('userId');
            logcardTransaction($currentUserId, $createdby, $userId, $cardmemberId, $transactionType, $amount, $balanceAfter, $timestamp, true);
        } 
        $this->diagonosticModel->updateStatus($insertData);
        redirect('diagonostic/report_list');
    }
    public function invoice($id){
        $data = $this->diagonosticModel->reportviewById($id);
       
        $this->db->select('address,postcode,district,state,city,phone')->from('users');
        $this->db->where('id', $data->reportcreate);
        $query = $this->db->get();
        $centerDetails = $query->row();
        
        $this->load->view(
            'admin/diagonostic/invoicepdf',
            [ 
                'data' => $data,
                'centerDetails' => $centerDetails
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
        $this->pdf->stream("invoice.pdf", array("Attachment" => 0));
    }
    public function emireport(){
        $amount = $this->input->post('amount');
        if($amount >= 1000 && $amount < 2400 ){
            $payamount = $amount/2;
            $downpayment['emi_timing'] = 1;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }

        if($amount >= 2400 && $amount < 3100){
            $payamount = $amount/3;
            $downpayment['emi_timing'] = 2;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
        if($amount >= 3100 && $amount < 6800){
            $payamount = $amount/4;
            $downpayment['emi_timing'] = 3;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
        if($amount >= 6800){
            $payamount = $amount/5;
            $downpayment['emi_timing'] = 4;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
       
        echo json_encode($downpayment);
        die;

    }
    public function carddetails(){
        $card = $this->input->post('card');
        $query1 = $this->db->query("SELECT users.id, users.firstName, users.middleName, users.lastName, health_card_transaction.balanceAfter FROM users left join health_card_transaction on health_card_transaction.userId = users.id WHERE users.`cardnumber` = '$card' and health_card_transaction.usercardId = 0 ");
        $user = $query1->result_array();
        if(empty($user)){
            $user = $this->modd->getcarddetails($card);
        }
        $query = $this->db->query("SELECT user_card.name, user_card.id, health_card_transaction.balanceAfter FROM user_card Left Join `users` on user_card.user_id = users.id left join health_card_transaction on health_card_transaction.userId = user_card.id WHERE users.`cardnumber` = '$card' ");
        $usercarddetails = $query->result_array();
       
        
        array_push($user, $usercarddetails); 
        echo json_encode($user);
        die;
    }
    public function testdetails(){
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('id,test_category')->from('diagonostic_commision')->where('userId',$currentUserId);
        $query = $this->db->get();
       
        $tests = $query->result_array(); 
        echo json_encode($tests);
        die;
    }
    public function posteditDiagonostictest(){
        $insertdata = $_POST;
       
        $currentUserId = $this->session->userdata('userId');
        $data = $this->diagonosticModel->reportviewById($insertdata['id']);
        if($data->status == 'processing'){
        if($insertdata['payment_type'] == 'on emi'){
            $insertdata['payment_status'] = 'on emi';
            $insertdata['status'] = 'processing';
        } else {
            $insertdata['payment_status'] = 'full payment';
            $insertdata['status'] = 'approved';
        }
        if($insertdata['round_figure'] == 1){
            $insertdata['total_amount'] = $this->input->post('total_round_figure');
        } else {
            $insertdata['total_amount'] = $this->input->post('total_amount');
        }
       
        $this->diagonosticModel->updatereport($insertdata);
        $insertdata['payment_method'] = $this->input->post('payment_method');
        if($insertdata['payment_method'] == 'cash'){
            $insertdata['transRefno'] = rand(10000,999999);
        } else {
            $insertdata['transRefno'] = $this->input->post('transrefno');
            
        }
        
        if($insertdata['payment_type'] == 'on emi'){
            $insertdata['pstatus'] = 'downpayment';
            $insertdata['downpayment'] = $this->input->post('payment');
        } else {
            $insertdata['pstatus'] = 'full payment';
            $insertdata['downpayment'] = $this->input->post('total_amount');
        }
        
        $this->diagonosticModel->updatereportamount($insertdata);

        if(isset($insertdata['test_name'])){
            foreach($insertdata['test_name'] as $test){
                $testreport['test_name'] = $test['name'];
                $testreport['test_amount'] = $test['amount'];
                $testreport['test_id'] = $test['testid'];
                $testreport['test_category'] = $test['test_category'];
                $testreport['reportId'] = $insertdata['id'];

                $this->db->select('commision')->from('diagonostic_commision')->where('id',$testreport['test_category'])->where('userId',$currentUserId);
                $query = $this->db->get();
                $commision = $query->row();
                $testcommision = $commision->commision;
                $testreport['commision'] = ($testreport['test_amount'] * $testcommision)/100;
                //print_r($testreport);
                // if($testreport['id'] == ''){
                //     $this->diagonosticModel->addreporttest($testreport);
                // } else {
                //     $this->diagonosticModel->updatereporttest($testreport);
                // }
                //print_r($testreport);
               $exist = $this->diagonosticModel->record_exists($testreport['test_id'],$testreport['reportId']);
                if ($exist > 0) {
                   
                    $this->diagonosticModel->updatereporttest($testreport);
                } else {
                    $this->diagonosticModel->addreporttest($testreport);
                }
            }
            
        } 
        $this->session->set_flashdata('success', 'Diagonostic report has been updated successfully');
        } else {
            $this->session->set_flashdata('error', 'There are some problem');
        }
        redirect('diagonostic/test_list');
    }
    public function record_exists($testid, $reportId){
        $this->db->select('*')->from('diagonostic_report_test');
        $this->db->where('diagonostic_report_test.reportId', $reportId);
        $this->db->where('diagonostic_report_test.test_name', $testid);
        $query = $this->db->get();
        return ($query->num_rows() == 0)?true:false;
    }
    public function postaddDiagonostictest(){
        $currentUserId = $this->session->userdata('userId');
        
            $insertdata = $_POST;
           
    
            if($insertdata['payment_type'] == 'on emi'){
                $insertdata['payment_status'] = 'on emi';
                $insertdata['status'] = 'processing';
                $insertdata['invoiceid'] = '';
            } else {
                $insertdata['payment_status'] = 'full payment';
                $insertdata['status'] = 'approved';
                $insertdata['invoiceid'] = 'INV91'.random_int(100000, 999999);
            }
            if($insertdata['round_figure'] == 1){
                $insertdata['total_amount'] = $this->input->post('total_round_figure');
            } else {
                $insertdata['total_amount'] = $this->input->post('total_amount');
            }
            if($insertdata['round_figure'] == 1){
                $insertdata['total_amount'] = $this->input->post('total_amount');
                $insertData['amount_with_gst'] = $this->input->post('total_round_figure');
            } else {
                $insertdata['total_amount'] = $this->input->post('total_amount');
            }
           
            $timestamp = time();
            $insertdata['updated_at'] = $timestamp;
            $insertdata['reportId'] = $report = $this->diagonosticModel->addreport($insertdata);
            
            $insertdata['payment_method'] = $this->input->post('payment_method');
            if($insertdata['payment_method'] == 'cash'){
                $insertdata['transRefno'] = rand(10000,999999);
            } else {
                $insertdata['transRefno'] = $this->input->post('transrefno');
                
            }
            
            if($insertdata['payment_type'] == 'on emi'){
                $insertdata['pstatus'] = 'downpayment';
                $insertdata['downpayment'] = $this->input->post('payment');
            } else {
                $insertdata['pstatus'] = 'full payment';
                $insertdata['downpayment'] = $this->input->post('total_amount');
            }
            if($insertdata['gst_amount'] != '' && $insertdata['pstatus'] == 'full payment'){
                $insertdata['downpayment'] = $this->input->post('amount_with_gst');
            } else{
                $insertdata['downpayment'] = $this->input->post('payment');
            }
            $this->diagonosticModel->addreportamount($insertdata);
           
            if(isset($insertdata['test_name'])){
                
                foreach($insertdata['test_name'] as $test){
                    $testreport['test_category'] = $test['test_category'];
                    $testreport['test_name'] = $test['name'];
                    $testreport['test_amount'] = $test['amount'];
                    $testreport['reportId'] = $insertdata['reportId'];
                    $this->db->select('commision')->from('diagonostic_commision')->where('id',$testreport['test_category'])->where('userId',$currentUserId);
                    $query = $this->db->get();
                    $commision = $query->row();
                    $testcommision = $commision->commision;
                    $testreport['commision'] = ($testreport['test_amount'] * $testcommision)/100;
                   $this->diagonosticModel->addreporttest($testreport);
                }
                
            }
            
        // $transactionType = 'debited';
        // $amount = $insertdata['amount'] - $insertdata['downpayment'];
      
        // if($insertdata['userid'] == $insertdata['muserid'] || $insertdata['muserid'] == ''){
        //     $userId = $insertdata['userid'];
        //     $cardmemberId = 0;
        // } else {
        //     $userId = $insertdata['userid'];
        //     $cardmemberId = $insertdata['muserid'];
        // }
      
        // $this->db->select('*')->from('health_card_transaction');
        // $this->db->where('userId', $userId);
        // $query = $this->db->get();
        // $downpayment = $query->result(); 
       
        // if(count($downpayment) == 0 ){
        //     $balanceAfter = 15000 - $amount;
        //     $_data = array(
        //         'userId'=> $userId,
        //         'usercardId'=> $cardmemberId,
        //         'balanceAfter'=>$balanceAfter,
        //     );
          
        //     $this->db->insert('health_card_transaction',$_data);

        //     // $this->db->where('id', $insertdata['reportId']);
        //     // $this->db->update('diagonostic_report', array('isFirsttime' => 1));
            
        // } else {
        //     $this->db->select('balanceAfter')->from('health_card_transaction');
        //     $this->db->where('userId', $userId);
        //     $this->db->where('usercardId', $cardmemberId);
        //     $query = $this->db->get();
        //     $balence = $query->row();
        //     $balanceAfter = $balence->balanceAfter - $amount;
        //     $this->db->where('userId', $userId);
        //     $this->db->where('usercardId', $cardmemberId);
        //     $this->db->update('health_card_transaction', array('balanceAfter' => $balanceAfter));
        // }
        // $timestamp = date("Y-m-d H:i:s");
        // logcardTransaction($currentUserId, $userId, $cardmemberId, $transactionType, $amount, $balanceAfter, $timestamp, true);
        $this->session->set_flashdata('success', 'Diagonostic report has been created successfully');
        redirect('diagonostic/report');
    }
    public function postaddcardfund(){
        $currentUserId = $this->session->userdata('userId');
        $insertdata = $_POST;
           
            $insertData['status'] = "approved";
            $insertData['transType'] = $this->input->post('transType');
            $insertData['createdBy'] = $this->session->userdata('userId');
            $insertData['userId'] = $this->input->post('userId');
            $insertData['amount'] = $this->input->post('amount');
            $insertData['member'] = $this->input->post('member');
            $insertData['transRefNo'] = rand(100000,999999);
            
            $this->transectionModel->createTransaction($insertData);

            $timestamp = date("Y-m-d H:i:s");
            $users = $this->modd->getUserDetails($insertData['createdBy']);
            $wallet = $users[0]->wallet - $insertData['amount'];

            $wallets['wallet'] = $wallet;
            $wallets['userId'] = $insertData['createdBy'];

            $this->userModel->updateUser($wallets);

            logTransaction($insertData['createdBy'], $insertData['userId'], 'Debited', $insertData['amount'], $wallet, $timestamp, $insertData['transRefNo'], true);

            $this->db->select('*')->from('health_card_transaction');
            $this->db->where('userId', $insertData['member']);
            $query = $this->db->get();
            $downpayment = $query->row(); 
          
            $balanceAfter = $downpayment->balanceAfter + $insertData['amount'];
            $this->db->where('userId', $insertData['member']);
            //$this->db->where('usercardId', $cardmemberId);
            $this->db->update('health_card_transaction', array('balanceAfter' => $balanceAfter));

            if($insertdata['userId'] == $insertdata['member']){
                $userId = $insertdata['userId'];
                $cardmemberId = 0;
            } else {
                $userId = $insertdata['member'];
                $cardmemberId = $insertdata['userId'];
            }
            $transactionType = 'credited';
            
            logcardTransaction($currentUserId, $currentUserId, $userId, $cardmemberId, $transactionType, $insertData['amount'], $balanceAfter, $timestamp, true);
            
            $this->session->set_flashdata('success', 'Diagonostic report has been created successfully');
            redirect('diagonostic/fund');
    }
    public function update_status_after_15_minutes() {
        // Get the current time
        $current_time = time();
    
        // Set the threshold (15 minutes in seconds)
        $threshold = 15 * 60;
    
        // Query users whose status has been 'active' for more than 15 minutes
        $this->db->select('id,updated_at');
        $this->db->from('diagonostic_report');
        $this->db->where('status', 'processing');
       // $this->db->where('updated_at >=', date('Y-m-d H:i:s', strtotime('-15 minutes'))); // If the status was updated more than 15 minutes ago
        $query = $this->db->get();
       
        // Update the status of all the users who meet this condition
        foreach ($query->result() as $row) {
            // Change the status to something else (e.g., 'inactive')
            // $data = array(
            //     'status' => 'verification',
            //     'updated_at' => $current_time  // Optionally update the timestamp
            // );
    
            // // Update the database
            // $this->db->where('id', $row->id);
            // $this->db->update('diagonostic_report', $data);
            $sql = "UPDATE `diagonostic_report` SET `status` = 'verification' WHERE `id` = $row->id AND TIMESTAMPDIFF(MINUTE, `updated_at`, NOW()) >= 15";
            $this->db->query($sql);
        }
    
        return true;
    }
}