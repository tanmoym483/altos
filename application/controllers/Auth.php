<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
   
    public function __construct()
    {
        parent::__construct();

        $this->template = 'layouts/default-auth';
        $this->load->model('User_model', 'userModel');
        $this->load->model('Transaction_model', 'transModel');
    }

    public function index()
    {
        $this->view('auth/login');
    }
    public function login()
    {
        $config = array(
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'required'
            )
        );

        if ($this->validation($config) == FALSE) {
            $this->view('auth/login');
        } else {
            // print_r($_POST);
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $users = $this->userModel->getUser($username);
          
            
            if (count($users) > 0) {

                $user = $users[0];
                
                if ($user->password == md5($password) && $user->status != 'inactive') {
                    $this->session->set_userdata('firstName', $user->firstName);
                    $this->session->set_userdata('lastName', $user->lastName);
                    $this->session->set_userdata('role', $user->role);
                    $this->session->set_userdata('email', $user->email);
                    $this->session->set_userdata('regId', $user->regId);
                    $this->session->set_userdata('userId', $user->id);
                    $this->session->set_userdata('joindate', $user->createdAt);
                    

                    if ($user->isFirstLogin ==='y') {
                        //   print_r($user->isFirstLogin);die;
                       
                       redirect('users/changePassword');
                    } else{
                        // print_r($user->isFirstLogin);die;
                        
                            redirect('dashboard');
                        
                            
                        
                    }
                } else {
                  
                    $this->session->set_flashdata('error', 'Username/ password mismatch');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('error', 'Username/ password mismatch');
                redirect('/');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Successfully logout');
        redirect('login');
    }
    public function registration()
    {
        $renew_date = date("Y-m-d");
        
        $users=$this->userModel->stateAllDetails();
        // print_r($users);die;
        $this->view("auth/registration",['users' => $users,'districtlist'=>$this->districtlist()]);
    }
    public function submitRegistration()
    {
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
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'phone',
                'label'   => 'Phone',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'city',
                'label'   => 'City',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'postcode',
                'label'   => 'Pincode',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'transRefNo',
                'label'   => 'Transaction No',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            )
        );
        // if (empty($_FILES['transRefDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'transRefDoc',
        //         'label'   => 'Transaction Ref',
        //         'rules'   => 'required'
        //     ));
        // }
        if ($this->validation($config) == FALSE) {

            $this->view('auth/registration');
        } else {

            $insertData = $_POST;
            $insertData['status'] = 'pending';
            $insertData['email'] = strtolower($insertData['email']);
            $searchUser = $this->userModel->getUser($insertData['email']);
            if (count($searchUser) > 0) {
                $this->session->set_flashdata('error', 'User already registered');
                redirect('registration');
            } else {

                // if (!empty($_FILES['transRefDoc']['name'])) {
                //     $transRes = $this->uploadFile('transRefDoc');
                //     if ($transRes['error']) {
                //     } else {
                //         $insertData['transRefDoc'] = $transRes['data']['file_name'];
                //     }
                // }
                
            define('UPLOAD_DIR', 'uploads/');

            // $img = $_POST['transRefDoc'];
            // $img = str_replace('data:image/png;base64,', '', $img);
            // $img = str_replace(' ', '+', $img);
            // $data = base64_decode($img);
            // $file = UPLOAD_DIR . uniqid() . '.png';
            // $imgss = str_replace('uploads/', '', $file);
            // $success = file_put_contents($file, $data);
            // $insertData['transRefDoc'] = $imgss;
            $insertData['transRefDoc'] = $image_name2 = $_FILES['transRefDoc']['name'];
            $target_file2 = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file2);
             
                
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
                $insertData['regId'] = $regId;
                $this->userModel->createUser($insertData);
                $userId = $this->db->insert_id();
                $insertData['userId'] = $userId;
                $insertData['createdBy'] = $userId;
                $insertData['transType'] = 'registration';
                $this->transModel->createTransaction($insertData);
                $bdoIds = $insertData['regId'];
                $mailData = array(
                    'name' => $insertData['firstName'],
                    'email' => $insertData['email'],
                    'regId' => $insertData['regId'],
                    'msg' => 'Your registration has been created successfully. You got your user details shortly'
                );
                $this->sendMail($insertData['email'], 'Registration Confirmation', $mailData);
                $falashhdata = "Registration Id-$bdoIds has been submitted successfully";
                $this->session->set_flashdata('success', $falashhdata);
                    $this->session->set_userdata('regId', $insertData['regId']);
                    $renew_date = date("Y-m-d");
                    $this->session->set_userdata('date',$renew_date);
                    // echo date('d-m-Y', strtotime($u->createdAt));
                redirect('registration');
            }
        }
    }
    public function forgot_password()
    {
        
   if($this->input->post()){
       $random_number=mt_rand(100000,9999999);
     $email=$this->input->post('email');
      $result=$this->userModel->forgot($email,$random_number);
      if($result){
         $mailData = array(
                    'name' => $result->firstName,
                    'email' => $result->email,
                    'regId' => $result->regId,
                    'password' => $random_number,
                    'msg' => 'Your account has been activated successfully ',
                );
                $this->sendMail($result->email, 'Forgot Password', $mailData, 'forgot');
            }
            }
        $this->view('auth/forgot_password');
    }
    public function reset_password()
    {
        $this->view('auth/reset_password');
    }
    public function change_password()
    {
        $this->view('auth/change_password');
    }
     public function edituserDetails($id){
        // $vendor = $this->db->get_where('users', array('id' => $id));
        // $vendor = $this->db->get_where('users', array('id' => $id));
        // $data = $vendor->result();
        $data = $this->userModel->getUserDetailsbyid($id);
        echo json_encode($data);
        die;
    }
    public function userEdit(){
       $insertData=$_POST;
       $data = $this->userModel->getUserDetailsbyid($insertData['userId']);
      
       if($insertData['status'] == 'reject'){
            if(!empty($_FILES['transRefDoc']) && $_FILES['transRefDoc']['name'] != ''){
                echo 'hhh';
                $image_name = $_FILES['transRefDoc']['name'];
                $target_file = "./uploads/".$image_name;
                move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);
                $insertData['transRefDoc'] = $image_name;
            } else {
                $insertData['transRefDoc'] = $data[0]->transRefDoc;
            }
            
            $this->transModel->updaterejectdocument($insertData);
            $insertData['status'] = 'pending';
        }
       
        $this->userModel->updateUser($insertData);
        
            if($this->session->role == 'vendor')
            {
                redirect('admin/vendoruser');
            } else {
                redirect('bdo');
            }
        } 

        public function paymentUpdate($id){
          $payemnrtList=$this->db->get_where('transactions', array('id' => $id));
          $data = $payemnrtList->result();
          echo json_encode($data);
          die;
        }
        public function postalCode($id){
          $postalList=$this->db->get_where('m_states', array('pincode' => $id));
          $data = $postalList->result();
          echo json_encode($data);
          die;
        }
        public function updatePaymentList(){
            $config = array(
                array(
                    'field'   => 'userId',
                    'label'   => 'userId',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'transType',
                    'label'   => 'Transection Type',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'transRefNo',
                    'label'   => 'Transection Ref No',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'amount',
                    'label'   => 'Amount',
                    'rules'   => 'required'
                )
            );
            // if (empty($_FILES['transRefDoc']['name'])) {
            //     array_push($config, array(
            //         'field'   => 'transRefDoc',
            //         'label'   => 'Transection Ref Doc',
            //         'rules'   => 'required'
            //     ));
            // }
            if ($this->validation($config) == FALSE) {
                $this->view('auth/registration');
            } else {
            $insertData=$_POST;
            $userId=$insertData['userId'];
            
            // define('UPLOAD_DIR', 'uploads/');
            // $img = $_POST['transRefDocs'];
            // $img = str_replace('data:image/png;base64,', '', $img);
            // $img = str_replace(' ', '+', $img);
            // $data = base64_decode($img);
            // $file = UPLOAD_DIR . uniqid() . '.png';
            // $imgss = str_replace('uploads/', '', $file);
            // $success = file_put_contents($file, $data);
            // $insertData['transRefDoc'] = $imgss;
          
            $payemnrtList=$this->db->get_where('transactions', array('id' => $insertData['id']));
            $data = $payemnrtList->result();
            print_r($data);
            if($_FILES['transRefDoc']){
                $image_name = $_FILES['transRefDoc']['name'];
                $target_file = "./uploads/".$image_name;
                move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);
                $insertData['transRefDoc'] = $image_name;
            } else {
                $insertData['transRefDoc'] = $data[0]->transRefDoc;
            }
            
            
            // if (!empty($_FILES['transRefDoc']['name'])) {
            //     $transRes = $this->uploadFile('transRefDoc');
            //     // print_r($transRes);die;
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['transRefDoc'] = $transRes['data']['file_name'];
                    
            //     }
            // }
            // print_r($insertData);die;
            $this->transModel->updateTransection($userId,$insertData);
            redirect('users/payemntHistory');
        }
    }
}
