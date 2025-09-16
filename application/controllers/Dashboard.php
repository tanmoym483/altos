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
        $productInfo = $this->db->select('*')->from('productinfo')->get()->result();

        $purchasequantity = $this->db->select_sum('quantity')
                             ->get('purchasein')
                             ->row()
                             ->quantity;

        $soldquantity = $this->db->select_sum('quantity')
                             ->get('product_sold')
                             ->row()
                             ->quantity;
    //    echo '<pre>'; print_r($productInfo);die;
        $this->view(
            'admin/dashboard',
            [
                'products'      =>    $productInfo,
                'purchaseQuantity'  =>  $purchasequantity,
                'soldquantity'      =>  $soldquantity
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
