<?php
class Commission_model extends CI_Model
{

    public $table_name = "commissions";
    public $user_id;
    public $type;
    public $amount;
    public $reason;
    public $isPayout;
    public $payoutDate;
    public $isPaymentCompleted;
    public $transactionId;
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
    public function getCommisionList($user_id,$limit=0, $perPage=10,$date=null)
    {

        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        
        if($date!=null){
            
            $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
        }
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('createdAt >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('createdAt <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }
        if($limit>=0){
            $this->db->limit($perPage, $limit);
           }
        
           $this->db->order_by('createdAt', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTotalCommission($user_id,$date=null)
    {
        $this->db->select_sum('amount');
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        if($date!=null){
            $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
            }
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
        $insertData = ['user_id' => $user_id,  'createdAt' => date('Y-m-d h:i:s'), 'date'=>date('Y-m-d')];
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
    public function totalDuePayout($id){
        $this->db->select_sum('amount');
        $this->db->from('commissions');
       
        $this->db->where('user_id', $id);
       
        $this->db->where('isPayout', 'true');
        $this->db->where('isPaymentCompleted', 'false');
       // $this->db->where("DATE(date)", $today);
        $query = $this->db->get();
        return $query->row();
      }
    public function daywiseCommissionReturn($user_id,$page=0, $perPage=10){
    //     $this->db->select_sum('commissions.amount');
    //     $this->db->select(["commissions.isPayout",'commissions.isPaymentCompleted','commissions.user_id', 'transactions.transaction_id']);
    //     $this->db->from($this->table_name);
    //     $this->db->join('transactions', 'commissions.transactionId = transactions.id', 'left');
    //     $this->db->where('commissions.user_id', $user_id);
    //     $this->db->where('commissions.isPayout', 'true');
    //     $this->db->group_by("date");
    //     // $this->db->group_by("DATE_FORMAT(commissions.createdAt, '%Y-%m-%d')");
    //     // $this->db->order_by("commissions.createdAt", 'desc');
    //     if($page>0){
    //      $this->db->limit($perPage, $page);
    //     }
    //    $query= $this->db->get();
    //    return $query->result();
        $this->db->select_sum('amount');
        $this->db->select("date");
        $this->db->from($this->table_name);
        // $this->db->join('transactions', 'commissions.transactionId = transactions.id', 'left');
        $this->db->where('user_id', $user_id);
        $this->db->where('isPayout', 'true');
        $this->db->group_by("date");
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('date >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('date <=', date('Y-m-d', strtotime($_GET['to'])));
         
        }
        // $this->db->group_by("DATE_FORMAT(commissions.createdAt, '%Y-%m-%d')");
        // $this->db->order_by("commissions.createdAt", 'desc');
        if($page>0){
         $this->db->limit($perPage, $page);
        }
       $query= $this->db->get();
       $dwData = $query->result();
       if( count($dwData)>0){
        for($i=0;$i<count($dwData);$i++){
           
            $this->db->select(["commissions.isPayout","commissions.createdAt",'commissions.isPaymentCompleted','commissions.user_id','transactions.createdAt','transactions.id', 'transactions.transaction_id']);
            $this->db->from($this->table_name);
            $this->db->where('commissions.user_id', $user_id);
            $this->db->where('commissions.date', $dwData[$i]->date);
            $this->db->limit(1);
            $this->db->join('transactions', 'commissions.transactionId = transactions.id', 'left');
            $query1= $this->db->get();
            $details = $query1->result();
            $dwData[$i]->details = $details[0];
           
        }
       }
       
       return $dwData;
    }
    public function userPayoutCommissionReturn($user_id,$date=null){
        $this->db->select_sum('amount');
        // $this->db->select(["date"]);
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->where('isPayout', true);
        if($date!=null){
        $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
        }
        $this->db->group_by('user_id');
        // $this->db->order_by("createdAt", 'desc');
        
       $query= $this->db->get();

       return $query->result();
    }
    public function userPayoutCurrentCommission($user_id,$date=null){
        $this->db->select_sum('amount');
        // $this->db->select(["date"]);
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->where('isPayout', 'true');
        $this->db->where('isPaymentCompleted', 'false');
        if($date!=null){
        $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
        }
        $this->db->group_by('user_id');
        // $this->db->order_by("createdAt", 'desc');
        
       $query= $this->db->get();
       //echo $str = $this->db->last_query(); die;
       return $query->result();
    }
    public function userPayoutCommissionListDateWise($user_id,$date=null){
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('user_id', $user_id);
        $this->db->where('isPayout', true);
        if($date!=null){
        $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
        }
       
        $this->db->order_by("createdAt", 'desc');
        
       $query= $this->db->get();
       return $query->result();
    }
    public function userPayoutCommissionUpdateDateWise($user_id,$date=null, $isPayment,$transactionId=null){
       
       

       $updateData = ['updatedAt' => date('Y-m-d h:i:s'), 'isPaymentCompleted'=>$isPayment, 'transactionId'=>$transactionId];
       
       $this->db->from($this->table_name);
       $this->db->where('user_id', $user_id);
       $this->db->where('isPayout', 'true');
       $this->db->where('isPaymentCompleted', 'false');
    //    if($date!=null){
    //    $this->db->where('createdAt BETWEEN "'. date('Y-m-d', strtotime($date)). '" and "'. date('Y-m-d', strtotime($date. ' +1 day')).'"');
    //    }
       $this->db->set(
           $updateData
       )
       ->update();
    }
    
    public function commissionGoToPayout(){
        $updateData = ['updatedAt' => date('Y-m-d h:i:s'), 'payoutDate'=>date('Y-m-d'), 'isPayout'=>true];
        $this->db->from($this->table_name)
        ->where('isPayout', false)
        ->set(
            $updateData
        )
        ->update();
    }

    public function payoutHistory($user_id){
        
    }
    public function updateDate(){
       for($i=1;$i<1000;$i++){
        $commission = $this->db->from($this->table_name)->where('id',$i)->get()->row();
        $this->db->from($this->table_name)
        ->where('id', $i)
        ->set(['date'=>date('Y-m-d', strtotime($commission->createdAt))])->update();
       }
    }
    public function payoutAmount($user_id){
        $this->db->select_sum('amount');
        $this->db->from('transactions');
        $this->db->where('userId', $user_id);
        $this->db->where('transType', 'payout');
        $query= $this->db->get();
        return $query->row();
    }
}
