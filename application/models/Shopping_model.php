<?php
class Shopping_model extends CI_Model
{
    public function addShopping($data){
        $insertData =[];
       
      
        if (array_key_exists('link', $data))
            $insertData['link'] = $data['link'];  
        if (array_key_exists('image', $data))
            $insertData['image'] = $data['image']; 
        if (array_key_exists('special_offer', $data))
            $insertData['special_offer'] = $data['special_offer']; 
        if (array_key_exists('content', $data))
            $insertData['content'] = $data['content'];  
            
        $insertData['createdBy'] = $this->session->userdata('userId');
      
        $this->db->insert('online_shoping', $insertData);
    }
    public function shoppingProductlist($page=0, $perPage=9){
        $role = $_SESSION['role'];
        $userid = $_SESSION['userId'];
        $this->db->select('shop_product.*,users.firstName,users.middleName,users.lastName,users.regId');
        $this->db->from('shop_product')->join('users','shop_product.shop_id=users.id');
        if( $role == 'offline_shop'){
            $this->db->where('shop_product.shop_id',$userid);
        }
        if($page != -1){
            $this->db->limit($perPage, $page);
        }
        $this->db->order_by('shop_product.id','desc');
        $query = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function addOfflineShopping($data){
        $insertData =[];
       
      
        if (array_key_exists('link', $data))
            $insertData['discount'] = $data['link'];  
        if (array_key_exists('shop', $data))
            $insertData['shop'] = $data['shop'];  
        if (array_key_exists('image', $data))
            $insertData['image'] = $data['image']; 
        if (array_key_exists('units', $data))
            $insertData['units'] = $data['units'];  
            
        $insertData['createdBy'] = $this->session->userdata('userId');
      
        $this->db->insert('offlineshop_link', $insertData);
    }
    public function onlineShopping($page=0, $perPage=9){
        $this->db->select('*');
        $this->db->from('online_shoping')->where('status','active')->where('special_offer','false');
        if($page != -1){
            $this->db->limit($perPage, $page);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function postaddtocart($data){
        if (array_key_exists('user_id', $data))
            $insertData['userId'] = $data['user_id'];  
        if (array_key_exists('shop_id', $data))
            $insertData['shop_id'] = $data['shop_id'];  
        if (array_key_exists('product_id', $data))
            $insertData['product_id'] = $data['product_id']; 
        if (array_key_exists('quantity', $data))
            $insertData['quantity'] = $data['quantity'];  
        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];     
        $insertData['createdBy'] = $this->session->userdata('userId');
    
        $this->db->insert('shop_cart', $insertData);
    }
    public function cartitemexitornot($user,$product){
        $this->db->select('*')->from('shop_cart')->where('userId',$user)->where('product_id',$product)->where('status','active');
        $query = $this->db->get();
        return $query->row();
    }
    public function getcartitem($id){
        $this->db->select('shop_cart.*,shop_product.product')->from('shop_cart')->join('shop_product','shop_product.id=shop_cart.product_id')->where('shop_cart.status','active');
        $this->db->where('shop_cart.userId',$id);
        $this->db->order_by('shop_cart.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function onlineShoppingDashboard($page=0, $perPage=9){
        $this->db->select('*');
        $this->db->from('online_shoping')->where('status','active')->where('special_offer','true');
        if($page != -1){
            $this->db->limit($perPage, $page);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function offlineShopping($page=0, $perPage=9){
        $this->db->select('*');
        $this->db->from('offlineshop_link')->where('status','active');
        if($page != -1){
            $this->db->limit($perPage, $page);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function statusUpdate($id){
        $updateData =  [
            'status' => 'inactive'
        ];

        return $this->db->from('online_shoping')
            ->where('id', $id)
            ->set(
                $updateData
            )
            ->update();
    }
    public function offlinestatusUpdate($id){
        $updateData =  [
            'status' => 'inactive'
        ];

        return $this->db->from('offlineshop_link')
            ->where('id', $id)
            ->set(
                $updateData
            )
            ->update();
    }
    public function onlineShoppingById($id){
        $this->db->select('*');
        $this->db->from('online_shoping')->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function offlineShoppingById($id){
        $this->db->select('*');
        $this->db->from('offlineshop_link')->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function updateShopping($data){
        $insertData=[];
        
        if (array_key_exists('link', $data))  
            $insertData['link'] = $data['link'];
        if (array_key_exists('special_offer', $data))  
            $insertData['special_offer'] = $data['special_offer'];
        if (array_key_exists('image', $data))
            $insertData['image'] = $data['image'];
        if (array_key_exists('content', $data))
            $insertData['content'] = $data['content'];
            
        $this->db->from('online_shoping')
            ->where('id',$data['id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function updateOfflineShopping($data){
        $insertData=[];
        
        if (array_key_exists('link', $data))  
            $insertData['discount'] = $data['link'];
        if (array_key_exists('image', $data))
            $insertData['image'] = $data['image'];
        if (array_key_exists('shop', $data))
            $insertData['shop'] = $data['shop'];
        if (array_key_exists('units', $data))
            $insertData['units'] = $data['units'];
            
        return $this->db->from('offlineshop_link')
            ->where('id',$data['id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function addofflineshop($data){
        $insertData = [];
            $insertData['role'] = 'offline_shop';

        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = strtoupper($data['firstName']);
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = strtoupper($data['middleName']);
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = strtoupper($data['lastName']);
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('state', $data))
            $insertData['state'] = strtoupper($data['state']);
        if (array_key_exists('district', $data))
            $insertData['district'] = strtoupper($data['district']);
        if (array_key_exists('city', $data))
            $insertData['city'] = strtoupper($data['city']);
        if (array_key_exists('address', $data))
            $insertData['address'] = strtoupper($data['address']);
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
            $insertData['regId'] = $data['regId'];
            $insertData['status'] = 'inactive';
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $this->db->insert('users', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function approveshoplist(){
        $this->db->select('*');
        $this->db->from('shop_member')->where('progress_status','approved');
        $query = $this->db->get();
        return $query->result();
    }
    public function addOfflineShopDetails($data){
        $insertData =[];
        $insertData['center_name'] = strtoupper($data['center_name']);
        $insertData['gstin_number'] = strtoupper($data['gstin_number']);
        $insertData['cin_number'] = strtoupper($data['cin_number']);
        $insertData['pancard_number'] = strtoupper($data['pancard_number']);
        $insertData['shop_category'] = strtoupper($data['shop_category']);
        $insertData['business_category'] = strtoupper($data['business_category']);
        $insertData['document'] = $data['document'];
        $insertData['diagonostic_created'] = $data['parentId'];
        // $insertData['commision'] = $data['commision'];
        // $insertData['units'] = $data['units'];
        $insertData['userId'] = $data['userId'];
        $insertData['progress_status'] = 'processing';
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('shop_member', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function addShopProduct($data){
        $insertData =[];
        $insertData['shop_id'] = $data['shop_id'];
        $insertData['product_category'] = $data['product_category'];
        $insertData['product'] = strtoupper($data['product']);
        $insertData['product_image'] = $data['product_image'];
        $insertData['product_mrp'] = $data['product_mrp'];
        $insertData['product_selling_price'] = $data['product_selling_price'];
        $insertData['product_offer'] = $data['product_offer'];
        $insertData['expired_month'] = $data['expired_month'];
        $insertData['quantity'] = $data['quantity'];
        
        $insertData['units'] = $data['units'];
        $insertData['product_brand'] = strtoupper($data['product_brand']);
        $insertData['product_model'] = strtoupper($data['product_model']);
        $insertData['net_quantity'] = $data['net_quantity'];
        $insertData['description'] = $data['description'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('shop_product', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateShopProduct($data){
        $insertData=[];
        
        
        $insertData['shop_id'] = $data['shop_id'];
        $insertData['product_category'] = $data['product_category'];
        $insertData['product'] = strtoupper($data['product']);
        $insertData['product_image'] = $data['product_image'];
        $insertData['product_mrp'] = $data['product_mrp'];
        $insertData['product_selling_price'] = $data['product_selling_price'];
        $insertData['product_offer'] = $data['product_offer'];
        $insertData['expired_month'] = $data['expired_month'];
        $insertData['quantity'] = $data['quantity'];
        
        $insertData['units'] = $data['units'];
        $insertData['product_brand'] = strtoupper($data['product_brand']);
        $insertData['product_model'] = strtoupper($data['product_model']);
        $insertData['net_quantity'] = $data['net_quantity'];
        $insertData['description'] = $data['description'];
           
        return $this->db->from('shop_product')
            ->where('id',$data['id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function addShopGallery($data){
        $insertData =[];
        $insertData['userId'] = $data['userId'];
        $insertData['gallery'] = $data['gallery'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('shop_gallery', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function addShoppingOrder($data){
        $insertData =[];
        $insertData['userId'] = $_SESSION['userId'];
        $insertData['shop_id'] = $data['shop'];
        $insertData['amount'] = $data['amount'];
        $insertData['transaction_id'] = $data['transaction_id'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('online_shoping_order', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function addShopTest($data){
        $insertData =[];
        $insertData['userId'] = $data['userId'];
        $insertData['test_category'] = $data['test_category'];
        $insertData['commision'] = $data['commision'];
        $insertData['units'] = $data['units'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('shop_commision', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function getShoprecordCount(){
        $data =$this->db->select("count(*) as allcount")->from("users");
        $this->db->where('users.role', 'offline_shop');
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->get();
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function shopamountcount(){
        $role = $_SESSION['role'];
        $userid = $_SESSION['userId'];
        $data = $this->db->select_sum('amount')->from('online_invoice');
        if( $role == 'vendor' || $role == 'customer' ){
            $data = $this->db->where('createdBy',$userid);
        }
        $data = $this->db->get();
        return $result = $data->row();
    }
    public function shoppingProductlistById($id){
        $data =$this->db->select('*')->from('shop_product')->where('id',$id);
        $data = $this->db->get();
        $response = $data->row();
        return $response;
    }
    public function shoplist($rowno=0,$rowperpage=10){
        $role = $_SESSION['role'];
        $userid = $_SESSION['userId'];
        $data =$this->db->select("created.regId as cregId,users.id,users.regId, users.status,users.phone, users.email,users.address,users.city,users.district,users.state,users.postcode,shop_member.center_name,shop_member.progress_status,shop_member.createdAt")
        ->from("users")
        ->join('shop_member','shop_member.userId = users.id')
        ->join('users as created','shop_member.diagonostic_created = created.id');
        $data =$this->db->where('users.role', 'offline_shop');
        if($role == 'vendor'){
          $data =$this->db->where('shop_member.diagonostic_created', $userid);
        }
        if($_GET['district_search'] != ''){
            $data =$this->db->where('users.district', $_GET['district_search']);
          }
          if($_GET['pincode_search'] != ''){
            $data =$this->db->where('users.postcode', $_GET['pincode_search']);
          }
          if($_GET['state_search'] != ''){
            $data =$this->db->where('users.state', $_GET['state_search']);
          }
        $data = $this->db->order_by("users.id", "desc");
        if($rowno != -1){
            $data = $this->db->limit($rowperpage, $rowno);
        }
       // $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function onlineShoppingOrder($rowno=0,$rowperpage=10){
        $role = $_SESSION['role'];
        $userId = $this->session->userdata('userId');
        $data =$this->db->select("created.regId as cregId,users.firstName,users.middleName,users.lastName,users.regId,shop_member.center_name,online_shoping_order.amount,online_shoping_order.createdAt,online_shoping_order.transaction_id")
        ->from("users")
        ->join('online_shoping_order','online_shoping_order.userId = users.id')
        ->join('shop_member','shop_member.id = online_shoping_order.shop_id')
        ->join('users as created','shop_member.userId = created.id');
        if($role == 'vendor' || $role == 'customer'){
            $data = $this->db->where("online_shoping_order.userId", $userId);
        }
        if($role == 'offline_shop') {
            $data = $this->db->where("shop_member.userId", $userId);
        }
       
       // $data =$this->db->where('transactions.transType', 'offlineshop_payment');
        $data = $this->db->order_by("online_shoping_order.id", "desc");
        
        if($rowno != -1){
            $data = $this->db->limit($rowperpage, $rowno);
        }
        $data = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        $response = $data->result();
        return $response;
        
    }
    public function viewShopDetails($id){
        $this->db->select('*')->from('shop_member')->where('userId',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function viewShopGallery($id){
        $this->db->select('*')->from('shop_gallery')->where('userId',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function viewShopTest($id){
        $query = $this->db->select("*")->from("shop_commision")->where('userId',$id)->get();
        return $query->result_array();
    }
    public function statusofflineShopupdate($data){
        $this->db->select("*")
        ->from("shop_member");
        $statusupdate = array(
            'progress_status' => $data['status'],
           
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        $this->db->update('shop_member', $statusupdate); 

        $this->db->select("*")
        ->from("users");
        $statusupdate = array(
            'status' => 'active',
            'password' => md5($data['password']),
           
        );
        $this->db->where('id', $data['userId']);
        //$this->db->where('userId', $data['userId']);
        return $this->db->update('users', $statusupdate); 
    }
    public function statusupdatewithreason($data){
        $this->db->select("*")
        ->from("shop_member");
        $statusupdate = array(
            'progress_status' => $data['status'],
            'reason' => $data['reason'],
           
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('shop_member', $statusupdate); 
    }
    public function productstatusUpdate($id){
        $this->db->select("*")
        ->from("shop_product");
        $statusupdate = array(
            'status' => 'inactive'
           
        );
        $this->db->where('id', $id);
        return $this->db->update('shop_product', $statusupdate); 
    }
    public function statusshopupdate($data){
        $this->db->select("*")
        ->from("shop_member");
        $statusupdate = array(
            'progress_status' => $data['status']
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('shop_member', $statusupdate);
    }
    public function addShoppingInvoice($data){
    if (array_key_exists('platform', $data))
        $insertData['platform'] = $data['platform'];  
    if (array_key_exists('transactionId', $data))
        $insertData['transactionId'] = $data['transactionId']; 
    if (array_key_exists('invoice', $data))
        $insertData['invoice'] = $data['invoice']; 
    if (array_key_exists('amount', $data))
        $insertData['amount'] = $data['amount']; 
    if (array_key_exists('order_date', $data))
        $insertData['order_date'] = $data['order_date']; 
    if (array_key_exists('invoice_id', $data))
        $insertData['invoice_id'] = $data['invoice_id'];  
     if (array_key_exists('userId', $data))
        $insertData['userId'] = $data['userId'];      
    $insertData['createdBy'] = $this->session->userdata('userId');
  
    $this->db->insert('online_invoice', $insertData);
    }
    public function onlineInvoice($rowno=0,$rowperpage=10){
        $data = $this->db->select("online_invoice.*,users.regId,users.firstName, users.middleName, users.lastName")->from("online_invoice")->join('users','users.id = online_invoice.userId');
        if($_SESSION['role'] == 'customer' || $_SESSION['role'] == 'vendor'){
            $data = $this->db->where("online_invoice.userId",$_SESSION['userId']);
        }
        
        $data = $this->db->order_by("online_invoice.id", "desc");
        if($rowno != -1){
            $data = $this->db->limit($rowperpage, $rowno);
        }
        $data = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $data->result();
    }
    public function onlineInvoiceById($id){
        $data = $this->db->select('online_invoice.*,users.regId,users.firstName, users.middleName, users.lastName')->from('online_invoice')->join('users','users.id = online_invoice.userId')->where('online_invoice.id',$id);
        $data = $this->db->get();
       //echo $str = $this->db->last_query(); die;
        return $data->row();
    }
    public function updateinvoicestatus($data){

        $this->db->select("*")
        ->from("online_invoice");
        $statusupdate = array(
            'status' => $data['status'],
            'remarks' => $data['reason'],
            'invoice_id' => $data['invoice_id'],
           
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('online_invoice', $statusupdate); 
    }
   
}