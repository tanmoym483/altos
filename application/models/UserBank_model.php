<?php
class UserBank_model extends CI_Model
{

    public $table_name = "user_banks";
    public $usersModels = "users";

    public $userId;
    public $bankName;
    public $accountHolderName;
    public $ifscCode;
    public $accountType;
    public $branchName;
    public $accountNumber;
    public $accountProvedDoc;
    public $signature;
    public $status;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;


    public function createUserBanks($data)
    {
       
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('bankName', $data))
            $insertData['bankName'] =  strtoupper($data['bankName']);
        if (array_key_exists('accountHolderName', $data))
            $insertData['accountHolderName'] = strtoupper($data['accountHolderName']);
            if (array_key_exists('ifscCode', $data))
            $insertData['ifscCode'] = $data['ifscCode'];
            if (array_key_exists('accountType', $data))
            $insertData['accountType'] = strtoupper($data['accountType']);
            if (array_key_exists('branchName', $data))
            $insertData['branchName'] = strtoupper($data['branchName']);
            if (array_key_exists('accountNumber', $data))
            $insertData['accountNumber'] = $data['accountNumber'];
            if (array_key_exists('accountProvedDoc', $data))
            $insertData['accountProvedDoc'] = $data['accountProvedDoc']; 
            if (array_key_exists('signature', $data))
            $insertData['signature'] = $data['signature']; 
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');
        
        $this->db->insert($this->table_name, $insertData);
    }
    public function createUserNewBanks($data){
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('bankName', $data))
            $insertData['bankName'] =  strtoupper($data['bankName']);
        if (array_key_exists('accountHolderName', $data))
            $insertData['accountHolderName'] = strtoupper($data['accountHolderName']);
            if (array_key_exists('ifscCode', $data))
            $insertData['ifscCode'] = $data['ifscCode'];
            if (array_key_exists('accountType', $data))
            $insertData['accountType'] = strtoupper($data['accountType']);
            if (array_key_exists('branchName', $data))
            $insertData['branchName'] = strtoupper($data['branchName']);
            if (array_key_exists('accountNumber', $data))
            $insertData['accountNumber'] = $data['accountNumber'];
            if (array_key_exists('accountProvedDoc', $data))
            $insertData['accountProvedDoc'] = $data['accountProvedDoc']; 
            if (array_key_exists('signature', $data))
            $insertData['signature'] = $data['signature']; 
            if (array_key_exists('purpose', $data))
            $insertData['purpose'] = $data['purpose']; 
            
        $insertData['status'] = 'processing';
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('new_user_banks', $insertData);
    }
    public function updateBankDetails($data)
    {
        $insertData=[];
      
        if(array_key_exists('role',$data))
        $insertData = ['role' => 'vendor'];
        if (array_key_exists('bankName', $data))
        $insertData['bankName'] =  strtoupper($data['bankName']);
    if (array_key_exists('accountHolderName', $data))
        $insertData['accountHolderName'] =  strtoupper($data['accountHolderName']);
        if (array_key_exists('ifscCode', $data))
        $insertData['ifscCode'] = $data['ifscCode'];
        if (array_key_exists('accountType', $data))
        $insertData['accountType'] = $data['accountType'];
        if (array_key_exists('branchName', $data))
        $insertData['branchName'] =  strtoupper($data['branchName']);
        if (array_key_exists('accountNumber', $data))
        $insertData['accountNumber'] = $data['accountNumber'];
        if (array_key_exists('accountProvedDoc', $data))
        $insertData['accountProvedDoc'] = $data['accountProvedDoc']; 
        if (array_key_exists('signature', $data))
        $insertData['signature'] = $data['signature']; 
        //  print_r($insertData);die;
        $this->db->from($this->table_name)
        ->where('userId',$data['userId'])
        ->set(
            $insertData
        )
        ->update();
    }
    
    public function addIfscCode($ifccode,$bankname,$brancename){
        $this->db->select('*')
            ->from('m_bank')
            ->where('ifsc',$ifccode);
          $data= $this->db->get();
          $query=$data->row();
          if($query){
            // print_r('ase');die;
          }else{
              
            $response=[
                "ifsc"=>$ifccode,
                "bank_name"=>$bankname,
                "branch"=>$brancename,
                "address"=>"test"
                ];
                // print_r($data);die;
               $this->db->insert('m_bank',$response);
		  //  	$product_id=$this->db->insert_id();
		  //  	print_r($product_id);die;
          }
    }

    public function getUserBankDetails($userId)
    {
        $query = $this->db->select('*')
            ->from($this->table_name)
            ->where('userId',$userId)
            ->get();
        return $query->result();
    }
}
