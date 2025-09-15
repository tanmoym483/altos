<?php
class Cashback_model extends CI_Model
{
    public function createCashback($data){
        $insertData = [];
        
        if (array_key_exists('offer_id', $data))
            $insertData['offer_id'] = strtoupper($data['offer_id']);
        if (array_key_exists('cashback_amount', $data))
            $insertData['amount'] = $data['cashback_amount'];
        if (array_key_exists('user_type', $data))
            $insertData['user_type'] = $data['user_type'];
        $insertData['userId'] = $data['userId'];
        $insertData['status'] = 'nonpaid';
        $insertData['createdBy'] = $this->session->userdata('userId');
      
        $this->db->insert('cashback_offer', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function getAllOfferCashback($type){
        $userid = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select("offer.*, cashback_offer.payoutDate, cashback_offer.createdAt as created_date, cashback_offer.amount as cashback, cashback_offer.status as cashbackstatus, cashback_offer.userId, cashback_offer.id as cashbackid, cashback_offer.transaction_id")->from("offer")->join('cashback_offer','cashback_offer.offer_id = offer.id', 'left');
        if($role == 'vendor'){
            $this->db->where('cashback_offer.userId',$userid);
        }
        if($role != 'superAdmin'){
        $this->db->where('cashback_offer.user_type',$type);
        }
        $response = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        $response = $response->result();
        return $response;
    }
    public function updatePaymentStatus($data){
        $updateData =  [
            'status' => 'paid',
            'updatedBy' => $this->session->userdata('userId'),
            'transaction_id' => $data->transactionId,
           'payoutDate' => $data->date,
        ];
       
        return $this->db->from('cashback_offer')
            ->where('id', $data->paymentID)->where('userId', $data->userID)
            ->set(
                $updateData
            )
            ->update();

    }
    public function totalTrasaction(){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select('SUM(amount) AS total')->from('cashback_offer');
        $this->db->where('status', 'paid');
        if ($role == "vendor") {
           
            $this->db->where('createdBy', $userId);
          
        }
        $data = $this->db->get(); 
         $result = $data->row();
         return $result;
    }
    public function history(){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select('cashback_offer.*,users.*, cashback_offer.status as tstatus,cashback_offer.id as tid,cashback_offer.payoutDate as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber')
            ->from('users')
            ->join('cashback_offer', 'cashback_offer.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = cashback_offer.createdBy', 'left');
           

        $this->db->where('cashback_offer.status', 'paid');
        if ($role == "vendor") {
           
            $this->db->where('cashback_offer.createdBy', $userId);
          
        }
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('cashback_offer.payoutDate >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('cashback_offer.payoutDate <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }
        $data = $this->db->get(); 
         $result = $data->result_array();
         return $result;
    }
    public function historyDeails($rowno, $rowperpage){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        // $this->db->select('users.*,cashback_offer.*,createduser.firstName as cfirstName, createduser.middleName as cmiddleName, createduser.lastName as clastName')
        // ->from('cashback_offer')
        // ->join('users as createduser', 'createduser.id = cashback_offer.createdBy', 'left')
        // ->join('users', 'users.id = cashback_offer.userId', 'left');

        $this->db->select('cashback_offer.*,users.*, cashback_offer.status as tstatus,cashback_offer.id as tid,cashback_offer.payoutDate as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber')
            ->from('users')
            ->join('cashback_offer', 'cashback_offer.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = cashback_offer.createdBy', 'left');
           

        $this->db->where('cashback_offer.status', 'paid');
        if ($role == "vendor") {
           
            $this->db->where('cashback_offer.createdBy', $userId);
          
        }
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('cashback_offer.payoutDate >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('cashback_offer.payoutDate <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }
        $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get(); 
         $result = $data->result_array();
         return $result;
    }
}