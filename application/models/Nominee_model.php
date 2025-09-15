<?php
class Nominee_model extends CI_Model
{

    public $table_name = "nominees";
    public $usersModels = "users";

    public $userId;
    public $nomineeName;
    public $nomineeRelation;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;
    public $status;
    
    public function createNominee($data)
    {
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('nomineeName', $data))
            $insertData['nomineeName'] =  strtoupper($data['nomineeName']);
        if (array_key_exists('nomineeRelation', $data))
            $insertData['nomineeRelation'] = $data['nomineeRelation'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');   
        $this->db->insert($this->table_name,$insertData);
    }

    
    public function updateNominee($data)
    {
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('nomineeName', $data))
            $insertData['nomineeName'] =  strtoupper($data['nomineeName']);
        if (array_key_exists('nomineeRelation', $data))
            $insertData['nomineeRelation'] = $data['nomineeRelation'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        $insertData['updatedAt'] = date('Y-m-d h:i:s');
        $insertData['updatedBy'] = $this->session->userdata('userId');
       

        $this->db->from($this->table_name)
            ->where('userId',$data['userId'])
            ->set(
                $insertData
            )
            ->update();
    }

   
    public function getNominee($userId)
    {
        $query = $this->db->select('*')
            ->from($this->table_name)
            ->where('userId',$userId)
            ->get();
        return $query->result();
    }
    
}
