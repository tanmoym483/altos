<?php
class Admin_model extends CI_Model
{
    public $table_name = "m_states";
   

    public $state;
    public $district;
    public $pincode;
   

    public function postalCodeDetails($data){
        $this->db->select('*')
        ->from('m_states')
        ->where('pincode',$data);
        $data=$this->db->get();
        $response=$data->result();
        return $response;
    }
    
    public function ifcscodedetails($data){
        
         $this->db->select('*')
        ->from('m_bank')
        ->where('ifsc',$data);
        $data=$this->db->get();
        $response=$data->result();
        //  print_r( $response);die;
        return $response;
    }

    public function addPostalCode($data){
        $pincode=$data['pincode'];
        $this->db->select("*")
        ->from('m_states')
        ->where('pincode',$pincode);
       $res=$this->db->get();
       if($res->row()){
           $this->session->set_flashdata('success', 'Alredy Exit');
       }else{
            $insertData =[];
        if (array_key_exists('state', $data))
            $insertData['state'] = $data['state'];
        if (array_key_exists('district', $data))
            $insertData['district'] = $data['district'];
        if (array_key_exists('pincode', $data))
            $insertData['pincode'] = $data['pincode'];
            $this->db->insert($this->table_name, $insertData);
       }
    }
    
    public function addifcsCode($data){
         
         $ifsc=$data['ifsc'];
        $this->db->select("*")
        ->from('m_bank')
        ->where('ifsc',$ifsc);
       $res=$this->db->get();
       if($res->row()){
            $this->session->set_flashdata('success', 'Alredy Exit');
        //   print_r("ase");die;
       }else{
            $insertData =[];
            // print_r('nai');die;
        if (array_key_exists('ifsc', $data))
            $insertData['ifsc'] = $data['ifsc'];
        if (array_key_exists('branch', $data))
            $insertData['branch'] = $data['branch'];
        if (array_key_exists('bank_name', $data))
            $insertData['bank_name'] = $data['bank_name'];
            $this->db->insert('m_bank', $insertData);
           
       }
    }
    public function slugify($text, string $divider = '-')
    {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
    }
    public function addservice($data){
        $service_name= $data['name'];
        $this->db->select("*")
        ->from('service')
        ->where('name',$service_name);
       $res=$this->db->get();
       if($res->row()){
            $this->session->set_flashdata('success', 'Alredy Exit');
        //   print_r("ase");die;
       }else{
            $insertData =[];
            // print_r('nai');die;
        if (array_key_exists('name', $data)){
            $insertData['name'] = $data['name'];
            $insertData['slug'] = $this->slugify($data['name']);
        } 
        // if (array_key_exists('commision_type', $data)){
        //     $insertData['commission_type'] = $data['commision_type'];
        // } 
        // if (array_key_exists('name', $data)){
        //     $insertData['commission'] = $data['commission'];
        // } 
            $insertData['user_id'] = 1;
            $insertData['status'] = 'Draft';
            $this->db->insert('service', $insertData);
           
       }
    }
    public function servicelist(){
        $this->db->select("*")->from('service');
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function addserviceform($data){
        $insertData =[];
        $this->db->select("*")
        ->from('service')
        ->where('id',$data['service_id']);
       $res=$this->db->get()->result();
        
        $insertData['parent_id'] = $data['service_id'];
        $insertData['name'] = $res[0]->name.' form';
        $insertData['slug'] = $this->slugify($res[0]->name.' form');
        $insertData['content'] = json_encode($data['field']);
        $insertData['status'] = 'Publish';
        

        $this->db->insert('form_element', $insertData);
        
    }
    public function formdetails($id){
        $this->db->select("*")->from('form_element')->where('parent_id',$id);
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function editserviceform($data){
        $this->db->select("*")
            ->from("form_element");
        $contentupdate = array(
            'content' => json_encode($data['field'])
        );
        $this->db->where('id', $data['form_id']);
        $this->db->update('form_element', $contentupdate);
    }
    public function publishservicelist(){
        $this->db->select("*")->from('service')->where('status','Publish');
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function servicestatuschange($id){
        
        $formresponse = $this->formdetails($id);
        $commisionresponse = $this->db->select("*")->from("service_commision")->where('service_id', $id)->get()->result();
      
        if(!empty($commisionresponse) && !empty($formresponse)){
            $statusupdate = array(
                'status' => 'Publish'
            );
           $this->db->select("*")->from("service")->where('id', $id)->update('service', $statusupdate);
        }
    }
    public function serviceformdetail($service){
        $data = $this->db->select("form_element.*")->from('form_element');
        $data = $this->db->join('service', 'service.id = form_element.parent_id', 'left')
       
        ->where('form_element.status','Publish')
        ->where('service.slug', $service);
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function postaddserviceform($data,$fileData){
        //print_r($fileData); die;
        $_data = $this->db->select("*")->from('service')
        ->where('service.id', $data['service_id']);
        $_data = $this->db->get();
        $response = $_data->result();

        $insertData['created_by'] = $data['user_id'];
        $insertData['service_id'] = $data['service_id'];
        $insertData['form_id'] = $data['form_id'];
        $insertData['status'] = 'Publish';
        $insertData['custom_id'] = strtoupper(str_replace(' ','',$response[0]->name)).time();
        $this->db->insert('service_form_value', $insertData);
        $dataid = $this->db->insert_id();
        
        foreach($data['form'] as $key => $value){
            if(is_array($value)){
                $_value = implode(", ",$value);
                $_data = array(
                    'form_value_id' => $dataid,
                    'form_key' => $key,
                    'form_value' => $_value
                );
            $this->db->insert('service_form_key_value', $_data);
            } else {
                $_data = array(
                'form_value_id' => $dataid,
                'form_key' => $key,
                'form_value' => $value
                );
                $this->db->insert('service_form_key_value', $_data);
            }
            
        }
        foreach($fileData as $key => $value){
            $image_name = $_FILES['form']['name'][$key];
            $target_file = "./uploads/".$image_name;
            // $this->load->library('upload', $config);
            // $this->upload->initialize($config);
            // $this->upload->do_upload('form');
            move_uploaded_file($_FILES['form']['tmp_name'][$key], $target_file);
            $_data = array(
                'form_value_id' => $dataid,
                'form_key' => $key,
                'form_value' => $value
                );
            $this->db->insert('service_form_key_value', $_data);
        }

    }
    public function getrecordCount(){
        $data = $this->db->select('count(*) as allcount')->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service_form_key_value as s1', 's1.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s2', 's2.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s3', 's3.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s4', 's4.form_value_id = service_form_value.id', 'left');

        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
        ->where('service_form_value.status','Publish')
        ->where('s1.form_key','name')
        ->where('s2.form_key','email_address')
        ->where('s3.form_key','phone_number')
        ->where('s4.form_key','pancard_number');
        
       if(isset($_GET['search'])){
        $data = $this->db->group_start();
        $data = $this->db->like('s1.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s2.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s3.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s4.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('users.firstName', $_GET['search'], 'both'); 
        $data = $this->db->or_like('users.lastName', $_GET['search'], 'both'); 
        $data = $this->db->or_like('service.name', $_GET['search'], 'both'); 
        $data = $this->db->group_end();
       }
       
       if(isset($_GET['pancard_search']))
       {
        $data = $this->db->like('s4.form_value', $_GET['pancard_search'], 'both'); 
       }
       if(isset($_GET['name_search']))
       {
        $data = $this->db->like('s1.form_value', $_GET['name_search'], 'both'); 
       }
       if(isset($_GET['service'])){
        $data = $this->db->like('service.slug', $_GET['service'], 'both'); 
       }
       $data = $this->db->get();
        
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function serviceuserlist($rowno,$rowperpage){
        $data = $this->db->select("users.firstName,users.lastName,service.name,s1.form_value as _name,s2.form_value as _email,s3.form_value as _phone,s4.form_value as _pancard,service_form_value.created_at,service_form_value.id,service_form_value.custom_id")->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service_form_key_value as s1', 's1.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s2', 's2.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s3', 's3.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s4', 's4.form_value_id = service_form_value.id', 'left');

        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
        ->where('service_form_value.status','Publish')
        ->where('s1.form_key','name')
        ->where('s2.form_key','email_address')
        ->where('s3.form_key','phone_number')
        ->where('s4.form_key','pancard_number');
        
       if(isset($_GET['search'])){
        $data = $this->db->group_start();
        $data = $this->db->like('s1.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s2.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s3.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('s4.form_value', $_GET['search'], 'both'); 
        $data = $this->db->or_like('users.firstName', $_GET['search'], 'both'); 
        $data = $this->db->or_like('users.lastName', $_GET['search'], 'both'); 
        $data = $this->db->or_like('service.name', $_GET['search'], 'both'); 
        $data = $this->db->group_end();
       }
       
       if(isset($_GET['pancard_search']))
       {
        $data = $this->db->like('s4.form_value', $_GET['pancard_search'], 'both'); 
       }
       if(isset($_GET['name_search']))
       {
        $data = $this->db->like('s1.form_value', $_GET['name_search'], 'both'); 
       }
       if(isset($_GET['service'])){
        $data = $this->db->like('service.slug', $_GET['service'], 'both'); 
       }
       $data = $this->db->order_by("service_form_value.created_at", "desc");
       $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function serviceuserbyid($id){
        $data = $this->db->select("users.firstName,users.lastName,service.name,service_form_value.created_at")->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
        ->where('service_form_value.status','Publish')
        ->where('service_form_value.id',$id);
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function serviceformvalue($id)
    {
        $data = $this->db->select("*")->from('service_form_key_value')
       // $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        ->where('service_form_key_value.form_value_id',$id);
        $data = $this->db->get();
        $response = $data->result();
        return $response;

    }
    public function serviceformdata($id){
        $data = $this->db->select("form_element.content,service_form_key_value.*,service_form_value.id as form_value_id")->from('service_form_key_value');
        $data = $this->db->join('service_form_value', 'service_form_value.id = service_form_key_value.form_value_id', 'left');
        $data = $this->db->join('form_element', 'form_element.id = service_form_value.form_id', 'left')
         ->where('service_form_key_value.form_value_id',$id);
         $data = $this->db->get();
         $response = $data->result();
         return $response;
    }
    public function commisionlist(){
        $data = $this->db->select("*")->from('investment_commision');
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
   public function editcommisionindex($id){
        $data = $this->db->select("*")->from('investment_commision')
        ->where('id',$id);
        $data = $this->db->get();
        $response = $data->result();
        return $response;
   }
   public function editcommision($data){
    $this->db->select("*")
        ->from("investment_commision");
    $contentupdate = array(
        'level_name' => $data['level_name'],
        'target' => $data['target'],
        'commision' => $data['commision'],
    );
    $this->db->where('id', $data['commision_id']);
    $this->db->update('investment_commision', $contentupdate); 
   }
    public function get_field($fied_key,$post_id){
        $data = $this->db->select("*")->from('service_form_key_value')
        ->where('service_form_key_value.form_value_id',$post_id)
        ->where('service_form_key_value.form_key',$fied_key);
        $response = $this->db->get();
        return $response;
    }
    public function editformdetails($data){
        foreach($data['form'] as $key=>$formdata){
            if(is_array($formdata)){
                $_value = implode(", ",$formdata);
                $this->db->select("*")->from("service_form_key_value");
                $dataupdate = array(
                    'form_value' => $_value
                );
                $this->db->where('form_key', $key);
                $this->db->where('form_value_id', $data['form_value_id']);
                $this->db->update('service_form_key_value', $dataupdate); 
            } else {
            $this->db->select("*")->from("service_form_key_value");
            $dataupdate = array(
                'form_value' => $formdata
            );
            $this->db->where('form_key', $key);
            $this->db->where('form_value_id', $data['form_value_id']);
            $this->db->update('service_form_key_value', $dataupdate); 
            }
        }
    }
    public function servicebyid($id){
        $data = $this->db->select("*")->from('service')
        ->where('service.id',$id);
        $response = $this->db->get()->row();
        
        return $response;
    }
    public function editservice($data){
        $this->db->select("*")->from("service");
            $dataupdate = array(
                'name' => $data['name'],
            );
            $this->db->where('id', $data['service_id']);
           // $this->db->where('form_value_id', $data['form_value_id']);
            $this->db->update('service', $dataupdate); 
    }
    public function addcommission($data){
        $insertData['level_name'] = $data['level_name'];
        $insertData['target'] = $data['target'];
        $insertData['commision'] = $data['commision'];
        $this->db->insert('investment_commision', $insertData);
    }
    public function addCustomer($data){
        $insertData = [];
        //if (array_key_exists('role', $data))
            $insertData['role'] = 'customer';
            $name = explode(' ',$data['membarName']);
            $insertData['firstName'] = $name[0];
            $insertData['lastName'] = $name[1];
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = $data['firstName'];
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = $data['middleName'];
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = $data['lastName'];
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
        if (array_key_exists('countryCode', $data))
            $insertData['countryCode'] = $data['countryCode'];
        if (array_key_exists('city', $data))
            $insertData['city'] = $data['city'];
        if (array_key_exists('district', $data))
            $insertData['district'] = $data['district'];
        if (array_key_exists('state', $data))
            $insertData['state'] = $data['state'];
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('address', $data))
            $insertData['address'] = $data['address'];
        if (array_key_exists('regId', $data))
            $insertData['regId'] = $data['regId'];
        if (array_key_exists('pic', $data))
            $insertData['pic'] = $data['pic'];
        if (array_key_exists('isFirstLogin', $data))
            $insertData['isFirstLogin'] = $data['isFirstLogin'];
        if (array_key_exists('role', $data))
            $insertData['role'] = $data['role'];
        if (array_key_exists('parentNode', $data))
            $insertData['parentNode'] = $data['parentNode'];
        if (array_key_exists('leftChild', $data))
            $insertData['leftChild'] = $data['leftChild'];
        if (array_key_exists('rightChild', $data))
            $insertData['rightChild'] = $data['rightChild'];
        if (array_key_exists('side', $data))
            $insertData['side'] = $data['side'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        if (array_key_exists('fatherName', $data))
            $insertData['fatherName'] = $data['fatherName'];
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] = $data['motherName'];
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] = $data['Mother_Name'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('users', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateUser($data)
    {
        $insertData = [];
            $insertData['role'] = 'customer';
            $name = explode(' ',$data['membarName']);
            $insertData['firstName'] = $name[0];
            $insertData['lastName'] = $name[1];
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = $data['firstName'];
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = $data['middleName'];
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = $data['lastName'];
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
        if (array_key_exists('countryCode', $data))
            $insertData['countryCode'] = $data['countryCode'];
        if (array_key_exists('city', $data))
            $insertData['city'] = $data['city'];
        if (array_key_exists('district', $data))
            $insertData['district'] = $data['district'];
        if (array_key_exists('state', $data))
            $insertData['state'] = $data['state'];
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('address', $data))
            $insertData['address'] = $data['address'];
        if (array_key_exists('regId', $data))
            $insertData['regId'] = $data['regId'];
        if (array_key_exists('pic', $data))
            $insertData['pic'] = $data['pic'];
        if (array_key_exists('isFirstLogin', $data))
            $insertData['isFirstLogin'] = $data['isFirstLogin'];
        if (array_key_exists('role', $data))
            $insertData['role'] = $data['role'];
        if (array_key_exists('parentNode', $data))
            $insertData['parentNode'] = $data['parentNode'];
        if (array_key_exists('leftChild', $data))
            $insertData['leftChild'] = $data['leftChild'];
        if (array_key_exists('rightChild', $data))
            $insertData['rightChild'] = $data['rightChild'];
        if (array_key_exists('side', $data))
            $insertData['side'] = $data['side'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        if (array_key_exists('fatherName', $data))
            $insertData['fatherName'] = $data['fatherName'];
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] = $data['motherName'];
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] = $data['Mother_Name'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->from('users')
            ->where('id', $data['userId'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function customerlist(){
        $this->db->select("*")->from("users");
        $this->db->where('role', 'customer');
        $_data = $this->db->get();
        return $response = $_data->result();
    }
    public function getUserDetails($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_banks', 'user_banks.userId = users.id', 'left');
        $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $this->db->join('transactions', 'transactions.userId = users.id', 'left');
        $this->db->join('nominees', 'nominees.userId = users.id', 'left');
        $this->db->where('users.id', $id);
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function addeditcommision($data){
        $this->db->select("*")->from("service_commision");
        $this->db->where('service_id', $data['service-id']);
        $_data = $this->db->get();
        $response = $_data->result_array();
        
        if(empty($response)){
            foreach($data['service'] as $key=>$value){
            //for($i==0; $i<15; $i++){
                $insertData['service_id'] = $data['service-id'];
                $insertData['level'] = $value['level_name'];
                $insertData['commision'] = $value['commision'];
                $insertData['commision_type'] = $data['commision_type'];
                $this->db->insert('service_commision', $insertData);
            }
        } else {
            foreach($data['service'] as $key=>$value){
            //for($i==0; $i<15; $i++){
                $this->db->select("*")->from("service_commision");
                $this->db->where('level', $value['level_name']);
                $this->db->where('service_id', $data['service-id']);
                $updateData['commision'] = $value['commision'];
                $updateData['commision_type'] = $data['commision_type'];
                $this->db->update('service_commision', $updateData);
            }
        }
    }
    public function getcommisionbyservice($id){
        $this->db->select("*")->from("service_commision");
        $this->db->where('service_id', $id);
        $data = $this->db->get();
        $response = $data->result_array();
        $i = 0;
        $commision = array();
        foreach($response as $data)
        {
            $commision['service'][$i]['level_name'] = $data['level'];
            $commision['service'][$i]['commision_type'] = $data['commision_type'];
            $commision['service'][$i]['commision'] = $data['commision'];
        $i++;
        }
        return $commision;
    }
    public function usercommision(){
        $data = $this->db->select("users.*")->from("users");
        $data = $this->db->join('transactions', 'transactions.userId = users.id', 'left')
        ->where('transactions.transType','deposite');
        $data = $this->db->group_by('users.id');
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function getammount($user){
        $data = $this->db->select("SUM(amount) as amt")->from("transactions")->where('transType','deposite')->where('transactions.userId', $user);
        $data = $this->db->group_by('transactions.userId');
        $data = $this->db->get();
       
        return $data;
    }
}
