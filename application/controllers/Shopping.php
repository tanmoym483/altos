<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
       $this->load->model('Shopping_model','shoppingModel');
       $this->load->model('UserBank_model', 'userBankModel');
       $this->load->model('Admin_model','modd');
       $this->load->model('Transaction_model', 'transectionModel');
       $this->load->model('User_model', 'userModel');
        $this->load->library("pagination");
        $this->load->helper('transaction_logger');
    }
    public function add(){
        
        $this->view('admin/shopping/add');
    }
    public function product_edit($id){
        $shopProduct = $this->shoppingModel->shoppingProductlistById($id);
        $currentUserId = $this->session->userdata('userId');

        $query =$this->db->select("users.regId,users.id,shop_member.center_name")->from("users")
        ->join('shop_member','shop_member.userId = users.id')->where('shop_member.userId',$shopProduct->shop_id);
        $query =$this->db->get();
        $shopdetails = $query->row();

        $this->db->select('id,test_category')->from('shop_commision')->where('userId',$shopProduct->shop_id);
        $query = $this->db->get();
        $products = $query->result_array(); 

       // $shopProduct = $this->shoppingModel->shoppingProductlistById($id);
        $shop = $this->shoppingModel->approveshoplist();

        $this->view('admin/shopping/product-edit',[ 'shop' => $shop,'data'=> $shopProduct, 'products' => $products, 'shopdetails' => $shopdetails ]);
    }
    public function product_view($id){
        $shopProduct = $this->shoppingModel->shoppingProductlistById($id);
        $this->view('admin/shopping/product-view',[ 'data'=> $shopProduct ]);
    }
    public function addtocart(){
        $insertData = $_POST;
        $exitornot =$this->shoppingModel->cartitemexitornot($insertData['user_id'],$insertData['product_id']);
        
        if(!empty($exitornot)){
            $quantity = $exitornot->quantity + $insertData['quantity'];
           
            $updateData =  [
                'quantity' => $quantity
            ];
    
            $this->db->from('shop_cart')
                ->where('id', $exitornot->id)
                ->set(
                    $updateData
                )
                ->update();
            
        } else {
            $this->shoppingModel->postaddtocart($insertData);
        }
       
        redirect('shopping/cart');
    }
    public function cartdelete($id){
        $updateData =  [
            'status' => 'inactive'
        ];

        $this->db->from('shop_cart')
            ->where('id', $id)
            ->set(
                $updateData
            )
            ->update();
        redirect('shopping/cart');
    }
    public function updatecart(){
        $insertData = $_POST;
        $updateData =  [
            'quantity' => $insertData['quantity']
        ];

        $this->db->from('shop_cart')
            ->where('id', $insertData['cart_id'])
            ->set(
                $updateData
            )
            ->update();
        return true;
        //redirect('shopping/cart');
    }
    public function cart(){
        $currentUserId = $this->session->userdata('userId');
        $cartlist = $this->shoppingModel->getcartitem($currentUserId);
        $this->view('admin/shopping/cart',[ 'cartitems'=> $cartlist ]);
    }
    public function checkout(){
        $currentUserId = $this->session->userdata('userId');
        $cartlist = $this->shoppingModel->getcartitem($currentUserId);
        $userDetails = $this->userModel->checkUserId($currentUserId);
        $this->view('admin/shopping/checkout',[ 'cartitems'=> $cartlist, 'userdetails' => $userDetails ]);
    }
    public function product_list(){
        
        
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
       // $shopping = $this->shoppingModel->onlineShopping($rowno,$rowperpage);
        $shoppingProduct = $this->shoppingModel->shoppingProductlist($rowno,$rowperpage);

        $allcount = count( $this->shoppingModel->shoppingProductlist(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'shopping/product_list/',$allcount, $rowperpage, 3 );
        $data['result'] = $shoppingProduct;
        
        $this->view('admin/shopping/product_list', $data);
       
    }
    public function offline_product_list(){
        
        
        $rowperpage = 12;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
       // $shopping = $this->shoppingModel->onlineShopping($rowno,$rowperpage);
        $shoppingProduct = $this->shoppingModel->shoppingProductlist($rowno,$rowperpage);

        $allcount = count( $this->shoppingModel->shoppingProductlist(-1,12));
        $data['pagination'] = $this->mypagination( base_url().'shopping/offline_product_list/',$allcount, $rowperpage, 3 );
        $data['result'] = $shoppingProduct;
        
        $this->view('admin/shopping/offline-product-list', $data);
       
    }
    public function product_add(){
        $currentUserId = $this->session->userdata('userId');
        $shop = $this->shoppingModel->approveshoplist();
        
       
       // $shoppingProduct = $this->shoppingModel->shoppingProductlist($currentUserId);
        $this->view('admin/shopping/product_add',[ 'shop' => $shop ]);
    }
    public function offline_add(){
        $shop = $this->shoppingModel->approveshoplist();
        $this->view('admin/shopping/offline-link-add',['shop' => $shop]);
    }
    public function productdetails(){
        $currentUserId = $_POST['user'];
        
        $this->db->select('id,test_category')->from('shop_commision')->where('userId',$currentUserId);
        $query = $this->db->get();
       
        $tests = $query->result_array(); 
        echo json_encode($tests);
        die;
    }
    public function getregid(){
        $data = $_POST['data'];
        $query =$this->db->select("users.regId,users.id")->from("users")
        ->join('shop_member','shop_member.userId = users.id')->where('shop_member.id',$data);
        $query =$this->db->get();
        $regid = $query->result_array();
        echo json_encode($regid);
        die;
    }
    public function postaddonlineOrder(){
        $insertData = $_POST;
        $user_id = $this->session->userdata('userId');
        $query =$this->db->select("wallet")->from("users")->where('id',$user_id);
        $query = $this->db->get();
        $wallet = $query->result();
        
        if(!empty($wallet) && $wallet[0]->wallet >= $insertData['amount'] ){
            $key = 'T'.rand(1000000000, 9999999999);
            $timestamp = date("Y-m-d H:i:s");
            $insertData['transaction_id'] = $key;
            $this->shoppingModel->addShoppingOrder($insertData);
            $insertData['transRefDoc'] = '';
           
            $insertData['status'] = "approved";
            $insertData['transType'] = 'offlineshop_payment';
            $insertData['amount'] = $insertData['amount'];
            $insertData['createdBy'] = $this->session->userdata('userId');
            $insertData['vendor_id'] = 0;
            $insertData['userId'] = $this->session->userdata('userId');
            $this->transectionModel->createTransaction($insertData);
            $wallet['wallet'] = $wallet[0]->wallet - $insertData['amount'];
            $wallet['userId'] = $this->session->userdata('userId');
            $this->userModel->updateUser($wallet);
            logTransaction($insertData['userId'], $insertData['userId'], 'Debited', $insertData['amount'], $wallet['wallet'], $timestamp, $insertData['transaction_id'], true);
            
            $this->session->set_flashdata('success', 'Online shop link has been added successfully');
        } else{
            $this->session->set_flashdata('error', 'Have not enough balence');
        }
        redirect('shopping/order_list');
    }
    public function order(){
        $shop = $this->shoppingModel->approveshoplist();
        $this->view('admin/shopping/order',['shop'=> $shop]);
    }
    public function edit($id){
        $data = $this->shoppingModel->onlineShoppingById($id);
        $this->view('admin/shopping/edit',['data' => $data]);
    }
    public function offlineshopedit($id){
        $shop = $this->shoppingModel->approveshoplist();
        $data = $this->shoppingModel->offlineShoppingById($id);
        $this->view('admin/shopping/offline-shop-img-edit',['data' => $data, 'shop' => $shop]);
    }
    public function postaddonlineLink(){
        $insertData = $_POST;
        $insertData['image'] = $image_name1 = $_FILES['shopping_image']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['shopping_image']['tmp_name'], $target_file);
        $this->shoppingModel->addShopping($insertData);
        $this->session->set_flashdata('success', 'Online shop link has been added successfully');
        if($insertData['special_offer'] == 'false'){
            redirect('shopping/list');
        } else {
            redirect('dashboard');
        }
        
    }
    public function postaddofflineLink(){
        $insertData = $_POST;
        $insertData['image'] = $image_name1 = $_FILES['shopping_image']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['shopping_image']['tmp_name'], $target_file);
        $this->shoppingModel->addOfflineShopping($insertData);
        $this->session->set_flashdata('success', 'Offline shop link has been added successfully');
        redirect('shopping/offlinelist');
    }
    public function list($rowno=0){
        $rowperpage = 9;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
        $shopping = $this->shoppingModel->onlineShopping($rowno,$rowperpage);
       
        $allcount =count( $this->shoppingModel->onlineShopping(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'shopping/list/',$allcount, $rowperpage, 3 );
        $data['result'] = $shopping;
        
        $this->view('admin/shopping/list', $data);
    }
    public function order_list($rowno=0){
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
        $shopping = $this->shoppingModel->onlineShoppingOrder($rowno,$rowperpage);
       
        $allcount =count( $this->shoppingModel->onlineShoppingOrder(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'shopping/order_list/',$allcount, $rowperpage, 3 );
        $data['result'] = $shopping;
        
        $this->view('admin/shopping/order-list', $data);
    }
    public function offlinelist($rowno=0){
        $rowperpage = 9;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
        $shopping = $this->shoppingModel->offlineShopping($rowno,$rowperpage);
       
        $allcount =count( $this->shoppingModel->offlineShopping(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'shopping/offlinelist/',$allcount, $rowperpage, 3 );
        $data['result'] = $shopping;
        
        $this->view('admin/shopping/offline-shop-img', $data);
    }
    public function postaddofflineProductAdd(){
        $insertData = $_POST;
        
        if(isset($insertData['test_name'])){
            $i=0;
            foreach($insertData['test_name'] as $cdata){
                
                    $testdata['product_image'] = $image_name1 = $_FILES['test_name']['name'][$i]['product_image'];
                    $target_file = "./uploads/".$image_name1;
                    move_uploaded_file($_FILES['test_name']['tmp_name'][$i]['product_image'], $target_file);
               
                

                $testdata['shop_id'] = $insertData['shop_id'];
                $testdata['product_category'] = $cdata['product_category'];
                $testdata['product'] = $cdata['product'];
                $testdata['product_brand'] = $cdata['product_brand'];
                $testdata['product_model'] = $cdata['product_model'];
                $testdata['net_quantity'] = $cdata['net_quantity'];
                $testdata['description'] = $cdata['description'];
                
                $testdata['product_mrp'] = $cdata['product_mrp'];
                $testdata['product_selling_price'] = $cdata['product_selling_price'];
                $testdata['product_offer'] = $cdata['product_offer'];
                $testdata['units'] = $cdata['units'];
                $testdata['quantity'] = $cdata['quantity'];
                $testdata['expired_month'] = $cdata['expired_month'];
                
               //print_r($testdata); 
                $this->shoppingModel->addShopProduct($testdata);
            $i++; }
        }
        redirect('shopping/product_list');
    }
    public function postaddofflineProductupdate(){
        $insertData = $_POST;
       
        $shop = $this->shoppingModel->shoppingProductlistById($insertData['id']);
       
        if(isset($insertData['test_name'])){
            $i=0;
            foreach($insertData['test_name'] as $cdata){
               
                if($_FILES['test_name']['name'][$i]['product_image'] != ''){
                    $testdata['product_image'] = $image_name1 = $_FILES['test_name']['name'][$i]['product_image'];
                    $target_file = "./uploads/".$image_name1;
                    move_uploaded_file($_FILES['test_name']['tmp_name'][$i]['product_image'], $target_file);
                } else {
                    $testdata['product_image'] = $shop->product_image;
                }

                $testdata['shop_id'] = $insertData['shop_id'];
                $testdata['product_category'] = $cdata['product_category'];
                $testdata['product'] = $cdata['product'];
                $testdata['product_brand'] = $cdata['product_brand'];
                $testdata['product_model'] = $cdata['product_model'];
                $testdata['net_quantity'] = $cdata['net_quantity'];
                $testdata['description'] = $cdata['description'];
                
                $testdata['product_mrp'] = $cdata['product_mrp'];
                $testdata['product_selling_price'] = $cdata['product_selling_price'];
                $testdata['product_offer'] = $cdata['product_offer'];
                $testdata['units'] = $cdata['units'];
                $testdata['quantity'] = $cdata['quantity'];
                $testdata['expired_month'] = $cdata['expired_month'];
                $testdata['id'] = $insertData['id'];
                
               //print_r($testdata); 
                $this->shoppingModel->updateShopProduct($testdata);
            $i++; }
        }
        redirect('shopping/product_list');
    }
    public function productdelete($id){
        $this->shoppingModel->productstatusUpdate($id);
        redirect('shopping/product_list');
    }
    public function imgdelete($id){
        $this->shoppingModel->statusUpdate($id);
        redirect('shopping/list');
    }
    public function offlineimgdelete($id){
        $this->shoppingModel->offlinestatusUpdate($id);
        redirect('shopping/offlinelist');
    }
    public function shop_add()
    {
        $this->view('admin/shopping/offlineshop_add',['districtlist'=>$this->districtlist()]);
    }
    public function editShopping(){
        $insertData = $_POST;
        $data = $this->shoppingModel->onlineShoppingById($insertData['id']);
        
        if(!empty($_FILES['shopping_image']['name'])){
            $insertData['image'] = $image_name1 = $_FILES['shopping_image']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['shopping_image']['tmp_name'], $target_file);
        } else {
            $insertData['image'] = $data->image;
        }
        $this->shoppingModel->updateShopping($insertData);
        $this->session->set_flashdata('success', 'Online shop link has been added successfully');
        redirect('shopping/list');
    }
    public function posteditofflineLink(){
        $insertData = $_POST;
        $data = $this->shoppingModel->offlineShoppingById($insertData['id']);
        
        if(!empty($_FILES['shopping_image']['name'])){
            $insertData['image'] = $image_name1 = $_FILES['shopping_image']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['shopping_image']['tmp_name'], $target_file);
        } else {
            $insertData['image'] = $data->image;
        }
        $this->shoppingModel->updateOfflineShopping($insertData);
        $this->session->set_flashdata('success', 'Offline shop link has been edited successfully');
        redirect('shopping/offlinelist');
    }
    public function postaddOfflineShop(){
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
            $insertData['regId'] = $regId = generate_shop_application_reg_id();

            $insertData['accountProvedDoc'] = $image_name1 = $_FILES['accountProvedDoc']['name'];
            $target_file = "./uploads/".$image_name1;
            move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file);

            $insertData['document'] = $image_name2 = $_FILES['document']['name'];
            $target_file = "./uploads/".$image_name2;
            move_uploaded_file($_FILES['document']['tmp_name'], $target_file);

            $insertData['userId'] = $this->shoppingModel->addofflineshop($insertData);
            $this->userBankModel->createUserBanks($insertData);
            $this->shoppingModel->addOfflineShopDetails($insertData);
            for($i = 0; $i <= count($_FILES['center_image']); $i++){
                $insertData['gallery'] = $image_name = $_FILES['center_image']['name'][$i];
                $target_file = "./uploads/".$image_name;
                move_uploaded_file($_FILES['center_image']['tmp_name'][$i], $target_file);

                $this->shoppingModel->addShopGallery($insertData);

            }
            if(isset($insertData['commision'])){
                foreach($insertData['commision'] as $cdata){
                    $testdata['test_category'] = $cdata['test_category'];
                    $testdata['commision'] = $cdata['commision'];
                    $testdata['units'] = $cdata['units'];
                    $testdata['userId'] = $insertData['userId'];
                   // print_r($testdata); 
                    $this->shoppingModel->addShopTest($testdata);
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
                'msg' => 'Your Shop ('. $insertData['regId'].') has been sent to processing successfully. You got your user details shortly'
            );
            $this->sendMail($insertData['email'], 'Shop Confirmation', $mailData, 'paymentactive');
          //  $this->sendMail($insertData['email'], 'Diagonstic Confirmation', $mailData, 'created');
            $this->session->set_flashdata('success', 'Shop has been created successfully');
        }
        redirect('shopping/shop_list');
    }
    public function shop_list($rowno=0){
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // All records count
  
        $allcount =count( $this->shoppingModel->shoplist(-1,10));
        // Get records
        $customer_record = $this->shoppingModel->shoplist($rowno,$rowperpage);
        //$service_record = $this->modd->serviceuserlist($rowno,$rowperpage);
        // $config['base_url'] = base_url().'shopping/shop_list';
        // $config['use_page_numbers'] = TRUE;
        // $config['total_rows'] = $allcount;
        // $config['per_page'] = $rowperpage;
     
    
        // $this->pagination->initialize($config);
    
        // $data['pagination'] = $this->pagination->create_links();
        // $data['result'] = $customer_record;
        // $data['row'] = $rowno;
        // //$data['search'] = $search_text;
        $data['pagination'] = $this->mypagination( base_url().'shopping/shop_list/',$allcount, $rowperpage, 3 );
        $data['result'] = $customer_record;
        $this->update_status_after_15_minutes();
        $this->view('admin/shopping/offlineshop_list', ['customers' => $data,'districtlist'=>$this->districtlist()]);
   }
   public function shopview($userId)
   {
       $user = $this->modd->getUser($userId);
       $userbank = $this->userBankModel->getUserBankDetails($userId);
       $usermember = $this->shoppingModel->viewShopDetails($userId);
       $created = $this->modd->getUser($usermember->diagonostic_created);
       $gallery = $this->shoppingModel->viewShopGallery($userId);
       $testcommision = $this->shoppingModel->viewShopTest($userId);
       $this->view('admin/shopping/offlineshop_view',['users' => $user,'created'=> $created, 'userbank' => $userbank, 'gallery' => $gallery, 'usermember' => $usermember, 'testcommision' => $testcommision, 'districtlist'=>$this->districtlist()]);
   }
   public function shopdelete($userId)
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
        redirect('shopping/shop_list');
    }
    public function postShopupdatestatus(){
        $insertData = $_POST;
       
        $user = $this->modd->getUser($insertData['userId']);
        if($insertData['status'] == 'approved'){
            
             $password = generate_random_password(7);
             $insertData['password'] = $password;
             $this->shoppingModel->statusofflineShopupdate($insertData);
             
             $mailData = array(
                'name' => $user[0]->firstName,
                'email' => $user[0]->email,
                'regId' => $user[0]->regId,
                'password' => $password,
                'msg' => 'Your registration has been created successfully.'
            );
            $this->sendMail($user[0]->email, 'Offline Shopping Confirmation', $mailData, 'created');
        }
        if($insertData['status'] == 'rejected'){
            $this->shoppingModel->statusupdatewithreason($insertData);
        }
        if($insertData['status'] == 'processing' || $insertData['status'] == 'verification'){
            $this->shoppingModel->statusshopupdate($insertData);
        }
        
        redirect('shopping/shop_list');
    }
    public function status($userId)
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
        redirect('shopping/shop_list');
    }
    public function update_status_after_15_minutes() {
        // Get the current time
        $current_time = time();
    
        // Set the threshold (15 minutes in seconds)
        $threshold = 15 * 60;
    
        // Query users whose status has been 'active' for more than 15 minutes
        $this->db->select('id');
        $this->db->from('shop_member');
        $this->db->where('progress_status', 'processing');
      
        $query = $this->db->get();
      
        // Update the status of all the users who meet this condition
        foreach ($query->result() as $row) {
           
            $sql = "UPDATE `shop_member` SET `progress_status` = 'verification' WHERE `id` = $row->id AND TIMESTAMPDIFF(MINUTE, `createdAt`, NOW()) >= 15";
            $this->db->query($sql);
        }
        return true;
        
    }
    public function invoice_update_status_after_15_minutes() {
        // Get the current time
        $current_time = time();
    
        // Set the threshold (15 minutes in seconds)
        $threshold = 15 * 60;
    
        // Query users whose status has been 'active' for more than 15 minutes
        $this->db->select('id');
        $this->db->from('online_invoice');
        $this->db->where('status', 'processing');
      
        $query = $this->db->get();
      
        // Update the status of all the users who meet this condition
        foreach ($query->result() as $row) {
           
            $sql = "UPDATE `online_invoice` SET `status` = 'verification' WHERE `id` = $row->id AND TIMESTAMPDIFF(MINUTE, `createdAt`, NOW()) >= 15";
            $this->db->query($sql);
        }
        return true;
        
    }
    public function invoice_upload(){
        $this->view('admin/shopping/online-invoice-upload');
    }
    public function postaddonlineInvoice(){
        
        $insertData = $_POST;
       
        $insertData['invoice'] = $image_name1 = $_FILES['invoice']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['invoice']['tmp_name'], $target_file);
        $insertData['userId'] = $_SESSION['userId'];
       
        $insertData['transactionId'] = substr($insertData['platform'], 0, 1).rand(100000000,999999999);
        $this->shoppingModel->addShoppingInvoice($insertData);
        $this->session->set_flashdata('success', 'Invoice has been added successfully');
        redirect('shopping/invoicelist');
    }
    public function invoicelist($rowno=0){
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
       // $data = $this->shoppingModel->onlineShopping();
        $shopping = $this->shoppingModel->onlineInvoice($rowno,$rowperpage);
       
        $allcount =count( $this->shoppingModel->onlineInvoice(-1,10));
        $data['pagination'] = $this->mypagination( base_url().'shopping/invoicelist/',$allcount, $rowperpage, 3 );
        $data['result'] = $shopping;
       $this->invoice_update_status_after_15_minutes();
        $this->view('admin/shopping/invoice-list', $data);
    }
    public function invoiceview($id){
        $data = $this->shoppingModel->onlineInvoiceById($id);
       
        $this->view('admin/shopping/invoice-view',['data' => $data]);
    }
    public function postinvoiceupdatestatus(){
        $insertData = $_POST;
        $data = $this->shoppingModel->updateinvoicestatus($insertData);
        redirect('shopping/invoicelist');
    }
   
}