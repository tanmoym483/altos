<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Offer extends MY_Controller
{

    public function __construct(){
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->library('pagination');
        $this->load->model('Admin_model','modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->model('Offer_model', 'offerModel');
    }
    public function details(){
        $cashback = $this->input->post('cashback');
        $offer = $this->offerModel->getOfferById($cashback); 
       
        $data['offer_amount'] = $offer->offer_amount;
        if($offer->units == 'rupess'){
            $data['amount'] = $offer->amount;
        } else {
            $data['amount'] = ($offer->amount * $offer->offer_amount)/100;
        }
        
        echo json_encode($data);
        die;
    }
    public function list($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
         // Get records
         $offers = $this->offerModel->getOffers($rowno,$rowperpage); 
         $alloffers = $this->offerModel->getAllOffers(); 
        
         // All records count
         $allcount = count($alloffers);
        
        
         
         $config['base_url'] = base_url().'offer/list';
         $config['use_page_numbers'] = TRUE;
         $config['total_rows'] = $allcount;
         $config['per_page'] = $rowperpage;
        // $config['uri_segment'] = 1;
     
         $this->pagination->initialize($config);
     
         $data['pagination'] = $this->pagination->create_links();
         $data['result'] = $offers;
         $data['row'] = $rowno;
         $data['allusers'] = $allusers;
         $this->deactivate_expired_offers();
         $this->view('admin/offer/offer', ['data' => $data]);
       
    }
    public function franchaiselist($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
         // Get records
         $offers = $this->offerModel->getfOffers($rowno,$rowperpage); 
         $alloffers = $this->offerModel->getAllfOffers(); 
        
         // All records count
         $allcount = count($alloffers);
        
        
         
         $config['base_url'] = base_url().'offer/franchaiselist';
         $config['use_page_numbers'] = TRUE;
         $config['total_rows'] = $allcount;
         $config['per_page'] = $rowperpage;
        // $config['uri_segment'] = 1;
     
         $this->pagination->initialize($config);
     
         $data['pagination'] = $this->pagination->create_links();
         $data['result'] = $offers;
         $data['row'] = $rowno;
         $data['allusers'] = $allusers;
         $this->view('admin/offer/franchaise-offer', ['data' => $data]);
       
    }
    public function cardmemberlist($rowno=0){
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
         // Get records
         $offers = $this->offerModel->getCOffers($rowno,$rowperpage); 
         $alloffers = $this->offerModel->getAllCOffers(); 
        
         // All records count
         $allcount = count($alloffers);
        
        
         
         $config['base_url'] = base_url().'offer/cardmemberlist';
         $config['use_page_numbers'] = TRUE;
         $config['total_rows'] = $allcount;
         $config['per_page'] = $rowperpage;
        // $config['uri_segment'] = 1;
     
         $this->pagination->initialize($config);
     
         $data['pagination'] = $this->pagination->create_links();
         $data['result'] = $offers;
         $data['row'] = $rowno;
         $data['allusers'] = $allusers;
         $this->view('admin/offer/customer-offer', ['data' => $data]);
       
    }
    public function delete($id){
        $this->offerModel->deleteOffer($id);
        redirect('offer/list');
    }
    public function postaddoffer(){
        $config = array(
           
            array(
                'field'   => 'offer_name',
                'label'   => 'Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'offer_type',
                'label'   => 'Offer Type',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'offer_amount',
                'label'   => 'Offer Amount',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'from_date',
                'label'   => 'From Date',
                'rules'   => 'required'
            ),

            array(
                'field'   => 'to_date',
                'label'   => 'To Date',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'amount',
                'label'   => 'Amount',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'units',
                'label'   => 'Units',
                'rules'   => 'required'
            ),
            
        );
        if ($this->validation($config) == FALSE) {
            // $this->view('admin/users/user_form');
            echo validation_errors();
        } else {
            $insertData = $_POST;
            $this->offerModel->addOffer($insertData);
            $this->session->set_flashdata('success', 'Offer has been added successfully');
        }
        redirect('offer/list');
    }
   
    public function deactivate_expired_offers() {
        $updated_rows = $this->offerModel->deactivate_expired_offers();

        // Optional: Display or log the result
        //echo "$updated_rows offers have been marked as inactive.";
    }
}