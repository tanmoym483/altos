<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model','modd');
    }

    public function index()
    {
        $this->view('about-us');
    }
    public function customer_term_condition()
    {
        
        $this->view('term_condition');
    }
  public function equity_trading(){
      $this->view("services/equity_trading");
  }
  
  public function open_commodity(){
      $this->view("services/open_commodity");
  }
  public function open_futures_options(){
       $this->view("services/open_futures_options");
  }
  public function open_forex(){
      $this->view("services/open_forex");
  }
   public function demat()
    {
        $this->view('services/dem');
    }
     public function SWP()
    {
        $this->view('services/SWP');
    }
     public function SIP()
    {
        $this->view('services/SIP');
    }
}
