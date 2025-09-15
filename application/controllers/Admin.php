<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('Admin_model','modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('Nominee_model', 'nomineesModel');
        $this->load->model('UserKYC_model', 'userKycModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->model('Diagonostic_model', 'diagonosticModel');
       // $this->load->model('Healthcard_model', 'healthcardModel');
        $this->load->helper('transaction_logger');
        $this->load->library("pagination");
    }
    public function commingsoon(){
        $this->view('admin/comming-soon');
    }
    public function card_management(){
        $this->view('admin/diagonostic-card-managemt');
    }
    public function add_cardmember(){
        $this->view('admin/additional-member');
    }
    public function pincodelist($rowno=0)
    {
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // $page = 1;
        //$search = $this->input->get('search');
       
       if(isset($_GET['search']) || isset($_GET['district'])){
        $users = $this->modd->postalCodeDetails($_GET['search'],$_GET['district'],$rowno,$rowperpage);
       } else {
        $users = $this->modd->allpostalCodeDetails($rowno,$rowperpage);
       }
      
       // All records count
       $allcount = $this->modd->postalCodeDetailsCount($_GET['search'],$_GET['district']); 
       
       
      
        
       $config['base_url'] = base_url().'admin/pincodelist';
       $config['use_page_numbers'] = TRUE;
       $config['total_rows'] = $allcount;
       $config['per_page'] = $rowperpage;
      // $config['uri_segment'] = 1;
   
       $this->pagination->initialize($config);
   
       $data['pagination'] = $this->pagination->create_links();
       $data['result'] = $users;
       $data['row'] = $rowno;
        $this->view('admin/postcodeAdd', ['users' => $data]);
    }
    public function admincreate()
    {
        $this->view('admin/admin-create',['districtlist'=>$this->districtlist()]);
    }
    public function trustmembercreate()
    {
        $this->view('admin/vendor-user-add',['districtlist'=>$this->districtlist()]);
    }
    public function vendoruser($rowno=0)
    {
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $id = $_SESSION['userId'];
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $to = $this->input->get('to');
            $from = $this->input->get('from');
            if ((strtotime($to) - strtotime($from)) > 0) {
                $others['to'] = $to;
                $others['from'] = $from;
            } else {
                return  $this->view('admin/vendor-user-list', ['users' => [], 'error' => 'From date must be less than or equal to To date']);
            }
        }
        // die;
        $search = $this->input->post('table_search');
        $users = $this->userModel->getUsersById($id, $search, $rowno, $rowperpage, $others); 
        //$users = $this->userModel->getUsers($search, $rowno,$rowperpage, $others); 
        $allusers = $this->userModel->getAllUsersById($id, $search, $rowno,$rowperpage, $others); 
       
        // All records count
        $allcount = $this->userModel->getAllUsersCountById($id, $search,$others); 
       
       
        
        $config['base_url'] = base_url().'admin/vendoruser';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
       // $config['uri_segment'] = 1;
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users;
        $data['row'] = $rowno;
        $data['allusers'] = $allusers;
        $this->view('admin/vendor-user-list', ['users' => $data, 'search' => $search]);
    }
    public function postaddtrustmember(){
        $config = array(
           
            array(
                'field'   => 'firstName',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastName',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            $timestamp = date("Y-m-d H:i:s");
            $insertData['email'] = strtolower($insertData['email']);
            $searchUser = $this->userModel->getUser($insertData['email']);
            if (count($searchUser) > 0) {
                $this->session->set_flashdata('error', 'User already registered');
                redirect('admin/trustmembercreate');
            } else {
                do {
                    $regId = generate_reg_id();
                    # code...
                    $userCheck = $this->userModel->getUser($regId);
                    if (count($userCheck) > 0) {
                        $isExist = true;
                    } else {
                        $isExist = false;
                    }
                } while ($isExist);
                $userdata = $this->userModel->getUser($_SESSION['regId']);
                if($userdata[0]->wallet >= 599){
                    $insertData['regId'] = $regId;
                    $insertData['status'] = 'approved';
                    $insertData['role'] = 'vendor';
                    $this->userModel->createUser($insertData);
                    $userId = $this->db->insert_id();
                    $transData['userId'] = $userId;
                    $key = rand(100000, 999999);
                    $transData['transaction_id'] = $key;
                    $transData['amount'] = 599;
                    $transData['transType'] = 'vendor_active';
                    $transData['status'] = 'approved';
                    $transData['vendor_id'] = 0;
                    $transData['createdBy'] = $_SESSION['userId'];
                    $this->transectionModel->createTransaction($transData);
                    $updatedata['userId'] = $_SESSION['userId'];
                    $updatedata['wallet'] = $userdata[0]->wallet - 599;
                    $this->userModel->updateUser($updatedata);
                    logTransaction($updatedata['userId'],  $transData['userId'], 'Debited', 599, $updatedata['wallet'], $timestamp, $transData['transaction_id'], true);
                    $transData['userId'] = $userId;
                    $key = rand(100000, 999999);
                    $transData['transRefNo'] = $key;
                    $transData['amount'] = 599;
                    $transData['transType'] = 'registration';
                    $transData['status'] = 'approved';
                    $transData['vendor_id'] = 0;
                    $transData['createdBy'] = $_SESSION['userId'];
                    $this->transectionModel->createTransaction($transData);
                    $userdata = $this->userModel->getUser($_SESSION['regId']);
                    
                    $updatedata['userId'] = $userId;
                    $updatedata['wallet'] = 599;
                    $this->userModel->updateUser($updatedata);
                    
                    logTransaction($updatedata['userId'], $updatedata['userId'], 'Credited', $transData['amount'], $updatedata['wallet'], $timestamp, $transData['transRefNo'], true);
                    $bdoIds = $insertData['regId'];
                    $mailData = array(
                        'name' => $insertData['firstName'],
                        'email' => $insertData['email'],
                        'regId' => $insertData['regId'],
                        'msg' => 'Your registration has been created successfully. You got your user details shortly'
                    );
                    $this->sendMail($insertData['email'], 'Registration Confirmation', $mailData);
                    $falashhdata = "Registration Id-$bdoIds has been submitted successfully";
                   // $this->session->set_flashdata('success', $falashhdata);
                   $this->session->set_userdata('fregId', $insertData['regId']);
                    $renew_date = date("Y-m-d");
                    $this->session->set_flashdata('flassuccess', $falashhdata);
                    
                    $this->session->set_userdata('date',$renew_date);
                } else {
                    //$this->session->set_flashdata('error', 'Have no enough balance.In your account available balence is '.$userdata[0]->wallet);
                    $this->session->set_flashdata('ferror', 'Have no enough balance.In your account available balence is '.$userdata[0]->wallet);
                }
                
                    // echo date('d-m-Y', strtotime($u->createdAt));
                redirect('admin/trustmembercreate');
            }
        }
    }
    public function diagnosticcreate()
    {
        $this->view('admin/diagnostic-create',['districtlist'=>$this->districtlist()]);
    }
    public function card_add()
    {
        $this->view('admin/card-detail-add');
    }
    public function diagnosticview($userId)
    {
        $user = $this->modd->getUser($userId);
        $userbank = $this->userBankModel->getUserBankDetails($userId);
        $usermember = $this->diagonosticModel->viewDiamemberDetails($userId);
        $created = $this->modd->getUser($usermember->diagonostic_created);
        $gallery = $this->diagonosticModel->viewDiamemberGallery($userId);
        $testcommision = $this->diagonosticModel->viewDiaTest($userId);
        $this->view('admin/diagnostic-view',['users' => $user,'created'=> $created, 'userbank' => $userbank, 'gallery' => $gallery, 'usermember' => $usermember, 'testcommision' => $testcommision, 'districtlist'=>$this->districtlist()]);
    }
    public function diagnosticedit($userId)
    {
        $user = $this->modd->getUser($userId);
        $this->view('admin/diagnostic-edit',['users' => $user,'districtlist'=>$this->districtlist()]);
    }
    public function adminedit($userId)
    {
        $user = $this->modd->getUser($userId);
        $this->view('admin/admin-edit',['users' => $user,'districtlist'=>$this->districtlist()]);
    }
    public function postadddiagonstic(){
        $config = array(
           
            array(
                'field'   => 'firstName',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastName',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            //print_r($_FILES['center_image']); die;
            
            $insertData['password'] = '';
            $insertData['regId'] = $regId = generate_diagnostic_application_reg_id();

            $insertData['accountProvedDoc'] = $image_name1 = $_FILES['accountProvedDoc']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file);

            $insertData['document'] = $image_name2 = $_FILES['document']['name'];
            $target_file = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['document']['tmp_name'], $target_file);

            $insertData['userId'] = $this->modd->adddiagonstic($insertData);
            $this->userBankModel->createUserBanks($insertData);
            $this->diagonosticModel->addDiamemberDetails($insertData);
            for($i = 0; $i <= count($_FILES['center_image']); $i++){
                $insertData['gallery'] = $image_name = $_FILES['center_image']['name'][$i];
                $target_file = "./uploads/".$image_name;
                move_uploaded_file($_FILES['center_image']['tmp_name'][$i], $target_file);

                $this->diagonosticModel->addDiamemberGallery($insertData);

            }
            if(isset($insertData['commision'])){
                foreach($insertData['commision'] as $cdata){
                    $testdata['test_category'] = $cdata['test_category'];
                    $testdata['commision'] = $cdata['commision'];
                    $testdata['units'] = $cdata['units'];
                    $testdata['userId'] = $insertData['userId'];
                   // print_r($testdata); 
                    $this->diagonosticModel->addDiamemberTest($testdata);
                }
            }
            
            // $mailData = array(
            //     'name' => $insertData['firstName'],
            //     'email' => $insertData['email'],
            //     'regId' => $insertData['regId'],
            //     'password' => $password,
            //     'msg' => 'Your registration has been created successfully.'
            // );
            $mailData = array(
                'name' => $insertData['firstName'],
                'email' => $insertData['email'],
                'msg' => 'Your Diagnostic ('. $insertData['regId'].') has been sent to processing successfully. You got your user details shortly'
            );
            $this->sendMail($insertData['email'], 'Diagonstic Confirmation', $mailData, 'paymentactive');
          //  $this->sendMail($insertData['email'], 'Diagonstic Confirmation', $mailData, 'created');
            $this->session->set_flashdata('success', 'Diagonstic has been created successfully');
        }
        redirect('admin/diagonstic_list');
    }
    public function posteditdiagonstic(){
        $config = array(
           
            array(
                'field'   => 'firstName',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastName',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            $this->modd->editdiagonstic($insertData);
            
            $this->session->set_flashdata('success', 'Diagonstic has been updated successfully');
        }
        redirect('admin/diagonstic_list');
    }
    public function posteditadmin(){
        $config = array(
           
            array(
                'field'   => 'firstName',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastName',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),

           

            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            $this->modd->editsubadmin($insertData);
            
            $this->session->set_flashdata('success', 'Admin has been updated successfully');
        }
        redirect('admin/admin_list');
    }
    public function postaddadmin(){
        $config = array(
           
            array(
                'field'   => 'firstName',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastName',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),


            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            $password = generate_random_password(7);
            $insertData['password'] = $password;
            $insertData['regId'] = $regId = generate_reg_id();
            $insertData['userId'] = $this->modd->addsubadmin($insertData);
            $mailData = array(
                'name' => $insertData['firstName'],
                'email' => $insertData['email'],
                'regId' => $insertData['regId'],
                'password' => $password,
                'msg' => 'Your registration has been created successfully.'
            );
            $this->sendMail($insertData['email'], 'Admin Confirmation', $mailData, 'created');
            $this->session->set_flashdata('success', 'Admin has been created successfully');
        }
        redirect('admin/admin_list');
    }
    public function diagonstic_list($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // All records count
        $allcount = $this->modd->getdiagonsticrecordCount(); 
        // Get records
        $customer_record = $this->modd->diagonsticlist($rowno,$rowperpage);
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url().'admin/diagonstic_list';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
     
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $customer_record;
        $data['row'] = $rowno;
        //$data['search'] = $search_text;
        
       
        $this->view('admin/diagonstic_list', ['customers' => $data]);
           
    
   }
    public function admin_list($rowno=0){
        $rowperpage = 10;
      
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // All records count
        $allcount = $this->modd->getAdminrecordCount(); 
        // Get records
        $customer_record = $this->modd->adminlist($rowno,$rowperpage);
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url().'admin/admin_list';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
     
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $customer_record;
        $data['row'] = $rowno;
        //$data['search'] = $search_text;
        
       
        $this->view('admin/admin-list', ['customers' => $data]);
           
    
   }
   public function diagnosticdelete($userId)
    {
        $currentUserRole = $this->session->userdata('role');
        
        if ($currentUserRole == 'superAdmin') {
            
               // $userId = $this->input->post('userId');
                $status = 'inactive';
                $user = $this->modd->getUser($userId);

                if (count($user) > 0) {
                    $this->modd->adminStatusUpdate($userId, $status);
                    
                } else {
                    $this->session->set_flashdata('Error', 'User not found');
                   // echo json_encode(['status' => false, 'message' => 'User not found']);
                }
            
        } else {
            echo json_encode(['status' => false, 'error' => 'Unauthorized access']);
        }
        redirect('admin/diagonstic_list');
    }
    public function diagnosticStatus($userId)
    {
        $currentUserRole = $this->session->userdata('role');
        
        if ($currentUserRole == 'superAdmin') {
            
               // $userId = $this->input->post('userId');
                $status = 'active';
                $user = $this->modd->getUser($userId);

                if (count($user) > 0) {
                    $this->modd->adminStatusUpdate($userId, $status);
                    
                } else {
                    $this->session->set_flashdata('Error', 'User not found');
                   // echo json_encode(['status' => false, 'message' => 'User not found']);
                }
            
        } else {
            echo json_encode(['status' => false, 'error' => 'Unauthorized access']);
        }
        redirect('admin/diagonstic_list');
    }
   public function userdelete($userId)
    {
        $currentUserRole = $this->session->userdata('role');
        
        if ($currentUserRole == 'superAdmin') {
            
               // $userId = $this->input->post('userId');
                $status = 'inactive';
                $user = $this->modd->getUser($userId);

                if (count($user) > 0) {
                    $this->modd->adminStatusUpdate($userId, $status);
                    
                } else {
                    $this->session->set_flashdata('Error', 'User not found');
                   // echo json_encode(['status' => false, 'message' => 'User not found']);
                }
            
        } else {
            echo json_encode(['status' => false, 'error' => 'Unauthorized access']);
        }
        redirect('admin/admin_list');
    }
    public function addpincode(){
        $config = array(
           
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'pincode',
                'label'   => 'pincode',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $this->modd->addPostalCode($_POST);
            redirect('admin');
        }
    }
    
    public function ifcsCodeView($rowno=0){
        $rowperpage = 10;
   
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }  
         $search = $this->input->post('search');
        //   print_r( $search);die;
       // $users = $this->modd->ifcscodedetails($search);
            // print_r( $users);die;
        


    
    // All records count
    $allcount = $this->modd->ifcscodedetailsCount($search); 
    // Get records
  
    $ifscList = $this->modd->ifcscodedetails($search,$rowno,$rowperpage);
    
   
    $config['base_url'] = base_url().'admin/ifcsCodeView';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 

    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $ifscList;
    $data['row'] = $rowno;
   
    
   
    $this->view('admin/users/ifcsCode', ['users' => $data, 'search' => $search]);
        
    }
    public function addIfccode(){
         $config = array(
           
            array(
                'field'   => 'ifsc',
                'label'   => 'IFSC Code',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'branch',
                'label'   => 'Branch',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'bank_name',
                'label'   => 'Bank Name',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $this->modd->addifcsCode($_POST);
            redirect('admin/ifcsCodeView');
        }
    }
    public function customer_add()
    {
        $relation = $this->modd->getrelation();
        $this->view('admin/customer_add',['relation' => $relation,'districtlist'=>$this->districtlist()]);
    }
    public function cardactive()
    {
       
        $this->view('admin/users/card_active_payment');
    }
    public function admincardactive()
    {
       
        $this->view('admin/users/superadmin-card_active');
    }
    public function postaddcardmember(){
        $insertData = $_POST;
       // echo $insertData['cardmember'];
        $users = $this->userModel->getUserDetailsByuId($insertData['userid']);
        
       
        if($users[0]->user_id != ''){
            $usercard_count = count($users);
        } else {
            $usercard_count = 0;
        }
       
        if(isset($insertData['customer'])){
            $card_datas = $insertData['customer'];
           
            $i = $usercard_count;
            foreach($card_datas as $card_data){
            
            

            $card_data['user_id'] = $insertData['userid'];
            $card_data['card_type'] = $insertData['card_type'];
           
            $card_data['user_adharfront'] = $image_name1 = $_FILES['customer']['name'][$i]['user_adharfront'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharfront'], $target_file);

            $card_data['user_adharback'] = $image_name = $_FILES['customer']['name'][$i]['user_adharback'];
            $target_file = "./uploads/".$image_name;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharback'], $target_file);
        
            $image_name3 = $_FILES['customer']['name'][$i]['document'];
            $target_file = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['document'], $target_file);
            $card_data['birthday_certificate'] = $card_data['user_pancard'] = $card_data['rationcard'] = '';
            if($card_data['doc_type'] == 'Pancard'){
                $card_data['user_pancard'] = $image_name3;
            }
            if($card_data['doc_type'] == 'Birth certificate'){
                $card_data['birthday_certificate'] = $image_name3;
            }
            if($card_data['doc_type'] == 'Ration card'){
                $card_data['rationcard'] = $image_name3;
            }
           
               $customercard = $this->modd->addCustomerCard($card_data);
            
        $i++; } }
      redirect('admin/add_cardmember');
    }
    public function postaddcustomer(){
        
        $config = array(

            array(
                'field'   => 'phone',
                'label'   => 'Mobile',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'email',
                'label'   => 'Email ID',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'motherName',
                'label'   => 'Mother Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'fatherName',
                'label'   => 'Father Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'gender',
                'label'   => 'Gender',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'panNo',
                'label'   => 'PAN No',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'addharNo',
                'label'   => 'Addhar No',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'PIN Code',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'district',
                'label'   => 'District',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'nomineeName',
                'label'   => 'Nominee Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'nomineeRelation',
                'label'   => 'Relation with Nominee',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'ifscCode',
                'label'   => 'IFSC Code',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'bankName',
                'label'   => 'Bank Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'accountHolderName',
                'label'   => 'A/C Holder Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'accountType',
                'label'   => 'A/C Type',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'branchName',
                'label'   => 'Branch',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'accountNumber',
                'label'   => 'A/C Number',
                'rules'   => 'required'
            ),

        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {

            $insertData = $_POST;
            //$insertData['status'] = 'active';
            $insertData['email'] = strtolower($insertData['email']);
            $searchUser = $this->userModel->getUser($insertData['email']);
            
            if (count($searchUser) > 0 ){
            if( $searchUser[0]->role == 'vendor') {
                $lusers = $this->modd->getLastUserDetails();
                
                if(!empty($lusers) )
                {
                    $key = $lusers->cardnumber + 1;
                } else {
                    $key = 2024000001;
                }
                $venData['cardnumber'] =  $key;
                $venData['card_status'] =  'inactive';
              //  $venData['createdBy'] = $this->session->userId;
                $venData['userId'] =  $searchUser[0]->id;
                
                $this->modd->updateUser($venData);
               
                    if(isset($insertData['customer'])){
                    $card_datas = $insertData['customer'];
                    $i = 0;
                    foreach($card_datas as $card_data){
                    
                    

                    $card_data['user_id'] = $searchUser[0]->id;
                    $card_data['card_type'] = $insertData['card_type'];
                    
                    $card_data['user_adharfront'] = $image_name1 = $_FILES['customer']['name'][$i]['user_adharfront'];
                    $target_file = "./uploads/".$image_name1;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharfront'], $target_file);

                    $card_data['user_adharback'] = $image_name = $_FILES['customer']['name'][$i]['user_adharback'];
                    $target_file = "./uploads/".$image_name;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharback'], $target_file);
                
                    $image_name3 = $_FILES['customer']['name'][$i]['document'];
                    $target_file = "./uploads/".$image_name3;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['document'], $target_file);
                    $card_data['birthday_certificate'] = $card_data['user_pancard'] = $card_data['rationcard'] = '';
                    if($card_data['doc_type'] == 'Pancard'){
                        $card_data['user_pancard'] = $image_name3;
                    }
                    if($card_data['doc_type'] == 'Birth certificate'){
                        $card_data['birthday_certificate'] = $image_name3;
                    }
                    if($card_data['doc_type'] == 'Ration card'){
                        $card_data['rationcard'] = $image_name3;
                    }
            
                
            
                        $customercard = $this->modd->addCustomerCard($card_data);
                       
                $i++; } }
                $this->session->set_flashdata('success', 'Card has been created successfully');
           
                redirect('admin/customer_add');
            }
        }
          if (count($searchUser) > 0 && $searchUser[0]->role != 'vendor') {
               
               $this->session->set_flashdata('error', 'User already registered');
               redirect('admin/customer_add');
           } else {

            if($searchUser[0]->role != 'vendor'){

            $fatherName = $this->input->post('fatherName');
            $motherName = $this->input->post('motherName');
            $gender = $this->input->post('gender');


            $insertData = $_POST;


            define('UPLOAD_DIR', 'uploads/');

            $insertData['panDoc'] = $image_name = $_FILES['panDoc']['name'];
            $target_file = "./uploads/".$image_name;
            move_uploaded_file($_FILES['panDoc']['tmp_name'], $target_file);

            $insertData['addharFrontDoc'] = $image_name1 = $_FILES['addharFrontDoc']['name'];
            $target_file1 = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['addharFrontDoc']['tmp_name'], $target_file1);

            $insertData['addharBackDoc'] = $image_name2 = $_FILES['addharBackDoc']['name'];
            $target_file2 = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['addharBackDoc']['tmp_name'], $target_file2);

            $insertData['accountProvedDoc'] = $image_name3 = $_FILES['accountProvedDoc']['name'];
            $target_file3 = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file3);

            $insertData['signature'] = $image_name4 = $_FILES['signature']['name'];
            $target_file4 = "./uploads/".$image_name4;
            move_uploaded_file($_FILES['signature']['tmp_name'], $target_file4);

            $insertData['pic'] = $image_name5 = $_FILES['pic']['name'];
            $target_file5 = "./uploads/".$image_name5;
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_file5);

            $password = generate_random_password(7);
            $insertData['password'] = $password;
            $insertData['regId'] = $regId = generate_customer_reg_id();
            $users = $this->modd->getLastUserDetails();
            if(!empty($users))
            {
                $key = $users->cardnumber + 1;
            } else {
                $key = 2024000001;
            }
            $insertData['role'] =  'customer';
            $insertData['cardnumber'] =  $key;
            $insertData['status'] = 'active';
            $insertData['card_status'] = 'inactive';
            $insertData['role']='customer';
            $insertData['userId'] = $this->modd->addCustomer($insertData);

          

           // $insertData['transType'] = "deposite";
            $this->nomineesModel->createNominee($insertData);
            $this->userKycModel->createUserKycDetails($insertData);
            $this->userBankModel->createUserBanks($insertData);
            if(isset($insertData['customer'])){
            $card_datas = $insertData['customer'];
            $i = 0;
            foreach($card_datas as $card_data){
            
            

            $card_data['user_id'] = $insertData['userId'];
            $card_data['card_type'] = $insertData['card_type'];
            
            $card_data['user_adharfront'] = $image_name1 = $_FILES['customer']['name'][$i]['user_adharfront'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharfront'], $target_file);

            $card_data['user_adharback'] = $image_name = $_FILES['customer']['name'][$i]['user_adharback'];
            $target_file = "./uploads/".$image_name;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharback'], $target_file);
           
            $image_name3 = $_FILES['customer']['name'][$i]['document'];
            $target_file = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['customer']['tmp_name'][$i]['document'], $target_file);
            $card_data['birthday_certificate'] = $card_data['user_pancard'] = $card_data['rationcard'] = '';
            if($card_data['doc_type'] == 'Pancard'){
                $card_data['user_pancard'] = $image_name3;
            }
            if($card_data['doc_type'] == 'Birth certificate'){
                $card_data['birthday_certificate'] = $image_name3;
            }
            if($card_data['doc_type'] == 'Ration card'){
                $card_data['rationcard'] = $image_name3;
            }
     
        
      
                $customerId = $this->modd->addCustomerCard($card_data);
              
           $i++; } }
       
            $this->userBankModel->addIfscCode($_POST['ifscCode'], $_POST['bankName'], $_POST['branchName']);
            $mailData = array(
                'name' => $insertData['membarName'],
                'email' => $insertData['email'],
                'regId' => $insertData['regId'],
                'password' => $password,
                'msg' => 'Your registration has been created successfully. You got your user details shortly'
            );
            $this->sendMail($insertData['email'], 'Registration Confirmation', $mailData, 'created');
            $this->session->set_flashdata('success', 'Registration has been created successfully');
           
            redirect('admin/customer_add');
            
            
           }
        }
        }
    }
    public function getdetail(){
        $email = $this->input->post('email');
        $users = $this->userModel->getUserDetailsByEmail($email);
        echo json_encode($users);
        die;
    }
    public function getcarddetail(){
        $cardnumber = $this->input->post('card');
        $users = $this->userModel->getUserDetailsByCard($cardnumber);
        echo json_encode($users);
        die;
    }
    public function customer_list($rowno=0){
    $rowperpage = 10;
   
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    // All records count
    $allcount = $this->modd->getCustomerrecordCount(); 
    // Get records
    $customer_record = $this->modd->customerlist($rowno,$rowperpage);
    //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
    $config['base_url'] = base_url().'admin/customer_list';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 

    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $customer_record;
    $data['row'] = $rowno;
    $data['alldata'] = $alldata = $this->modd->allcustomerlist();
    
   
    $this->view('admin/customer-list', ['customers' => $data]);
       

    }
    public function admin_customer_list($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // All records count
        $allcount = $this->modd->getadminCustomerrecordCount(); 
        // Get records
        $customer_record = $this->modd->admincustomerlist($rowno,$rowperpage);
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url().'admin/admin_customer_list';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
     
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $customer_record;
        $data['row'] = $rowno;
        $data['alldata'] = $alldata = $this->modd->alladmincustomerlist();
        
       
        $this->view('admin/admin-customer-list', ['customers' => $data]);
           
    
        }
    public function customer_edit($id){
        $users = $this->modd->getUserDetails($id);
        $usercards = $this->modd->getUserCardDetails($id);
        $relation = $this->modd->getrelation();
        $this->view('admin/customer-edit', ['users' => $users,'usercards' => $usercards,'relation' => $relation,'districtlist'=>$this->districtlist()]);
    }
    public function postupdateCustomer(){
        $fatherName = $this->input->post('fatherName');
        $motherName = $this->input->post('motherName');
        $gender = $this->input->post('gender');


        $insertData = $_POST;
        define('UPLOAD_DIR', 'uploads/');
        $users = $this->modd->getUserDetails($_POST['userId']);
       
        if ($_FILES['panDoc']['name'] != '') {
            $insertData['panDoc'] = $image_name = $_FILES['panDoc']['name'];
            $target_file = "./uploads/".$image_name;
            move_uploaded_file($_FILES['panDoc']['tmp_name'], $target_file);
        } else {
            $insertData['panDoc'] = $users[0]->panDoc;
        }
        if ($_FILES['addharFrontDoc']['name'] != '') {
            $insertData['addharFrontDoc'] = $image_name1 = $_FILES['addharFrontDoc']['name'];
            $target_file1 = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['addharFrontDoc']['tmp_name'], $target_file1);
        } else {
            $insertData['addharFrontDoc'] = $users[0]->addharFrontDoc;
        }
        if ($_FILES['addharBackDoc']['name'] != '') {
            $insertData['addharBackDoc'] = $image_name2 = $_FILES['addharBackDoc']['name'];
            $target_file2 = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['addharBackDoc']['tmp_name'], $target_file2);
        } else {
            $insertData['addharBackDoc'] = $users[0]->addharBackDoc;
        }
        if ($_FILES['accountProvedDoc']['name'] != '') {
            $insertData['accountProvedDoc'] = $image_name3 = $_FILES['accountProvedDoc']['name'];
            $target_file3 = "./uploads/".$image_name3;
            move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file3);
        } else {
            $insertData['accountProvedDoc'] = $users[0]->accountProvedDoc;
        }
        if ($_FILES['signature']['name'] != '') {
            $insertData['signature'] = $image_name4 = $_FILES['signature']['name'];
            $target_file4 = "./uploads/".$image_name4;
            move_uploaded_file($_FILES['signature']['tmp_name'], $target_file4);
        } else {
            $insertData['signature'] = $users[0]->signature;
        }
        if ($_FILES['pic']['name'] != '') {
            $insertData['pic'] = $image_name5 = $_FILES['pic']['name'];
            $target_file5 = "./uploads/".$image_name5;
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_file5);
        } else {
            $insertData['pic'] = $users[0]->pic;
        }
       
        $this->modd->updateUser($insertData);
        // $this->transectionModel->updateTransection($insertData);
        $this->nomineesModel->updateNominee($insertData);
        $this->userKycModel->updateKyc($insertData);
        $this->userBankModel->updateBankDetails($insertData);
        if(isset($insertData['customer'])){
            $card_datas = $insertData['customer'];
            $i = 0;
            $carddatas = $this->modd->getUserCardDetails($insertData['userId']);
            //print_r($carddatas);
            $card = array();
            foreach($carddatas as $carddata){
                $card[] = $carddata['id'];
            }
            foreach( $card_datas as $card_data){
                $card_data['user_id'] = $insertData['userId'];
                $card_data['card_type'] = $insertData['card_type'];
                if(!in_array($card_data['id'], $card)){
                        $card_data['user_adharfront'] = $image_name1 = $_FILES['customer']['name'][$i]['user_adharfront'];
                        $target_file = "./uploads/".$image_name1;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharfront'], $target_file);

                    $card_data['user_adharback'] = $image_name2 = $_FILES['customer']['name'][$i]['user_adharback'];
                    $target_file = "./uploads/".$image_name2;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharback'], $target_file);

                    $image_name3 = $_FILES['customer']['name'][$i]['document'];
                    $target_file = "./uploads/".$image_name3;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['document'], $target_file);
                    $card_data['birthday_certificate'] = $card_data['user_pancard'] = $card_data['rationcard'] = '';
                    if($card_data['doc_type'] == 'Pancard'){
                        $card_data['user_pancard'] = $image_name3;
                    }
                    if($card_data['doc_type'] == 'Birth certificate'){
                        $card_data['birthday_certificate'] = $image_name3;
                    }
                    if($card_data['doc_type'] == 'Ration card'){
                        $card_data['rationcard'] = $image_name3;
                    }
           
                $this->modd->addCustomerCard($card_data);

            } else {
                
                $carddetails = $this->modd->getUserCardDetailsById($card_data['id']);
               
                if(!empty($_FILES['customer']['name'][$i]['user_adharfront'])){
                    $card_data['user_adharfront'] = $image_name1 = $_FILES['customer']['name'][$i]['user_adharfront'];
                    $target_file = "./uploads/".$image_name1;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharfront'], $target_file);
                } else {
                    $card_data['user_adharfront'] = $carddetails->adharcardfront;
                }
                
                if(!empty($_FILES['customer']['name'][$i]['user_adharback'])){
                    $card_data['user_adharback'] = $image_name2 = $_FILES['customer']['name'][$i]['user_adharback'];
                    $target_file = "./uploads/".$image_name2;
                    move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_adharback'], $target_file);
                } else {
                    $card_data['user_adharback'] = $carddetails->adharcardback;
                }
                
                $image_name3 = $_FILES['customer']['name'][$i]['document'];
                $target_file = "./uploads/".$image_name3;
                move_uploaded_file($_FILES['customer']['tmp_name'][$i]['document'], $target_file);
                $card_data['birthday_certificate'] = $card_data['user_pancard'] = $card_data['rationcard'] = '';
                if($card_data['doc_type'] == 'Pancard' && $image_name3 != ''){
                    $card_data['user_pancard'] = $image_name3;
                } else {
                    $card_data['user_pancard'] = $carddetails->pancard;
                }
                if($card_data['doc_type'] == 'Birth certificate' && $image_name3 != ''){
                    $card_data['birthday_certificate'] = $image_name3;
                }  else {
                    $card_data['birthday_certificate'] = $carddetails->birthday_certificate;
                }
                if($card_data['doc_type'] == 'Ration card' && $image_name3 != ''){
                    $card_data['rationcard'] = $image_name3;
                } else {
                    $card_data['rationcard'] = $carddetails->rationcard;
                }
                // if(!empty($_FILES['customer']['name'][$i]['user_pancard'])){
                        
                //     $card_data['user_pancard'] = $image_name3 = $_FILES['customer']['name'][$i]['user_pancard'];
                //     $target_file = "./uploads/".$image_name3;
                //     move_uploaded_file($_FILES['customer']['tmp_name'][$i]['user_pancard'], $target_file);
                // } else {
                //     $card_data['user_pancard'] = $carddetails['pancard'];
                // }
                // if(!empty($_FILES['customer']['name'][$i]['birthday_certificate'])){
                    
                //     $card_data['birthday_certificate'] = $image_name4 = $_FILES['customer']['name'][$i]['birthday_certificate'];
                //     $target_file = "./uploads/".$image_name4;
                //     move_uploaded_file($_FILES['customer']['tmp_name'][$i]['birthday_certificate'], $target_file);
                // } else {
                //     $card_data['birthday_certificate'] = $carddetails['birthday_certificate'];
                // }
                
                $this->modd->updateCustomerCard($card_data);
            }
        $i++; }
    }





        if ($this->session->role != 'vendor') {  
            redirect('admin/customer_list');
        } else {
            redirect('admin/vendorcustomer/');
        }
    }
    public function userservice($customer){
        $serviceuser = $this->modd->serviceuserbycustid($customer);
        
        
        $this->view('admin/user-service', [
            'serviceuser' => $serviceuser,
           
        ]);
    }
    public function service_add()
    {
        $this->view('admin/service_add');
    }
    public function postaddservice()
    {
        $config = array(
           
            array(
                'field'   => 'name',
                'label'   => 'Service Name',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $this->modd->addservice($_POST);
            redirect('admin/serviceView');
        }
    }
    public function input_autofill($data){
        
        $users = $this->modd->getUserDetailsByPancard($data);
        if(!empty($users)){
            echo json_encode($users[0]);
        } else {
            echo '';
        }
        

       // $this->view('admin/serviceform', ['services' => $service]);
    }
    public function serviceView(){
       
        $service = $this->modd->servicelist();
        $this->view('admin/service-list', ['services' => $service]);
   }
   public function serviceedit($id){       
    $service = $this->modd->servicebyid($id);
    $this->view('admin/service-edit', ['service' => $service]);
   }
   public function commision_add_edit($id){
    $service = $this->modd->servicebyid($id);
    $service_commision = $this->modd->getcommisionbyservice($id);
    
    $this->view('admin/commision_add_edit', ['service' => $service, 'service_commision' => $service_commision]);
   }
   public function postaddeditcommision(){
    $service = $this->modd->addeditcommision($_POST);
   
    redirect('admin/serviceView');
   }
   public function posteditservice(){       
    $service = $this->modd->editservice($_POST);
    redirect('admin/serviceView');
   }
   public function createform($id){
    $this->view('admin/create-form', ['id' => $id]);
   }
   public function postcreateform(){
        $this->modd->addserviceform($_POST);
        $service = $this->modd->servicestatuschange($_POST['service_id']);
        redirect('admin/serviceView');
   }
   public function editformview($id){
    $formdetails = $this->modd->formdetails($id);
    $this->modd->servicestatuschange($id);
    $this->view('admin/edit-form', ['formdetails' => $formdetails]);
   }
   public function posteditform(){
    $this->modd->editserviceform($_POST);
    redirect('admin/serviceView');
  }
  
  public function serviceform(){ 
    $service = $this->modd->publishservicelist();
    if(isset($_GET['service_name'])){
        $formdetails = $this->modd->serviceformdetail($_GET['service_name']);
    } else {
        $formdetails = array();
    }
    $userid = $this->session->userdata('userId');
    $this->view('admin/service-form', [
        'services' => $service,
        'formdetails' => $formdetails,
        'userid' => $userid
    ]);
  }
  public function postserviceform(){
    $this->load->library('upload');
    //define('UPLOAD_DIR', 'uploads/');
   // $config['upload_path'] = './uploads/';
    if(!empty($_FILES)){
        $filedata = $_FILES['form']['name'];
    } else {
        $filedata = $_FILES;
    }
   
    $this->modd->postaddserviceform($_POST,$filedata);
    redirect('admin/serviceuserview');
  }
  public function serviceuserview($rowno=0){
    $rowperpage = 10;
   
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    // All records count
    $allcount = $this->modd->getrecordCount(); 
    
    // Get records
    $service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
    $config['base_url'] = base_url().'admin/serviceuserview';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    //$config['cur_tag_open'] = '<span class="pagination current">';
   // $config['cur_tag_close'] = '</span>';
    //$config['num_tag_open'] = '<span class="pagination">';
    //$config['num_tag_close'] = '</span>';

    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $service_record;
    $data['row'] = $rowno;
    //$data['search'] = $search_text;

    $servicelist = $this->modd->publishservicelist();
    // echo $this->pagination->create_links();
    //$serviceuser = $this->modd->serviceuserlist($_GET);
    $this->view('admin/service-form-data-list', ['serviceuser' => $data, 'publishservice' => $servicelist]);
  }
  public function serviceuser($id){
    $serviceuser = $this->modd->serviceuserbyid($id);
    $formvaluebyid = $this->modd->serviceformvalue($id);
    
    $this->view('admin/service-form-details', [
        'serviceuser' => $serviceuser,
        'formvalue' => $formvaluebyid,
    ]);
  }
  public function vendorcustomer($rowno=0){
    $rowperpage = 10;
    $id = $this->session->userdata('userId');
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    
    // All records count
    $allcount = $this->modd->countvendorCustomerlistid($id); 
    // Get records
    $customer_record = $this->modd->vendorCustomerlistid($id,$rowno,$rowperpage);
    //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
    $allcustomercount = $this->modd->vendorCustomerAlllistid($id);
    $config['base_url'] = base_url().'admin/vendorcustomer/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    //$config["uri_segment"] = 2;

    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $customer_record;
    $data['row'] = $rowno;
    $data['allcustomers'] = $allcustomercount;
    
   
    $this->view('admin/vendor-customer-list', ['customerlist' => $data]);
  }
  public function vendoractivecustomer(){
    // $rowperpage = 10;
    $id = $this->session->userdata('userId');
   
    
    $data = $this->db->select("*")->from('users')->where('id', $id);
    $data = $this->db->get();
    $user = $data->result_array();
    
    //$user = $this->userModel->getuserdetailbyid($id);
    $usercards = $this->modd->getUserCardDetails($id);
    $membercard = $this->modd->customercardmemberbyid($id);
    $data = $this->db->select("*")->from('users')->where('createdBy', $id)->where('role', 'customer');
    $data = $this->db->get();
    $customer = $data->result_array();
    
    //$customerlist = array_push($user,$usercards,$customer); 
    
   // print_r($customerlist); die;
    
   
    $this->view('admin/active-member-list',['customerlist' => $user,'usercards' => $usercards, 'customers'  => $customer ,'membercard' => $membercard]);
  }
  public function setting(){
    $setting = $this->modd->setting();
    $this->view('admin/setting',['setting' => $setting]);
  }
  public function customer_term_condition(){
    $pagecontent = $this->modd->pages('customer-term-condition');
    $this->view('admin/customer-term-condition',['content' => $pagecontent]);
  }
  public function postsetting(){
    $this->modd->postsetting($_POST);
    redirect('admin/setting');
    $this->session->set_flashdata('success', 'Setting has been updated successfully');
  }
  public function postpage(){
    $this->modd->postpages($_POST);
    redirect('admin/customer_term_condition');
    $this->session->set_flashdata('success', 'Page Content has been updated successfully');
  }
  public function customertransction($id){
    
    $tansctionlist = $this->transectionModel->customerTranctionlistid($id);
    $this->view('admin/customer-transaction', [
        'tansctionlist' => $tansctionlist,
    ]);
  }
  public function serviceStatusChange(){
    $serviceid = $this->input->post('serviceid');
    $status = $this->input->post('status');
    return $serviceuser = $this->modd->serviceStatusChangebyid($serviceid,$status);
  }
  public function commision(){
    $commisionlist = $this->modd->commisionlist();
    $this->view('admin/commission', ['commisions' => $commisionlist]);
  }
  public function editcommision($id){
    $commision = $this->modd->editcommisionindex($id);
    $this->view('admin/edit-commission', ['commision' => $commision]);
  }
  public function posteditcommision(){
    $this->modd->editcommision($_POST);
    redirect('admin/commision');
  }
  public function editindex($id){
    $serviceuser = $this->modd->serviceuserbyid($id);
    $formdata = $this->modd->serviceformdata($id);
    
    $this->view('admin/service-data-edit', [
        'serviceuser' => $serviceuser,
        'formdata' => $formdata,
    ]);
  }
  public function posteditformdata(){
   
    $this->load->library('upload');
    //define('UPLOAD_DIR', 'uploads/');
   // $config['upload_path'] = './uploads/';
    if(!empty($_FILES)){
        $filedata = $_FILES['form']['name'];
    } else {
        $filedata = $_FILES;
    }
   
    
    $this->modd->editformdetails($_POST,$filedata);
    redirect('admin/serviceuserview');
  }
  public function addcommision(){
   
    redirect('admin/commision');
  }
  public function postaddcommision(){
    $config = array(
           
        array(
            'field'   => 'level_name',
            'label'   => 'Associate Designation',
            'rules'   => 'required'
        ),
        array(
            'field'   => 'target',
            'label'   => 'Associate Target',
            'rules'   => 'required'
        ),
        array(
            'field'   => 'commision',
            'label'   => 'Associate Commision',
            'rules'   => 'required'
        ),
    );
    if ($this->validation($config) == FALSE) {
        // $this->view('admin/users/user_form');
        echo validation_errors();
    } else {
        $this->modd->addcommission($_POST);
        redirect('admin/serviceView');
    }
  }
  function addcommission(){
    $this->view('admin/add-commission'); 
  }
  function usercommision(){
    $usercommision = $this->modd->usercommision();
    $this->view('admin/user-commision-list',['usercommision' => $usercommision]); 
  }

}
