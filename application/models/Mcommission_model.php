<?php
class Mcommission_model extends CI_Model
{

    public $table_name = "m_commission";
    public $user_id;
    public $type;
    public $amount;
    public $reason;
    public $isPayout;
    public $createdAt;
    public $updatedAt;

    public function get($type, $level)
    {
        $this->db->from($this->table_name);
        $this->db->where('type', $type);
        $this->db->where('level', $level);

        $query = $this->db->get();
        return $query->result();
    }
}
