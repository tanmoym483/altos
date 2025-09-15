<?php
class User_model extends CI_Model
{

    public $table_name = "users";
    public $transactions_table="transactions";

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
        $insertData =['role' => 'vendor'];
        if (array_key_exists('firstName', $data))
            $insertData['firstName'] = $data['firstName'];
        if (array_key_exists('middleName', $data))
            $insertData['middleName'] = $data['middleName'];
        if (array_key_exists('lastName', $data))
            $insertData['lastName'] = $data['lastName'];
        if (array_key_exists('email', $data))
            $insertData['email'] = $data['email'];
        if (array_key_exists('password', $data))
            $insertData['password'] = md5($data['password']);
        if (array_key_exists('phone', $data))
            $insertData['phone'] = $data['phone'];
        if (array_key_exists('countryCode', $data))
            $insertData['countryCode'] = $data['countryCode'];
        if (array_key_exists('city', $data))
            $insertData['city'] = $data['city'];
        if (array_key_exists('district', $data))
            $insertData['district'] = $data['district'];
        if (array_key_exists('state', $data))
            $insertData['state'] = $data['state'];
        if (array_key_exists('postcode', $data))
            $insertData['postcode'] = $data['postcode'];
        if (array_key_exists('address', $data))
            $insertData['address'] = $data['address'];
        if (array_key_exists('regId', $data))
            $insertData['regId'] = $data['regId'];
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

    

    public function updateUser($data)
    {
        $insertData=[];
        if(array_key_exists('role',$data))
        $insertData = ['role' => 'vendor'];
        if (array_key_exists('firstName', $data))
        $insertData['firstName'] = $data['firstName'];
    if (array_key_exists('middleName', $data))
        $insertData['middleName'] = $data['middleName'];
    if (array_key_exists('lastName', $data))
        $insertData['lastName'] = $data['lastName'];
    if (array_key_exists('email', $data))
        $insertData['email'] = $data['email'];
    if (array_key_exists('password', $data))
        $insertData['password'] = md5($data['password']);
    if (array_key_exists('phone', $data))
        $insertData['phone'] = $data['phone'];
    if (array_key_exists('countryCode', $data))
        $insertData['countryCode'] = $data['countryCode'];
    if (array_key_exists('city', $data))
        $insertData['city'] = $data['city'];
    if (array_key_exists('district', $data))
        $insertData['district'] = $data['district'];
    if (array_key_exists('state', $data))
        $insertData['state'] = $data['state'];
    if (array_key_exists('postcode', $data))
        $insertData['postcode'] = $data['postcode'];
    if (array_key_exists('address', $data))
        $insertData['address'] = $data['address'];
    if (array_key_exists('regId', $data))
        $insertData['regId'] = $data['regId'];
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
    if (array_key_exists('status', $data))
        $insertData['status'] = $data['status'];
        if (array_key_exists('fatherName', $data))
            $insertData['fatherName'] = $data['fatherName'];
        if (array_key_exists('motherName', $data))
            $insertData['motherName'] = $data['motherName'];
        if (array_key_exists('gender', $data))
            $insertData['gender'] = $data['gender'];
        if (array_key_exists('Mother_Name', $data))
            $insertData['Mother_Name'] = $data['Mother_Name'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->where('id',$data['userId']);
        $this->db->update($this->table_name, $insertData);
    }

    public function getUsers($search = "", $page = 1, $limit = 10, $other = [])
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
     public function getAddUser($username)
    {
        $this->db->select('*')
        ->from($this->table_name)
        ->where('id', $username);
        $da= $this->db->get();
        $response=$da->row();
        $role=$response->role;
        $leftChild=$response->leftChild;
        $rightChild=$response->rightChild;
    //   print_r($role);die;
    
     if($role=="superAdmin"){
        //   print_r('*super');die;
          $this->db->select('*')
            ->from($this->table_name)
            ->where('status','active');
           $data= $this->db->get();
        //   print_r($data->result());die;
            return $data->result();  
       }
       
       if($leftChild !="" ||  $rightChild !=""){
        //   print_r('*left');die;
            $this->db->select('*')
            ->from($this->table_name)
            ->where('id',$leftChild)
            ->or_where('id',$rightChild);
           $data= $this->db->get();
            return $data->result();
       }
       
    }
    
    public function getUserDetails($id){
        $this->db->select ( '*' ); 
        $this->db->from ( 'users' );
        $this->db->join ( 'user_banks', 'user_banks.userId = users.id' , 'left' );
        $this->db->join ( 'user_kyc', 'user_kyc.userId = users.id' , 'left' );
        $this->db->join ( 'transactions', 'transactions.userId = users.id' , 'left' );
        $this->db->join ( 'nominees', 'nominees.userId = users.id' , 'left' );
        $this->db->where ( 'users.id',$id);
        $query = $this->db->get ();
       
        return $query->result(); 
       
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

    public function dashbordUserDetails($id){
        $this->db->select_sum('amount');
		$this->db->from('transactions');
		$this->db->where('userId',$id);
		$this->db->where('transType','deposite');
		$amountget=$this->db->get();
	    return $amountget->result();
    }
     public function stateAllDetails(){
        $this->db->select ( '*' ); 
        $this->db->from ( 'states' );
        $query = $this->db->get ();
        return $query->result(); 
    }
}
