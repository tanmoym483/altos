<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('Admin_model','modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('Nominee_model', 'nomineesModel');
        $this->load->model('UserKYC_model', 'userKycModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Transaction_model', 'transectionModel');
        $this->load->model('Diagonostic_model', 'diagonosticModel');
       // $this->load->model('Healthcard_model', 'healthcardModel');
        $this->load->helper('transaction_logger');
        $this->load->library("pagination");
    }
    public function commingsoon(){
        $this->view('admin/comming-soon');
    }
    public function card_management(){
        $this->view('admin/diagonostic-card-managemt');
    }
    public function add_cardmember(){
        $this->view('admin/additional-member');
    }
    public function pincodelist($rowno=0)
    {
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        // $page = 1;
        //$search = $this->input->get('search');
       
       if(isset($_GET['search']) || isset($_GET['district'])){
        $users = $this->modd->postalCodeDetails($_GET['search'],$_GET['district'],$rowno,$rowperpage);
       } else {
        $users = $this->modd->allpostalCodeDetails($rowno,$rowperpage);
       }
      
       // All records count
       $allcount = $this->modd->postalCodeDetailsCount($_GET['search'],$_GET['district']); 
       
       
      
        
       $config['base_url'] = base_url().'admin/pincodelist';
       $config['use_page_numbers'] = TRUE;
       $config['total_rows'] = $allcount;
       $config['per_page'] = $rowperpage;
      // $config['uri_segment'] = 1;
   
       $this->pagination->initialize($config);
   
       $data['pagination'] = $this->pagination->create_links();
       $data['result'] = $users;
       $data['row'] = $rowno;
        $this->view('admin/postcodeAdd', ['users' => $data]);
    }
    public function admincreate()
    {
        $this->view('admin/admin-create',['districtlist'=>$this->districtlist()]);
    }
    

    public function adminedit($userId)
    {
        $user = $this->modd->getUser($userId);
        $this->view('admin/admin-edit',['users' => $user,'districtlist'=>$this->districtlist()]);
    }

//     public function index()
// {
//     $productInfo = $this->db->select('*')->from('productinfo')->get()->result();

//     $this->view('admin/dashboard', [
//         'products' => $productInfo,
//     ]);
// }

public function purchaseform()
{
    // Get all products data from the form
    $products = $this->input->post('products');
    
    // Loop through each product entry and process it
    foreach ($products as $product) {
        // Calculate the price per unit
        $singledp = $product['dpprice'] / $product['quantity'];
        $singlemrp = $product['mrpprice'] / $product['quantity'];

        $insertId = null;
        $productName = null;

        // Case 1: If product is existing (numeric ID)
        if (is_numeric($product['product'])) {
            // Fetch the existing product from the database
            $recordedProduct = $this->modd->getproductdata($product['product']);

            if ($recordedProduct) {
                $insertId = $recordedProduct->id;
                $productName = $recordedProduct->name;
            }
        } 
        // Case 2: If product is new (string name typed in select2)
        else {
            // Insert new product into the database
            $insertData = [
                'name'      => $product['product'],
                'dp'        => $singledp,
                'mrp'       => $singlemrp,
                'createdAt' => date('Y-m-d H:i:s')
            ];

            $insertId = $this->modd->insertProduct($insertData);
            $productName = $product['product'];
        }

        // Insert purchase data into the 'purchasein' table
        $purchaseIn = [
            'productInfo_id'    => $insertId,
            'product_name'      => $productName,
            'quantity'          => $product['quantity'],
            'total_dp_price'    => $product['dpprice'],
            'total_mrp_price'   => $product['mrpprice'],
            'createdBy'         => $this->session->userdata('userId'),
            'createdAt'         => date('Y-m-d H:i:s')
        ];

        $this->db->insert('purchasein', $purchaseIn);
    }

    // Flash success message and redirect
    $this->session->set_flashdata('success', 'Products are added successfully');
    redirect('Dashboard');
}

public function getfetchdpmrp()
{
    // Get the productId from the AJAX request
    $productId = $this->input->post('productId');
    
    // Check if the productId is provided
    if ($productId) {
        $productData = $this->modd->getProductById($productId);
        
        if ($productData) {
            // Respond with the DP and MRP prices
            $response = [
                'dpprice' => $productData->dp,    // Assuming 'dp' is the column for DP Price
                'mrpprice' => $productData->mrp   // Assuming 'mrp' is the column for MRP Price
            ];
            echo json_encode($response); // Return the data as JSON
        } else {
            // If no product data is found, return an error message
            echo json_encode(['error' => 'Product not found']);
        }
    } else {
        // If no productId is provided, return an error message
        echo json_encode(['error' => 'Invalid product ID']);
    }
}


}
