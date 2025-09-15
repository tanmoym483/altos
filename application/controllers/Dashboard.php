<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        $this->load->model('Admin_model', 'modd');
        $this->load->model('Dashbord_model', 'dashbordsModel');
        $this->load->model('Commission_model', 'commissionModel');
        $this->load->model('Cashback_model', 'cashbackModel');
        $this->load->model('Bank_model', 'bankModel');
        $this->load->model('Diagonostic_model', 'diagonosticModel');
       // $this->load->model('Advertisement_model','advertiseModel');
        $this->load->model('Shopping_model','shoppingModel');
    }

    public function index()
    {
        $currentUserId = $this->session->userdata('userId');
        $currentUserrole = $this->session->userdata('role');
        $onlineshop = $this->shoppingModel->onlineShoppingDashboard(0,10);
       // $onlineshop = $this->shoppingModel->onlineShopping(0,10);
      //  $advertise = $this->advertiseModel->advertisment();
        $onlineshopamount = $this->shoppingModel->shopamountcount();
        $this->db->select('notice,user_type')->from('notice');
        $this->db->where('status', 'active');
        $query6 = $this->db->get();
        $notice = $query6->result_array();

        

       // $notice = $this->advertiseModel->advertisment();
        $vbankcspcount = $this->bankModel->bankCspVerification();
        $pbankcspcount = $this->bankModel->bankCspProcessing();
       
        $this->db->select('*')->from('users')->where('id', $currentUserId);
        $da = $this->db->get();
        $response = $da->row();
           
        $leftChild = $response->leftChild;
        $rightChild = $response->rightChild;
        $left_child = $this->userModel->getUserById($leftChild); 
       
        
        
        $lcount = $this->userModel->countTreeMembers($leftChild);
        $rcount = $this->userModel->countTreeMembers($rightChild);

        if($leftChild != '') {
            $leftChild = $lcount+1;
        } else {
            $leftChild = 0;
        } 
        if($rightChild != ''){
            
            $rightChild = $rcount+1;
        } else {
            
            $rightChild = 0;
        }
        
        //$rightChild = $this->userModel->getRightChild();
        $customer = $this->userModel->getAmountCustomer();
        if ($currentUserrole == 'superAdmin') {
            $vendor = $this->userModel->getvendor(-1,10);
            $vendorcount = count($vendor);
            $pendingvendor = $this->userModel->getpendingvendor();
            $pendingvendorcount = count($pendingvendor);
        } else {
            $vendorcount = 0;
            $pendingvendorcount = 0;
        }
       
        // $card = $this->modd->cardmembercount();
        // $usercard = $this->modd->usercardmembercount();
        // $totalcard = $card + $usercard;
        if ($currentUserrole == 'vendor' || $currentUserrole == 'customer') {
            $usercard = $this->modd->usercardmembercountbyid($currentUserId);
            $card = $this->modd->vendorcardmembercount($currentUserId);
            $membercard = $this->modd->customercardmembercountbyid($currentUserId);
            $totalcard = $card + $membercard;
            $_card = $this->modd->usercardcountbyid($currentUserId);
            $_usercard = $this->modd->usercardcountbycreatedByid($currentUserId);
            $_totalcard = $_card + $_usercard;
        } else {
            $card = 0;
          //  $_card = 0;
            $_card = $this->modd->cardmembercount();
            $usercard = $this->modd->usercardmembercount();
            $_totalcard = $_card + $usercard;
            
        }
        $users = $this->userModel->dashbordUserDetails($currentUserId);
        $totalCommission = $this->commissionModel->getTotalCommission($currentUserId);
        $totalPayout = $this->commissionModel->payoutAmount($currentUserId);
        $vendors = $this->userModel->getvendor(-1,10);
        $totalcommision = 0;
        $applications = $this->bankModel->allbankcsp();
        $rapplications = $this->bankModel->allbankcspRegistration();
        $allAmount = $this->cashbackModel->totalTrasaction();
       for($i = 0;$i<count($vendors);$i++){
            $payout = $this->commissionModel->userPayoutCommissionReturn($vendors[$i]->id);
            $vendors[$i]->payout= $payout;
            $totalcommision = $totalcommision + $vendors[$i]->payout[0]->amount;
       }
       
       $this->db->select('balanceAfter')->from('health_card_transaction');
       $this->db->where('userId', $currentUserId);
       $query1 = $this->db->get();
       $userbalence = $query1->row();

       $this->db->select('balanceAfter')->from('health_card_transaction');
       $this->db->where('usercardId', $currentUserId);
       $query = $this->db->get();
       $usercardbalence = $query->result();

       $this->db->select('Count(*) as pending')->from('transactions');
       $this->db->where('status', 'pending')->where('transType','deposite');
       $query3 = $this->db->get();
       $pendingcount = $query3->row();

       $this->db->select_sum('amount')->from('transactions');
       $this->db->where('status', 'pending')->where('transType','deposite');
       $query4 = $this->db->get();
       $pendingcountamount = $query4->row();

        $totaldiaamount = $this->dashbordsModel->totalDiagonosticAmount(); 
       $todaydiaamount = $this->dashbordsModel->todayDiagonosticAmount(); 
       $totaldownpayment = $this->dashbordsModel->totalDiagonosticDownpayment();
       $todaydownpayment = $this->dashbordsModel->todayDiagonosticDownpayment();
       $todaypayment = $this->dashbordsModel->todayDiagonosticPayment();
       $totalpayment = $this->dashbordsModel->totalDiagonosticPayment(); 
       $todaycommision = $this->dashbordsModel->todayCommision();
       $usermember = $this->diagonosticModel->viewDiamemberDetails($currentUserId);
       $todayPayout = $this->dashbordsModel->todayPayout();
       $todayOrder = $this->dashbordsModel->todayOrder();
       $totalOrder = $this->dashbordsModel->totalOrder();
       $shopCommision = $this->dashbordsModel->shopCommision();
       $totalPayout = $this->dashbordsModel->totalPayout();
        $this->view(
            'admin/dashboard',
            [
                'pbankcspcount' => $pbankcspcount,
                'vbankcspcount' => $vbankcspcount,
                'users' => $users,
                'vendorcount' => $vendorcount,
                'pendingvendorcount' => $pendingvendorcount,
                'card' => $card,
                '_totalcard' => $_totalcard,
                '_card' => $_card,
                'totalcard' => $totalcard,
                'usercard' => $usercard,
                'leftChild' => $leftChild,
                'rightChild' => $rightChild,
                'customer' => $customer,
                'totalcommision' => $totalcommision,
                'commission' => count($totalCommission) > 0 ? $totalCommission[0]->amount : 0,
                'payout' => $totalPayout->amount,
                'bank_csp_member' => count($applications),
                'bank_application' => count($rapplications),
                'userbalence' => $userbalence,
                'usercardbalence' => $usercardbalence,
                'cashback_amount' => $allAmount->total,
                'totaldiaamount' => $totaldiaamount,
                'todaydiaamount' => $todaydiaamount,
                'totaldownpayment' => $totaldownpayment,
                'todaydownpayment' => $todaydownpayment,
                'todaypayment' => $todaypayment,
                'totalpayment' => $totalpayment,
                'usermember' => $usermember,
                'pendingcount' => $pendingcount,
                'todaycommision' => $todaycommision,
                'pendingcountamount' => $pendingcountamount,
                'todayPayout' => $todayPayout,
                'totalPayout' => $totalPayout,
               
                'onlineshop' => $onlineshop,
                'notice' => $notice,
                'onlineshopamount'=> $onlineshopamount,
                'todayOrder' => $todayOrder,
                'totalOrder' => $totalOrder,
                'shopCommision' => $shopCommision
            ]
        );
    }
    public function Membar()
    {
        $data = $this->dashbordsModel->totalMembar();
        print_r($data);
        die;
    }
    
}
