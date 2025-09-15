<?php
class Diagonostic_model extends CI_Model
{
    public function reportlist(){
        $currentuserID = $this->session->userdata('userId');
        $currentuserRole = $this->session->userdata('role');
        $this->db->select("users.*,diagonostic_report.*,cusers.regId as cregId,diagonostic_member.center_name, user_card.*, user_card.phone as ucphone, diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,  users.phone as uphone, diagonostic_report.createdAt as date, diagonostic_report.id as did ");
        $this->db->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('users as cusers','cusers.id = diagonostic_report.createdBy','left')
        ->join('diagonostic_member','diagonostic_member.userId = diagonostic_report.createdBy','left')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($currentuserRole == 'diagonstic'){
            $this->db->where('diagonostic_report.createdBy',$currentuserID);
        }
        if($currentuserRole == 'customer'){
            $this->db->where('diagonostic_report.userId',$currentuserID);
        }
        $this->db->order_by("diagonostic_report.id", "desc");
        $query1 = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $details = $query1->result();
       
    }
    public function memberstatusupdate($data){
        $this->db->select("*")
        ->from("diagonostic_member_edit");
        $statusupdate = array(
            'status' => $data['status']
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        $this->db->update('diagonostic_member_edit', $statusupdate); 
        $query = $this->db->select("diagonostic_member_edit.*")->from("diagonostic_member_edit")->where('id', $data['id'])->get();
        //echo $str = $this->db->last_query(); die;
        $member = $query->row();

        if($data['status'] == 'approved'){
            // $this->db->from('users')
            // ->where('id',$member->userId)
            // ->set(
            //     'email' => $member->email
            // )
            // ->update(); 
            $this->db->select("*")
            ->from("users");
            $statusupdate = array(
                'email' => $member->email
            );
            $this->db->where('id',$member->userId);
            //$this->db->where('userId', $data['userId']);
            $this->db->update('users', $statusupdate); 
            // $this->db->from('diagonostic_member')
            // ->where('userId',$member->userId)
            // ->set(
            //     'center_name' => $member->center_name
            // )
            // ->update(); 
            $this->db->select("*")
            ->from("diagonostic_member");
            $statusupdate = array(
                'center_name' => $member->center_name
            );
            $this->db->where('userId', $member->userId);
            //$this->db->where('userId', $data['userId']);
            $this->db->update('diagonostic_member', $statusupdate); 
        }
        return true;
    }
    public function bankstatusupdate($data){
        $this->db->select("*")
        ->from("new_user_banks");
        $statusupdate = array(
            'status' => $data['status']
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        $this->db->update('new_user_banks', $statusupdate); 

        $query = $this->db->select("new_user_banks.*")->from("new_user_banks")->where('id', $data['id'])->get();
       // echo $str = $this->db->last_query(); die;
        $banks = $query->row();
       
        if($data['status'] == 'approved'){
            
            $insertData['bankName'] =  $banks->bankName;
            $insertData['accountHolderName'] = $banks->accountHolderName;
            $insertData['ifscCode'] = $banks->ifscCode;
            $insertData['accountType'] = $banks->accountType;
            $insertData['branchName'] = $banks->branchName;
            $insertData['accountNumber'] = $banks->accountNumber;
            $insertData['accountProvedDoc'] = $banks->accountProvedDoc; 
            $this->db->from('user_banks')
            ->where('userId',$banks->userId)
            ->set(
                $insertData
            )
            ->update(); 
        }
        return true;
       // $insertData['userId'] = $banks->userId;
        
    }
    public function approvelist(){
        $this->db->select("new_user_banks.*")->from('new_user_banks')->where('new_user_banks.status !=', 'approved');
        $this->db->order_by("id", "desc");
        $query1 = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $details = $query1->result();
    }
    public function approvelistbyUser($id){
        $this->db->select("new_user_banks.*")->from('new_user_banks')->where('userId', $id);
        $this->db->order_by("id", "desc");
        $query1 = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $details = $query1->result();
    }
    public function editapprovelist(){
        $this->db->select("diagonostic_member.userId,diagonostic_member.center_name,diagonostic_member_edit.id, diagonostic_member_edit.status as bank_status, diagonostic_member_edit.createdAt as ncreatedAt");
        $this->db->from('diagonostic_member')
        ->join('diagonostic_member_edit','diagonostic_member_edit.userId = diagonostic_member.userId','left')
        ->where('diagonostic_member_edit.status !=', 'approved');
        $this->db->order_by("diagonostic_member.userId", "desc");
        $query1 = $this->db->get();
        //echo $str = $this->db->last_query(); die;
        return $details = $query1->result();
    }
    public function viewDiaTest($id){
        $query = $this->db->select("*")->from("diagonostic_commision")->where('userId',$id)->get();
        return $query->result_array();
    }
    public function addtest($data){
        $insertData = [];
        $insertData['name'] = $data;
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_test', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function reportviewById($id){
        $currentuserID = $this->session->userdata('userId');
        $currentuserRole = $this->session->userdata('role');
        $this->db->select("users.*,diagonostic_report.*, user_card.*,diagonostic_member.center_name,diagonostic_report.gstin_number as cgstin_number, diagonostic_member.gstin_number,diagonostic_member.cin_number, diagonostic_member.pancard_number, diagonostic_report_payment.payment_method,diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno, user_card.phone as ucphone, users.phone as uphone, diagonostic_report.createdAt as date, diagonostic_report.id as did, diagonostic_report.createdBy as reportcreate");
        $this->db->from('diagonostic_report')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left')
        ->join('diagonostic_member','diagonostic_member.userId = diagonostic_report.createdBy','left');
        if($currentuserRole == 'diagonstic'){
            $this->db->where('diagonostic_report.createdBy',$currentuserID);
        }
        $this->db->where('diagonostic_report.id',$id);
        $this->db->order_by("diagonostic_report.id", "desc");
        $query1 = $this->db->get();
      // echo $str = $this->db->last_query(); die;
        return $details = $query1->row(); 
    }
    public function updateStatus($data){
        $this->db->select("*")
        ->from("diagonostic_report");
        $statusupdate = array(
            'status' => $data['status'],
           'invoiceid' => 'INV91'.random_int(100000, 999999),
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        return $this->db->update('diagonostic_report', $statusupdate); 
    }
    public function addreport($data){
        $insertData =[];
        if (array_key_exists('cardnumber', $data))
            $insertData['cardnumber'] = $data['cardnumber'];
        if (array_key_exists('doctor_name', $data))
            $insertData['doctor_name'] =  strtoupper($data['doctor_name']);
        if (array_key_exists('report', $data))
            $insertData['report_description'] = strtoupper($data['report']);
        if (array_key_exists('emiplan', $data))
            $insertData['emiplanId'] = $data['emiplan'];
        if (array_key_exists('total_amount', $data))
            $insertData['total_amount'] = $data['total_amount'];
        if (array_key_exists('gst_amount', $data))
            $insertData['gst_amount'] = $data['gst_amount'];
        if (array_key_exists('gstin_number', $data))
            $insertData['gstin_number'] = $data['gstin_number'];
        if (array_key_exists('amount_with_gst', $data))
            $insertData['amount_with_gst'] = $data['amount_with_gst']; 
        if($data['userid'] == $data['muserid']){
            $insertData['userId'] = $data['userid'];
            $insertData['cardId'] = 0;
        } else {
            $insertData['userId'] = $data['muserid'];
            $insertData['cardId'] = $data['userid'];
        }
        $insertData['status'] = $data['status'];
        $insertdata['updated_at'] = $data['updated_at'];
        $insertData['payment_status'] = $data['payment_status'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        
        $this->db->insert('diagonostic_report', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updatereport($data){
        $insertData =[];
       
        if (array_key_exists('doctor_name', $data))
            $insertData['doctor_name'] =  strtoupper($data['doctor_name']);
        if (array_key_exists('report', $data))
            $insertData['report_description'] = strtoupper($data['report']);
        if (array_key_exists('emiplan', $data))
            $insertData['emiplanId'] = $data['emiplan'];
        if (array_key_exists('total_amount', $data))
            $insertData['total_amount'] = $data['total_amount'];
        if (array_key_exists('gst_amount', $data))
            $insertData['gst_amount'] = $data['gst_amount'];
        if (array_key_exists('gstin_number', $data))
            $insertData['gstin_number'] = $data['gstin_number'];
        if (array_key_exists('amount_with_gst', $data))
            $insertData['amount_with_gst'] = $data['amount_with_gst']; 
        if($data['userid'] == $data['muserid']){
            $insertData['userId'] = $data['userid'];
            $insertData['cardId'] = 0;
        } else {
            $insertData['userId'] = $data['muserid'];
            $insertData['cardId'] = $data['userid'];
        }
        $insertData['status'] = $data['status'];
        $insertData['payment_status'] = $data['payment_status'];
       
        return $this->db->from('diagonostic_report')
            ->where('id',$data['id'])
            ->set(
                $insertData
            )
            ->update();
        
    }
    public function addreportamount($data){
        $insertData =[];
        $insertData['amount'] = $data['downpayment'];
        $insertData['payment_method'] = $data['payment_method'];
        $insertData['transRefno'] = $data['transRefno'];
        $insertData['status'] = $data['pstatus'];
        $insertData['reportId'] = $data['reportId'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_report_payment', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updatereportamount($data){
        $insertData['amount'] = $data['downpayment'];
        $insertData['payment_method'] = $data['payment_method'];
        $insertData['transRefno'] = $data['transRefno'];
        $insertData['status'] = $data['pstatus'];
        return $this->db->from('diagonostic_report_payment')
            ->where('id',$data['id'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function addreporttest($data){
        $insertData =[];
        $insertData['test_category'] = $data['test_category'];
        $insertData['test_name'] = $data['test_name'];
        $insertData['test_amount'] = $data['test_amount'];
        $insertData['reportId'] = $data['reportId'];
        $insertData['test_commision'] = $data['commision'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_report_test', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function imgadd($data){
        $insertData =[];
        $insertData['userId'] = $this->session->userdata('userId');
        $insertData['gallery'] = $data['center_image'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_gallery', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updatereporttest($data){
        $insertData =[];
        $insertData['test_category'] = $data['test_category'];
        $insertData['test_name'] = $data['test_name'];
        $insertData['test_amount'] = $data['test_amount'];
        $insertData['test_commision'] = $data['commision'];
       // $insertData['reportId'] = $data['reportId'];
        return $this->db->from('diagonostic_report_test')
            ->where('id',$data['test_id'])
            ->where('reportId',$data['reportId'])
            ->set(
                $insertData
            )
            ->update();
    }
    public function record_exists($test, $id){
        $this->db->select('*')->from('diagonostic_report_test');
            $this->db->where('reportId', $id);
            $this->db->where('id', $test);
            $query = $this->db->get();
            return $query->num_rows();
    }
    public function totalDiagonosticAmountlist(){
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('users.*,diagonostic_report.*,diagonostic_report_test.test_category,diagonostic_report_test.test_commision, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date,diagonostic_report.createdBy as created')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('diagonostic_report_test','diagonostic_report_test.reportId = diagonostic_report.id','left')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('diagonostic_report_test.test_commision !=', 0);
        $this->db->order_by("diagonostic_report.id", "desc");
       
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    } 
    public function todayDiagonosticAmountlist(){
        $currentUserId = $this->session->userdata('userId');
        $today = date('Y-m-d');
        $this->db->select('users.*,diagonostic_report.*, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('DATE(diagonostic_report.createdAt)', $today);
        $this->db->order_by("diagonostic_report.id", "desc");
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    } 
    public function totalDiagonosticdwonpaymentlist(){
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('users.*,diagonostic_report.*, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('diagonostic_report_payment.status', 'downpayment');
        $this->db->where('diagonostic_report.payment_status', 'on emi');
        $this->db->order_by("diagonostic_report.id", "desc");
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    } 
    public function totalDiagonostictodaydwonpaymentlist(){
        $today = date('Y-m-d');
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('users.*,diagonostic_report.*, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id','left')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('DATE(diagonostic_report.createdAt)', $today);
        $this->db->where('diagonostic_report_payment.status', 'downpayment');
        $this->db->where('diagonostic_report.payment_status', 'on emi');
        $this->db->order_by("diagonostic_report.id", "desc");
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function totalDiagonosticduePayment(){
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('users.*,diagonostic_report.*, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('diagonostic_report.payment_status', 'on emi');
       // $this->db->where('diagonostic_report_payment.status', 'downpayment');
        $this->db->order_by("diagonostic_report.id", "desc");
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function totalDiagonostictodayduePayment(){
        $today = date('Y-m-d');
        $currentUserId = $this->session->userdata('userId');
        $this->db->select('users.*,diagonostic_report.*, user_card.*,diagonostic_report_payment.payment_method, diagonostic_report_payment.amount as paidamount, diagonostic_report_payment.transRefno,diagonostic_report.createdAt as date')
        ->from('diagonostic_report')
        ->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id')
        ->join('users','users.id = diagonostic_report.userId','left')
        ->join('user_card','user_card.id = diagonostic_report.cardId','left');
        if($_SESSION['role'] == 'diagonstic'){
          $this->db->where('diagonostic_report.createdBy', $currentUserId);
        }
        $this->db->where('diagonostic_report.status', 'approved');
        $this->db->where('DATE(diagonostic_report.createdAt)', $today);
        $this->db->where('diagonostic_report.payment_status', 'on emi');
       // $this->db->where('diagonostic_report_payment.status', 'downpayment');
        $this->db->order_by("diagonostic_report.id", "desc");
        $query = $this->db->get();
       // echo $str = $this->db->last_query(); die;
        return $query->result();
    }
    public function addDiamemberDetails($data){
        $insertData =[];
        $insertData['center_name'] = strtoupper($data['center_name']);
        $insertData['gstin_number'] = strtoupper($data['gstin_number']);
        $insertData['cin_number'] = strtoupper($data['cin_number']);
        $insertData['shop_category'] = strtoupper($data['shop_category']);
        $insertData['business_category'] = strtoupper($data['business_category']);
        $insertData['document'] = $data['document'];
        $insertData['pancard_number'] = strtoupper($data['pancard_number']);
        $insertData['diagonostic_created'] = $data['parentId'];
        // $insertData['commision'] = $data['commision'];
        // $insertData['units'] = $data['units'];
        $insertData['userId'] = $data['userId'];
        $insertData['progress_status'] = 'processing';
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_member', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function addDiamemberGallery($data){
        $insertData =[];
        $insertData['userId'] = $data['userId'];
        $insertData['gallery'] = $data['gallery'];
        $this->db->insert('diagonostic_gallery', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function addDiamemberTest($data){
        $insertData =[];
        $insertData['userId'] = $data['userId'];
        $insertData['test_category'] = $data['test_category'];
        $insertData['commision'] = $data['commision'];
        $insertData['units'] = $data['units'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_commision', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function viewDiamemberDetails($id){
        $this->db->select('*')->from('diagonostic_member')->where('userId',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function viewDiamemberGallery($id){
        $this->db->select('*')->from('diagonostic_gallery')->where('userId',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function imgdelete($id){
        $this->db->where('id', $id);
        $this->db->delete('diagonostic_gallery');
        return true;
    }
    public function imgupdate($data){
        $this->db->select("*")
        ->from("diagonostic_gallery");
        $statusupdate = array(
            'gallery' => $data['center_image'],
           
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        $this->db->update('diagonostic_gallery', $statusupdate); 
        return true;
    }
    public function statusupdate($data){
        $this->db->select("*")
        ->from("diagonostic_member");
        $statusupdate = array(
            'progress_status' => $data['status'],
           
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        $this->db->update('diagonostic_member', $statusupdate); 

        $this->db->select("*")
        ->from("users");
        $statusupdate = array(
            'status' => 'active',
            'password' => md5($data['password']),
           
        );
        $this->db->where('id', $data['userId']);
        //$this->db->where('userId', $data['userId']);
        return $this->db->update('users', $statusupdate); 
    }
    public function statusupdatewithreason($data){
        $this->db->select("*")
        ->from("diagonostic_member");
        $statusupdate = array(
            'progress_status' => $data['status'],
            'reason' => $data['reason'],
           
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('diagonostic_member', $statusupdate); 
    }
    public function statusdiaupdate($data){
        $this->db->select("*")
        ->from("diagonostic_member");
        $statusupdate = array(
            'progress_status' => $data['status']
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('diagonostic_member', $statusupdate);
    }
    public function updateUserDetails($data){
        $insertData =[];
        $insertData['userId'] = $this->session->userdata('userId');
        $insertData['center_name'] = $data['center_name'];
        $insertData['email'] = $data['email'];
        $insertData['reason'] = $data['reason'];
        $insertData['status'] = 'processing';
        $insertData['createdBy'] = $this->session->userdata('userId');
        $this->db->insert('diagonostic_member_edit', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateUserAddressDetails($data){
        $this->db->select("*")
        ->from("users");
        $statusupdate = array(
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'state' => $data['state'],
            'city' => $data['city'],
            'district' => $data['district'],
        );
        $this->db->where('id', $data['userId']);
        return $this->db->update('users', $statusupdate);
    }
    public function updateUserPhoneDetails($data){
        $this->db->select("*")
        ->from("users");
        $statusupdate = array(
            'phone' => $data['phone']
        );
        $this->db->where('id', $data['userId']);
        $this->db->update('users', $statusupdate);

        $this->db->select("*")
        ->from("diagonostic_member");
        $statusupdate1 = array(
            'phone_number' => $data['phone_number']
        );
        $this->db->where('userId', $data['userId']);
        return $this->db->update('diagonostic_member', $statusupdate1);
        
    }
}