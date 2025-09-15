<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('contactus');
    }
    public function demat()
    {
        $this->view('services/demat');
    }
    public function forex()
    {
        $this->view('services/forex');
    }
    public function mutualfund()
    {
        $this->view('services/mutual_fund');
    }
    public function commodity()
    {
        $this->view('services/commodity');
    }
    public function future_options()
    {
        $this->view('services/futures_options');
    }
}
