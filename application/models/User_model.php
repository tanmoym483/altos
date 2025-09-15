<?php
class User_model extends CI_Model
{

    public $table_name = "users";
    public $transactions_table = "transactions";

    public $firstName;
    public $middleName;
    public $lastName;
    public $email;
    public $password;
    public $phone;
    public $countryCode;
    public $city;
    public $district;
    public $state;
    public $postcode;
    public $address;
    public $parentNode;
    public $leftChild;
    public $rightChild;
    public $regId;
    public $pic;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;
    public $status;
    public $isFirstLogin;

    public function createUser($data)
    {
        if (array_key_exists('membarName', $data)) {
            $name = explode(' ', strtoupper($data['membarName']));
            if (count($name) > 0) {
                $data['firstName'] = ($name[0] != '') ? $name[0] : '';
                $data['lastName'] = ($name[1] != '') ? $name[1] : '';
            } else {
                $data['firstName'] = $name[0];
            }
        }
        $insertData = ['role' => 'vendor'];
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
            $insertData['regId'] =  strtoupper($data['regId']);
        if (array_key_exists('birthday', $data))
            $insertData['birthday'] = $data['birthday'];
        if (array_key_exists('pic', $data))
            $insertData['pic'] = $data['pic'];
        if (array_key_exists('isFirstLogin', $data))
            $insertData['isFirstLogin'] = $data['isFirstLogin'];
        if (array_key_exists('role', $data))
            $insertData['role'] = $data['role'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');

        $this->db->insert($this->table_name, $insertData);
    }

    public function getvendor($limit=0, $perPage=10)
    {
        $this->db->from('users');
        $this->db->where('role', 'vendor');
        $this->db->where('status', 'active');
        if($_GET['search'] != ''){
            $this->db->where('regId', $_GET['search']);
        }
        if($limit >=0){
            $this->db->limit($perPage, $limit);
        }
       
        $query = $this->db->get();
       
        return $query->result();
    }
    public function getpendingvendor()
    {
        $this->db->from('users');
        $this->db->where('role', 'vendor');
        $this->db->where('status', 'pending');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateUser($data)
    {
        $insertData = [];
        if (array_key_exists('membarName', $data)) {
            $name = explode(' ', $data['membarName']);
            if (count($name) > 0) {
                $data['firstName'] = ($name[0] != '') ? $name[0] : '';
                $data['lastName'] = ($name[1] != '') ? $name[1] : '';
            } else {
                $data['firstName'] = $name[0];
            }
        }
        if (array_key_exists('role', $data))
            $insertData = ['role' => 'vendor'];
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] =  strtoupper($data['firstName']);
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] =  strtoupper($data['middleName']);
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] =  strtoupper($data['lastName']);
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
            $insertData['district'] =  strtoupper($data['district']);
        if (array_key_exists('state', $data))
            $insertData['state'] =  strtoupper($data['state']);
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('address', $data))
            $insertData['address'] =  strtoupper($data['address']);
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
        if (array_key_exists('card_status', $data))
            $insertData['card_status'] = $data['card_status'];
        if (array_key_exists('status', $data))
            $insertData['status'] = $data['status'];
        if (array_key_exists('wallet', $data))
            $insertData['wallet'] = $data['wallet'];
        if (array_key_exists('fatherName', $data))
            $insertData['fatherName'] =  strtoupper($data['fatherName']);
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] =  strtoupper($data['motherName']);
        if (array_key_exists('birthday', $data))
            $insertData['birthday'] = $data['birthday'];
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] =  strtoupper($data['Mother_Name']);
        //$insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->from($this->table_name)
            ->where('id', $data['userId'])
            ->set(
                $insertData
            )
            ->update();
    }

    public function getUsers($search = "", $rowno, $rowperpage, $other = [])
    {
        // print_r($other);die;
        //    echo $search ;die;
        $select = 'users.*';

        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');
        
        $this->db->limit($rowperpage, $rowno); 
        $this->db->order_by('users.id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    public function getUsersCount($search = "", $other = [])
    {
        $select = 'users.*';

        // if (array_key_exists('trans', $other) && $other['trans']) {
        //     $select .= ',trans.transRefNo,transRefDoc';
        // }
        // if (array_key_exists('kyc', $other) && $other['kyc'])
        //     $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');
        
        
        $this->db->order_by('users.id', 'DESC');

        $query = $this->db->get();
        return $query->num_rows(); 
    }
    public function getAllUsers($search = "", $rowno, $rowperpage, $other = []){
        $select = 'users.*';

        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');
        
        
        $this->db->order_by('users.id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    public function getUsersById($id, $search = "", $rowno, $rowperpage, $other = [])
    {

        // print_r($other);die;
        //    echo $search ;die;
        $select = 'users.*';

        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');

        $this->db->order_by('users.id', 'DESC');
        $this->db->limit($rowperpage, $rowno); 
        $this->db->where('users.createdBy', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllUsersById($id, $search = "", $rowno, $rowperpage, $other = [])
    {

        // print_r($other);die;
        //    echo $search ;die;
        $select = 'users.*';

        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');

        $this->db->order_by('users.id', 'DESC');
       
        $this->db->where('users.createdBy', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllUsersCountById($id, $search = "",$other = [])
    {

        // print_r($other);die;
        //    echo $search ;die;
        $select = 'users.*';

        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');


        if ($search !== null) {
            $this->db->where('email', $search)
                ->or_where('regId', $search);
            // ->or_where("firstName LIKE '%'.$search.'%'");
        }

        if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
            // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
            $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
            $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');

        $this->db->order_by('users.id', 'DESC');
       
        $this->db->where('users.createdBy', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getMembers($search = "", $page = 1, $limit = 10, $other = [])
    {
        $select = 'users.*';
        if (array_key_exists('trans', $other) && $other['trans']) {
            $select .= ',trans.transRefNo,transRefDoc';
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $select .= ',kyc.panNo,panDoc,addharNo,addharFrontDoc,addharBackDoc';
        $this->db->select($select)
            ->from($this->table_name);
        $this->db->where('role!=', 'superAdmin');
        $this->db->where('status', 'approved');

        if ($search !== '') {
            $this->db->where('email', $search)
                ->or_where('regId', $search)
                ->or_where("firstName LIKE '%'.$search.'%'");
        }
        if (array_key_exists('trans', $other) && $other['trans']) {
            $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"');
        }
        if (array_key_exists('kyc', $other) && $other['kyc'])
            $this->db->join('user_kyc as kyc', 'kyc.userId=users.id');
        $this->db->order_by('users.id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    public function getUser($username)
    {
        $query = $this->db->select('*')
            ->from($this->table_name)
            ->where('email', $username)
            ->or_where('id', $username)
            ->or_where('regId', $username)
            ->get();

        return $query->result();
    }
    public function getVendors($str = null, $other = [])
    {

        if ($str) {
            $searchWhere = "(firstName like '%$str%' or lastName like '%$str%' or email like '%$str%' or regId like '%$str%')";
            $this->db->select('*')
                ->from($this->table_name)
                ->where('parentNode', null)
                ->where('role', 'vendor')
                ->where("status", 'active')
                ->where($searchWhere);
            if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
                // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
                $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
                $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
            }
            $query = $this->db->get();
            return $query->result();
        } else {

            $this->db->select('*')
                ->from($this->table_name)
                ->where('parentNode', null)
                ->where('role', 'vendor')
                ->where("status", 'active');
            if (((array_key_exists('to', $other) && $other['to'])) && (array_key_exists('from', $other) && $other['from'])) {
                // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
                $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($other['from'])));
                $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($other['to'] . " +1 days")));
            }
            $query = $this->db->get();
            return $query->result();
        }
    }
    public function adminUserPdfModel($formdate, $todate)
    {
        $this->db->select('*')
            ->from($this->table_name)
            ->where('parentNode', null)
            ->where('role', 'vendor')
            ->where("status", 'active')
            ->where(array(
                'users.createdAt >= ' => $formdate,
                'users.createdAt <= ' => $todate
            ));
        $query = $this->db->get();
        return $query->result();
    }

    public function getpdf()
    {
        //  $query = $this->db->select('*')
        //     ->from($this->table_name);
        //     $this->db->where('createdAt <=','2023-02-24 06:49:54');
        //   $this->db->where('createdAt >=','2023-04-06 06:12:46');
        //     // ->where('createdAt','2023-02-24 06:49:54')
        //     // ->or_where('createdAt','2023-04-06 06:12:46')
        //   $this->db->get();
        // return $query->result();
        $query = $this->db
            ->select('*')->from($this->table_name)
            ->where(array(
                'createdAt >= ' => '2023-02-24',
                'createdAt <= ' => '2023-04-06'
            ))
            ->get();

        echo '<pre>';
        print_r($query->result());
        die;
        '</pre>';
        // return $query->result();
    }
    public function bdoGenaretPdf($formdate, $todate)
    {
        //  $query = $this->db
        // ->select('*')->from('users');
        //  $this->db->join ( 'transactions', 'transactions.userId = users.id' , 'left' )
        //  ->where('users.id','transactions.userId')
        // // ->where(array(
        // //     'users.createdAt >= ' => '2023-02-24',
        // //     'users.createdAt <= ' => '2023-04-06'
        // // ))
        // ->get();
        $this->db->select('*');
        $this->db->from('users');

        // $this->db->join ( 'transactions', 'transactions.userId = users.id' , 'left' )
        $this->db->join('transactions as trans', 'trans.userId=users.id AND trans.transType="registration"')
            ->where(array(
                'users.createdAt >= ' => $formdate,
                'users.createdAt <= ' => $todate
            ));
        $query = $this->db->get();

        return $query->result();
    }
    public function userGenaretPdf($formdate, $todate)
    {
        $wheres = array(
            'createdAt >= ' => '2023-02-24',
            'createdAt <= ' => '2023-04-06',
        );
        $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
            FROM `users` u 
            LEFT JOIN users p ON p.id = u.parentNode
            LEFT JOIN users lc on lc.id = u.leftChild 
            LEFT JOIN users rc on rc.id = u.rightChild 
            where u.createdAt >='$formdate' AND u.createdAt <='$todate'";
        //  where u.regId='$search'";2023-04-06 06:12:46
        //  where u.firstName='$search'";
        $query = $this->db->query($resp);
        return $query->result();
    }
    public function getAddUser($username, $search, $rowno, $rowperpage, $others = [])
    { 
       
        $role = $this->session->userdata('role');
        
        if (count($others) > 1) {
           
            $role = $this->session->userdata('role');
            
            if ($role == "superAdmin") {
                
                $fromDate = date('Y-m-d', strtotime($others['from']));
                $toDate = date('Y-m-d', strtotime($others['to'])); 
                
                
                //  print_r($toDate);die;
                $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
        FROM `users` u 
        LEFT JOIN users p ON p.id = u.parentNode
        LEFT JOIN users lc on lc.id = u.leftChild 
        LEFT JOIN users rc on rc.id = u.rightChild 
      
      where u.createdAt >='$fromDate' AND u.createdAt <='$toDate' AND u.role='vendor' LIMIT $rowno, $rowperpage";
                $query = $this->db->query($resp);
                //return $query->result();
            } else {

                $this->db->select('*')
                    ->from($this->table_name)
                    ->where('id', $username);
                $da = $this->db->get();
                $response = $da->row();
                $role = $response->role;
                $leftChild = $response->leftChild;
                $rightChild = $response->rightChild;

                $this->db->select('*')
                    ->from($this->table_name)
                    ->where('id', $leftChild)
                    ->or_where('id', $rightChild)
                    ->or_where('email', $search)
                    ->or_where('regId', $search);
                if (((array_key_exists('to', $others) && $others['to'])) && (array_key_exists('from', $others) && $others['from'])) {
                    // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
                    $this->db->where('users.createdAt >=', date('Y-m-d', strtotime($others['from'])));
                    $this->db->where('users.createdAt <=', date('Y-m-d', strtotime($others['to'])));
                    $this->db->where('users.role', 'vendor');
                }
                $this->db->limit($rowperpage, $rowno); 
                $query = $this->db->get();
                
            }
        }
        if ($role == "superAdmin") {
            $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
            FROM `users` u 
            LEFT JOIN users p ON p.id = u.parentNode
            LEFT JOIN users lc on lc.id = u.leftChild 
            LEFT JOIN users rc on rc.id = u.rightChild 

            where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '') AND u.role='vendor' order by u.id desc LIMIT $rowno, $rowperpage;";
            $query = $this->db->query($resp);
        
            if($search != ''){
                $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
                FROM `users` u 
                LEFT JOIN users p ON p.id = u.parentNode
                LEFT JOIN users lc on lc.id = u.leftChild 
                LEFT JOIN users rc on rc.id = u.rightChild 
        
                where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '') AND u.regId = '$search' AND u.role='vendor' order by u.id desc LIMIT $rowno, $rowperpage; ";
                $query = $this->db->query($resp);
                
            }
        
        } else {
            $this->db->select('*')
            ->from($this->table_name)
            ->where('id', $username);
            $da = $this->db->get();
            $response = $da->row();
            $role = $response->role;
            $leftChild = $response->leftChild;
            $rightChild = $response->rightChild;

            $this->db->select('*')
                ->from($this->table_name)
                ->where('id', $leftChild)
                ->or_where('id', $rightChild);
            if($search != ''){
                $this->db->where('regId', $search);
            }
            $this->db->limit($rowperpage, $rowno); 
            $query = $this->db->get();
            //return $query->result();
        } 
       
        $data = $query->result();
        return $data;
    }
    public function getAllFUsers($currentUserId, $search, $rowno,$rowperpage, $others = []){
        $role = $this->session->userdata('role');
        if (count($others) > 1) {

            $role = $this->session->userdata('role');
            if ($role == "superAdmin") {

                $fromDate = date('Y-m-d', strtotime($others['from']));
                $toDate = date('Y-m-d', strtotime($others['to'])); 
                //  print_r($toDate);die;
                $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
        FROM `users` u 
        LEFT JOIN users p ON p.id = u.parentNode
        LEFT JOIN users lc on lc.id = u.leftChild 
        LEFT JOIN users rc on rc.id = u.rightChild 
      
      where DATE(u.createdAt) >='$fromDate' AND DATE(u.createdAt) <='$toDate' AND u.role='vendor' ";
                $query = $this->db->query($resp);
                //return $query->result();
            } else {

                $this->db->select('*')
                    ->from($this->table_name)
                    ->where('id', $username);
                $da = $this->db->get();
                $response = $da->row();
                $role = $response->role;
                $leftChild = $response->leftChild;
                $rightChild = $response->rightChild;

                $this->db->select('*')
                    ->from($this->table_name)
                    ->where('id', $leftChild)
                    ->or_where('id', $rightChild)
                    ->or_where('email', $search)
                    ->or_where('regId', $search);
                if (((array_key_exists('to', $others) && $others['to'])) && (array_key_exists('from', $others) && $others['from'])) {
                    // $this->db->where('users.createdAt BETWEEN "' . date('Y-m-d', strtotime($other['from'])) . '" and "' . date('Y-m-d', strtotime($other['to'])) . '"');
                    $this->db->where('DATE(users.createdAt) >=', date('Y-m-d', strtotime($others['from'])));
                    $this->db->where('DATE(users.createdAt) <=', date('Y-m-d', strtotime($others['to'])));
                    $this->db->where('users.role', 'vendor');
                }
                
                $query = $this->db->get();
                
            }
        } else{
            if ($role == "superAdmin") {
                $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
                FROM `users` u 
                LEFT JOIN users p ON p.id = u.parentNode
                LEFT JOIN users lc on lc.id = u.leftChild 
                LEFT JOIN users rc on rc.id = u.rightChild 
    
                where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '')  AND u.role='vendor' order by u.id desc ;";
                $query = $this->db->query($resp);
            
                if($search != ''){
                    $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
                    FROM `users` u 
                    LEFT JOIN users p ON p.id = u.parentNode
                    LEFT JOIN users lc on lc.id = u.leftChild 
                    LEFT JOIN users rc on rc.id = u.rightChild 
            
                    where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '') AND u.regId = '$search' AND u.role='vendor' order by u.id desc ; ";
                    $query = $this->db->query($resp);
                    
                }
            
            } else {
                $this->db->select('*')
                ->from($this->table_name)
                ->where('id', $username);
                $da = $this->db->get();
                $response = $da->row();
                $role = $response->role;
                $leftChild = $response->leftChild;
                $rightChild = $response->rightChild;
    
                $this->db->select('*')
                    ->from($this->table_name)
                    ->where('id', $leftChild)
                    ->or_where('id', $rightChild);
                if($search != ''){
                    $this->db->where('regId', $search);
                }
               
                $query = $this->db->get();
                //return $query->result();
            } 
        }
       
        $data = $query->result();
        return $data;
    }
    public function get_users_by_parent($parent_id = NULL) {
        $this->db->where('parentNode', $parent_id);
        $query = $this->db->get('users');
        return $query->result();  // Return the result as an array of objects
    }
    public function getAllUserReport($search){
        $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
        FROM `users` u 
        LEFT JOIN users p ON p.id = u.parentNode
        LEFT JOIN users lc on lc.id = u.leftChild 
        LEFT JOIN users rc on rc.id = u.rightChild 

        where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '') AND u.role='vendor' order by u.id desc ";
        $query = $this->db->query($resp);
    
        if($search != ''){
            $resp = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
            FROM `users` u 
            LEFT JOIN users p ON p.id = u.parentNode
            LEFT JOIN users lc on lc.id = u.leftChild 
            LEFT JOIN users rc on rc.id = u.rightChild 
    
            where (u.leftChild!= '' OR u.rightChild!= '' OR u.parentNode!= '') AND u.regId = '$search' AND u.role='vendor' order by u.id desc ";
            $query = $this->db->query($resp);
            
        }
        $data = $query->result();
        return $data;
    }
    public function getUserReport($username, $search, $others = [])
    {
       if($username != ''){
            $users = $this->get_users_by_parent($username);
       
            $tree = [];
            foreach ($users as $user) {
                // Recursively fetch the children of the current user
                $user->children = $this->getUserReport($user->id, $search, $others = []);
                
                $tree[] = $user;  // Append the user and their children to the tree
            }
       } else {
        $tree[] = '';
       } 
        
        return $tree;  // Return the complete tree
        
    
    }
    public function countTreeMembers($parentId) {
        $count = 0;
        if($parentId != 0){
            $users = $this->get_users_by_parent($parentId);

            foreach ($users as $user) {
                $count += 1 + $this->countTreeMembers($user->id);
            }
        }
        return $count;
    }
    public function getUserDetailsByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_banks', 'user_banks.userId = users.id', 'left');
        $this->db->join('user_kyc', 'user_kyc.userId = users.id', 'left');
        $this->db->join('transactions', 'transactions.userId = users.id', 'left');
        $this->db->join('nominees', 'nominees.userId = users.id', 'left');
        $this->db->where('users.email', $email);
        $this->db->where('users.status', 'active');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getUserDetailsByCard($cardnumber)
    {
        $this->db->select('users.*,user_card.*,users.id as uid');
        $this->db->from('users');
      
        $this->db->join('user_card', 'user_card.user_id = users.id', 'left');
        $this->db->where('users.cardnumber', $cardnumber);
       
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getUserDetailsByuId($user)
    {
        $this->db->select('users.*,user_card.*,users.id as uid');
        $this->db->from('users');
      
        $this->db->join('user_card', 'user_card.user_id = users.id', 'left');
        $this->db->where('users.id', $user);
       
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getUserDetailsByCardnumber($cardnumber){
        $this->db->select('*');
        $this->db->from('users');
      
        $this->db->join('user_kyc', 'user_kyc.userId = users.id');
        $this->db->where('users.cardnumber', $cardnumber);
       
        $query = $this->db->get();
          
        return $query->result();
    }
    public function getUserDetailsbyid($id)
    {
        $this->db->select('users.*,transactions.*,users.status as ustatus,transactions.id as transactionid');
        $this->db->from('users');
        $this->db->join('transactions', 'transactions.userId = users.id', 'left');
        $this->db->where('users.id', $id);
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
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
    public function getAmountleftChild()
    {
        $currentUserId = $this->session->userdata('userId');
        $this->db->select_sum('amount');
        $this->db->from('users');
        $this->db->join('transactions', 'transactions.userId = users.leftChild', 'left');
        $this->db->where('users.id', $currentUserId);
        $this->db->where('transactions.transType', 'deposite');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getleftChild()
    {
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('Count(*) as lcount');
        $this->db->from('users');
       // $this->db->join('transactions', 'transactions.userId = users.leftChild', 'left');
        $this->db->where('parentNode', $currentUserId);
        $this->db->where('side', 'left');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getRightChild()
    {
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('Count(*) as rcount');
        $this->db->from('users');
       // $this->db->join('transactions', 'transactions.userId = users.leftChild', 'left');
        $this->db->where('parentNode', $currentUserId);
        $this->db->where('side', 'right');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getAmountrightChild()
    {
        $currentUserId = $this->session->userdata('userId');
        $this->db->select_sum('amount');
        $this->db->from('users');
        $this->db->join('transactions', 'transactions.userId = users.rightChild', 'left');
        $this->db->where('users.id', $currentUserId);
        $this->db->where('transactions.transType', 'deposite');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function getAmountCustomer()
    {
        $currentUserId = $this->session->userdata('userId');
        $this->db->select_sum('amount');
        $this->db->from('users');
        $this->db->join('transactions', 'transactions.userId = users.id', 'left');
        $this->db->where('users.createdBy', $currentUserId);
        $this->db->where('users.role', 'customer');
        $this->db->where('transactions.transType', 'demat');
        $query = $this->db->get();
        //   echo '<pre>'; print_r($query->result());die; '</pre>';
        return $query->result();
    }
    public function checkUserId($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function checkrole($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('regId', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function createAdmin($adminData)
    {
        try {

            $admin = $this->getUser($adminData['regId']);
            if (count($admin) == 0)
                $this->createUser($adminData);
        } catch (Exception $e) {
            print_r($e);
        }
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
                ->where('id', $userId)
                ->set(
                    $updateData
                )
                ->update();
        } catch (Exception $e) {
            print_r($e);
        }
    }
    public function login($username, $password)
    {
        $query = $this->db->from($this->table_name)
            ->where('email', $username)
            ->or_where('regId', $username)
            ->get();
    }

    public function forgot($username, $random_number)
    {

        $this->db->select("*")
            ->from('users')
            ->where('email', $username)
            ->or_where('regId', $username);
        $data = $this->db->get();
        $result = $data->row();

        if ($result) {
            // print_r($result);die;
            $updateData =  [
                'password' => md5($random_number),
                'isFirstLogin' => 'n'
            ];


            $this->db->from('users')
                ->where('id', $result->id)
                ->set(
                    $updateData
                )
                ->update();
            $this->session->set_flashdata('flassuccess', 'Your password has been reset and sent on your email.');
            return $result;
        } else {
            $this->session->set_flashdata('error', 'Something is wrong.');
        }
    }
    public function getuserdetailbycard($card)
    {
        $this->db->select("*")
            ->from('users')
            ->where('cardnumber', $card);
        $data = $this->db->get();
        return $result = $data->row();
    }
    public function getuserdetailbyid($id)
    {
        $this->db->select("*")
            ->from('users')
            ->where('id', $id);
        $data = $this->db->get();
        return $result = $data->row();
    }
    public function dashbordUserDetails($id)
    {
        $currentUserrole = $this->session->userdata('role');

        if ($currentUserrole === "superAdmin" || $currentUserrole === "admin") {
            $query = 'SELECT SUM(wallet) as amount FROM `users` where id IN ( SELECT userid FROM `transactions` WHERE transactions.`transType` = "deposite" AND transactions.`status` = "approved" GROUP by userid)';
            $query = $this->db->query($query);
            return $query->result();
        }
        if ($currentUserrole === "vendor") {
            $this->db->select('wallet,status,cardnumber,card_status');
            $this->db->from('users');
            $this->db->where('id', $id);
            $amountget = $this->db->get();
            return $amountget->result();
        }
        if ($currentUserrole === "customer") {
            $this->db->select('wallet,status,cardnumber,card_status');
            $this->db->from('users');
            $this->db->where('id', $id);
            $amountget = $this->db->get();
            return $amountget->result();
        }
    }

    public function stateAllDetails()
    {
        $this->db->select('*');
        $this->db->from('states');
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserInfoLevelWise($reg)
    {
        $level = 0;
        $leftChilds = 0;
        $rightChilds = 0;
        $childs = 0;




        $this->getChildCount($reg, $childs, $leftChilds);
        echo $childs;
    }

    public function getActiveVendors()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'vendor');
        $this->db->where('status', 'active');
        // $this->db->where('parentNode', null);
        $query = $this->db->get();
        return $query->result();
    }
    // public function updateLevels()
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     $this->db->where('role', 'vendor');
    //     $this->db->where('status', 'active');
    //     // $this->db->where('parentNode', null);
    //     $query = $this->db->get();
    //     $result = $query->result();
    //     // print_r($result);

    //     if (count($result) > 0) {
    //         for ($i = 0; $i < count($result); $i++) {

    //             $data = [];
    //             $this->getLevels($result[$i]->id, $data);
    //             echo "No of child================";
    //             $leftChild = 0;

    //             $rightChild = 0;
    //             $child = 0;
    //             $level = 0;
    //             $this->getChildCount($result[$i]->leftChild, $leftChild,  $child);
    //             $this->getChildCount($result[$i]->rightChild, $rightChild,  $child);
    //             // $this->findHeight($result[$i]->id);
    //             echo "<pre>";
    //             print_r($data);
    //             echo "leftChild=" . $leftChild;
    //             echo "rightChild=" . $rightChild;
    //             $calculatedLevel = 0;
    //             $actualCompletedLevel = 0;
    //             echo "cal level=" . $calculatedLevel;
    //             if ($data['rd'] > $data['ld']) {
    //                 $calculatedLevel = $data['ld'];
    //                 if ($calculatedLevel >= 1) {
    //                     $maxChild = $calculatedLevel * 2 - 1;
    //                     if ($maxChild <= $leftChild && $maxChild <= $rightChild) {
    //                         $actualCompletedLevel = $calculatedLevel;
    //                     } else {
    //                         $actualCompletedLevel = $calculatedLevel - 1;
    //                     }
    //                 } else {
    //                 }
    //             } else {
    //                 $calculatedLevel = $data['rd'];
    //                 if ($calculatedLevel >= 1) {
    //                     $maxChild = $calculatedLevel * 2 - 1;
    //                     if ($maxChild <= $leftChild && $maxChild <= $rightChild) {
    //                         $actualCompletedLevel = $calculatedLevel;
    //                     } else {
    //                         $actualCompletedLevel = $calculatedLevel - 1;
    //                     }
    //                 }
    //             }
    //             echo "actual level=" . $actualCompletedLevel;
    //             // print_r($levelData);
    //             echo "</pre>";
    //         }
    //     }
    // }
    public function getLevels($id, &$data)
    {

        if (!$id) {
            return 0;
        }
        $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName, (select sum(amount) from transactions where transType='deposite' and userId = " . $id . " GROUP BY userId ) as deposite_amount FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result();

        if (count($result) > 0) {


            $ld = $this->getLevels($result[0]->leftChild, $data);

            $rd = $this->getLevels($result[0]->rightChild, $data);
            $h = max($ld, $rd) + 1;
            $data = [
                'id' => $id,
                'regId' => $result[0]->regId,
                'h' => $h,
                'ld' => $ld,
                'rd' => $rd

            ];

            return $h;
        }
    }


    public function findDepth($id) {}
    public function findHeight($id)
    {
        if (!$id) {
            return 0;
        }
        $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName, (select sum(amount) from transactions where transType='deposite' and userId = " . $id . " GROUP BY userId ) as deposite_amount FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result();

        if (count($result) > 0) {


            $ld = $this->findHeight($result[0]->leftChild);

            $rd = $this->findHeight($result[0]->rightChild);
            $l = max($ld, $rd) + 1;
            // echo "<pre>";
            // print_r(["id" => $result[0]->id, "level" => $l, 'regId' => $result[0]->regId]);
            // echo "</pre>";
            return $l;
        }
    }
    public function getChildCount($id, &$childs, &$activeChilds)
    {

        if (!$id) {
            return;
        }

        // $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
        $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName, (select sum(amount) from transactions where transType='deposite' and userId = " . $id . " GROUP BY userId ) as deposite_amount FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result();

        if (count($result) > 0) {
            $childs++;

            $this->getChildCount($result[0]->leftChild, $childs, $activeChilds);
            $this->getChildCount($result[0]->rightChild, $childs, $activeChilds);
        }
    }
    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('id', $id);
        // $this->db->where('parentNode', null);
        $query = $this->db->get();
        return $query->result();
    }
    public function activeUserList($type)
    {
        $this->db->select('*');
        $this->db->from('users');
        if($_GET['search'] != ''){
            $this->db->where('regId', $_GET['search']);
        }
        $this->db->where('role', $type);
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->result();
    }
    public function activeCardList($type)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', $type);
        $this->db->where('card_status', 'active');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSuperAdminId()
    {
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('role', 'superAdmin');
        $query = $this->db->get();
        return $query->result();
    }
}
