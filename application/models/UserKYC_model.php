<?php
class UserKYC_model extends CI_Model
{
    public $table_name = "user_kyc";
    public $usersModels = "users";

    public $userId;
    public $panNo;
    public $panDoc;
    public $addharNo;
    public $addharFrontDoc;
    public $addharBackDoc;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;
    public $status;

    public function createUserKycDetails($data){
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('panNo', $data))  
            $insertData['panNo'] = $data['panNo'];
        if (array_key_exists('panDoc', $data))
            $insertData['panDoc'] = $data['panDoc'];
            if (array_key_exists('addharNo', $data))
            $insertData['addharNo'] = $data['addharNo'];
            if (array_key_exists('addharFrontDoc', $data))
            $insertData['addharFrontDoc'] = $data['addharFrontDoc'];
            if (array_key_exists('addharBackDoc', $data))
            $insertData['addharBackDoc'] = $data['addharBackDoc']; 
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert($this->table_name, $insertData);
    }

    public function updateKyc($data)
    {
        $insertData=[];
        if(array_key_exists('role',$data))
        $insertData = ['role' => 'vendor'];
        if (array_key_exists('panNo', $data))  
        $insertData['panNo'] = $data['panNo'];
    if (array_key_exists('panDoc', $data))
        $insertData['panDoc'] = $data['panDoc'];
        if (array_key_exists('addharNo', $data))
        $insertData['addharNo'] = $data['addharNo'];
        if (array_key_exists('addharFrontDoc', $data))
        $insertData['addharFrontDoc'] = $data['addharFrontDoc'];
        if (array_key_exists('addharBackDoc', $data))
        $insertData['addharBackDoc'] = $data['addharBackDoc'];
        $this->db->from($this->table_name)
            ->where('userId',$data['userId'])
            ->set(
                $insertData
            )
            ->update();
    }

    public function userKucGet($userId){
     $query=$this->db->select("*")
     ->from($this->table_name)
     ->where("userId",$userId)
     ->get();
     return $query->result();
    }
}
