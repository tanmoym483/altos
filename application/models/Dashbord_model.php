<?php
class Dashbord_model extends CI_Model
{
    public $table_name = "users";
   

   
  public function totalMembar(){
        $resp="SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName
          FROM `users` u 
          LEFT JOIN users p ON p.id = u.parentNode
          LEFT JOIN users lc on lc.id = u.leftChild 
          LEFT JOIN users rc on rc.id = u.rightChild 
          where u.status='active'";
              //  where u.firstName='$search'";
              $query = $this->db->query($resp);
              return $query->num_rows();
  }
  public function totalDiagonosticAmount(){
    $currentUserId = $this->session->userdata('userId');
    $this->db->select_sum('total_amount')->from('diagonostic_report');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('createdBy', $currentUserId);
    }
    $this->db->where('status', 'approved');
        // Get the first day of the most recent month
   // $this->db->where('DATE(createdAt) >=', date('Y-m-01', strtotime('first day of last month')));

    // Get the last day of the most recent month
   // $this->db->where('DATE(createdAt) <=', date('Y-m-t', strtotime('last day of last month')));
    $this->db->group_by('YEAR(createdAt)', 'MONTH(createdAt)'); 
    //$this->db->order_by('year DESC, month DESC');
    $query = $this->db->get();
    
    return $query->row();
  } 
    
  public function todayDiagonosticAmount(){
    $currentUserId = $this->session->userdata('userId');
    $today = date('Y-m-d');
    $this->db->select_sum('total_amount')->from('diagonostic_report');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('createdBy', $currentUserId);
    }
    $this->db->where('status', 'approved');
    $this->db->where('DATE(createdAt)', $today);
    $query = $this->db->get();
    //echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function totalDiagonosticDownpayment(){
    $currentUserId = $this->session->userdata('userId');
    $this->db->select_sum('diagonostic_report_payment.amount')->from('diagonostic_report')->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('diagonostic_report.createdBy', $currentUserId);
    }
    $this->db->where('diagonostic_report.status', 'approved');
    $this->db->where('diagonostic_report_payment.status', 'downpayment');
    $this->db->group_by('YEAR(diagonostic_report.createdAt)', 'MONTH(diagonostic_report.createdAt)'); 
    
    $query = $this->db->get();
   
    return $query->row();
  }
  public function totalDiagonosticPayment(){
    $currentUserId = $this->session->userdata('userId');
    $this->db->select_sum('diagonostic_report.total_amount')->from('diagonostic_report')->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('diagonostic_report.createdBy', $currentUserId);
    }
    $this->db->where('diagonostic_report.status', 'approved');
    $this->db->where('diagonostic_report.payment_status', 'on emi');
    $this->db->group_by('YEAR(diagonostic_report.createdAt)', 'MONTH(diagonostic_report.createdAt)'); 
  //  $this->db->where('diagonostic_report_payment.status', 'downpayment');
    $query = $this->db->get();
   
    return $query->row();
  }
  public function todayDiagonosticDownpayment(){
    $currentUserId = $this->session->userdata('userId');
    $today = date('Y-m-d');
    $this->db->select_sum('diagonostic_report_payment.amount')->from('diagonostic_report')->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('diagonostic_report.createdBy', $currentUserId);
    }
    $this->db->where('diagonostic_report.status', 'approved');
    $this->db->where('diagonostic_report_payment.status', 'downpayment');
    $this->db->where('DATE(diagonostic_report.createdAt)', $today);
    $query = $this->db->get();
  //  echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function todayCommision(){
    $currentUserId = $this->session->userdata('userId');
    $currentUserRole = $this->session->userdata('role');
    $today = date('Y-m-d');
    $this->db->select_sum('amount');
    $this->db->from('commissions');
    if($currentUserRole == 'vendor'){
    $this->db->where('user_id', $currentUserId);
    }
    $this->db->where('user_id !=', 1);
    $this->db->where('isPayout', 'true');
    $this->db->where("DATE(date)", $today);
    $query = $this->db->get();
    //echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function todayPayout(){
    $currentUserId = $this->session->userdata('userId');
    $currentUserRole = $this->session->userdata('role');
    
    $this->db->select_sum('amount');
    $this->db->from('commissions');
    if($currentUserRole == 'vendor'){
      $this->db->where('user_id', $currentUserId);
    }
    $this->db->where('user_id !=', 1);
    $this->db->where('isPayout', 'true');
    $this->db->where('isPaymentCompleted', 'false');
   // $this->db->where("DATE(date)", $today);
    $query = $this->db->get();
    return $query->row();
  }
  public function todayOrder(){
    $today = date('Y-m-d');
    $currentUserId = $this->session->userdata('userId');
    $currentUserRole = $this->session->userdata('role');
    
    $this->db->select_sum('online_shoping_order.amount');
    $this->db->from('online_shoping_order')->join('shop_member','shop_member.id=online_shoping_order.shop_id');
    $this->db->where('shop_member.userId', $currentUserId);
    $this->db->where("DATE(online_shoping_order.createdAt)", $today);
    $query = $this->db->get();
    //echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function totalOrder(){
    $today = date('Y-m-d');
    $currentUserId = $this->session->userdata('userId');
    $currentUserRole = $this->session->userdata('role');
    
    $this->db->select_sum('online_shoping_order.amount');
    $this->db->from('online_shoping_order')->join('shop_member','shop_member.id=online_shoping_order.shop_id');
    $this->db->where('shop_member.userId', $currentUserId);
   // $this->db->where("DATE(online_shoping_order.createdAt)", $today);
    $query = $this->db->get();
    //echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function shopCommision(){
    $currentUserId = $this->session->userdata('userId');
    $this->db->select('commision');
    $this->db->from('shop_commision');
    $this->db->where('userId', $currentUserId);
    $query = $this->db->get();
    //echo $str = $this->db->last_query(); die;
    return $query->row();
  }
  public function totalPayout(){
    $currentUserId = $this->session->userdata('userId');
    $currentUserRole = $this->session->userdata('role');
    
    $this->db->select_sum('amount');
    $this->db->from('commissions');
    
    if($currentUserRole == 'vendor'){
      $this->db->where('user_id', $currentUserId);
    }
    $this->db->where('user_id !=', 1);
    $this->db->where('isPayout', 'true');
    $this->db->where('isPaymentCompleted', 'true');
   // $this->db->where("DATE(date)", $today);
    $query = $this->db->get();
    return $query->row();
  }
  public function todayDiagonosticPayment(){
    $currentUserId = $this->session->userdata('userId');
    $today = date('Y-m-d');
    $this->db->select_sum('diagonostic_report.total_amount')->from('diagonostic_report')->join('diagonostic_report_payment','diagonostic_report_payment.reportId = diagonostic_report.id');
    if($_SESSION['role'] == 'diagonstic'){
      $this->db->where('diagonostic_report.createdBy', $currentUserId);
    }
    $this->db->where('diagonostic_report.status', 'approved');
    $this->db->where('diagonostic_report.payment_status', 'on emi');
 //   $this->db->where('diagonostic_report_payment.status', 'downpayment');
    $this->db->where('DATE(diagonostic_report.createdAt)', $today);
    $query = $this->db->get();
   
    return $query->row();
  }
}
