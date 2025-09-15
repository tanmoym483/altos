<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Profile extends MY_Controller
{

    public function __construct(){
        parent::__construct();
        $this->template = 'layouts/default-admin';
        $this->load->library('Pdf');
        $this->load->library('pagination');
        $this->load->model('Admin_model','modd');
        $this->load->model('User_model', 'userModel');
        $this->load->model('UserBank_model', 'userBankModel');
        $this->load->model('Diagonostic_model', 'diagonosticModel');
        $this->load->model('Transaction_model', 'transectionModel');
    }
    public function index(){
        $currentUserId = $_SESSION['userId'];  
        $userbank = $this->userBankModel->getUserBankDetails($currentUserId);
       
        $newbankDetails = $this->diagonosticModel->approvelistbyUser($currentUserId);
        $users = $this->userModel->getUserDetails($currentUserId);
        $usermember = $this->diagonosticModel->viewDiamemberDetails($currentUserId);
        $gallery = $this->diagonosticModel->viewDiamemberGallery($currentUserId);
        $this->view('admin/my-profile',['user'=> $users,'usermember' => $usermember,'gallery'=>$gallery,'userbank' => $userbank, 'districtlist'=>$this->districtlist(),'newbankDetails' => $newbankDetails]);
    }
    public function imgdelete($id){
        $this->diagonosticModel->imgdelete($id);
        return redirect('profile');
    }
    public function imgedit(){
        $insertData = $_POST;
        $insertData['userId'] = $_SESSION['userId'];
        $insertData['center_image'] = $image_name1 = $_FILES['center_image']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['center_image']['tmp_name'], $target_file);
        $this->diagonosticModel->imgupdate($insertData);
        return redirect('profile');

    }
    public function imgadd(){
        $insertData = $_POST;
        $insertData['center_image'] = $image_name1 = $_FILES['center_image']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['center_image']['tmp_name'], $target_file);
        $this->diagonosticModel->imgadd($insertData);
        return redirect('profile');
    }
    public function generate($name = 'John Doe', $course = 'PHP Development', $date = '2024-11-06') {
        // HTML content for the certificate
        $currentUserId = $_SESSION['userId'];  
        $users = $this->userModel->getUserDetails($currentUserId);
       $imagePath = FCPATH . 'assets/images/blank_certificate_new.jpeg';

        // Check if the file exists and convert it to Base64
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $backgroundImage = 'data:image/jpg;base64,' . $imageData;
        } else {
            $backgroundImage = ''; // Fallback if the image is not found
        }
        $name = $users['0']->firstName. ' '. $users['0']->middleName. ' '. $users['0']->lastName;
        $address = $users['0']->address. ' '. $users['0']->city. ' <br>'. $users['0']->district. ' '. $users['0']->state. ' '. $users['0']->postcode;
        $date = date('d/m/Y',strtotime('+1 year', strtotime($users['0']->createdAt)));
        $regId = $users['0']->regId;
        $html =<<<EOD
       <div style=" width: 100%; height: 100%; position: relative; background-image: url('$backgroundImage');
       background-size: cover;
       background-position: center;"> 
        <div style="float:right; width:85%; margin-top: 320px;padding-top: 50px; position: relative;">
            
            
            <p style="font-size: 20px; width:90%; ">This is to certify that <strong>$name</strong></p>
            <p style="font-size: 20px;">It is quantified that C/o Mr./Mrs./Ms. <strong>$name</strong></p>
            <p style="font-size: 20px; line-height:25px">Address:-  <strong>$address</strong></p>
          
            <p style="font-size: 20px;"> is authorized to sell Health Card, All types of Medicines, Ayurvedic Medicines, 
            Essential Products, FMCG, Bank CSP, Online & Offline Affiliate, Agricultural
            Products and Personal Care by Apanjon Trust Franchise as per Company Rules.
            </p>
           <p style="font-size: 20px; color:red" >* This distributor will comply with all state government laws.</p>
           <p style="font-size: 20px;" >Valid Upto <strong>$date</strong> Validity</p>
           <p style="font-size: 20px;" >Distributor Id <strong>$regId</strong></p>
        </div></div>
      EOD;

        // Load HTML content into Dompdf
        $this->pdf->loadHtml($html);

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $this->pdf->render();

        // Output the PDF to the browser
        $this->pdf->stream("certificate.pdf", array("Attachment" => 0)); // Change to 1 to force download
    }
    public function bankdetailedit(){
        $insertData = $_POST;
        $insertData['userId'] = $_SESSION['userId'];
        $insertData['accountProvedDoc'] = $image_name1 = $_FILES['accountProvedDoc']['name'];
        $target_file = "./uploads/".$image_name1;
        move_uploaded_file($_FILES['accountProvedDoc']['tmp_name'], $target_file);
       
        $this->userBankModel->createUserNewBanks($insertData);
        return redirect('profile');
    }
    public function userdetailedit(){
        $insertData = $_POST;
        $insertData['userId'] = $_SESSION['userId'];
        $this->diagonosticModel->updateUserDetails($insertData);
        return redirect('profile');
    }
    public function locationChange(){
        $insertData = $_POST;
        $insertData['userId'] = $_SESSION['userId'];
        $this->diagonosticModel->updateUserAddressDetails($insertData);
        return redirect('profile');
    }
    public function mobileChange(){
        $insertData = $_POST;
        $insertData['userId'] = $_SESSION['userId'];
        $this->diagonosticModel->updateUserPhoneDetails($insertData);
        return redirect('profile');
    }
}