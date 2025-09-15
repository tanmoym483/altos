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
    public $isCommissionCalculate;

    public function createTransaction($data)
    {

        $insertData = [
            'createdAt' => date('Y-m-d h:i:s'),
        ];

        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        if (array_key_exists('transRefNo', $data))
            $insertData['transRefNo'] = $data['transRefNo'];
        if (array_key_exists('transaction_id', $data))
            $insertData['transaction_id'] = $data['transaction_id'];
        if (array_key_exists('transRefDoc', $data))
            $insertData['transRefDoc'] = $data['transRefDoc'];
        if (array_key_exists('vendor_id', $data))
            $insertData['vendor_id'] = $data['vendor_id'];
        if (array_key_exists('userId', $data)) {
            $insertData['userId'] = $data['userId'];
        }
        $insertData['createdBy'] = $data['createdBy'];
        if (array_key_exists('transType', $data))
            $insertData['transType'] = $data['transType'];
        // if (array_key_exists('customer_id', $data))
        //     $insertData['customer_id'] = $data['userId'];
        $this->db->insert($this->table_name, $insertData);
        return $this->db->insert_id();
    }

    public function updateTransection($userId, $data)
    {
        $insertData = [];
        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];
        if (array_key_exists('transRefNo', $data))
            $insertData['transRefNo'] = $data['transRefNo'];
        if (array_key_exists('transRefDoc', $data))
            $insertData['transRefDoc'] = $data['transRefDoc'];
        if (array_key_exists('transaction_id', $data))
            $insertData['transaction_id'] = $data['transaction_id'];
        $this->db->from($this->table_name)
            ->where('id', $userId)
            ->set(
                $insertData
            )
            ->update();
    }
    public function updateTransectionId($data)
    {
        $insertData = [];
        
        if (array_key_exists('transaction_id', $data))
            $insertData['transaction_id'] = $data['transaction_id'];
        $this->db->from($this->table_name)
            ->where('id', $data['id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function dematamount($id)
    {
        $query = $this->db->select('SUM(amount) as amount')
            ->from('transactions')
            ->where('transactions.userId', $id)
            ->where('transactions.transType', 'demat')
            ->where('transactions.status', 'approved')
            ->group_by('transactions.userId')
            ->get();
        return $query->result_array();
    }
    public function withdrawamount($id)
    {
        $query = $this->db->select('SUM(amount) as amount')
            ->from('transactions')
            ->where('transactions.userId', $id)
            ->where('transactions.transType', 'withdraw')
            ->where('transactions.status', 'approved')
            ->group_by('transactions.userId')
            ->get();
        return $query->result_array();
    }
    public function bonusamount($id)
    {
        $query = $this->db->select('SUM(amount) as amount')
            ->from('transactions')
            ->where('transactions.userId', $id)
            ->where('transactions.transType', 'bonus')
            ->where('transactions.status', 'approved')
            ->group_by('transactions.userId')
            ->get();
        return $query->result_array();
    }
    public function updaterejectdocument($data)
    {
        $insertData = [];

        if (array_key_exists('transRefNo', $data))
            $insertData['transRefNo'] = $data['transRefNo'];
        if (array_key_exists('transRefDoc', $data))
            $insertData['transRefDoc'] = $data['transRefDoc'];
        $insertData['status'] = 'approved';
        $this->db->from($this->table_name)
            ->where('id', $data['transactionid'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function updatedocument($data)
    {
        $insertData = [];

        if (array_key_exists('transRefNo', $data))
            $insertData['transRefNo'] = $data['transRefNo'];
        if (array_key_exists('transRefDoc', $data))
            $insertData['transRefDoc'] = $data['transRefDoc'];
        $insertData['status'] = 'approved';
        $this->db->from($this->table_name)
            ->where('id', $data['transction_id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function userRegistrationStatusUpdate($userId, $status)
    {
        try {
            $updateData =  [
                'status' => $status,
                'updatedAt' => date('Y-m-d h:i:s'),
                'updatedBy' => $this->session->userdata('userId')
            ];


            $this->db->from($this->table_name)
                ->where('userId', $userId)
                ->set(
                    $updateData
                )
                ->update();
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function customerTranctionlistid($id)
    {
        $this->db->select('transactions.*,transactions.status as tstatus,users.*,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->where('transactions.userId', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function withdrawhistoryDeails($search)
    {

        $this->db->select('withdraw.*, users.*,withdraw.status as tstatus,withdraw.id as tid,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName')
            ->from('users')
            ->join('transactions as withdraw', 'withdraw.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = withdraw.createdBy', 'left')
            ->where('withdraw.transType', 'withdraw');
        if ($search !== null) {
            $this->db->where('users.regId', $search);
        }
        $data = $this->db->get();
        return $data->result();
    }
    public function demathistoryDeails($search)
    {

        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->where('transactions.transType', 'demat');
        if ($search !== null) {
            $this->db->where('users.regId', $search);
        }
        $data = $this->db->get();
        return $data->result();
    }
    public function transactiondetail()
    {
        $this->db->select('transactions.*')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left');
        $data = $this->db->get();
        return $data->result();
    }
    public function counthistoryDeails($role, $search)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('count(*) as allcount')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        //->where('transactions.transType','deposite')->or_where('transactions.transType','card_active');
        if ($role == "admin") {
            $this->db->where('transactions.transType', 'card_active');
        } else {

            $this->db->group_start();
            $this->db->where('transactions.transType', 'deposite')->or_where('transactions.transType', 'card_active')->or_where('transactions.transType', 'vendor_active')->group_end();
        }

        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if ($search !== null) {
            $this->db->where('users.regId', $search);
        }



        $data = $this->db->order_by("transactions.id", "desc");
        // $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        $result = $data->result_array();
        return $result[0]['allcount'];
    }
    public function transHistory(){
        $currentUserId = $this->session->userdata('userId');
        $currentUserRole = $this->session->userdata('role');
        $query = $this->db->select('transaction_logs.*, users.*')->from('transaction_logs')
            ->join('users', 'users.id = transaction_logs.user_id', 'left');
        if($currentUserRole == 'vendor' || $currentUserRole == 'customer' || $currentUserRole == 'offline_shop'){
            $query = $this->db->where('transaction_logs.trasaction_createdBy',$currentUserId);
        }
        
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transaction_logs`.`transaction_date` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transaction_logs`.`transaction_date` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }
        $query = $this->db->order_by("transaction_logs.id", "desc");
        $query = $this->db->get();
        return $transaction = $query->result();
    }
    public function transHistoryDeails($rowno, $rowperpage){
        $currentUserId = $this->session->userdata('userId');
        $currentUserRole = $this->session->userdata('role');
        $query = $this->db->select('transaction_logs.*, users.*')->from('transaction_logs')
            ->join('users', 'users.id = transaction_logs.user_id', 'left');
            if($currentUserRole == 'vendor' || $currentUserRole == 'customer' || $currentUserRole == 'offline_shop'){
                $query = $this->db->where('transaction_logs.trasaction_createdBy',$currentUserId);
            }
        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $query =$this->db->where('`transaction_logs`.`transaction_date` >=', date('Y-m-d', strtotime($_GET['from'])));
            $query =$this->db->where('`transaction_logs`.`transaction_date` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }
        $query = $this->db->order_by("transaction_logs.id", "desc");
        $query = $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $transaction = $query->result();
    }
    public function historyDeails($role, $search, $rowno, $rowperpage)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as tcreatedAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        //->where('transactions.transType','deposite')->or_where('transactions.transType','card_active');
        if ($role == "admin") {
            $this->db->where('transactions.transType', 'card_active');
        } else {

            $this->db->group_start();
            $this->db->where('transactions.transType', 'deposite')->or_where('transactions.transType', 'card_active')->or_where('transactions.transType', 'vendor_active')->group_end();
        }

        if ($role == "vendor") {
            // $this->db->where('transactions.createdBy', 98);
            // $this->db->group_start();
            // $this->db->where('transactions.userId', 98);
            // $this->db->or_where('transactions.transType !=', 'registration');
            // $this->db->group_end();
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if ($search !== null) {
            $this->db->where('users.regId', $search);
        }



        $data = $this->db->order_by("transactions.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno);
        $data = $this->db->get();
        return $data->result();
        // }
    }
    public function allhistoryDeails($role, $search)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as tcreatedAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        //->where('transactions.transType','deposite')->or_where('transactions.transType','card_active');
        if ($role == "admin") {
            $this->db->where('transactions.transType', 'card_active');
        } else {

            $this->db->group_start();
            $this->db->where('transactions.transType', 'deposite')->or_where('transactions.transType', 'card_active')->or_where('transactions.transType', 'vendor_active')->group_end();
        }

        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if ($search !== null) {
            $this->db->where('users.regId', $search);
        }



        $data = $this->db->order_by("transactions.id", "desc");
       // $data = $this->db->limit($rowperpage, $rowno);
        $data = $this->db->get();
        return $data->result();
        // }
    }
    public function cardActivehistoryDeails($role, $search, $rowno, $rowperpage)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as tcreatedAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
       
        
            $this->db->where('transactions.transType', 'card_active');
       

        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno);
        $data = $this->db->get();
      // echo $str = $this->db->last_query(); die;
        return $data->result_array();
        // }
    }
    public function vendorActivehistoryDeails($role, $search, $rowno, $rowperpage)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as tcreatedAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
       
        
            $this->db->where('transactions.transType', 'vendor_active');
       

        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno);
        $data = $this->db->get();
        return $data->result_array();
        // }
    }
    public function csphistoryDeails($role, $search, $rowno, $rowperpage)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,bank_csp.application_id, bank_registration.createdAt as rcreatedAt,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('bank_csp', 'bank_csp.userId = users.id', 'left')
            ->join('bank_registration', 'bank_registration.createdBy = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
       
        
            $this->db->where('transactions.transType', 'csp_registration');
       

        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        $data = $this->db->limit($rowperpage, $rowno);
        $data = $this->db->get();
        return $data->result_array();
        // }
    }
    public function totalTrasactionCardActive(){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select('SUM(amount) AS total')->from('transactions');
        $this->db->where('transType', 'card_active');
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('createdBy', $userId);
            $this->db->or_where('vendor_id', $userId)->group_end();
        }
        $data = $this->db->get(); 
         $result = $data->row();
         return $result;
    }
    public function totalTrasactionCsp(){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select('SUM(amount) AS total')->from('transactions');
        $this->db->where('transType', 'csp_registration');
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('createdBy', $userId);
            $this->db->or_where('vendor_id', $userId)->group_end();
        }
        $data = $this->db->get(); 
         $result = $data->row();
         return $result;
    }
    public function totalTrasactionVendorActive(){
        $userId = $this->session->userdata('userId');
        $role = $this->session->userdata('role');
        $this->db->select('SUM(amount) AS total')->from('transactions');
        $this->db->where('transType', 'vendor_active');
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('createdBy', $userId);
            $this->db->or_where('vendor_id', $userId)->group_end();
        }
        $data = $this->db->get(); 
         $result = $data->row();
         return $result;
    }
    public function cardActivehistory($role, $search)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as tcreatedAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        
        
            $this->db->where('transactions.transType', 'card_active');
       
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        // $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        return $result = $data->result_array();
       
    }
    public function vendorActivehistory($role, $search)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName,transactions.createdAt as createdAt')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        
        
            $this->db->where('transactions.transType', 'vendor_active');
       
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        // $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        return $result = $data->result_array();
       
    }
    public function cspRegistrationhistory($role, $search)
    {
        $userId = $this->session->userdata('userId');


        $this->db->select('transactions.*,users.*,bank_csp.application_id, bank_registration.createdAt as rcreatedAt,transactions.status as tstatus,transactions.id as tid,transactions.createdBy as tcreatedBy,createduser.firstName as cfirstName, createduser.regId as cregId, createduser.lastName as clastName,createduser.cardnumber as ccardnumber,vendoruser.regId as vregId, vendoruser.lastName as vlastName,vendoruser.firstName as vfirstName')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'left')
            ->join('users as createduser', 'createduser.id = transactions.createdBy', 'left')
            ->join('bank_csp', 'bank_csp.userId = users.id', 'left')
            ->join('bank_registration', 'bank_registration.createdBy = transactions.createdBy', 'left')
            ->join('users as vendoruser', 'vendoruser.id = transactions.vendor_id', 'left');
        
        
            $this->db->where('transactions.transType', 'csp_registration');
       
        if ($role == "vendor") {
            $this->db->group_start();
            $this->db->where('transactions.createdBy', $userId);
            $this->db->or_where('transactions.vendor_id', $userId)->group_end();
        }

        if (!empty($_GET['from']) && !empty($_GET['to']) ) {
           
            $this->db->where('`transactions`.`createdAt` >=', date('Y-m-d', strtotime($_GET['from'])));
            $this->db->where('`transactions`.`createdAt` <=', date('Y-m-d', strtotime($_GET['to'] . " +1 days")));
         
        }



        $data = $this->db->order_by("transactions.id", "desc");
        // $data = $this->db->limit($rowperpage, $rowno); 
        $data = $this->db->get();
        return $result = $data->result_array();
       
    }
    public function gettransactionbyId($id)
    {
        $query = $this->db->select('*')
            ->from('transactions')
            ->where('transactions.id', $id)
            ->get();
        return $query->result();
    }
    public function gettransactionbyuId($id)
    {
        $query = $this->db->select('*')
            ->from('transactions')
            ->where('transactions.userId', $id)
            ->get();
        return $query->result();
    }
    public function getUser($username)
    {

        $query = $this->db->select('*')
            ->from('users')
            ->join('transactions', 'transactions.userId = users.id', 'right')
            ->where('transactions.id', $username)
            ->get();
        return $query->result();
    }
    public function userPaymentStatusUpdate($userId, $status)
    {
        try {
            $updateData =  [
                'status' => $status,
                'updatedAt' => date('Y-m-d h:i:s'),
                'updatedBy' => $this->session->userdata('userId')
            ];

            $this->db->from($this->table_name)
                ->where('id', $userId)
                ->set(
                    $updateData
                )
                ->update();
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function getTotalRegistrationList($type)
    {
        $query = $this->db->from($this->table_name)
            ->where('transType', $type)
            ->where('status', 'approved')
            ->where('isCommissionCalculate', false)
            ->get();
        return $query->result();
    }
    // public function get_filtered_data($startDate = '', $endDate = '') {
    //     $currentUserId = $this->session->userdata('userId');
    //     $this->db->select('transaction_logs.*, users.*')->from('transaction_logs')
    //         ->join('users', 'users.id = transaction_logs.user_id', 'left');
    //     $this->db->where('transaction_logs.created_by',$currentUserId);
       

    //     // Apply date filters if provided
    //     if (!empty($startDate)) {
    //         $this->db->where('transaction_logs.transaction_date >=', $startDate);
    //     }
    //     if (!empty($endDate)) {
    //         $this->db->where('transaction_logs.transaction_date <=', $endDate);
    //     }
    //     $query = $this->db->order_by("transaction_logs.id", "desc");
    //     // Handle pagination (DataTables handles this automatically)
    //     $this->db->limit($_POST['length'], $_POST['start']);

    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function count_all() {
    //     $currentUserId = $this->session->userdata('userId');
    //     return $this->db->count_all('transaction_logs')->where('transaction_logs.created_by',$currentUserId);
    // }

    // public function count_filtered($startDate = '', $endDate = '') {
    //     $currentUserId = $this->session->userdata('userId');
    //     $this->db->select('transaction_logs.*, users.*')->from('transaction_logs')
    //         ->join('users', 'users.id = transaction_logs.user_id', 'left');
    //     $this->db->where('transaction_logs.created_by',$currentUserId);

    //     // Apply date filters if provided
    //     if (!empty($startDate)) {
    //         $this->db->where('transaction_date >=', $startDate);
    //     }
    //     if (!empty($endDate)) {
    //         $this->db->where('transaction_date <=', $endDate);
    //     }

    //     return $this->db->count_all_results();
    // }
}
