<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require APPPATH . "third_party/MX/Controller.php";
class MY_Controller extends CI_Controller
{

    public $template = null;
    public $limit = 2;
    public function __construct()
    {
        parent::__construct();
        if (is_null($this->template)) {
            // $this->template = 'layouts/default-admin';
            $this->template = 'layouts/default';
        }
        $this->load->helper('MY_data_helper');
    }
    public function view($content = null, $data = null)
    {
        // die;
        return $this->load->view($this->template, ["content" => $content, 'data' => $data]);
    }
    public function validation($config)
    {
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        return $this->form_validation->run();
    }
    public function uploadFile($image)
    {
        $config['upload_path']          = 'uploads';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10 * 1024;
        $new_name = time() . '_' . str_replace(' ', '_', $_FILES[$image]['name']);
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($image)) {
            return ["error" => $this->upload->display_errors(), "data" => null];
        } else {
            return ["error" => null, "data" => $this->upload->data()];
        }
    }
    public function mypagination($url,$total_rows=0, $per_page= 10,$uri_segment )
    {
        // $this->load->library('pagination');
       
        // $config["first_link"] = ;
        $config['base_url'] = $url;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = "First";
        $config['last_link'] = "Last";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li><b>";
        $config["cur_tag_close"] = "</b></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        // $config["cur_tag_open"] = "<b>";
        // $config["cur_tag_close"] = "</b>";
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        // Modify the base_url to include the filter parameters in pagination links
    
        return $this->pagination->create_links();
    }
    public function districtlist(){
     
        return $districtlist = array('ALIPURDUAR' ,'BANKURA', 'BIRBHUM', 'COOCHBEHAR' ,'DAKSHIN DINAJPUR' , 'DARJEELING' , 'EAST MEDINIPUR' , 'HOOGHLY', 'HOWRAH' , 'JALPAI GURI' , 'JHARGRAM' , 'KALIMPONG' , 'KOLKATA' , 'MALDHA' , 'MURSHIDABAD' , 'NADIA', 'NORTH 24 PARAGANAS' , 'PASHIM BARDHAMAN' , 'PURBA BARDHAMAN' , 'PURULIA' , 'SOUTH 24 PARAGANAS' , 'UTTAR DINAJPUR' , 'WEST MEDINIPUR');
    }
    public function statelist(){
     
        return $districtlist = array('Andhra Pradesh' ,'Amaravati', 'Arunachal Pradesh', 'Assam' ,'Bihar' , 'Chhattisgarh' , 'Goa' , 'Gujarat', 'Haryana' , 'Himachal Pradesh' , 'Jharkhand' , 'Karnataka' , 'Kerala' , 'Madhya Pradesh' , 'Maharashtra' , 'Manipur', 'Meghalaya' , 'Mizoram' , 'Nagaland' , 'Odisha' , 'Punjab' , 'Rajasthan' , 'Sikkim', 'Tamil Nadu', 'Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal');
    }
    public function sendMail($to, $sub = 'test', $data = [], $type = 'reg')
    {
        $this->load->library('email');
        $fromemail = INFO_EMAIL;
        $subject = "Mail Subject is here";
        $mesg = $this->load->view('templates/' . $type, $data, true);
        // or
        // $mesg = $this->load->view('template/email', '', true);


        $config = array(
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'mailtype' => 'html',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASS,
            'protocol' => 'smtp',
            'newline' => "\r\n",
            '_smtp_auth' => TRUE,
            'smtp_crypto' => "tls"
        );
        $this->email->initialize($config);

        $this->email->to($to);
        $this->email->from($fromemail, SITE_NAME);
        $this->email->subject($sub);
        $this->email->message($mesg);
        $mail = $this->email->send();
        return $mail;
    }
}
