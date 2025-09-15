<?php
class Admin_model extends CI_Model
{
    public $table_name = "m_states";
   

    public $state;
    public $district;
    public $pincode;
   
    public function allpostalCodeDetails($rowno,$rowperpage){
        $this->db->select('*')->from('m_states');
        $this->db->limit($rowperpage, $rowno); 
        $data=$this->db->get();
        $response=$data->result();
        return $response;
    }
    public function postalCodeDetails($data,$district,$rowno,$rowperpage){
        $this->db->select('*')->from('m_states');
        if($data != ''){
        $this->db->where('pincode',$data); 
        }
        if($district != ''){
        $this->db->where('district',$district);
        }
        if($data != '' && $district != ''){
            $this->db->where('pincode',$data); 
            $this->db->where('district',$district); 
        }
        $this->db->limit($rowperpage, $rowno); 
        $data=$this->db->get();
        $response=$data->result();
        return $response;
    }
    public function postalCodeDetailsCount($data,$district){
        $this->db->select('*')->from('m_states');
        if($data != ''){
        $this->db->where('pincode',$data); 
        }
        if($district != ''){
        $this->db->where('district',$district);
        }
        if($data != '' && $district != ''){
            $this->db->where('pincode',$data); 
            $this->db->where('district',$district); 
        }
       
        $data=$this->db->get();
        $response=$data->num_rows();
        return $response;
    }
    public function getrelation(){
        $this->db->select('*')
        ->from('m_relation');
        $data=$this->db->get();
        $response=$data->result_array();
        return $response;
    }
    public function getUser($data){
        $this->db->select('*')
        ->from('users')
        ->where('id',$data);
        $data=$this->db->get();
        $response=$data->result();
        return $response;
    }
    public function ifcscodedetails($data,$rowno,$rowperpage){
        
         $this->db->select('*')
        ->from('m_bank');
        if($data != ''){
            $this->db->where('ifsc',$data);
        }
        $this->db->limit($rowperpage, $rowno); 
        $data=$this->db->get();
        $response=$data->result();
        //  print_r( $response);die;
        return $response;
    }
    public function ifcscodedetailsCount($data){
        
        $this->db->select('*')
       ->from('m_bank');
       if($data != ''){
           $this->db->where('ifsc',$data);
       }
      
       $data=$this->db->get();
       $response=$data->num_rows();
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
        $data = $this->db->select("service.*,form_element.parent_id")->from('service');
        $data = $this->db->join('form_element','form_element.parent_id=service.id','left');
       // $data = $this->db->group_by('service.id');
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
        
        $_data = $this->db->select("*")->from('service')
        ->where('service.id', $data['service_id']);
        $_data = $this->db->get();
        $response = $_data->result();

        $insertData['created_by'] = $data['user_id'];
        $insertData['service_id'] = $data['service_id'];
        $insertData['form_id'] = $data['form_id'];
        $insertData['customer_id'] = $data['customer_id'];
        $insertData['status'] = 'pending';
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
        ->where('s2.form_key','email')
        ->where('s3.form_key','phone')
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
        $data = $this->db->select("users.firstName,users.lastName, users.regId,service.name,s1.form_value as _name,s2.form_value as _email,s3.form_value as _phone,s4.form_value as _pancard,service_form_value.created_at,service_form_value.id,service_form_value.custom_id,service_form_value.status")->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service_form_key_value as s1', 's1.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s2', 's2.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s3', 's3.form_value_id = service_form_value.id', 'left');
        $data = $this->db->join('service_form_key_value as s4', 's4.form_value_id = service_form_value.id', 'left');

        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
        
        ->where('s1.form_key','name')
        ->where('s2.form_key','email')
        ->where('s3.form_key','phone')
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
        $data = $this->db->select("users.firstName,users.lastName,users.regId,service.name,service_form_value.created_at,service_form_value.status,service_form_value.custom_id")->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
       
        ->where('service_form_value.id',$id);
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function setting(){
        $data = $this->db->select("*")->from('settings');
        $data = $this->db->get();
        $response = $data->result_array();
        return $response;
    }
    
    public function postsetting($data){
        $setting = $this->setting();
        if(empty($setting)){
            $this->db->insert('settings',$data);
        } else {
            $this->db->select("*")
                ->from("settings");
               
            $this->db->where('id', 1);
            $this->db->update('settings', $data); 
        }

    }
    public function serviceuserbycustid($cid){
        $data = $this->db->select("users.firstName,users.lastName,users.regId,service.name,service_form_value.created_at,service_form_value.id,service_form_value.custom_id,service_form_value.status")->from('service_form_value');
        $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        $data = $this->db->join('service', 'service.id = service_form_value.service_id', 'left')
        ->where('service_form_value.status','approved')
        ->where('service_form_value.customer_id',$cid);
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
    public function countvendorCustomerlistid($id){
        $data = $this->db->select("count(*) as allcount")->from('users');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->join('users as vendor', 'vendor.id = users.createdBy', 'left')->where('users.cardnumber !=','');
        // $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
        
        // if(isset($_GET['pancard_search']))
        // {
        // $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        // } 
        // if(isset($_GET['fname_search']))
        // {
        // $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        // }
        // if(isset($_GET['lname_search']))
        // {
        // $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        // }
        if(isset($_GET['card_search']))
        {
        $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
        $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
         $data = $this->db->group_start();
         $data = $this->db->where('users.createdBy',$id)->or_where('users.id',$id)->or_where('users.updatedBy',$id);
         $data = $this->db->group_end();
        $data = $this->db->get();
        $response = $data->result_array();
        return $response[0]['allcount'];
    }
    public function vendorCustomerlistid($id,$rowno,$rowperpage){
        $data = $this->db->select("users.*,user_kyc.panNo,vendor.firstName as vfirstName, vendor.regId as vregId,vendor.lastName as vlastName")->from('users');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->join('users as vendor', 'vendor.id = users.createdBy', 'left')->where('users.cardnumber !=','');
       // $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
       

        if(isset($_GET['card_search']))
        {
        $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
        $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->group_start();
        $data = $this->db->where('users.createdBy',$id)->or_where('users.id',$id)->or_where('users.updatedBy',$id);
        $data = $this->db->group_end();

       $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        
        $response = $data->result();
        return $response;
    }
    public function vendorCustomerAlllistid($id){
        $data = $this->db->select("users.*,user_kyc.panNo,vendor.firstName as vfirstName, vendor.regId as vregId,vendor.lastName as vlastName")->from('users');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->join('users as vendor', 'vendor.id = users.createdBy', 'left')->where('users.cardnumber !=','');
       // $data = $this->db->join('users', 'users.id = service_form_value.created_by', 'left');
       

        if(isset($_GET['card_search']))
        {
        $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
        $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->group_start();
        $data = $this->db->where('users.createdBy',$id)->or_where('users.id',$id)->or_where('users.updatedBy',$id);
        $data = $this->db->group_end();

       
        $data = $this->db->get();
        
        $response = $data->result();
        return $response;
    }
    public function serviceStatusChangebyid($id, $status){
        $this->db->select("*")
        ->from("service_form_value");
        $statusupdate = array(
            'status' => $status,
           
        );
        $this->db->where('id', $id);
        $this->db->update('service_form_value', $statusupdate); 
    }
    public function serviceformdata($id){
        $data = $this->db->select("form_element.content,service_form_value.id as form_value_id")->from('service_form_value');
       // $data = $this->db->join('service_form_value', 'service_form_value.id = service_form_key_value.form_value_id', 'left');
        $data = $this->db->join('form_element', 'form_element.id = service_form_value.form_id', 'left')
         ->where('service_form_value.id',$id);
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
    public function editformdetails($data,$fileData){

        foreach($data['form'] as $key=>$formdata){
            $this->db->where('form_value_id',$data['form_value_id']);
            $this->db->where('form_key',$key);
            $datavalue = $this->db->get('service_form_key_value');
            if($datavalue->num_rows() > 0){
           
            // if(in_array($key,$data['form'])){
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
            } else {
                
                if(is_array($formdata)){
                    $_value = implode(", ",$formdata);
                    $_data = array(
                        'form_value_id' => $data['form_value_id'],
                        'form_key' => $key,
                        'form_value' => $_value
                    );
                $this->db->insert('service_form_key_value', $_data);
                } else {
                    $_data = array(
                    'form_value_id' => $data['form_value_id'],
                    'form_key' => $key,
                    'form_value' => $formdata
                    );
                    $this->db->insert('service_form_key_value', $_data);
                }
            }
        }
        foreach($fileData as $key => $value){
            $this->db->where('form_value_id',$data['form_value_id']);
            $this->db->where('form_key',$key);
            $datavalue = $this->db->get('service_form_key_value');
            
            
            
            if($datavalue->num_rows() > 0 ){

                $keyval = $this->get_field($key,$data['form_value_id']);
                $keyval = $keyval->row();
                
                $filevalue = $keyval->form_value;
                if($_FILES['form']['name'][$key] == ''){
                    $image_name = $filevalue;
                } else {
                    $image_name = $_FILES['form']['name'][$key];
                    $target_file = "./uploads/".$image_name;
                    move_uploaded_file($_FILES['form']['tmp_name'][$key], $target_file);
                }
                $dataupdate = array(
                    'form_value' => $image_name
                );
                $this->db->where('form_key', $key);
                $this->db->where('form_value_id', $data['form_value_id']);
        
                $this->db->update('service_form_key_value', $dataupdate);
            } else {
                
                //$image_name = $_FILES['form']['name'][$key];
                $target_file = "./uploads/".$image_name;
                // $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                // $this->upload->do_upload('form');
                move_uploaded_file($_FILES['form']['tmp_name'][$key], $target_file);
                $dataupdate = array(
                    'form_value_id' => $data['form_value_id'],
                    'form_key' => $key,
                    'form_value' => $value
                );
                $this->db->insert('service_form_key_value', $dataupdate);
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
    public function editsubadmin($data){
        $insertData = [];
        $insertData['role'] = 'admin';
        // $name = explode(' ',strtoupper($data['name']));
        // if(count($name) > 0){
        //     $insertData['firstName'] = ($name[0] != '')?$name[0]:'';
        //     $insertData['lastName'] = ($name[1] != '')?$name[1]:'';
        // } else {
        //     $insertData['firstName'] = $name[0];
        // }
    if (array_key_exists('firstName', $data))
        $insertData['firstName'] = $data['firstName'];
    if (array_key_exists('middleName', $data))
        $insertData['middleName'] = strtoupper($data['middleName']);
    if (array_key_exists('lastName', $data))
        $insertData['lastName'] = $data['lastName'];
    if (array_key_exists('email', $data))
        $insertData['email'] = $data['email'];
    if (array_key_exists('phone', $data))
        $insertData['phone'] = $data['phone'];
    if (array_key_exists('address', $data))
        $insertData['address'] = strtoupper($data['address']);
    if (array_key_exists('postcode', $data))
        $insertData['postcode'] = $data['postcode'];
    if (array_key_exists('state', $data))
        $insertData['state'] = strtoupper($data['state']);
    if (array_key_exists('district', $data))
        $insertData['district'] = strtoupper($data['district']);
    if (array_key_exists('city', $data))
        $insertData['city'] = strtoupper($data['city']);
    
    $insertData['createdBy'] = $this->session->userdata('userId');
    $this->db->from('users')
        ->where('id', $data['id'])
        ->set(
            $insertData
        )
        ->update();
    }
    public function editdiagonstic($data){
        $insertData = [];
        $insertData['role'] = 'diagonstic';
       
        // $name = explode(' ',strtoupper($data['name']));
        // if(count($name) > 0){
        //     $insertData['firstName'] = ($name[0] != '')?$name[0]:'';
        //     $insertData['lastName'] = ($name[1] != '')?$name[1]:'';
        // } else {
        //     $insertData['firstName'] = $name[0];
        // }
    if (array_key_exists('firstName', $data))
        $insertData['firstName'] = $data['firstName'];
    if (array_key_exists('middleName', $data))
        $insertData['middleName'] = strtoupper($data['middleName']);
    if (array_key_exists('lastName', $data))
        $insertData['lastName'] = $data['lastName'];
    if (array_key_exists('address', $data))
        $insertData['address'] = strtoupper($data['address']);
    if (array_key_exists('email', $data))
        $insertData['email'] = $data['email'];
    if (array_key_exists('phone', $data))
        $insertData['phone'] = $data['phone'];
    if (array_key_exists('postcode', $data))
        $insertData['postcode'] = $data['postcode'];
    if (array_key_exists('state', $data))
        $insertData['state'] = strtoupper($data['state']);
    if (array_key_exists('district', $data))
        $insertData['district'] = strtoupper($data['district']);
    if (array_key_exists('city', $data))
        $insertData['city'] = strtoupper($data['city']);
    if (array_key_exists('district', $data))
        $insertData['district'] = strtoupper($data['district']);
    $insertData['createdBy'] = $this->session->userdata('userId');
    $this->db->from('users')
        ->where('id', $data['id'])
        ->set(
            $insertData
        )
        ->update();
    }
    public function addsubadmin($data){
        $insertData = [];
        //if (array_key_exists('role', $data))
            $insertData['role'] = 'admin';
            // $name = explode(' ',strtoupper($data['name']));
            // if(count($name) > 0){
            //     $insertData['firstName'] = ($name[0] != '')?$name[0]:'';
            //     $insertData['lastName'] = ($name[1] != '')?$name[1]:'';
            // } else {
            //     $insertData['firstName'] = $name[0];
            // }
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = strtoupper($data['firstName']);
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = strtoupper($data['middleName']);
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = strtoupper($data['lastName']);
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('address', $data))
            $insertData['address'] = strtoupper($data['address']);
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('state', $data))
            $insertData['state'] = strtoupper($data['state']);
        if (array_key_exists('district', $data))
            $insertData['district'] = strtoupper($data['district']);
        if (array_key_exists('city', $data))
            $insertData['city'] = strtoupper($data['city']);
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
            $insertData['regId'] = $data['regId'];
            $insertData['status'] = 'active';
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $this->db->insert('users', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function adddiagonstic($data){
        $insertData = [];
        //if (array_key_exists('role', $data))
            $insertData['role'] = 'diagonstic';
            // $name = explode(' ',strtoupper($data['name']));
            // if(count($name) > 0){
            //     $insertData['firstName'] = ($name[0] != '')?$name[0]:'';
            //     $insertData['lastName'] = ($name[1] != '')?$name[1]:'';
            // } else {
            //     $insertData['firstName'] = $name[0];
            // }
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
    public function addCustomerCard($data){
        $insertData = [];
        
        $insertData['user_id'] = $data['user_id'];
        $insertData['card_type'] = $data['card_type'];
        $insertData['name'] = strtoupper($data['user_name']);
        $insertData['phone'] = $data['user_phone'];
        $insertData['gender'] = strtoupper($data['user_gender']);
        $insertData['birthday'] = $data['user_birthday'];
        $insertData['doc_type'] = $data['doc_type'];
        $insertData['relation'] = strtoupper($data['user_relation']);
        $insertData['pancardno'] = $data['user_pancardno'];
        $insertData['adharcardfront'] = $data['user_adharfront'];
        $insertData['adharcardback'] = $data['user_adharback'];
        if (array_key_exists('user_pancard', $data))
            $insertData['pancard'] = $data['user_pancard'];
        if (array_key_exists('birthday_certificate', $data))
            $insertData['birthday_certificate'] = $data['birthday_certificate'];
        if (array_key_exists('rationcard', $data))
            $insertData['rationcard'] = $data['rationcard'];
        $insertData['created_by'] = $this->session->userdata('userId');
        $insertData['created_at'] = date('Y-m-d h:i:s');
        
        $this->db->insert('user_card', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateCustomerCard($data){
        $insertData = [];
     
        $insertData['user_id'] = $data['user_id'];
        $insertData['id'] = $data['id'];
        $insertData['card_type'] = $data['card_type'];
        $insertData['name'] = strtoupper($data['user_name']);
        $insertData['phone'] = $data['user_phone'];
        $insertData['gender'] = strtoupper($data['user_gender']);
        $insertData['birthday'] = $data['user_birthday'];
        $insertData['doc_type'] = $data['doc_type'];
        $insertData['relation'] = strtoupper($data['user_relation']);
        $insertData['pancardno'] = $data['user_pancardno'];
        $insertData['adharcardfront'] = $data['user_adharfront'];
        $insertData['adharcardback'] = $data['user_adharback'];
        $insertData['pancard'] = $data['user_pancard'];
        $insertData['birthday_certificate'] = $data['birthday_certificate'];
        $insertData['rationcard'] = $data['rationcard'];
        $insertData['updated_by'] = $this->session->userdata('userId');
      
        $this->db->from('user_card')
        ->where('id', $insertData['id'])
        ->set(
            $insertData
        )
        ->update();
        return true;
    }
    public function addCustomer($data){
        $insertData = [];
        //if (array_key_exists('role', $data))
        
        
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = strtoupper($data['firstName']);
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = strtoupper($data['middleName']);
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = strtoupper($data['lastName']);
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
        if (array_key_exists('countryCode', $data))
            $insertData['countryCode'] = $data['countryCode'];
        if (array_key_exists('city', $data))
            $insertData['city'] = strtoupper($data['city']);
        if (array_key_exists('district', $data))
            $insertData['district'] = strtoupper($data['district']);
       
        if (array_key_exists('state', $data))
            $insertData['state'] = strtoupper($data['state']);
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('address', $data))
            $insertData['address'] = strtoupper($data['address']);
        if (array_key_exists('regId', $data))
            $insertData['regId'] = strtoupper($data['regId']);
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
            $insertData['fatherName'] = strtoupper($data['fatherName']);
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] = strtoupper($data['motherName']);
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('card_status', $data))
            $insertData['card_status'] = $data['card_status'];
        if (array_key_exists('cardnumber', $data))
            $insertData['cardnumber'] = $data['cardnumber'];
        if (array_key_exists('birthday', $data))
            $insertData['birthday'] = $data['birthday'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] = strtoupper($data['Mother_Name']);
            $insertData['regId'] = $data['regId'];
           // $insertData['cardnumber'] = $data['cardnumber'];
            
        
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $this->db->insert('users', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateUser($data)
    {
        $insertData = [];
        
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = strtoupper($data['firstName']);
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = strtoupper($data['middleName']);
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = strtoupper($data['lastName']);
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
        if (array_key_exists('countryCode', $data))
            $insertData['countryCode'] = $data['countryCode'];
        if (array_key_exists('city', $data))
            $insertData['city'] = strtoupper($data['city']);
        if (array_key_exists('district', $data))
            $insertData['district'] = strtoupper($data['district']);
        if (array_key_exists('state', $data))
            $insertData['state'] = strtoupper($data['state']);
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = strtoupper($data['postcode']);
        if (array_key_exists('address', $data))
            $insertData['address'] = strtoupper($data['address']);
        if (array_key_exists('regId', $data))
            $insertData['regId'] =  strtoupper($data['regId']);
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
            $insertData['fatherName'] = strtoupper($data['fatherName']);
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] = strtoupper($data['motherName']);
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('wallet', $data))
            $insertData['wallet'] = $data['wallet'];
        if (array_key_exists('cardnumber', $data))
            $insertData['cardnumber'] = $data['cardnumber'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] = strtoupper($data['Mother_Name']);
        if (array_key_exists('birthday', $data))
            $insertData['birthday'] = $data['birthday'];
        if (array_key_exists('birthday', $data)){
            $insertData['birthday'] = $data['birthday'];}
        $insertData['updatedBy'] = $this->session->userId;
             
       
        $this->db->from('users')
            ->where('id', $data['userId'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function pages($slug){
        $data = $this->db->select("*")->from('pages')->where('slug',$slug);
        $data = $this->db->get();
        $response = $data->result_array();
        return $response;
    }
    public function postpages($data){
        $pages = $this->pages($data['page_slug']);
        $idata['slug'] = $data['page_slug'];
        $idata['name'] = $data['page_name'];
        $idata['content'] = $data['content'];
        $udata['content'] = $data['content'];
        if(empty($pages)){
            $this->db->insert('pages',$idata);
        } else {
            $this->db->select("*")
                ->from("pages");
                
            $this->db->where('slug', $data['page_slug']);
            $this->db->update('pages', $udata); 
        }
    }
    public function getdiagonsticrecordCount(){
        $data =$this->db->select("count(*) as allcount")->from("users");
        $this->db->where('users.role', 'diagonstic');
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->get();
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function getAdminrecordCount(){
        $data =$this->db->select("count(*) as allcount")->from("users");
        $this->db->where('users.role', 'admin');
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->get();
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function adminlist($rowno,$rowperpage){
        $data =$this->db->select("*")->from("users");
        $this->db->where('users.role', 'admin');
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function diagonsticlist($rowno,$rowperpage){
        $role = $_SESSION['role'];
        $userid = $_SESSION['userId'];
        $data =$this->db->select("created.regId as cregId,users.id,users.regId, users.status,users.phone, users.email,users.address,users.city,users.district,users.state,users.postcode,diagonostic_member.center_name,diagonostic_member.progress_status,diagonostic_member.createdAt")
        ->from("users")
        ->join('diagonostic_member','diagonostic_member.userId = users.id')
        ->join('users as created','diagonostic_member.diagonostic_created = created.id');
        $data =$this->db->where('users.role', 'diagonstic');
        if($role == 'vendor'){
          $data =$this->db->where('diagonostic_member.diagonostic_created', $userid);
        }
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function adminStatusUpdate($userId, $status)
   {
       try {
           $updateData =  [
               'status' => $status,
               'updatedAt' => date('Y-m-d h:i:s'),
               'updatedBy' => $this->session->userdata('userId')
           ];

           $this->db->from('users')
               ->where('id', $userId)
               ->set(
                   $updateData
               )
               ->update();
       } catch (Exception $e) {
           print_r($e);
       }
   }
   public function usercardmembercount(){
    // $data =$this->db->select("count(*) as allcount")->from("user_card");
    // $data = $this->db->get();
    $query = $this->db->query("
    SELECT count(*) as allcount FROM user_card Left Join `users` on user_card.user_id = users.id WHERE users.`cardnumber` != '' AND users.`card_status` = 'active';
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }
   public function cardmembercount(){
    $data =$this->db->select("count(*) as allcount")->from("users");
    $data = $this->db->where('cardnumber !=', '');
    $data = $this->db->where('card_status', 'active');
    $data = $this->db->get();
    $result = $data->result_array();
    return $result[0]['allcount'];
   }
   public function vendorcardmembercount($id){
    $query = $this->db->query("
    SELECT count(*) as allcount FROM `users` WHERE `cardnumber` != '' AND `card_status` = 'active' AND role = 'customer' AND `createdBy` = ".$id.";
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }

   public function customercardmembercountbyid($id){
    $query = $this->db->query("
    SELECT count(*) as allcount FROM user_card Left Join `users` on user_card.user_id = users.id WHERE users.`cardnumber` != '' AND users.`card_status` = 'active' AND users.`role` = 'customer' AND users.`createdBy` = ".$id.";
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }
   public function customercardmemberbyid($id){
    $query = $this->db->query("
    SELECT users.*, user_card.*, user_card.phone as ucphone, user_card.birthday as ucbirthday FROM user_card Left Join `users` on user_card.user_id = users.id WHERE users.`cardnumber` != '' AND users.`card_status` = 'active' AND users.`role` = 'customer' AND users.`createdBy` = ".$id.";
");
    return $result = $query->result_array();
   // return $result[0]['allcount'];
   }
   public function usercardmemberbycard($card){
    $query = $this->db->query("SELECT user_card.* FROM user_card Left Join `users` on user_card.user_id = users.id WHERE users.`cardnumber` = '$card' ");

    return $result = $query->result_array();
   // return $result[0]['allcount'];
   }
   public function usercardmemberbyid($id){
    $query = $this->db->query("
    SELECT * FROM user_card where user_card.user_id = ".$id.";
");
    return $result = $query->result_array();
   }

   public function usercardcountbyid($id){
    $query = $this->db->query("
    SELECT count(*) as allcount FROM `users` WHERE `cardnumber` != '' AND `card_status` = 'active'  AND (`id` = ".$id." OR `createdBy` = ".$id.");
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }
   public function usercardcountbycreatedByid($id){
    $query = $this->db->query("
    SELECT count(*) as allcount FROM user_card Left Join `users` on user_card.user_id = users.id WHERE users.`cardnumber` != '' AND users.`card_status` = 'active'  AND users.`createdBy` = ".$id.";
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }
   public function usercardmembercountbyid($id){
    $query = $this->db->query("
    SELECT count(*) as allcount FROM user_card where user_card.user_id = ".$id.";
");
    $result = $query->result_array();
    return $result[0]['allcount'];
   }
   public function getCustomerrecordCount(){
    // $data = $this->db->select('count(*) as allcount')->from('service_form_value');
     $data =$this->db->select("count(*) as allcount")->from("users");
     $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
     if(isset($_GET['pancard_search']))
     {
      $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
     } 
     if(isset($_GET['fname_search']))
     {
      $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
     }
     if(isset($_GET['lname_search']))
     {
      $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
     }
     if(isset($_GET['card_search']))
     {
      $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
     }
     if(isset($_GET['email_search']))
     {
      $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
     }
     $data = $this->db->where('users.cardnumber !=', '');
     $data = $this->db->order_by("users.id", "desc");
     $data = $this->db->get();
     $result = $data->result_array();
     return $result[0]['allcount'];
 }
    public function getadminCustomerrecordCount(){
       // $data = $this->db->select('count(*) as allcount')->from('service_form_value');
        $data =$this->db->select("count(*) as allcount")->from("users");
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        if(isset($_GET['pancard_search']))
        {
         $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        } 
        if(isset($_GET['fname_search']))
        {
         $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        }
        if(isset($_GET['lname_search']))
        {
         $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        }
        if(isset($_GET['card_search']))
        {
         $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
         $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->where('users.status', 'active');
       
        $data = $this->db->where('users.cardnumber !=', '');
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->get();
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function admincustomerlist($rowno,$rowperpage){
        $data = $this->db->select("user_kyc.panNo,users.*, created.firstName as cfirstName, created.lastName as clastName, created.regId as cregId")->from("users");
        $data = $this->db->join('users as created', 'created.id = users.createdBy', 'left');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->where('users.card_status', 'active');
        
        $data = $this->db->where('users.cardnumber !=', '');
        if(isset($_GET['pancard_search']))
        {
         $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        } 
        if(isset($_GET['fname_search']))
        {
         $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        }
        if(isset($_GET['lname_search']))
        {
         $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        }
        if(isset($_GET['card_search']))
        {
         $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
         $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function alladmincustomerlist(){
        $data = $this->db->select("user_kyc.panNo,users.*, created.firstName as cfirstName, created.lastName as clastName, created.regId as cregId")->from("users");
        $data = $this->db->join('users as created', 'created.id = users.createdBy', 'left');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->where('users.card_status', 'active');
        $data = $this->db->where('users.cardnumber !=', '');
        if(isset($_GET['pancard_search']))
        {
         $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        } 
        if(isset($_GET['fname_search']))
        {
         $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        }
        if(isset($_GET['lname_search']))
        {
         $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        }
        if(isset($_GET['card_search']))
        {
         $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
         $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function customerlist($rowno,$rowperpage){
        $data = $this->db->select("user_kyc.panNo,users.*, created.firstName as cfirstName, created.lastName as clastName, created.regId as cregId")->from("users");
        $data = $this->db->join('users as created', 'created.id = users.createdBy', 'left');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        //$data = $this->db->where('users.status !=', 'pending');
        $data = $this->db->where('users.cardnumber !=', '');
       // $data = $this->db->where('users.role', 'customer');
       // $data = $this->db->or_where('users.role', 'vendor');
       
       
        if(isset($_GET['pancard_search']))
        {
         $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        } 
        if(isset($_GET['fname_search']))
        {
         $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        }
        if(isset($_GET['lname_search']))
        {
         $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        }
        if(isset($_GET['card_search']))
        {
         $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
         $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->order_by("users.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function allcustomerlist(){
        $data = $this->db->select("user_kyc.panNo,users.*, created.firstName as cfirstName, created.lastName as clastName, created.regId as cregId")->from("users");
        $data = $this->db->join('users as created', 'created.id = users.createdBy', 'left');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $data = $this->db->where('users.cardnumber !=', '');
        if(isset($_GET['pancard_search']))
        {
         $data = $this->db->like('user_kyc.panNo', $_GET['pancard_search'], 'both'); 
        } 
        if(isset($_GET['fname_search']))
        {
         $data = $this->db->like('users.firstName', $_GET['fname_search'], 'both'); 
        }
        if(isset($_GET['lname_search']))
        {
         $data = $this->db->like('users.lastName', $_GET['lname_search'], 'both'); 
        }
        if(isset($_GET['card_search']))
        {
         $data = $this->db->like('users.cardnumber', $_GET['card_search'], 'both'); 
        }
        if(isset($_GET['email_search']))
        {
         $data = $this->db->like('users.email', $_GET['email_search'], 'both'); 
        }
        $data = $this->db->order_by("users.id", "desc");
       
        $data = $this->db->get();
        $response = $data->result();
        return $response;
    }
    public function getUserDetailsByPancard($pancard){
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $this->db->where('user_kyc.panNo', $pancard);
        $this->db->where('users.role', 'customer');
        $this->db->where('users.status', 'active');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getUserCardDetails($id)
    {
        $this->db->select('*');
        $this->db->from('user_card');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getUserCardDetailsById($id){
        $this->db->select('*');
        $this->db->from('user_card');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getcarddetails($card){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('cardnumber', $card);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getLastUserDetails()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('cardnumber !=', '');
        $this->db->order_by("cardnumber", "desc");
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->row();
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
        $_data = $this->db->select("*")->from("service_commision");
        $_data = $this->db->where('service_id', $data['service-id']);
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
            $statuscheck = $this->db->select("*")->from('service')->where('service.id',$data['service-id']);
            $statuscheck = $this->db->get()->row();
            
            if($statuscheck->status != 'Publish'){
                $this->servicestatuschange($data['service-id']);
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

    public function getproductdata($productId)
{
    return $this->db->select('*')
                    ->from('productinfo')
                    ->where('id', $productId)
                    ->get()
                    ->row();
}

public function insertProduct($data)
{
    $this->db->insert('productinfo', $data);
    return $this->db->insert_id();
}

}
