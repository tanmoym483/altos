<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
    public function mypagination($total)
    {
        // $this->load->library('pagination');
        $config['total_rows'] = 200;
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
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
