<?php
class Commission_model extends CI_Model
{

    public $table_name = "commissions";
    public $user_id;
    public $type;
    public $amount;
    public $reason;
    public $isPayout;
    public $reasonId;
    public $createdAt;
    public $updatedAt;

    public function isExist($user_id, $reason, $reasonId)
    {
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->where('reason', $reason);
        $this->db->where('reasonId', $reasonId);

        $query = $this->db->get();
        return $query->result();
    }
    public function getCommisionList($user_id)
    {

        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('createdAt', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTotalCommission($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);

        $query = $this->db->get();
        return $query->result();
    }


    public function commision($user_id, $data)
    {


        $isExist = $this->isExist($user_id, $data['reason'], $data['reasonId']);
        if (count($isExist) > 0) {
        } else {
            $this->add($user_id, $data);
        }
    }
    public function add($user_id, $data)
    {
        $insertData = ['user_id' => $user_id,  'createdAt' => date('Y-m-d h:i:s')];
        if (array_key_exists('type', $data))
            $insertData['type'] = $data['type'];
        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];
        if (array_key_exists('reason', $data))
            $insertData['reason'] = $data['reason'];
        if (array_key_exists('isPayout', $data))
            $insertData['isPayout'] = $data['isPayout'];
        if (array_key_exists('reasonId', $data))
            $insertData['reasonId'] = $data['reasonId'];

        $this->db->insert($this->table_name, $insertData);
    }
    public function update($user_id, $data)
    {
        $updateData = ['updatedAt' => date('Y-m-d h:i:s')];
        if (array_key_exists('type', $data))
            $updateData['type'] = $data['type'];
        if (array_key_exists('amount', $data))
            $updateData['amount'] = $data['amount'];
        if (array_key_exists('reason', $data))
            $updateData['reason'] = $data['reason'];
        if (array_key_exists('isPayout', $data))
            $updateData['isPayout'] = $data['isPayout'];
        if (array_key_exists('reasonId', $data))
            $updateData['reasonId'] = $data['reasonId'];
        $this->db->from($this->table_name)
            ->where('user_id', $user_id)
            ->set(
                $updateData
            )
            ->update();
    }

    public function daywiseCommissionReturn($user_id){
        $this->db->select_sum('amount');
        $this->db->select("createdAt");
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->group_by("DATE_FORMAT(createdAt, '%Y-%m-%d')");
        $this->db->order_by("createdAt", 'desc');
       $query= $this->db->get();
       return $query->result();
    }
}
