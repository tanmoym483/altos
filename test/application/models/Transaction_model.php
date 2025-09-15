<?php
class Transaction_model extends CI_Model
{

    public $table_name = "transactions";

    public $userId;
    public $amount;
    public $transType;
    public $transRefNo;
    public $transRefDoc;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;
    public $status;

    public function createTransaction($data)
    {
        $insertData = [
            'createdAt' => date('Y-m-d h:i:s'),
        ];
        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];
        if (array_key_exists('transRefNo', $data))
            $insertData['transRefNo'] = $data['transRefNo'];
        if (array_key_exists('transRefDoc', $data))
            $insertData['transRefDoc'] = $data['transRefDoc'];
        if (array_key_exists('userId', $data)) {
            $insertData['userId'] = $data['userId'];
            $insertData['createdBy'] = $data['userId'];
        }
        if (array_key_exists('transType', $data))
            $insertData['transType'] = $data['transType'];
        $this->db->insert($this->table_name, $insertData);
    }
}
