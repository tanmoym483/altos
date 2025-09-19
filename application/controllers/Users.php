<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Users extends MY_Controller
{
    //  use Dompdf\Dompdf;
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';

        $this->load->model('Admin_model', 'modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('Nominee_model', 'nomineesModel');
        $this->load->model('UserKYC_model', 'userKycModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->model('UserLevel_model', 'userLevel');
        $this->load->model('Mcommission_model', 'm_commissionModel');
        $this->load->model('Commission_model', 'commissionModel');
        $this->load->model('Offer_model', 'offerModel');
        $this->load->model('Cashback_model', 'cashbackModel');
        $this->load->library('Pdf');
        $this->load->helper('transaction_logger');
        $this->load->library("pagination");
    }
    // public function pdf(){
    //     $dompdf=new Dompdf();
    //     $dompdf->loadHtml("<h1>hello</h1>");

    //   $dompdf->stream('playerofcode',array('Attachment'=>0)) ;
    // }
    public function downlinereport()
    {
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $pdfval = "ase";

            // $NewDate = Date('d:m:Y', strtotime('+1 days'));
            $registration = $this->input->get('registration');
            $others['regnumber'] = $registration;
        }
        $da = $this->db->select('regId')->from('users')->where('role', 'vendor')->where('status', 'active');
        $da = $this->db->get();
        $vendorregid = $da->result_array();
        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->post('table_search');
        $this->db->select('*')->from('users')->where('id', $currentUserId);
        $da = $this->db->get();
        $response = $da->row();
           
        $leftChild = $response->leftChild;
        $left_child = $this->userModel->getUserById($leftChild); 
        
        $user_tree = $this->userModel->getUserReport($leftChild, $search, $others);
        $data = array_merge($left_child,$user_tree);
      
        $this->view('admin/users/downline-report', ['user_tree' => $data, 'vendorregid' => $vendorregid, 'search' => $search]);
    }
    public function rightdownlinereport()
    {
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $pdfval = "ase";

            // $NewDate = Date('d:m:Y', strtotime('+1 days'));
            $registration = $this->input->get('registration');
            $others['regnumber'] = $registration;
        }
        $da = $this->db->select('regId')->from('users')->where('role', 'vendor')->where('status', 'active');
        $da = $this->db->get();
        $vendorregid = $da->result_array();
        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->post('table_search');
        $this->db->select('*')->from('users')->where('id', $currentUserId);
        $da = $this->db->get();
        $response = $da->row();
           
        $rightChild = $response->rightChild;
        $right_child = $this->userModel->getUserById($rightChild); 
        
        $user_tree = $this->userModel->getUserReport($rightChild, $search, $others);
        $data = array_merge($right_child,$user_tree);
        
        $this->view('admin/users/right-downline-report', ['user_tree' => $data, 'vendorregid' => $vendorregid, 'search' => $search]);
    }
    public function downlinereports()
    {
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $pdfval = "ase";

            // $NewDate = Date('d:m:Y', strtotime('+1 days'));
            $registration = $this->input->get('registration');
            $others['regnumber'] = $registration;
        }
        $da = $this->db->select('regId')->from('users')->where('role', 'vendor')->where('status', 'active');
        $da = $this->db->get();
        $vendorregid = $da->result_array();
        
        $search = $this->input->post('table_search');
       
        
        $users = $this->userModel->getAllUserReport($search);
       
        
        $this->view('admin/users/admin-downline-report', ['users' => $users, 'vendorregid' => $vendorregid, 'search' => $search]);
    }
    public function list($rowno=0)
    {
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $pdfval = "ase";

            // $NewDate = Date('d:m:Y', strtotime('+1 days'));
            $to = $this->input->get('to') . ('+1 days');
            $from = $this->input->get('from');

            if ((strtotime($to) - strtotime($from)) > 0) {

                $others['to'] = $to;
                $others['from'] = $from;
            } else {
                return  $this->view('admin/users/list', ['users' => [], 'error' => 'From date must be less than or equal to To date']);
            }
        }

        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->get('table_search'); 
       // $page = 1;
        $users = $this->userModel->getAddUser($currentUserId, $search, $rowno,$rowperpage, $others); 

        
        $allusers = $this->userModel->getAllFUsers($currentUserId, $search, $rowno,$rowperpage, $others); 
       
        // All records count
       $allcount = count($allusers);
       
       
        
        $config['base_url'] = base_url().'users/list';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
       // $config['uri_segment'] = 1;
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users;
        $data['row'] = $rowno;
        $data['allusers'] = $allusers;
       
        $this->view('admin/users/list', ['users' => $data, 'search' => $search]);
    }
    public function cardnumber()
    {
        $card = $this->input->post('card');
        $userId = $this->session->userdata('userId');
        $data['card'] = $this->modd->getcarddetails($card);
        $data['user'] = $this->userModel->getUser($userId);
        echo json_encode($data);
        die;
    }
    public function admincardnumber()
    {
        $card = $this->input->post('card');
        $data = $this->modd->getcarddetails($card);
        echo json_encode($data);
        die;
    }
    public function adminfrancardnumber()
    {
        $card = $this->input->post('card');
        $regid = $this->input->post('regid');
        $data['card'] = $this->modd->getcarddetails($card);
        $data['user'] = $this->userModel->getUser($regid);
        echo json_encode($data);
        die;
    }
    public function walletamount()
    {
        $card = $this->input->post('card');
        $payment = $this->input->post('payment');
        $data = $this->modd->getcarddetails($card);
        if ($payment == 'own_wallet' || $payment == 'customer_wallet') {
            $wallet = $data[0]['wallet'];
        } else {
            $user = $this->userModel->getuserdetailbyid($data[0]['createdBy']);
            $wallet = $user->wallet;
        }
        echo $wallet;
        die;
    }
    public function userPdf()
    {
        $formdate = $this->input->post('formDate');
        $todate = $this->input->post('todate');
        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->post('table_search');
        // 		$data['siswa'] = $this->userModel->getpdf();
        $data['siswa'] = $this->userModel->userGenaretPdf($formdate, $todate);

        // $data['siswa']=$this->userModel->getAddUser($currentUserId,$search);
        // 		print_r($data);die;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-siswa.pdf";


        $this->pdf->load_view('admin/users/userPdf', $data);
    }
    function testpdf()
    {
        $this->load->library('pdf');
        $html = 'testing pdf testing pdf';

        $dompdf = new PDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('test.pdf', $output);
    }

    public function crops()
    {
        $this->view("admin/users/crop");
    }
    public function add()
    {
        $currentUserId = $this->session->userdata('userId');
        $vendor = $this->db->get_where('users', array('id' => $currentUserId));
        $vendor = $vendor->row();
        $relation = $this->modd->getrelation();
        // print_r($currentUserId);die;
        $this->view('admin/users/user_form', ['relation' => $relation,'vendor'=> $vendor,'districtlist' => $this->districtlist()]);
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

        // if (empty($_FILES['panDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'panDoc',
        //         'label'   => 'PAN Upload',
        //         'rules'   => 'required'
        //     ));
        // }

        // if (empty($_FILES['addharFrontDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'addharFrontDoc',
        //         'label'   => 'Addhar Front Upload',
        //         'rules'   => 'required'
        //     ));
        // }
        // if (empty($_FILES['addharBackDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'addharBackDoc',
        //         'label'   => 'Addhar Back Upload',
        //         'rules'   => 'required'
        //     ));
        // }
        // if (empty($_FILES['accountProvedDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'accountProvedDoc',
        //         'label'   => 'Passbook/Cancelled Cheque/Statement Upload',
        //         'rules'   => 'required'
        //     ));
        // }

        // if (empty($_FILES['signature']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'signature',
        //         'label'   => 'Signature',
        //         'rules'   => 'required'
        //     ));
        // }

        //  if (empty($_FILES['pic']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'pic',
        //         'label'   => 'Customar Image',
        //         'rules'   => 'required'
        //     ));
        // }


        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {



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

            // print_r($insertData);die;
            // if (!empty($_FILES['pic']['name'])) {
            //     $transRes = $this->uploadFile('pic');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['pic'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['panDoc']['name'])) {
            //     $transRes = $this->uploadFile('panDoc');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['panDoc'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['addharFrontDoc']['name'])) {
            //     $transRes = $this->uploadFile('addharFrontDoc');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['addharFrontDoc'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['addharBackDoc']['name'])) {
            //     $transRes = $this->uploadFile('addharBackDoc');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['addharBackDoc'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['accountProvedDoc']['name'])) {
            //     $transRes = $this->uploadFile('accountProvedDoc');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['accountProvedDoc'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['transRefDoc']['name'])) {
            //     $transRes = $this->uploadFile('transRefDoc');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['transRefDoc'] = $transRes['data']['file_name'];
            //     }
            // }
            // if (!empty($_FILES['signature']['name'])) {
            //     $transRes = $this->uploadFile('signature');
            //     if ($transRes['error']) {
            //     } else {
            //         $insertData['signature'] = $transRes['data']['file_name'];
            //     }
            // }

            // print_r($insertData);die;
            $StatusCheck = $this->userModel->checkUserId($_POST['userId']);
            $roleCheck =  $this->userModel->checkrole($_POST['introducer_code']);
            // print_r($StatusCheck->status);die;
            // print_r($insertData);die;
            if ($StatusCheck->status == "approved") {
                $insertData['status'] = "active";
                if (array_key_exists('side', $insertData)) {
                    if ($insertData['side'] == "left") {
                        $insertParentData['leftChild'] = $insertData['userId'];
                    } else {
                        $insertParentData['rightChild'] = $insertData['userId'];
                    }
                }
                if ($roleCheck->role == "superAdmin") {
                    // $insertParentData['userId'] = $insertData['parentId'];
                    // $this->userModel->updateUser($insertParentData);
                    // $insertData['parentNode'] = $insertData['parentId'];
                } else {
                    $insertParentData['userId'] = $insertData['parentId'];
                    $this->userModel->updateUser($insertParentData);
                    $insertData['parentNode'] = $insertData['parentId'];
                }
                if (array_key_exists('side', $insertData)) {
                    $insertData['side'] = $insertData['side'];
                }
                $password = generate_random_password(7);
                $insertData['password'] = $password;
                $insertData['createdBy'] = $this->session->userdata('userId');
                $this->userModel->updateUser($insertData);

                $insertData['transType'] = "deposite";
                // $this->transectionModel->createTransaction($insertData);
                $this->nomineesModel->createNominee($insertData);
                $this->userKycModel->createUserKycDetails($insertData);
                $this->userBankModel->createUserBanks($insertData);
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
                redirect('users/add');
            } else {
                $this->session->set_flashdata('error', 'Something is wrong.');
                redirect('users/add');
            }
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
                $timestamp = date("Y-m-d H:i:s");
                if (count($user) > 0) {
                    if ($status === 'approved') {
                        // $password = generate_random_password(8);
                        $this->userModel->userRegistrationStatusUpdate($userId, $status);
                        $this->transectionModel->userRegistrationStatusUpdate($userId, $status);

                        $transaction = $this->transectionModel->gettransactionbyuId($userId);

                        $wallet = $transaction[0]->amount;
                        $wallets['wallet'] = $wallet;
                        $wallets['userId'] = $userId;

                        $this->userModel->updateUser($wallets);
                        logTransaction($userId, $userId, 'Credited', $wallets['wallet'], $wallets['wallet'], $timestamp, $transaction[0]->transRefNo, true);
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
    public function postadmincardactive()
    {
        $userId = $this->input->post('f_regid');
        $card_number = $this->input->post('card_number');
        $amount = $this->input->post('amount');
        $payment_form = $this->input->post('payment_form');
        $cardmember = $this->userModel->getuserdetailbycard($card_number);

        $franchaise = $this->userModel->getUser($userId);
        $timestamp = date("Y-m-d H:i:s");
        if (!empty($cardmember)) {
            if ($cardmember->card_status == 'inactive') {

                if ($payment_form == 'own_wallet') {
                    if ($cardmember->wallet >= $amount) {
                        $status['wallet'] = $cardmember->wallet - $amount;
                        $status['userId'] = $cardmember->id;
                        $status['card_status'] = 'active';
                        $this->userModel->updateUser($status);
                        
                        $insertData['transRefDoc'] = '';
                        $key = rand(100000, 999999);
                        $insertData['transaction_id'] = $key;
                        $insertData['status'] = "approved";
                        $insertData['transType'] = 'card_active';
                        $insertData['amount'] = $amount;
                        $insertData['createdBy'] = $this->session->userdata('userId');
                        $insertData['vendor_id'] = 0;
                        $insertData['userId'] = $cardmember->id;
                        $this->transectionModel->createTransaction($insertData);
                        logTransaction($status['userId'], $status['userId'], 'Debited', $amount, $status['wallet'], $timestamp, $insertData['transaction_id'], true);
                        $mailData = array(
                            'name' => $cardmember->firstName,
                            'email' => $cardmember->email,
                            'cardnumber' => $cardmember->cardnumber
                        );
                        $this->sendMail($cardmember->email, 'Card Active', $mailData, 'card_active');
                        $mailData = array(
                            'name' => $cardmember->firstName,
                            'email' => $cardmember->email,
                            'amount' => $amount,
                            'msg' => 'Your ' . $amount . ' has been debited to activated card (' . $card_number . ') from your wallet. Your available balence is ' . $status['wallet'] . ''
                        );
                        $this->sendMail($cardmember->email, 'Payment Debited', $mailData, 'paymentactive');
                        $this->session->set_flashdata('success', 'Card has been activate successfully');
                    } else {
                        $this->session->set_flashdata('error', 'Have no money in your wallet. Please check your wallet.');
                    }
                }
                if ($payment_form == 'franchaise_wallet') {

                    if ($franchaise[0]->wallet >= $amount) {

                        $wallet['wallet'] = $franchaise[0]->wallet - $amount;
                        $wallet['userId'] = $franchaise[0]->id;
                        $this->userModel->updateUser($wallet);
                        
                        $user['userId'] = $cardmember->id;
                        $user['card_status'] = 'active';
                        $this->userModel->updateUser($user);
                        $insertData['transRefDoc'] = '';
                        $key = rand(100000, 999999);
                        $insertData['transaction_id'] = $key;
                        $insertData['status'] = "approved";
                        $insertData['transType'] = 'card_active';
                        $insertData['amount'] = $amount;
                        $insertData['createdBy'] = $franchaise[0]->id;
                        //$insertData['vendor_id'] = $franchaise[0]->id;
                        $insertData['userId'] = $cardmember->id;
                        $this->transectionModel->createTransaction($insertData);
                        logTransaction($wallet['userId'], $user['userId'], 'Debited', $amount, $wallet['wallet'], $timestamp, $insertData['transaction_id'], true);
                        $mailData = array(
                            'name' => $cardmember->firstName,
                            'email' => $cardmember->email,
                            'cardnumber' => $cardmember->cardnumber
                        );
                        $this->sendMail($cardmember->email, 'Card Active', $mailData, 'card_active');
                        $mailData = array(
                            'name' => $franchaise[0]->firstName,
                            'email' => $franchaise[0]->email,
                            'amount' => $amount,
                            'msg' => 'Your ' . $amount . ' has been debited to activated card (' . $card_number . ') from your wallet. Your available balence is ' . $wallet['wallet'] . ''
                        );
                        $this->sendMail($franchaise[0]->email, 'Payment Debited', $mailData, 'paymentactive');
                        $this->session->set_flashdata('success', 'Card has been activate successfully');
                    } else {
                        $this->session->set_flashdata('error', 'Have no money in your wallet. Please check your wallet.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Card already active.');
            }
        } else {
            $this->session->set_flashdata('error', 'Card number not exist');
        }

        redirect('admin/admincardactive');
    }
    public function introcode($vac)
    {
        //$datas= $_GET['sopnsercode'];

        $vendor = $this->db->get_where('users', array('regId' => $vac));
        $data = $vendor->result();
        echo json_encode($data);
        die;
    }
    public function vintrocode($vac)
    {
        //$datas= $_GET['sopnsercode'];
        $vendor = $this->db->select('customer.id,customer.createdBy,vendor.regId');
        $vendor = $this->db->from('users as customer');
        $vendor = $this->db->join('users as vendor', 'vendor.id = customer.createdBy', 'left');
        $vendor = $this->db->where('customer.cardnumber', $vac);
        $vendor = $this->db->get();
        $data = $vendor->result();
        echo json_encode($data);
        die;
    }
    public function ifcsCode($vac)
    {
        //$datas= $_GET['sopnsercode'];

        $vendor = $this->db->get_where('m_bank', array('ifsc' => $vac));
        $data = $vendor->result();
        echo json_encode($data);
        die;
    }

    public function userDetails($id)
    {
        $users = $this->userModel->getUserDetails($id);
        $usercards = $this->modd->getUserCardDetails($id);
        $this->view("admin/users/userDetails", ['users' => $users, 'usercards' => $usercards]);
    }

    public function changePassword()
    {
        $id = $this->session->userdata('userId');
        $this->db->select("*")
            ->from("users");
        $isFirstLoginUp = array(
            'isFirstLogin' => 'n'
        );
        $this->db->where('id', $id);
        $this->db->update('users', $isFirstLoginUp);

        if ($this->input->post()) {
            $id = $this->session->userdata('userId');

            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            if ($new_password != $confirm_password) {
                $this->session->set_flashdata('error', 'Confirm password does not match.');
            } else {
                $userdata = array(
                    'password' => md5($confirm_password),
                );
                $this->db->where('id', $id);

                $this->db->update('users', $userdata);

                $this->session->set_flashdata('success', 'Password has been changed successfully.');
            }

            $old_password = md5($this->input->post('old_password'));

            $new_password = $this->input->post('new_password');

            $confirm_password = $this->input->post('confirm_password');


            $chk = $this->db->query('SELECT * FROM users WHERE password="' . $old_password . '" AND id="' . $id . '"');

            if ($chk->num_rows() <= 0) {

                $this->session->set_flashdata('error', 'Your current password does not match.');
            } else if ($new_password != $confirm_password) {

                $this->session->set_flashdata('error', 'Confirm password does not match.');
            } else {

                $userdata = array(
                    'password' => md5($confirm_password)
                );

                $this->db->where('id', $id);

                $data =    $this->db->update('users', $userdata);
                if ($data) {

                    //  	$this->session->set_flashdata('success', 'Password has been changed successfully.');

                }
            }
            redirect('dashboard');
        }
            redirect('dashboard');

        // $this->view("admin/users/changePassword");
    }


    public function usersEdit($id)
    {

        $users = $this->userModel->getUserDetails($id);
        $relation = $this->modd->getrelation();
        $this->view('admin/users/user_form_update', ['users' => $users, 'relation' => $relation, 'districtlist' => $this->districtlist()]);
    }
    public function updateMembar()
    {

        $fatherName = $this->input->post('fatherName');
        $motherName = $this->input->post('motherName');
        $gender = $this->input->post('gender');


        $insertData = $_POST;

        define('UPLOAD_DIR', 'uploads/');

        //$users = $this->modd->getUserDetails($_POST['userId']);
        $users = $this->userModel->getUserDetails($_POST['userId']);
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

        $this->userModel->updateUser($insertData);
        // $this->transectionModel->updateTransection($insertData);
        $this->nomineesModel->updateNominee($insertData);
        $this->userKycModel->updateKyc($insertData);
        $this->userBankModel->updateBankDetails($insertData);
        redirect('users/list');
    }

    public function test($data)
    {
        print_r($data);
        die;
    }
    public function postaddfund()
    {
        $config = array(
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            ),

        );

        // if (empty($_FILES['transRefDoc']['name'])) {
        //     array_push($config, array(
        //         'field'   => 'transRefDoc',
        //         'label'   => 'Payment Reference Upload',
        //         'rules'   => 'required'
        //     ));
        // }
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            // echo validation_errors();
            $this->session->set_flashdata('error', 'Something is wrong');
            redirect('users/addfund');
        } else {
            $insertData = $_POST;
            // define('UPLOAD_DIR', 'uploads/');
            // $img = $_POST['transRefDocs'];
            // $img = str_replace('data:image/png;base64,', '', $img);
            // $img = str_replace(' ', '+', $img);
            // $data = base64_decode($img);
            // $file = UPLOAD_DIR . uniqid() . '.png';
            // $imgss = str_replace('uploads/', '', $file);
            // $success = file_put_contents($file, $data);
            // $insertData['transRefDoc'] = $imgss;
            if (!empty($_FILES)) {
                $image_name = $_FILES['transRefDoc']['name'];
                $target_file = "./uploads/" . $image_name;
                move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);

                $insertData['transRefDoc'] = $image_name;
            } else {
                $insertData['transRefDoc'] = '';
            }
            if($insertData['paymenttype'] == 'direct_payment'){
                $insertData['status'] = "pending";
                $insertData['transType'] = $_POST['transType'];
                $insertData['createdBy'] = $this->session->userdata('userId');
                $insertData['vendor_id'] = '';
                $insertData['userId'] = $this->input->post('cuserId');
            } else {
                $insertData['status'] = "pending";
                $insertData['transType'] = $_POST['transType'];
                $insertData['createdBy'] = $this->session->userdata('userId');
                $insertData['vendor_id'] = $this->input->post('vuserId');
                $insertData['userId'] = $this->input->post('cuserId');
            }
            
            $this->transectionModel->createTransaction($insertData);

            if($insertData['cashback_amount'] != ''){
                $insertData['user_type'] = "customer";
                $this->cashbackModel->createCashback($insertData);
            }

            //$id = $this->input->post('cuserId');
            // $users = $this->modd->getUserDetails($id);

            // $wallet = $users['0']->wallet + $this->input->post('amount');
            // $status['wallet'] = $wallet;
            // $status['userId'] = $id;
            // $this->modd->updateUser($status);
            $this->session->set_flashdata('success', 'Fund has been added successfully');
            redirect('users/addtransferfund');
        }
    }
    public function vendorcard()
    {
        $id = $this->session->userdata('userId');
        $user = $this->userModel->getuserdetailbyid($id);
        $usercards = $this->modd->getUserCardDetails($id);
        $this->view("admin/users/vendor-card", ['user' => $user,'usercard' => $usercards]);
    }
    
    public function vendorcarddetails($id)
    { 
        $uid = $this->session->userdata('userId');
        $user = $this->userModel->getuserdetailbyid($uid); 
        $usercard = $this->modd->getUserCardDetailsById($id);
        
        $this->view("admin/users/usercard-details", ['users' => $user,'usercard' => $usercard]);
      
    }
    public function postcardactive()
    {
        $userId = $this->session->userdata('userId');
        $card_number = $this->input->post('card_number');
        $amount = $this->input->post('amount');
        $payment_form = $this->input->post('payment_form');
        $cardmember = $this->userModel->getuserdetailbycard($card_number);
        $timestamp = date("Y-m-d H:i:s");
        $franchaise = $this->userModel->getuserdetailbyid($userId);
        if (!empty($cardmember)) {
            if ($cardmember->card_status == 'inactive') {
                if ($payment_form == 'own_wallet') {
                    if ($franchaise->wallet >= $amount) {
                        // $status['wallet'] = $franchaise->wallet - $amount;
                        $status['userId'] = $cardmember->id;
                        $status['card_status'] = 'active';
                        $this->userModel->updateUser($status);
                        $wallet['wallet'] = $franchaise->wallet - $amount;
                        $wallet['userId'] = $userId;
                        $this->userModel->updateUser($wallet);
                        $insertData['transRefDoc'] = '';
                        $key = rand(100000, 999999);
                        $insertData['transaction_id'] = $key;
                        $insertData['status'] = "approved";
                        $insertData['transType'] = 'card_active';
                        $insertData['amount'] = $amount;
                        $insertData['createdBy'] = $this->session->userdata('userId');
                        $insertData['vendor_id'] = 0;
                        $insertData['userId'] = $cardmember->id;
                        $this->transectionModel->createTransaction($insertData);
                        logTransaction($wallet['userId'], $status['userId'], 'Debited', $amount, $wallet['wallet'], $timestamp, $insertData['transaction_id'], true);
                        
                        $mailData = array(
                            'name' => $cardmember->firstName,
                            'email' => $cardmember->email,
                            'cardnumber' => $cardmember->cardnumber
                        );
                        $this->sendMail($cardmember->email, 'Card Active', $mailData, 'card_active');
                        $mailData = array(
                            'name' => $franchaise->firstName,
                            'email' => $franchaise->email,
                            'amount' => $amount,
                            'msg' => 'Your ' . $amount . ' has been debited to activated card (' . $card_number . ') from your wallet. Your available balence is ' . $wallet['wallet'] . ''
                        );
                        $this->sendMail($franchaise->email, 'Payment Debited', $mailData, 'paymentactive');
                        $this->session->set_flashdata('success', 'Card has been activate successfully');
                    } else {
                        $this->session->set_flashdata('error', 'Have no money in your wallet. Please check your wallet.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Card already active.');
            }
        } else {
            $this->session->set_flashdata('error', 'Card number not exist');
        }
        redirect('admin/cardactive');
    }
    public function addfund()
    {


        $id = $this->session->userdata('userId');
        $user = $this->db->get_where('users', array('id' => $id));
        $data = $user->result();
        $alloffers = $this->offerModel->getAllfOffers(); 
        $this->view("admin/users/payment", ['user' => $data, 'alloffers' => $alloffers]);
    }
    public function addtransferfund()
    {
        $id = $this->session->userdata('userId');
        $user = $this->db->get_where('users', array('id' => $id));
        $data = $user->result();
        $alloffers = $this->offerModel->getAllCOffers();
        $this->view("admin/users/transferfund", ['user' => $data, 'alloffers' => $alloffers]);
    }
    public function withdrawList()
    {
        $search = $this->input->post('search');
        $withdrawlist = $this->transectionModel->withdrawhistoryDeails($search);
        $this->view("admin/users/withdrawList", ['withdrawlist' => $withdrawlist]);
    }
    public function withdraw()
    {
        $id = $this->session->userdata('userId');
        $demat = $this->transectionModel->dematamount($id);
        $withdraw = $this->transectionModel->withdrawamount($id);
        $bonus = $this->transectionModel->bonusamount($id);

        if (!empty($demat)) {
            $withdrawamount = (!empty($withdraw)) ? $withdraw[0]['amount'] : 0;
            $bonusamount = (!empty($bonus)) ? $bonus[0]['amount'] : 0;
            $amount = ($demat[0]['amount'] + $bonusamount) - $withdrawamount;
        } else {
            $amount = 0;
        }

        $this->view("admin/users/customer-withdraw", ['amount' => $amount]);
    }
    public function approvemodal()
    {
        $transaction = $this->input->post('transaction');

        $transaction = $this->db->get_where('transactions', array('id' => $transaction));
        $data = $transaction->result();
        echo json_encode($data);
        die;
    }
    public function adddocument()
    {
        $config = array(
            array(
                'field'   => 'transRefNo',
                'label'   => 'Payment Reference No',
                'rules'   => 'required'
            ),
        );

        if (empty($_FILES['transRefDoc']['name'])) {
            array_push($config, array(
                'field'   => 'transRefDoc',
                'label'   => 'Payment Reference Upload',
                'rules'   => 'required'
            ));
        }
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            //echo validation_errors();
            $this->session->set_flashdata('error', 'Something is wrong');
            redirect('users/addfund');
        } else {


            // define('UPLOAD_DIR', 'uploads/');
            $image_name = $_FILES['transRefDoc']['name'];
            $target_file = "./uploads/" . $image_name;
            move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);
            //$img = $_POST['transRefDocs'];

            // $imgss = str_replace('uploads/', '', $file);
            //$success = file_put_contents($file, $data);
            $updatedata['transRefDoc'] = $image_name;
            $updatedata['transRefNo'] = $this->input->post('transRefNo');
            $updatedata['transction_id'] = $this->input->post('transction_id');
            $user = $this->transectionModel->getUser($this->input->post('transction_id'));


            $this->transectionModel->updatedocument($updatedata);
            $transaction = $this->transectionModel->gettransactionbyId($this->input->post('transction_id'));
            $mailData = array(
                'name' => $user[0]->firstName,
                'email' => $user[0]->email,
                'amount' => $transaction[0]->amount,
                'msg' => 'Your ' . $transaction[0]->amount . ' ' . ucfirst($transaction[0]->transType) . ' has been successfully'
            );
            $this->sendMail($user[0]->email, 'Payment Approved', $mailData, 'paymentactive');
            $this->session->set_flashdata('success', 'Withdraw document has been added successfully');
            redirect('users/withdrawList');
        }
    }
    public function addbonus()
    {
        $transaction = $this->db->select('SUM(transactions.amount) as total_amount,transactions.userId')->from('transactions')->where('transType', 'demat')->where('status', 'approved')->group_by('transactions.userId')->get();
        $transaction = $transaction->result_array();
        $setting = $this->modd->setting();
        $permonth = $setting[0]['per_month'];
        foreach ($transaction as $trans) {
            $sum = $trans['total_amount'];
            $bonus = (($permonth / 100) * $sum);
            $insertData['transType'] = 'bonus';
            $insertData['amount'] = $bonus;
            $insertData['userId'] = $trans['userId'];
            $insertData['status'] = 'approved';
            $insertData['createdBy'] = $trans['userId'];
            $this->transectionModel->createTransaction($insertData);
        }
    }
    public function dematList()
    {
        $search = $this->input->post('search');
        $dematlist = $this->transectionModel->demathistoryDeails($search);
        $this->view("admin/users/dematList", ['dematlist' => $dematlist]);
    }

    public function customerPayment()
    {
        $alloffers = $this->offerModel->getAllCOffers();
        $this->view("admin/users/customer-payment",['alloffers' => $alloffers]);
    }
    public function addvendorfund()
    {
        $config = array(
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'transRefNo',
                'label'   => 'Payment Reference No',
                'rules'   => 'required'
            ),
        );

        if (empty($_FILES['transRefDoc']['name'])) {
            array_push($config, array(
                'field'   => 'transRefDoc',
                'label'   => 'Payment Reference Upload',
                'rules'   => 'required'
            ));
        }
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            //echo validation_errors();
            $this->session->set_flashdata('error', 'Something is wrong');
            redirect('users/addfund');
        } else {
            $insertData = $_POST;

            // define('UPLOAD_DIR', 'uploads/');
            if($_FILES['transRefDoc']['name'] != ''){
                $image_name = $_FILES['transRefDoc']['name'];
                $target_file = "./uploads/" . $image_name;
                move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);
                $insertData['transRefDoc'] = $image_name;
            } else {
                $insertData['transRefDoc'] = '';
            }
            //$img = $_POST['transRefDocs'];

            // $imgss = str_replace('uploads/', '', $file);
            //$success = file_put_contents($file, $data);
            

            $insertData['status'] = "pending";
            $insertData['transType'] = $_POST['transType'];
            $insertData['createdBy'] = $this->session->userdata('userId');
            $insertData['userId'] = $this->input->post('vuserId');


            $this->transectionModel->createTransaction($insertData);
           
            if($insertData['cashback_amount'] != ''){
                $insertData['user_type'] = "vendor";
                $this->cashbackModel->createCashback($insertData);
            }
            
            // $users = $this->modd->getUserDetails($this->input->post('vuserId'));

            //         $wallet = $users['0']->wallet + $this->input->post('amount');
            //         $status['wallet'] = $wallet;
            //         $status['userId'] = $this->input->post('vuserId');
            //         $this->modd->updateUser($status);
            // if ($this->session->userdata('role') === "superAdmin") {
            //     $insertData['transType'] = "deposite";
            //     $this->transectionModel->createTransaction($insertData);
            // } else {
            //     $insertData['userId'] = $this->session->userdata('userId');
            //     $insertData['transType'] = "deposite";
            //     $this->transectionModel->createTransaction($insertData);
            // }
            $this->session->set_flashdata('success', 'Fund has been added successfully');
            redirect('users/addfund');
        }
    }
    public function addcustomerfund()
    {
        $config = array(
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'transRefNo',
                'label'   => 'Payment Reference No',
                'rules'   => 'required'
            ),
        );

        if (empty($_FILES['transRefDoc']['name'])) {
            array_push($config, array(
                'field'   => 'transRefDoc',
                'label'   => 'Payment Reference Upload',
                'rules'   => 'required'
            ));
        }
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            //echo validation_errors();
            $this->session->set_flashdata('error', 'Something is wrong');
            redirect('users/customerPayment');
        } else {
            $insertData = $_POST;

            // define('UPLOAD_DIR', 'uploads/');
            $image_name = $_FILES['transRefDoc']['name'];
            $target_file = "./uploads/" . $image_name;
            move_uploaded_file($_FILES['transRefDoc']['tmp_name'], $target_file);
            //$img = $_POST['transRefDocs'];

            // $imgss = str_replace('uploads/', '', $file);
            //$success = file_put_contents($file, $data);
            $insertData['transRefDoc'] = $image_name;

            $insertData['status'] = "pending";
            $insertData['transType'] = $_POST['transType'];
            $insertData['createdBy'] = $this->session->userdata('userId');
            $insertData['userId'] = $this->input->post('userId');


            $this->transectionModel->createTransaction($insertData);
            if($insertData['cashback_amount'] != ''){
                $insertData['user_type'] = "customer";
                $this->cashbackModel->createCashback($insertData);
            }

            $this->session->set_flashdata('success', 'Fund has been added successfully');
            redirect('users/customerPayment');
        }
    }
    public function withdrawcustomer()
    {
        $config = array(
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            ),
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            //echo validation_errors();
            $this->session->set_flashdata('error', 'Something is wrong');
            redirect('users/withdraw');
        } else {
            $insertData = $_POST;
            $insertData['status'] = "pending";
            $insertData['createdBy'] = $this->session->userdata('userId');
            $this->transectionModel->createTransaction($insertData);
            $this->session->set_flashdata('success', 'Withdraw request send sucessfully. Please wait for 72 working hours.');
            redirect('users/withdraw');
        }
    }
    public function processTransaction() {
        //$currentUserId = $this->session->userdata('userId');
        //$currentUserId = 98;
        $userrole = $this->session->userdata('role');
        $this->db->select('id')->from('users');
        $this->db->where('status', 'active');
        $this->db->where('role', 'vendor');
        $data = $this->db->get();
        $users = $data->result();

        // $userrole = $this->session->userdata('role');
        // $this->db->select('*')->from('users')
        // ->join('transactions', 'transactions.userId = users.id', 'left');
        //$this->db->group_start();
       // $this->db->where('transactions.transType', 'deposite')->or_where('transactions.transType', 'card_active')->or_where('transactions.transType', 'registration')->or_where('transactions.transType', 'vendor_active')->group_end();
        //$this->db->where('transactions.transType =!', 'payout');

        // if ($userrole == "vendor") {
        //     $this->db->where('transactions.createdBy', $currentUserId);
        //     $this->db->group_start();
        //     $this->db->where('transactions.userId', $currentUserId);
        //     $this->db->or_where('transactions.transType !=', 'registration');
        //     $this->db->group_end();
            
        // }
        // $this->db->group_start();
        //     $this->db->where('transactions.createdBy !=', 'transactions.userId');
        //     $this->db->where('transactions.transType', 'registration');
        //     $this->db->group_end();
        //createdBy = 98 And NOT (userId != 98 And transType = 'registration');
        // $this->db->where('transactions.status', 'approved');
        // $this->db->where('users.role', 'vendor');
        // $this->db->where('users.status', 'active');
    // if ($userrole == "superAdmin") {
    //    $sql = "SELECT * FROM users left join `transactions` on transactions.userId = users.id where transactions.transType != 'payout' and  users.status = 'active' and transactions.status='approved' and NOT (transactions.createdBy != transactions.userId and transactions.transType = 'registration')";
    // }
    foreach($users as $u){
        $currentUserId = $u->id;
        if ($userrole == "vendor") {
            $sql = "SELECT * FROM users left join `transactions` on transactions.createdBy = users.id where transactions.transType != 'payout' and users.role = 'vendor' and users.status = 'active' and transactions.status='approved' and transactions.createdBy = $u->id And NOT (transactions.userId != $u->id And transactions.transType = 'registration')";
        }
     
       //$data = $this->db->order_by("transactions.id", "desc");
       $query = $this->db->query($sql);
        $transaction = $query->result();
        
    //    $data = $this->db->get();
    //    $transaction = $data->result();
        $newBalance = 0;
        foreach($transaction as $trans){
            // if($trans->userId=="132"){
            //     $transactionType = 'Credited';
            //     $newBalance = $newBalance + $trans->amount;
            // }
            // if($trans->transType=="card_active" && $trans->role=="customer"){
            //     $transactionType = 'Credited';
            //     $newBalance = $newBalance + $trans->amount;
            // }
            // else {
                if($trans->transType=="deposite" || $trans->transType=="registration"){
                    $transactionType = 'Credited';
                    $newBalance = $newBalance + $trans->amount;
                }
                if($trans->transType=="vendor_active" || $trans->transType=="card_active" || $trans->transType=="csp_registration"){
                    $transactionType = 'Debited';
                    $newBalance = $newBalance - $trans->amount;
                } 
            //}
            if($trans->transType=="card_active" || $trans->transType=="vendor_active"){ 
                $transaction = $trans->transaction_id; 
            } else {
                 $transaction = $trans->transRefNo; 
            }
           
            try {
                // Update user balance in database (example code, adjust as needed)
                // $this->db->where('user_id', $userId)->update('users', ['balance' => $newBalance]);
    
                // Log the transaction with amount change
                logTransaction($currentUserId, $trans->userId, $transactionType, $trans->amount, $newBalance, $trans->createdAt, $transaction, true);
    
            } catch (Exception $e) {
                logTransaction($currentUserId, $trans->userId, 'error', 0, $newBalance, $trans->createdAt, '', true);
            }
        }
        // Assume $currentBalance is fetched from the database
       // $currentBalance = 1000.00;

        // Calculate the new balance after the transaction
        //$newBalance = $currentBalance + $amount;

    }
    }
    public function payHistory($rowno = 0)
    {
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $currentUserId = $this->session->userdata('userId');
        $users = $this->userModel->dashbordUserDetails($currentUserId);
       
        $transaction = $this->transectionModel->transHistory();


         // All records count
         
       
         $allcount = count($transaction);
         // Get records
         $transaction_record = $this->transectionModel->transHistoryDeails($rowno, $rowperpage);
         
         //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
         $config['base_url'] = base_url() . 'users/payHistory';
         $config['use_page_numbers'] = TRUE;
         $config['total_rows'] = $allcount;
         $config['per_page'] = $rowperpage;
 
 
         $this->pagination->initialize($config);
 
         $data['pagination'] = $this->pagination->create_links();
         $data['result'] = $transaction_record;
         $data['row'] = $rowno;
         $data['alldata'] = $transaction;
         $data['amount'] = $users[0]->wallet;
        //$this->processTransaction();
       // print_r($transaction); die;
        // $data['result'] = $transaction;
        // $data['amount'] = $users;
       
        $this->view('admin/users/transactionHistory',['users' => $data]);
    }
    public function payemntHistory($rowno = 0)
    {
        
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $currentUserId = $this->session->userdata('userId');
        $users = $this->userModel->dashbordUserDetails($currentUserId);
        // $users = $this->transectionModel->historyDeails($userrole, $search);
        // print_r($users);die;
        // echo "test";



        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->transectionModel->counthistoryDeails($userrole, $search);
        // Get records
        $customer_record = $this->transectionModel->historyDeails($userrole, $search, $rowno, $rowperpage);
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);

        $allcustomer_record = $this->transectionModel->allhistoryDeails($userrole, $search);
        $config['base_url'] = base_url() . 'users/payemntHistory';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $customer_record;
        $data['row'] = $rowno;
        $data['amount'] = $users;
        $data['alldata'] = $allcustomer_record;
        $this->view('admin/users/paymentList', ['users' => $data]);
    }
    public function franTransactionHistory($rowno = 0)
    {
        $search = $this->input->post('table_search');
        $userrole = $this->session->userdata('role');
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        } 
        // all transaction
       $allAmount = $this->transectionModel->totalTrasactionVendorActive();
        // All records count
        $allTransaction = $this->transectionModel->vendorActivehistory($userrole, $search);
       
        $allcount = count($allTransaction);
        // Get records
        $transaction_record = $this->transectionModel->vendorActivehistoryDeails($userrole, $search, $rowno, $rowperpage);
        
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        $config['base_url'] = base_url() . 'users/franTransactionHistory';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $transaction_record;
        $data['row'] = $rowno;
        $data['alldata'] = $allTransaction;
        $data['amount'] = $allAmount;
        
        $this->view('admin/transaction/vendor-active-history', ['data' => $data,'search' => $search]);
    }
    public function userPaymentStatusUpdate()
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
                $user = $this->transectionModel->getUser($userId);

                if (count($user) > 0) {

                    if ($status === 'approved') {
                        $transaction = $this->transectionModel->gettransactionbyId($userId);
                        $pending_status = "pending";


                        if ($transaction[0]->status == $pending_status) {


                           $this->transectionModel->userPaymentStatusUpdate($userId, $status);

                            $users = $this->modd->getUserDetails($user[0]->userId);
                            $vendors = $this->modd->getUserDetails($transaction[0]->vendor_id);
                            $timestamp = date("Y-m-d H:i:s");
                            if ($transaction[0]->vendor_id != '') {
                                $wallet = $users[0]->wallet + $transaction[0]->amount;
                                $wallets['wallet'] = $wallet;
                                $wallets['userId'] = $user[0]->userId;

                                $this->userModel->updateUser($wallets);
                                logTransaction($wallets['userId'], $wallets['userId'], 'Credited', $transaction[0]->amount, $wallet, $timestamp, $transaction[0]->transRefNo, true);

                                $wallet = $vendors['0']->wallet - $transaction[0]->amount;
                                $wallets['wallet'] = $wallet;
                                $wallets['userId'] = $transaction[0]->vendor_id;
                                $this->userModel->updateUser($wallets);
                                logTransaction($transaction[0]->createdBy, $wallets['userId'], 'Debited', $transaction[0]->amount, $wallet, $timestamp, $transaction[0]->transRefNo, true);

                            } else {

                                $wallet = $users['0']->wallet + $transaction[0]->amount;
                                $wallets['wallet'] = $wallet;
                                $wallets['userId'] = $user[0]->userId;
                                 
                                $this->userModel->updateUser($wallets);
                                logTransaction($wallets['userId'], $wallets['userId'], 'Credited', $transaction[0]->amount, $wallet, $timestamp, $transaction[0]->transRefNo, true);

                            }
                            
                            $mailData = array(
                                'name' => $user[0]->firstName,
                                'email' => $user[0]->email,
                                'amount' => $transaction[0]->amount,
                                'msg' => 'Your ' . $transaction[0]->amount . ' ' . ucfirst($transaction[0]->transType) . ' has been successfully'
                            );
                           $this->sendMail($user[0]->email, 'Payment Approved', $mailData, 'paymentactive');
                        } else {
                            $this->session->set_flashdata('Error', 'Payment has been already approved');
                        }
                    } else {
                        $this->transectionModel->userPaymentStatusUpdate($userId, $status);
                        $mailData = array(
                            'name' => $user[0]->firstName,
                            'email' => $user[0]->email,
                            'amount' => $transaction[0]->amount,
                            'msg' => 'Your ' . ucfirst($transaction[0]->transType) . ' has been Rejected. Please contact admin'
                        );
                        $this->sendMail($user[0]->email, 'Payment Rejected', $mailData, 'paymentreject');
                    }
                    $this->session->set_flashdata('success', 'Payment has been updated successfully');
                    // echo json_encode(['status' => true, 'message' => 'User has been updated successfully']);

                } else {
                    echo "user not found";
                    $this->session->set_flashdata('Error', 'User not found');
                    // echo json_encode(['status' => false, 'message' => 'User not found']);
                }
            }
        } else {
            echo json_encode(['status' => false, 'error' => 'Unauthorized access']);
        }
    }
   

    public function tree()
    {
        $vendors = $this->userModel->getVendors();

        $this->view("admin/users/tree_new", ['db' => $this->db, 'vendors' => $vendors]);
        // $this->view("admin/users/treeView", ['db' => $this->db]);
    }
    public function adminusers()
    {
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {

            $to = $this->input->get('to');
            $from = $this->input->get('from');
            if ((strtotime($to) - strtotime($from)) > 0) {
                $others['to'] = $to;
                $others['from'] = $from;
            } else {
                return  $this->view('admin/users/admin_users', ['vendors' => [], 'error' => 'From date must be less than or equal to To date']);
            }
        }

        if (isset($_GET['q'])) {
            $vendors = $this->userModel->getVendors($_GET['q'], $others);
        } else {
            $vendors = $this->userModel->getVendors('', $others);
        }

        $this->view("admin/users/admin_users", ['db' => $this->db, 'vendors' => $vendors]);
        // $this->view("admin/users/treeView", ['db' => $this->db]);
    }
    public function adminUserPdf()
    {

        $to = $this->input->get('to');
        $from = $this->input->get('from');
        if ((strtotime($to) - strtotime($from)) > 0) {
            $others['to'] = $to;
            $others['from'] = $from;
        } else {
        }

        $data['siswa'] = $this->userModel->getUsers(null, 1, 100, $others);

        // $data['siswa'] = $this->userModel->adminUserPdfModel($from, $to);





        $this->load->view('admin/users/adminUserPdf', $data);

        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("Admin_User_List" . rand(10, 1000) . ".pdf", array("Attachment" => 1));
    }

    public function userlistPdf()
    {
        $others = ['trans' => true];
        $to = $this->input->get('to') . ('+1 days');
        $from = $this->input->get('from');

        if ((strtotime($to) - strtotime($from)) > 0) {

            $others['to'] = $to;
            $others['from'] = $from;
        } else {
        }

        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->post('table_search');
        $data['siswa'] = $this->userModel->getAddUser($currentUserId, $search, $others);

        // $data['siswa'] = $this->userModel->adminUserPdfModel($from, $to);





        $this->load->view('admin/users/userPdf', $data);

        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("User_List_pdf" . rand(10, 1000) . ".pdf", array("Attachment" => 1));
    }

    public function getUserListLevelWise()
    {


        // $this->userModel->updateLevels();
        $activeVendors = $this->userModel->getActiveVendors();
        if (count($activeVendors) > 0) {
            for ($i = 0; $i < count($activeVendors); $i++) {

                $data = [];
                $this->userModel->getLevels($activeVendors[$i]->id, $data);

                $leftChild = 0;

                $rightChild = 0;
                $child = 0;
                $level = 0;
                $this->userModel->getChildCount($activeVendors[$i]->leftChild, $leftChild,  $child);
                $this->userModel->getChildCount($activeVendors[$i]->rightChild, $rightChild,  $child);
                // $this->findHeight($result[$i]->id);
                // echo "<pre>";
                // print_r($data);
                // echo "leftChild=" . $leftChild;
                // echo "rightChild=" . $rightChild;
                $calculatedLevel = 0;
                $actualCompletedLevel = 0;
                // echo "cal level=" . $calculatedLevel;
                if ($data['rd'] > $data['ld']) {
                    $calculatedLevel = $data['ld'];
                    if ($calculatedLevel >= 1) {
                        $maxChild = $calculatedLevel * 2 - 1;
                        if ($maxChild <= $leftChild && $maxChild <= $rightChild) {
                            $actualCompletedLevel = $calculatedLevel;
                        } else {
                            $actualCompletedLevel = $calculatedLevel - 1;
                        }
                    } else {
                    }
                } else {
                    $calculatedLevel = $data['rd'];
                    if ($calculatedLevel >= 1) {
                        $maxChild = $calculatedLevel * 2 - 1;
                        if ($maxChild <= $leftChild && $maxChild <= $rightChild) {
                            $actualCompletedLevel = $calculatedLevel;
                        } else {
                            $actualCompletedLevel = $calculatedLevel - 1;
                        }
                    }
                }

                $levelData = [
                    'level' => $actualCompletedLevel,
                    'ld' => $data['ld'],
                    'rd' => $data['rd'],
                    'regId' => $data['regId'],
                    'h' => $data['h'],
                    'lchild' => $leftChild,
                    'rchild' => $rightChild
                ];
                echo "<pre>";
                print_r($levelData);
                echo "</pre>";
                $isExist = $this->userLevel->isExist($activeVendors[$i]->id);
                // $this->levelCompleteBonus($activeVendors[$i]->id, $isExist, (object)$levelData);
                $this->levelMatchingBonus($activeVendors[$i]->id, $isExist, (object)$levelData);
                if (count($isExist) > 0) {
                    $this->userLevel->update($activeVendors[$i]->id, $levelData);
                } else {
                    $this->userLevel->add($activeVendors[$i]->id, $levelData);
                }
            }
        }
    }
    public function levelCompleteBonus($id, $old, $new)
    {
        if (count($old) > 0) {
            $old = $old[0];
            if ($old->level < $new->level) {
                for ($i = 0; $i < $new->level - $old->level; $i++) {
                    $clevel = (int)($old->level + $i + 1);
                    $type = "LEVEL BONUS";
                    $amount = 100;
                    $reason = "Level Bonus for " . $clevel;
                    $this->singleCommission($id, $type, $amount, $reason, $clevel);
                }
            }
        } else {
            for ($i = 0; $i < $new->level; $i++) {
                $clevel = (int)($i + 1);
                $type = "LEVEL BONUS";
                $amount = 100;
                $reason = "Level Bonus for " .  $clevel;
                $this->singleCommission($id, $type, $amount, $reason,  $clevel);
            }
        }
    }
    public function levelMatchingBonus($id, $old, $new)
    {
        $type = "LEVEL MATCHING BONUS";
        $reason = "DIRECT FRANCHISE MATCHING BONUS for ";
        if (count($old) > 0) {
            $old = $old[0];
            $oldLevelMatch = min($old->ld, $old->rd);
            $newLevelMatch = min($new->ld, $new->rd);
            if ($oldLevelMatch < $newLevelMatch) {
                for ($i = 0; $i < $newLevelMatch - $oldLevelMatch; $i++) {

                    $clevel = (int)($oldLevelMatch + $i + 1);
                    $amount = 100;
                    $reason1 = $reason . $clevel;
                    $this->singleCommission($id, $type, $amount, $reason1, $clevel);
                }
            }
        } else {
            $newLevelMatch = min($new->ld, $new->rd);
            for ($i = 0; $i < $newLevelMatch; $i++) {

                $clevel = (int)($i + 1);
                $amount = 100;
                $reason1 = $reason .  $clevel;
                $this->singleCommission($id, $type, $amount, $reason1,  $clevel);
            }
        }
    }

    public function getVendorCommission()
    {
        // $result = $this->transectionModel->getTotalRegistrationList('registration');
        $result = $this->userModel->activeUserList('vendor');
        $type = "MEMBERSHIP AND LEVEL MATCHING";
        // print_r($result);
        // die;
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $reason = $result[$i]->regId;
                if (!$result[$i]->parentNode) {

                    $commission = $this->m_commissionModel->get($type, 1);
                    $superAdmin = $this->userModel->getSuperAdminId();

                    $this->commissionModel->commision($superAdmin[0]->id, [
                        'type' => $type,
                        'amount' => $commission[0]->commission,
                        'reason' => $reason,
                        'isPayout' => false,
                        'reasonId' => $result[$i]->id
                    ]);
                    echo "done";
                } else {
                    $level = 1;
                    $this->logCommissionForMembershipAdd($result[$i]->parentNode, $level, $type, $reason, $result[$i]->id);
                }
            }
        }
    }
    public function getCardCommission()
    {
        // $result = $this->transectionModel->getTotalRegistrationList('registration');
        $result = $this->userModel->activeCardList('customer');
        $type = "MEMBERSHIP AND LEVEL MATCHING";
        // print_r($result);
        // die;
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $reason = $result[$i]->regId;
                if (!$result[$i]->parentNode && !$result[$i]->createdBy) {

                    $commission = $this->m_commissionModel->get($type, 1);
                    $superAdmin = $this->userModel->getSuperAdminId();

                    $this->commissionModel->commision($superAdmin[0]->id, [
                        'type' => $type,
                        'amount' => $commission[0]->commission,
                        'reason' => $reason,
                        'isPayout' => false,
                        'reasonId' => $result[$i]->cardnumber
                    ]);
                    echo "done";
                } else {
                    $level = 1;
                    $createdBy = $result[$i]->role == 'customer' ? $result[$i]->createdBy : $result[$i]->parentNode;
                    $this->logCommissionForCardAdd($createdBy, $level, $type, $reason, $result[$i]->cardnumber);
                }
            }
        }
    }
    public function commissionSentToPayout(){
        $this->commissionModel->commissionGoToPayout();
    }
    public function logCommissionForMembershipAdd($id, $level, $type, $reason, $reasonId)
    {
        if (!$id)
            return;
        $user = $this->userModel->getUserById($id);
        $commission = $this->m_commissionModel->get($type, $level);
        $insertData = [
            'type' => $type,
            'amount' => $commission[0]->commission,
            'reason' => $level == 1 ? "DIRECT MEMBERSHIP REFFERAL BONUS for " . $reason : "LEVEL" . $level . " MEMBERSHIP BONUS for " . $reason,
            'isPayout' => false,
            'reasonId' => $reasonId
        ];
        echo "<pre>";
        print_r($insertData);
        echo $level;
        echo "</pre>";
        $this->commissionModel->commision($id, $insertData);
        $level++;
        $this->logCommissionForMembershipAdd($user[0]->parentNode, $level, $type, $reason, $reasonId);
    }
    public function logCommissionForCardAdd($id, $level, $type, $reason, $reasonId)
    {
        if (!$id)
            return;
        $user = $this->userModel->getUserById($id);
        $commission = $this->m_commissionModel->get($type, $level);
        $insertData = [
            'type' => $type,
            'amount' => $commission[0]->commission,
            'reason' => $level == 1 ? "DIRECT CARD MEMBERSHIP REFFERAL BONUS for CARD " . $reasonId : "LEVEL" . $level . " CARD MEMBERSHIP BONUS for CARD " . $reasonId,
            'isPayout' => false,
            'reasonId' => $reasonId
        ];
        echo "<pre>";
        print_r($insertData);
        echo $level;
        echo "</pre>";
        $this->commissionModel->commision($id, $insertData);
        $level++;
        $this->logCommissionForCardAdd($user[0]->parentNode, $level, $type, $reason, $reasonId);
    }
    public function singleCommission($id, $type, $amount, $reason, $reasonId)
    {
        $user = $this->userModel->getUserById($id);

        $this->commissionModel->commision($id, [
            'type' => $type,
            'amount' => $amount,
            'reason' => $reasonId == 1 ? "DIRECT FRANCHISE MATCHING BONUS FOR LEVEL 1" : "FRANCHISE MATCHING BONUS FOR LEVEL " . $reasonId,
            'isPayout' => false,
            'reasonId' => $reasonId
        ]);
    }
    public function commissions($id,$rowno=0)
    {
        $rowperpage = 10;
        
        $filters = [
            'from' => $this->input->get('from'),
            'to' => $this->input->get('to'),
            'sr' => $this->input->get('sr')
        ];
        if($this->input->get('from') == ''){
            $url = base_url().'users/commissions/'.$id;
        } else {
            $url = base_url().'users/commissions/'.$id.'?'. http_build_query($filters);
        }
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $totalCommission = $this->commissionModel->getTotalCommission($id);
        $allcount =count( $this->commissionModel->getCommisionList($id,-1,10));
        $result = $this->commissionModel->getCommisionList($id,$rowno,$rowperpage);

        $data['pagination'] = $this->mypagination( $url,$allcount, $rowperpage, 4 );
        $data['result'] = $result;
        $data['alldata'] = $this->commissionModel->getCommisionList($id,-1,10);

       // $commissions = $this->commissionModel->getCommisionList($id);
        $this->view("admin/users/commissionList", ['data' => $data, 'user_id'=>$id, 'totalCommission' => $totalCommission]);
    }
    public function commissionspdf($id){
        $data['commissions'] = $this->commissionModel->getCommisionList($id,-1,10);
        
        $this->load->view('admin/commission/commissionspdf', $data);
         // Get output html
         $html = $this->output->get_output();
        

        // Load HTML content into Dompdf
        $this->pdf->loadHtml($html);

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $this->pdf->render();

        // Output the PDF to the browser
        $this->pdf->stream("payout.pdf", array("Attachment" => 0));
    }
    public function userWallet()
    {
        $userList = $this->userModel->activeUserList('vendor');
        $this->view("admin/users/walletlist", ['userList' => $userList]);
    }
}
