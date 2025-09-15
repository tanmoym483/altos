<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Commission extends MY_Controller
{

    public function __construct(){
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->library('pagination');
        $this->load->library('Pdf');
        $this->load->model('Dashbord_model', 'dashbordsModel');
        $this->load->model('Commission_model', 'commissionModel');
        $this->load->model('Mcommission_model', 'm_commissionModel');
        $this->load->model('User_model', 'userModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Transaction_model', 'transectionModel');
    }
    public function commisionchart(){
        $this->view("admin/commission/csp-commisionlist");
    }
    public function healthcardchart(){
        $this->view("admin/commission/health-cardcommision");
    }
    public function list($id,$page=0){
        $parpage = 10;
       
        $limit = 0;
        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($page>0)
            $limit = ($page-1) * $parpage;

        $date=$this->input->get('d');
        $totalCommission = $this->commissionModel->getTotalCommission($id,$date );
        $allcount = count($this->commissionModel->getCommisionList($id,-1,10,$date));
       
      
        
        $data['pagination'] = $this->mypagination( base_url().'commission/list/'.$id,$allcount, $parpage, 4 );
        $data['commissions'] = $this->commissionModel->getCommisionList($id,$limit, $parpage,$date);

        $data['totalCommission'] = $totalCommission;
        $this->view("admin/commission/commissionList", $data);
    }
    public function payouts($user_id,$rowno=0){
        // $user_id = 98;
        
        $rowperpage = 10;
       if($_SESSION['role'] === "superAdmin" || $user_id==$_SESSION['userId']){
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $vendor = $this->db->get_where('users', array('id' => $user_id));
        $vendor = $vendor->row();
        $duePayout = $this->commissionModel->totalDuePayout($user_id);
        $allcount =count( $this->commissionModel->daywiseCommissionReturn($user_id,-1,10));
        $result= $this->commissionModel->daywiseCommissionReturn($user_id,$rowno,$rowperpage);
    //  print_r($result);
        $data['pagination'] = $this->mypagination( base_url().'commission/payouts/'.$user_id,$allcount, $rowperpage, 4 );
        $data['result'] = $result;
        $data['due'] = $due = $duePayout->amount;
        $data['user_id'] = $user_id;
        $data['vendor'] = $vendor;
       
        
        $this->view("admin/commission/payouts", $data);
    }else{
        redirect('dashboard');
    }
// die;

    }
    public function payoutpdf($user_id){
        $data['result'] = $result =$this->commissionModel->daywiseCommissionReturn($user_id);

        $this->load->view('admin/commission/payoutpdf', $data);
         // Get output html
         $html = $this->output->get_output();
        

        // Load HTML content into Dompdf
        $this->pdf->loadHtml($html);

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $this->pdf->render();

        // Output the PDF to the browser
        $this->pdf->stream("payout.pdf", array("Attachment" => 0));
    }
    public function payoutDetails($user_id,$date){
        // $user_id = 98;
        $rowperpage = 10;
       
        // echo date('Y-m-d', strtotime($date));
        $result=$this->commissionModel->userPayoutCommissionReturn($user_id,date('Y-m-d',strtotime($date)));
        // $result= $this->commissionModel->daywiseCommissionReturn($user_id,$rowno,$rowperpage);
     print_r($result);
        // $data['pagination'] = $this->mypagination( base_url().'commission/payouts/'.$user_id,$allcount, $rowperpage, 4 );
        // $data['result'] = $result;
       
        
        // $this->view("admin/commission/payouts", $data);
// die;

    }
    public function payoutList($rowno=0){
        // $user_id = 98;
        $rowperpage = 10;
        $rowno = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
        $vendors = $this->userModel->getvendor($rowno,$rowperpage);
       
        $allcount =count( $this->userModel->getvendor(-1,10));
       for($i = 0;$i<count($vendors);$i++){
            $payout = $this->commissionModel->userPayoutCurrentCommission($vendors[$i]->id);
            $bankDetails = $this->userBankModel->getUserBankDetails($vendors[$i]->id);
            $vendors[$i]->payout= $payout;
            $vendors[$i]->bankDetails= $bankDetails;
            // echo "<pre>";
            // print_r( $vendors[$i]);
            // echo "</pre>";
          
       }
      
       
     
       $data['pagination'] = $this->mypagination( base_url().'commission/payoutList/',$allcount, $rowperpage, 3 );
       $data['result'] = $vendors;
       $alldata = $this->userModel->getvendor(-1,10);
       for($i = 0;$i<count($alldata);$i++){
        $payout = $this->commissionModel->userPayoutCurrentCommission($alldata[$i]->id);
        $bankDetails = $this->userBankModel->getUserBankDetails($alldata[$i]->id);
        $alldata[$i]->payout= $payout;
        $alldata[$i]->bankDetails= $bankDetails;
        // echo "<pre>";
        // print_r( $vendors[$i]);
        // echo "</pre>";
      
        }
        $data['alldata'] = $alldata;
        
       $this->view("admin/commission/userPayoutList", $data);

// die;

    }
    public function payoutlistpdf(){
        $alldata = $this->userModel->getvendor(-1,10);
       for($i = 0;$i<count($alldata);$i++){
        $payout = $this->commissionModel->userPayoutCurrentCommission($alldata[$i]->id);
        $bankDetails = $this->userBankModel->getUserBankDetails($alldata[$i]->id);
        $alldata[$i]->payout= $payout;
        $alldata[$i]->bankDetails= $bankDetails;
        // echo "<pre>";
        // print_r( $vendors[$i]);
        // echo "</pre>";
      
        }
        $data['result'] = $alldata;

        $this->load->view('admin/commission/payoutlistpdf', $data);
         // Get output html
         $html = $this->output->get_output();
        

        // Load HTML content into Dompdf
        $this->pdf->loadHtml($html);

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $this->pdf->render();

        // Output the PDF to the browser
        $this->pdf->stream("payout.pdf", array("Attachment" => 0));
    }
    public function payoutSubmit(){
        $data = (object) $this->input->post();
        // print_r($data);
        // echo json_encode($data);
        $payout = $this->commissionModel->userPayoutCommissionReturn($data->userID, $data->date);
        if(count($payout)>0){
            $transactionData = [
                "amount"=>$payout[0]->amount,
                "transaction_id"=>$data->transactionId,
                "userId"=>$data->userID,
                "transType"=>'payout',
                "status"=>'approved'
            ];
            $transId = $this->transectionModel->createTransaction($transactionData);
            $this->commissionModel->userPayoutCommissionUpdateDateWise($data->userID,$data->date, true,$transId);
            echo json_encode(["status"=>true, "message"=>"Payout has been done successfully"]);
        }else{
            echo json_encode(["status"=>false, "message"=>"No data found"]);
        }
        // echo date('Y-m-d', strtotime($data->date));
      

    }
    public function totalPayment(){
        $data = (object) $this->input->post();
       
        $transactionData = [
            "amount"=>$data->amount,
            "transaction_id"=>$data->transactionId,
            "userId"=>$data->userId,
            "transType"=>'payout',
            "status"=>'approved',
            "createdBy"=>$_SESSION['userId']
        ];
        
        $transId = $this->transectionModel->createTransaction($transactionData); 
        $this->commissionModel->userPayoutCommissionUpdateDateWise($data->userId,'',true,$transId);
        echo json_encode(["status"=>true, "message"=>"Payout has been done successfully"]);

    }
    public function payoutEditSubmit(){
        $data = (object) $this->input->post();


            $transactionData = [
              
                "transaction_id"=>$data->transactionId,
               'id' => $data->transId
            ];
            
            $this->transectionModel->updateTransectionId($transactionData);
         
            echo json_encode(["status"=>true, "message"=>"Transaction Id has been updated successfully"]);
        
        // echo date('Y-m-d', strtotime($data->date));
      

    }
    public function commissions(){

    }
    public function updateScript(){
    $this->commissionModel->updateDate();
    }
}
?>