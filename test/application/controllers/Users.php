<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        $this->load->model('Nominee_model', 'nomineesModel');
        $this->load->model('UserKYC_model','userKycModel');
        $this->load->model('UserBank_model','userBankModel');
        $this->load->model('Transaction_model','transectionModel');
    }

    public function index()
    {
        $currentUserId = $this->session->userdata('userId');
        // print_r($currentUserId);die;
        $page = 1;
        $users = $this->userModel->getAddUser($currentUserId);
        
        $this->view('admin/users/list', ['users' => $users]);
    }
    public function add()
    {
        $currentUserId = $this->session->userdata('userId');
        // print_r($currentUserId);die;
        $this->view('admin/users/user_form');
    }
    public function addMember()
    {
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
 
        if (empty($_FILES['panDoc']['name'])) {
            array_push($config, array(
                'field'   => 'panDoc',
                'label'   => 'PAN Upload',
                'rules'   => 'required'
            ));
        }
     
        if (empty($_FILES['addharFrontDoc']['name'])) {
            array_push($config, array(
                'field'   => 'addharFrontDoc',
                'label'   => 'Addhar Front Upload',
                'rules'   => 'required'
            ));
        }
        if (empty($_FILES['addharBackDoc']['name'])) {
            array_push($config, array(
                'field'   => 'addharBackDoc',
                'label'   => 'Addhar Back Upload',
                'rules'   => 'required'
            ));
        }
        if (empty($_FILES['accountProvedDoc']['name'])) {
            array_push($config, array(
                'field'   => 'accountProvedDoc',
                'label'   => 'Passbook/Cancelled Cheque/Statement Upload',
                'rules'   => 'required'
            ));
        }
        
        if (empty($_FILES['signature']['name'])) {
            array_push($config, array(
                'field'   => 'signature',
                'label'   => 'Signature',
                'rules'   => 'required'
            ));
        }
        
         if (empty($_FILES['pic']['name'])) {
            array_push($config, array(
                'field'   => 'pic',
                'label'   => 'Customar Image',
                'rules'   => 'required'
            ));
        }


        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            
            

            $fatherName = $this->input->post('fatherName');
            $motherName = $this->input->post('motherName');
            $gender = $this->input->post('gender');
            
           
            $insertData = $_POST;
            // print_r($insertData);die;
            if (!empty($_FILES['pic']['name'])) {
                $transRes = $this->uploadFile('pic');
                if ($transRes['error']) {
                } else {
                    $insertData['pic'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['panDoc']['name'])) {
                $transRes = $this->uploadFile('panDoc');
                if ($transRes['error']) {
                } else {
                    $insertData['panDoc'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['addharFrontDoc']['name'])) {
                $transRes = $this->uploadFile('addharFrontDoc');
                if ($transRes['error']) {
                } else {
                    $insertData['addharFrontDoc'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['addharBackDoc']['name'])) {
                $transRes = $this->uploadFile('addharBackDoc');
                if ($transRes['error']) {
                } else {
                    $insertData['addharBackDoc'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['accountProvedDoc']['name'])) {
                $transRes = $this->uploadFile('accountProvedDoc');
                if ($transRes['error']) {
                } else {
                    $insertData['accountProvedDoc'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['transRefDoc']['name'])) {
                $transRes = $this->uploadFile('transRefDoc');
                if ($transRes['error']) {
                } else {
                    $insertData['transRefDoc'] = $transRes['data']['file_name'];
                }
            }
            if (!empty($_FILES['signature']['name'])) {
                $transRes = $this->uploadFile('signature');
                if ($transRes['error']) {
                } else {
                    $insertData['signature'] = $transRes['data']['file_name'];
                }
            }
           
        // print_r($insertData);die;
           $insertData['status']="active";
           if (array_key_exists('side', $insertData)){
               if($insertData['side']=="left"){
            $insertParentData['leftChild']=$insertData['userId'];
           }else{
            $insertParentData['rightChild']=$insertData['userId'];
           }
           }
               
           $insertParentData['userId']=$insertData['parentId'];
           $this->userModel->updateUser($insertParentData);
           $insertData['parentNode']=$insertData['parentId'];
           if (array_key_exists('side', $insertData)){
           $insertData['side']=$insertData['side'];
           }
           $password=generate_random_password(7);
           $insertData['password']=$password;
            $this->userModel->updateUser( $insertData);
            
            $insertData['transType']="deposite";
            // $this->transectionModel->createTransaction($insertData);
            $this->nomineesModel->createNominee($insertData);
            $this->userKycModel->createUserKycDetails($insertData);
            $this->userBankModel->createUserBanks($insertData);

            $mailData = array(
                'name' => $insertData['membarName'],
                'email' => $insertData['email'],
                'regId' => $insertData['regId'],
                'password' => $password,
                'msg' => 'Your registration has been created successfully. You got your user details shortly'
            );
            $this->sendMail($insertData['email'], 'Registration Confirmation', $mailData,'created');
            $this->session->set_flashdata('success', 'Registration has been created successfully');
            redirect('users');
        }
    }

    public function userRegistrationStatusUpdate()
    {
        $config = array(
            array(
                'field'   => 'userId',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'status',
                'rules'   => 'required'
            )
        );


        $currentUserRole = $this->session->userdata('role');
        $currentUserId = $this->session->userdata('userId');
        if ($currentUserRole == 'superAdmin') {
            if ($this->validation($config) == FALSE) {
                echo validation_errors();
            } else {
                $userId = $this->input->post('userId');
                $status = $this->input->post('status');
                $user = $this->userModel->getUser($userId);
                if (count($user) > 0) {
                    if ($status === 'approved') {
                        // $password = generate_random_password(8);
                        $this->userModel->userRegistrationStatusUpdate($userId, $status);
                        $mailData = array(
                            'name' => $user[0]->firstName,
                            'email' => $user[0]->email,
                            'regId' => $user[0]->regId,
                            // 'password' => $password,
                            'msg' => 'Your account has been activated successfully'
                        );
                        $this->sendMail($user[0]->email, 'Account Activated', $mailData, 'active');
                    } else {
                        $this->userModel->userRegistrationStatusUpdate($userId, $status);
                        $mailData = array(
                            'name' => $user[0]->firstName,
                            'email' => $user[0]->email,
                            'regId' => $user[0]->regId,
                            'msg' => 'Your account has been rejected. Please contact admin'
                        );
                        $this->sendMail($user[0]->email, 'Account Deactivated', $mailData, 'reject');
                    }
                    echo json_encode(['status' => true, 'message' => 'User has been updated successfully']);
                } else {
                    echo json_encode(['status' => false, 'message' => 'User not found']);
                }
            }
        } else {
            echo json_encode(['status' => false, 'error' => 'Unauthorized access']);
        }
    }

    public function introcode($vac)
    {
        //$datas= $_GET['sopnsercode'];

        $vendor = $this->db->get_where('users', array('regId' => $vac));
        $data = $vendor->result();
        echo json_encode($data);
        die;
    }

   public function userDetails($id){
    $users= $this->userModel->getUserDetails($id);
    
    $this->view("admin/users/userDetails",['users' => $users]);
   }
   
   public function changePassword(){
 
 if($this->input->post())
		{
            $id = $this->session->userdata('userId');

            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            if ($new_password!=$confirm_password) {
                $this->session->set_flashdata('error', 'Confirm password does not match.');
            }else{
                $userdata = array(
                    'password' => md5($confirm_password),
                );
                $this->db->where('id',$id);
    
    				$this->db->update('users',$userdata);
    
    			   	$this->session->set_flashdata('success', 'Password has been changed successfully.');
            }

            $old_password=md5($this->input->post('old_password'));
    
    			$new_password = $this->input->post('new_password');
    
    			$confirm_password = $this->input->post('confirm_password');
    
    
    			$chk = $this->db->query('SELECT * FROM users WHERE password="'.$old_password.'" AND id="'.$id.'"');
    
    			if($chk->num_rows()<=0){
    
    			    $this->session->set_flashdata('error', 'Your current password does not match.');
    
    			}else if($new_password!=$confirm_password){
    
    			  	$this->session->set_flashdata('error', 'Confirm password does not match.');
    
    			}else{			
    
    				$userdata = array(
    					'password' => md5($confirm_password)
    				);
    
    				$this->db->where('id',$id);
    
    				$this->db->update('users',$userdata);
    
    			   	$this->session->set_flashdata('success', 'Password has been changed successfully.');
    
    		 	}
            
        }	
    $this->view("admin/users/changePassword");
}

}
