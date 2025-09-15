<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bdo extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->model('User_model', 'userModel');
        $this->load->library("pagination");
    }

    public function list($rowno=0)
    {
        $rowperpage = 10;
       
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $others = ['trans' => true];
        if (isset($_GET['sr'])) {
            $to = $this->input->get('to');
            $from = $this->input->get('from');
            if ((strtotime($to) - strtotime($from)) > 0) {
                $others['to'] = $to;
                $others['from'] = $from;
            } else {
                return  $this->view('admin/bdo_listing', ['users' => [], 'error' => 'From date must be less than or equal to To date']);
            }
        }
        // die;
        $search = $this->input->get('table_search');
         // Get records
        $users = $this->userModel->getUsers($search, $rowno,$rowperpage, $others); 
        $allusers = $this->userModel->getAllUsers($search, $rowno,$rowperpage, $others); 
       
        // All records count
        $allcount = $this->userModel->getUsersCount($search,$others); 
       
       
        
        $config['base_url'] = base_url().'bdo/list';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
       // $config['uri_segment'] = 1;
    
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users;
        $data['row'] = $rowno;
        $data['allusers'] = $allusers;
        $this->view('admin/bdo_listing', ['users' => $data, 'search' => $search]);
    }
    public function bdoPdf()
    {
        $formdate = $this->input->post('formDate');
        $todate = $this->input->post('todate');
        $currentUserId = $this->session->userdata('userId');
        $search = $this->input->post('table_search');
        // 		$data['siswa'] = $this->userModel->getpdf();
        $data['siswa'] = $this->userModel->bdoGenaretPdf($formdate, $todate);

        // $data['siswa']=$this->userModel->getAddUser($currentUserId,$search);
        // 	echo "<pre>";print_r($data);die;"</pre>";
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-siswa.pdf";


        $this->pdf->load_view('admin/users/bdoPdf', $data);
    }
    public function pdf()
    {

        $to = $this->input->get('to');
        $from = $this->input->get('from');
        $others['trans'] = true;
        if ((strtotime($to) - strtotime($from)) > 0) {
            $others['to'] = $to;
            $others['from'] = $from;
        } else {
            // return  $this->view('admin/bdo_listing', ['users' => [], 'error' => 'From date must be less than or equal to To date']);
        }
        // $users = $this->userModel->getUsers("", 1, 100, $others);
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');
        // // $this->pdf->filename = "laporan-data-siswa.pdf";


        // $this->pdf->load_view('admin/users/bdoPdf', ['siswa' => $users]);
        // $this->pdf->render();
        // $this->pdf->stream("welcome.pdf");
        // $data['siswa'] = $this->userModel->bdoGenaretPdf($from, $to);
        $data['siswa'] = $this->userModel->getUsers(null, 1, 100, $others);


        // $data['siswa']=$this->userModel->getAddUser($currentUserId,$search);
        // 	echo "<pre>";print_r($data);die;"</pre>";
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');


        // $this->pdf->load_view('admin/users/bdoPdf', $data);
        // $this->pdf->render();
        // $this->pdf->stream("pdf_filename_" . rand(10, 1000) . ".pdf", array("Attachment" => 1));




        $this->load->view('admin/users/bdoPdf', $data);

        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("bdo_user_list_" . rand(10, 1000) . ".pdf", array("Attachment" => 1));
    }
}
