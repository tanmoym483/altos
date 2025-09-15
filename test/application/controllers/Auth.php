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
                if ($user->password == md5($password)) {
                    $this->session->set_userdata('firstName', $user->firstName);
                    $this->session->set_userdata('role', $user->role);
                    $this->session->set_userdata('email', $user->email);
                    $this->session->set_userdata('regId', $user->regId);
                    $this->session->set_userdata('userId', $user->id);

                    if ($user->isFirstLogin == 'y' || $user->isFirstLogin == 'Y') {
                        redirect('users/changePassword');
                    } else
                        redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username/ password mismatch');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username/ password mismatch');
                redirect('login');
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

        $users=$this->userModel->stateAllDetails();
        // print_r($users);die;
        $this->view("auth/registration",['users' => $users]);
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
        if (empty($_FILES['transRefDoc']['name'])) {
            array_push($config, array(
                'field'   => 'transRefDoc',
                'label'   => 'Transaction Ref',
                'rules'   => 'required'
            ));
        }
        if ($this->validation($config) == FALSE) {

            $this->view('auth/registration');
        } else {

            $insertData = $_POST;
            $insertData['status'] = 'pending';
            $searchUser = $this->userModel->getUser($insertData['email']);
            if (count($searchUser) > 0) {
                $this->session->set_flashdata('error', 'User already registered');
                redirect('registration');
            } else {

                if (!empty($_FILES['transRefDoc']['name'])) {
                    $transRes = $this->uploadFile('transRefDoc');
                    if ($transRes['error']) {
                    } else {
                        $insertData['transRefDoc'] = $transRes['data']['file_name'];
                    }
                }
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
                redirect('registration');
            }
        }
    }
    public function forgot_password()
    {
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
}
