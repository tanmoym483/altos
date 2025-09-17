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



public function purchaseform()
{
    // Get all products data from the form
    $products = $this->input->post('products');
    
    // Loop through each product entry and process it
    foreach ($products as $product) {
        // Calculate the price per unit
        $singledp = $product['dpprice'] / $product['quantity'];
        $singlemrp = $product['mrpprice'] / $product['quantity'];
        $singlebv   = $product['bv'] / $product['quantity'];

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
                'bv'        => $singlebv,
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
            'total_bv'          => $product['bv'],
            'createdBy'         => $this->session->userdata('userId'),
            'createdAt'         => date('Y-m-d H:i:s')
        ];

        $this->db->insert('purchasein', $purchaseIn);
    }

    // Flash success message and redirect
    $this->session->set_flashdata('success', 'Products are added successfully');
    redirect('admin/getpurchaseproduct');
}

public function getfetchdpmrp()
{
    // Get the productId from the AJAX request
    $productId = $this->input->post('productId');
    // $product = $this->db
    // ->select('id, name')
    // ->from('productinfo')
    // ->where('id', $productId)
    // ->get()
    // ->row();


// foreach ($product_info as $product) {
    // Total purchased quantity
    

    // Store result
    // $stock_data[] = [
    //     'product_id'   => $product->id,
    //     'product_name' => $product->name,
    //     'stock_qty'    => $stock_qty
    // ];
// }

// Pass to view
// $data['stock_data'] = $stock_data;
    // Check if the productId is provided
    if ($productId) {
        $productData = $this->modd->getProductById($productId);

        $purchase_qty = $this->db
        ->select_sum('quantity')
        ->where('productinfo_id', $productId)
        ->get('purchasein')
        ->row()
        ->quantity ?? 0;

    // Total sold quantity
        $sold_qty = $this->db
        ->select_sum('quantity')
        ->where('productinfo_id', $productId)
        ->get('product_sold')
        ->row()
        ->quantity ?? 0;

    // Calculate stock quantity
    $stock_qty = $purchase_qty - $sold_qty;
        
        if ($productData) {
            // Respond with the DP and MRP prices
            $response = [
                'dpprice' => $productData->dp,    // Assuming 'dp' is the column for DP Price
                'mrpprice' => $productData->mrp,   // Assuming 'mrp' is the column for MRP Price
                'bv'       => $productData->bv,
                'stockqty'  => $stock_qty
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

public function sellsform()
{
    $data = $this->input->post();

    // 1. Insert customer
    $insertData = [
        'name'              => $data['customerName'],
        'phone'             => $data['phone'],
        'distributorCode'   =>  $data['distributorCode'],
        'createdBy'         => $this->session->userdata('userId'),
        'createdAt'         => date('Y-m-d H:i:s')
    ];

    $customerId = $this->modd->insertCustomerdata($insertData);

    // 2. Insert products (loop through array)
    if (!empty($data['products']) && is_array($data['products'])) {
        foreach ($data['products'] as $product) {
            $productInsert = [
                'customerId'        => $customerId,
                'productinfo_id'    => $product['product'],
                'quantity'          => $product['quantity'],
                'total_dp_price'    => $product['dpprice'],
                'total_mrp_price'   => $product['mrpprice'],
                'createdAt'         => date('Y-m-d H:i:s'),
                'createdBy'         => $this->session->userdata('userId'),
            ];

            $this->modd->insertProductdata($productInsert);
        }
    }

    $this->session->set_flashdata('success', 'Products are Sold successfully');

    // Optional redirect
    redirect('Dashboard');
}

public function getpurchaseproduct()
{
    $purchaseproduct = $this->db->select('*')->from('purchasein')->order_by('id', 'DESC')->get()->result();
    // echo '<pre>'; print_r($purchaseproduct);die;
    $productInfo = $this->db->select('*')->from('productinfo')->get()->result();

        $purchasequantity = $this->db->select_sum('quantity')
                             ->get('purchasein')
                             ->row()
                             ->quantity;

        $soldquantity = $this->db->select_sum('quantity')
                             ->get('product_sold')
                             ->row()
                             ->quantity;
    $this->view('admin/getpurchaseproduct',[
        'purchaseproduct'   =>  $purchaseproduct,
        'products'          =>  $productInfo,
        'purchaseQuantity'  =>  $purchasequantity,
        'soldquantity'      =>  $soldquantity
    ]);
}

public function getsoldproduct()
{
    $soldproduct = $this->db
                    ->select('product_sold.*, customer_info.name, customer_info.phone, customer_info.distributorCode, productinfo.name as productName')
                    ->from('product_sold')
                    ->join('customer_info','customer_info.id = product_sold.customerId', 'left')
                    ->join('productinfo','productinfo.id = product_sold.productinfo_id')
                    ->get()
                    ->result();
            // echo '<pre>'; print_r($soldproduct);die;
        $productInfo = $this->db->select('*')->from('productinfo')->get()->result();

        $purchasequantity = $this->db->select_sum('quantity')
                             ->get('purchasein')
                             ->row()
                             ->quantity;

        $soldquantity = $this->db->select_sum('quantity')
                             ->get('product_sold')
                             ->row()
                             ->quantity;
        

    $this->view('admin/getsoldproduct', [
                        'soldproduct' => $soldproduct,
                        'products'      =>    $productInfo,
                        'purchaseQuantity'  =>  $purchasequantity,
                        'soldquantity'      =>  $soldquantity,
    ]);
}

public function getproductstock()
{
    $product_info = $this->db
        ->select('*')
        ->from('productinfo')
        ->get()
        ->result();

    $stock_data = [];

    foreach ($product_info as $product) {
        // Purchase totals
        $purchase = $this->db->select_sum('quantity')
                            ->select_sum('total_dp_price')
                            ->select_sum('total_mrp_price')
                            ->where('productinfo_id', $product->id)
                            ->get('purchasein')
                            ->row();

        // Sold totals
        $sold = $this->db->select_sum('quantity')
                        ->select_sum('total_dp_price')
                        ->select_sum('total_mrp_price')
                        ->where('productinfo_id', $product->id)
                        ->get('product_sold')
                        ->row();

        // Prevent null values (if no rows exist)
        $purchase_qty   = $purchase->quantity ?? 0;
        $purchase_dp    = $purchase->total_dp_price ?? 0;
        $purchase_mrp   = $purchase->total_mrp_price ?? 0;

        $sold_qty       = $sold->quantity ?? 0;
        $sold_dp        = $sold->total_dp_price ?? 0;
        $sold_mrp       = $sold->total_mrp_price ?? 0;

        // Calculate stock
        $stockquantity  = $purchase_qty - $sold_qty;
        $stockdpprice   = $purchase_dp - $sold_dp;
        $stockmrpprice  = $purchase_mrp - $sold_mrp;

        $stock_data[] = [
            'product_id'    => $product->id,
            'product_name'  => $product->name,
            'purchase_qty'  => $purchase_qty,
            'sold_qty'      => $sold_qty,
            'stock_qty'     => $stockquantity,
            'stock_dp'      => $stockdpprice,
            'stock_mrp'     => $stockmrpprice,
            'single_dp'     => $product->dp,
            'single_mrp'    => $product->mrp,
        ];
    }

    // Pass data to view
    $data['stock_data'] = $stock_data;
    // echo '<pre>'; print_r($data);die;
    $this->view('admin/getproductstock', $data);
}

public function updatesoldproduct()
{
    $data = (object) $this->input->post();

    // Total purchased quantity
    $purchase_qty = $this->db
        ->select_sum('quantity')
        ->where('productinfo_id', $data->productid)
        ->get('purchasein')
        ->row()
        ->quantity ?? 0;

    // Total sold quantity excluding current row (if editing existing one)
    $sold_qty = $this->db
        ->select_sum('quantity')
        ->where('productinfo_id', $data->productid)
        ->where('id !=', $data->id) // Exclude the record being updated
        ->get('product_sold')
        ->row()
        ->quantity ?? 0;

    // Calculate available stock
    $stock_qty = $purchase_qty - $sold_qty;

    // Validate stock
    if ($data->quantity > 0 && $data->quantity <= $stock_qty) {

        $insertData = [
            'quantity'        => $data->quantity,
            'total_dp_price'  => $data->total_dp_price,
            'total_mrp_price' => $data->total_mrp_price
        ];

        $update = $this->db->where('id', $data->id)->update('product_sold', $insertData);

        if ($update) {
            echo json_encode([
                'status'  => 'success',
                'message' => 'Product sold updated successfully.'
            ]);
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Failed to update product sold.'
            ]);
        }

    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Invalid quantity. Must be greater than 0 and not exceed available stock (' . $stock_qty . ').'
        ]);
    }
}


public function deletesoldproduct($productId){
    $delete_product = $this->db->where('id', $productId)->delete('product_sold');
    if($delete_product){
        $this->session->set_flashdata('success', 'Product sold deleted successfully.');
    }
    redirect('admin/getsoldproduct');
}

}
