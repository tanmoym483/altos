<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('Admin_model','modd');
        $this->load->model('Nominee_model', 'nomineesModel');
        $this->load->model('UserKYC_model', 'userKycModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->library("pagination");
    }

    public function index()
    {
 
        // $page = 1;
        $search = $this->input->post('search');
        $users = $this->modd->postalCodeDetails($search);
        // print_r($users);die;
        $this->view('admin/postcodeAdd', ['users' => $users]);
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
    
    public function ifcsCodeView(){
       
         $search = $this->input->post('search');
        //   print_r( $search);die;
        $users = $this->modd->ifcscodedetails($search);
            // print_r( $users);die;
         $this->view('admin/users/ifcsCode', ['users' => $users]);
        
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
        $this->view('admin/customer_add');
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



            $fatherName = $this->input->post('fatherName');
            $motherName = $this->input->post('motherName');
            $gender = $this->input->post('gender');


            $insertData = $_POST;


            define('UPLOAD_DIR', 'uploads/');

            $img = $_POST['panDoc'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $imgss = str_replace('uploads/', '', $file);
            $success = file_put_contents($file, $data);
            $insertData['panDoc'] = $imgss;

            $img1 = $_POST['addharFrontDoc'];
            $img1 = str_replace('data:image/png;base64,', '', $img1);
            $img1 = str_replace(' ', '+', $img1);
            $data1 = base64_decode($img1);
            $file1 = UPLOAD_DIR . uniqid() . '.png';
            $imgss1 = str_replace('uploads/', '', $file1);
            $success1 = file_put_contents($file1, $data1);
            $insertData['addharFrontDoc'] = $imgss1;

            $img2 = $_POST['addharBackDoc'];
            $img2 = str_replace('data:image/png;base64,', '', $img2);
            $img2 = str_replace(' ', '+', $img2);
            $data2 = base64_decode($img2);
            $file2 = UPLOAD_DIR . uniqid() . '.png';
            $imgss2 = str_replace('uploads/', '', $file2);
            $success2 = file_put_contents($file2, $data2);
            $insertData['addharBackDoc'] = $imgss2;

            $img3 = $_POST['accountProvedDoc'];
            $img3 = str_replace('data:image/png;base64,', '', $img3);
            $img3 = str_replace(' ', '+', $img3);
            $data3 = base64_decode($img3);
            $file3 = UPLOAD_DIR . uniqid() . '.png';
            $imgss3 = str_replace('uploads/', '', $file3);
            $success3 = file_put_contents($file3, $data3);
            $insertData['accountProvedDoc'] = $imgss3;

            $img4 = $_POST['signature'];
            $img4 = str_replace('data:image/png;base64,', '', $img4);
            $img4 = str_replace(' ', '+', $img4);
            $data4 = base64_decode($img4);
            $file4 = UPLOAD_DIR . uniqid() . '.png';
            $imgss4 = str_replace('uploads/', '', $file4);
            $success4 = file_put_contents($file4, $data4);
            $insertData['signature'] = $imgss4;

            $img5 = $_POST['pic'];
            $img5 = str_replace('data:image/png;base64,', '', $img5);
            $img5 = str_replace(' ', '+', $img5);
            $data5 = base64_decode($img5);
            $file5 = UPLOAD_DIR . uniqid() . '.png';
            $imgss5 = str_replace('uploads/', '', $file5);
            $success = file_put_contents($file5, $data5);
            $insertData['pic'] = $imgss5;
            $password = generate_random_password(7);
            $insertData['password'] = $password;

            $insertData['userId'] = $this->modd->addCustomer($insertData);

            $insertData['transType'] = "deposite";
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
            redirect('admin/customer_add');
        
        }
    }
    public function customer_list(){
        $customers = $this->modd->customerlist();
        $this->view('admin/customer-list', ['customers' => $customers]);
    }
    public function customer_edit($id){
        $users = $this->modd->getUserDetails($id);
        $this->view('admin/customer-edit', ['users' => $users]);
    }
    public function postupdateCustomer(){
        $fatherName = $this->input->post('fatherName');
        $motherName = $this->input->post('motherName');
        $gender = $this->input->post('gender');


        $insertData = $_POST;
        define('UPLOAD_DIR', 'uploads/');

        $img = $_POST['panDoc'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = UPLOAD_DIR . uniqid() . '.png';
        $imgss = str_replace('uploads/', '', $file);
        $success = file_put_contents($file, $data);
        $insertData['panDoc'] = $imgss;

        $img1 = $_POST['addharFrontDoc'];
        $img1 = str_replace('data:image/png;base64,', '', $img1);
        $img1 = str_replace(' ', '+', $img1);
        $data1 = base64_decode($img1);
        $file1 = UPLOAD_DIR . uniqid() . '.png';
        $imgss1 = str_replace('uploads/', '', $file1);
        $success1 = file_put_contents($file1, $data1);
        $insertData['addharFrontDoc'] = $imgss1;

        $img2 = $_POST['addharBackDoc'];
        $img2 = str_replace('data:image/png;base64,', '', $img2);
        $img2 = str_replace(' ', '+', $img2);
        $data2 = base64_decode($img2);
        $file2 = UPLOAD_DIR . uniqid() . '.png';
        $imgss2 = str_replace('uploads/', '', $file2);
        $success2 = file_put_contents($file2, $data2);
        $insertData['addharBackDoc'] = $imgss2;

        $img3 = $_POST['accountProvedDoc'];
        $img3 = str_replace('data:image/png;base64,', '', $img3);
        $img3 = str_replace(' ', '+', $img3);
        $data3 = base64_decode($img3);
        $file3 = UPLOAD_DIR . uniqid() . '.png';
        $imgss3 = str_replace('uploads/', '', $file3);
        $success3 = file_put_contents($file3, $data3);
        $insertData['accountProvedDoc'] = $imgss3;

        $img4 = $_POST['signature'];
        $img4 = str_replace('data:image/png;base64,', '', $img4);
        $img4 = str_replace(' ', '+', $img4);
        $data4 = base64_decode($img4);
        $file4 = UPLOAD_DIR . uniqid() . '.png';
        $imgss4 = str_replace('uploads/', '', $file4);
        $success4 = file_put_contents($file4, $data4);
        $insertData['signature'] = $imgss4;

        $img5 = $_POST['pic'];
        $img5 = str_replace('data:image/png;base64,', '', $img5);
        $img5 = str_replace(' ', '+', $img5);
        $data5 = base64_decode($img5);
        $file5 = UPLOAD_DIR . uniqid() . '.png';
        $imgss5 = str_replace('uploads/', '', $file5);
        $success = file_put_contents($file5, $data5);
        $insertData['pic'] = $imgss5;

        $this->modd->updateUser($insertData);
        // $this->transectionModel->updateTransection($insertData);
        $this->nomineesModel->updateNominee($insertData);
        $this->userKycModel->updateKyc($insertData);
        $this->userBankModel->updateBankDetails($insertData);
        
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
    $this->modd->servicestatuschange($id);
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
    
   
    $this->modd->postaddserviceform($_POST,$_FILES['form']['name']);
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
    $this->modd->editformdetails($_POST);
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
