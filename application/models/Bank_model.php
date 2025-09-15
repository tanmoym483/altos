<?php
class Bank_model extends CI_Model
{
    public function bankCspProcessing(){
        $data = $this->db->select("COUNT(*) as total")->from('bank_csp');
        $data = $this->db->where('status','processing');
        $data = $this->db->get();
        
        return $response = $data->row();
    }
    public function bankCspVerification(){
        $data = $this->db->select("COUNT(*) as total")->from('bank_csp');
        $data = $this->db->where('status','verification');
        $data = $this->db->get();
        
        return $response = $data->row();
    }
    public function allbankcsp(){
        
        $currentuserrole = $this->session->userdata('role');
        $currentuser = $this->session->userdata('userId');
        $data = $this->db->select("users.firstName,users.middleName,users.lastName,users.email,users.phone,bank_csp.application_id,bank_csp.bankName,bank_csp.branchCode,bank_csp.branchLocation,bank_csp.status,bank_csp.id,bank_csp.downloaded_status,bank_csp.createdAt as date,bank_csp_kisok_address.address,bank_csp_kisok_address.landmark,bank_csp_kisok_address.city,bank_csp_kisok_address.gram_panchayat,bank_csp_kisok_address.district,bank_csp_kisok_address.state,bank_csp_kisok_address.pincode")->from('users');
        $data = $this->db->join('bank_csp', 'bank_csp.userId = users.id');
        $data = $this->db->join('bank_csp_kisok_address', 'bank_csp_kisok_address.userId = users.id');
        if($currentuserrole == 'vendor'){
            $data = $this->db->where('bank_csp.createdBy',$currentuser);
        }
        if($currentuserrole == 'customer'){
            $data = $this->db->where('bank_csp.userId',$currentuser);
        }
        $this->db->order_by("bank_csp.createdAt", "desc");
        $data = $this->db->get();
       
        return $response = $data->result();
    }
    public function allbankcspRegistration(){
        
        $currentuserrole = $this->session->userdata('role');
        $currentuser = $this->session->userdata('userId');
        $data = $this->db->select("users.firstName,users.middleName,users.lastName,users.email,users.phone,bank_csp.application_id,bank_csp.bankName,bank_csp.branchCode,bank_csp.status,bank_csp.id,bank_csp.downloaded_status")->from('users');
        $data = $this->db->join('bank_csp', 'bank_csp.userId = users.id');
        $data = $this->db->join('bank_registration', 'bank_registration.userId = users.id');
        if($currentuserrole == 'vendor'){
            $data = $this->db->where('bank_csp.createdBy',$currentuser);
        }
        if($currentuserrole == 'customer'){
            $data = $this->db->where('bank_csp.userId',$currentuser);
        }
        $data = $this->db->get();
       
        return $response = $data->result();
    }
    public function allbankcspById($id){
        
    
        $data = $this->db->select("users.firstName,users.middleName,users.lastName,users.email,users.phone,bank_csp.application_id,bank_csp.bankName,bank_csp.branchCode,bank_csp.status,bank_csp.id")->from('users');
        $data = $this->db->join('bank_csp', 'bank_csp.userId = users.id');
        $data = $this->db->where('bank_csp.id',$id);
        
        $data = $this->db->get();
       
        return $response = $data->row();
    }
    public function updateBankStatus($data){
        
        $this->db->select("*")
        ->from("bank_csp");
        $statusupdate = array(
            'status' => $data['status'],
           
        );
        $this->db->where('id', $data['id']);
        //$this->db->where('userId', $data['userId']);
        return $this->db->update('bank_csp', $statusupdate); 
    }
    public function updateDownloadStatus($id){
        $this->db->select("*")
        ->from("bank_csp");
        $statusupdate = array(
            'downloaded_status' => 'download',
           
        );
        $this->db->where('id', $id);
       
        return $this->db->update('bank_csp', $statusupdate); 
    }
    public function bankcspdalldataById($id){
        
        $data = $this->db->select("*,bank_csp.status as bstatus,
        bank_csp.id as bid,
        bank_csp_kisok_address.address as kaddress,
        bank_csp_kisok_address.gram_panchayat as kgram_panchayat,
        bank_csp_kisok_address.city as kcity, 
        bank_csp_kisok_address.district as kdistrict,
        bank_csp_kisok_address.state as kstate,
        users.address as uaddress,
        bank_user_extra_detail.gram_panchayat as ugram_panchayat,
        users.city as ucity, 
        users.district as udistrict,
        users.state as ustate")->from('users');
        $data = $this->db->join('bank_csp', 'bank_csp.userId = users.id');
        $data = $this->db->join('bank_user_extra_detail', 'bank_user_extra_detail.userId = bank_csp.userId');
        $data = $this->db->join('bank_csp_kisok_address', 'bank_csp_kisok_address.userId = bank_csp.userId');
        $data = $this->db->join('user_kyc', 'user_kyc.userId = bank_csp.userId');
        $data = $this->db->join('bank_csp_application', 'bank_csp_application.userId = bank_csp.userId','left');
        $data = $this->db->where('bank_csp.id',$id);
    
        $data = $this->db->get();
        
        return $response = $data->row();
    }
    public function getApllicationUserDetails($data){
        
        $this->db->select('users.firstName, users.middleName,users.lastName,bank_csp.bankName,bank_csp.userId,bank_csp.id,bank_csp.status')->from('users');
        $this->db->join('bank_csp', 'bank_csp.userId = users.id');
        $this->db->where('bank_csp.application_id',$data);
        $this->db->or_where('users.cardnumber',$data);
        $query = $this->db->get();
        return $response = $query->row();
    }
    public function addBanksRegistration($data){
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('transactionId', $data))
            $insertData['transactionId'] =  $data['transactionId'];
        if (array_key_exists('ibfCertificate', $data))
            $insertData['ibfCertificate'] = $data['ibfCertificate'];
           
            
        $insertData['transactionBY'] = $this->session->userdata('userId');	
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');
        
        $this->db->insert('bank_registration', $insertData);
    }
    public function addbanksPayout($data)
    {
       
        $insertData =[];
        if (array_key_exists('userId', $data))
            $insertData['userId'] = $data['userId'];
        if (array_key_exists('pbankName', $data))
            $insertData['bankName'] =  strtoupper($data['pbankName']);
        if (array_key_exists('accountHolderName', $data))
            $insertData['accountHolderName'] = strtoupper($data['accountHolderName']);
            if (array_key_exists('ifscCode', $data))
            $insertData['ifscCode'] = $data['ifscCode'];
            if (array_key_exists('accountType', $data))
            $insertData['accountType'] = strtoupper($data['accountType']);
            if (array_key_exists('branchName', $data))
            $insertData['branchName'] = strtoupper($data['branchName']);
            if (array_key_exists('accountNumber', $data))
            $insertData['accountNumber'] = $data['accountNumber'];
            if (array_key_exists('accountProvedDoc', $data))
            $insertData['accountProvedDoc'] = $data['accountProvedDoc']; 
            if (array_key_exists('signature', $data))
            $insertData['signature'] = $data['signature']; 
        
        $insertData['createdAt'] = date('Y-m-d h:i:s');
        $insertData['createdBy'] = $this->session->userdata('userId');
        
        $this->db->insert('banks_payout', $insertData);
    }
    public function bankCspByID($id){
        $data = $this->db->select("*")->from('bank_csp');
        $data = $this->db->where('userId',$id);
        $data = $this->db->get();
        
        return $response = $data->row();
    }
    public function addBankApplication($data){
        $insertData = [];
        $getuser = $this->db->select("*")->from("bank_csp");
        $getuser = $this->db->where('id', $data['id'])->get();
        $getuser = $getuser->row();
        if (array_key_exists('applicationForm', $data))
            $insertData['applicationForm'] = $data['applicationForm'];
        if (array_key_exists('residenceCertificate', $data))
            $insertData['residenceCertificate'] = $data['residenceCertificate'];
        if (array_key_exists('policeVerification', $data))
            $insertData['policeVerification'] = $data['policeVerification'];
        
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['userId'] = $getuser->userId;
   
        $this->db->insert('bank_csp_application', $insertData);
        $insert_id = $this->db->insert_id();
        $this->db->select("*")
        ->from("bank_csp");
        $statusupdate = array(
            'status' => 'branch processing',
        );
        $this->db->where('id', $data['id']);
        return $this->db->update('bank_csp', $statusupdate); 
    }
    public function addBankCsp($data){
        $insertData = [];
        if (array_key_exists('bankName', $data))
            $insertData['bankName'] = strtoupper($data['bankName']);
        if (array_key_exists('branchCode', $data))
            $insertData['branchCode'] = $data['branchCode'];
        if (array_key_exists('branchLocation', $data))
            $insertData['branchLocation'] = strtoupper($data['branchLocation']);
        $insertData['application_id'] = $data['application_id'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['userId'] = $data['userId'];
   
        $this->db->insert('bank_csp', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateBankCsp($data){
        $insertData =[];
        if (array_key_exists('bankName', $data))
            $insertData['bankName'] = strtoupper($data['bankName']);
        if (array_key_exists('branchCode', $data))
            $insertData['branchCode'] = $data['branchCode'];
        if (array_key_exists('branchLocation', $data))
            $insertData['branchLocation'] = strtoupper($data['branchLocation']);
        
        $this->db->from('bank_csp');
        $this->db->where('id', $data['id']);
        return $this->db->where('userId', $data['userId'])
        ->set(
            $insertData
        )
        ->update();
    }
    public function addBankUserDetails($data){
        $insertData = [];
        if (array_key_exists('whatsapp_phone', $data))
            $insertData['whatsapp_number'] = $data['whatsapp_phone'];
        if (array_key_exists('officenumber', $data))
            $insertData['office_number'] = $data['officenumber'];
        if (array_key_exists('reference_number', $data))
            $insertData['referance_number'] = strtoupper($data['reference_number']);
        if (array_key_exists('gram_panchayat', $data))
            $insertData['gram_panchayat'] = strtoupper($data['gram_panchayat']);
        if (array_key_exists('husbandName', $data))
            $insertData['husband_name'] = strtoupper($data['husbandName']);
        if (array_key_exists('material_status', $data))
            $insertData['material_status'] = strtoupper($data['material_status']);
        if (array_key_exists('qualificationType', $data))
            $insertData['qualification_type'] = $data['qualificationType'];
        if (array_key_exists('votercard', $data))
            $insertData['votercard'] = $data['votercard'];
        if (array_key_exists('mark_sheet', $data))
            $insertData['mark_sheet'] = $data['mark_sheet'];
        if (array_key_exists('qualification_certificate', $data))
            $insertData['qualification_certificate'] = $data['qualification_certificate'];
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['userId'] = $data['userId'];
       
        $this->db->insert('bank_user_extra_detail', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateBankUserDetails($data){
        $insertData =[];
        if (array_key_exists('whatsapp_phone', $data))
            $insertData['whatsapp_number'] = $data['whatsapp_phone'];
        if (array_key_exists('officenumber', $data))
            $insertData['office_number'] = $data['officenumber'];
        if (array_key_exists('reference_number', $data))
            $insertData['referance_number'] = strtoupper($data['reference_number']);
        if (array_key_exists('gram_panchayat', $data))
            $insertData['gram_panchayat'] = strtoupper($data['gram_panchayat']);
        if (array_key_exists('husbandName', $data))
            $insertData['husband_name'] = strtoupper($data['husbandName']);
        if (array_key_exists('material_status', $data))
            $insertData['material_status'] = strtoupper($data['material_status']);
        if (array_key_exists('qualificationType', $data))
            $insertData['qualification_type'] = $data['qualificationType'];
        if (array_key_exists('votercard', $data))
            $insertData['votercard'] = $data['votercard'];
        if (array_key_exists('mark_sheet', $data))
            $insertData['mark_sheet'] = $data['mark_sheet'];
        if (array_key_exists('qualification_certificate', $data))
            $insertData['qualification_certificate'] = $data['qualification_certificate'];
        
        $this->db->from('bank_user_extra_detail');
        $this->db->where('id', $data['id']);
        return $this->db->where('userId', $data['userId'])
        ->set(
            $insertData
        )
        ->update();
    }
    public function addBankKisokAddress($data){
        $insertData = [];
        if (array_key_exists('kaddress', $data))
            $insertData['address'] = strtoupper($data['kaddress']);
        if (array_key_exists('landmark', $data))
            $insertData['landmark'] = $data['landmark'];
        if (array_key_exists('kcity', $data))
            $insertData['city'] = strtoupper($data['kcity']);
        if (array_key_exists('kgram_panchayat', $data))
            $insertData['gram_panchayat'] = strtoupper($data['kgram_panchayat']);
        if (array_key_exists('kdistrict', $data))
            $insertData['district'] = strtoupper($data['kdistrict']);
        if (array_key_exists('kpostcode', $data))
            $insertData['pincode'] = strtoupper($data['kpostcode']);
        if (array_key_exists('kstate', $data))
            $insertData['state'] = strtoupper($data['kstate']);
        $insertData['createdBy'] = $this->session->userdata('userId');
        $insertData['userId'] = $data['userId'];
        $this->db->insert('bank_csp_kisok_address', $insertData);
        return $insert_id = $this->db->insert_id();
    }
    public function updateBankKisokAddress($data){
        $insertData =[];
        if (array_key_exists('kaddress', $data))
            $insertData['address'] = strtoupper($data['kaddress']);
        if (array_key_exists('landmark', $data))
            $insertData['landmark'] = $data['landmark'];
        if (array_key_exists('kcity', $data))
            $insertData['city'] = strtoupper($data['kcity']);
        if (array_key_exists('kgram_panchayat', $data))
            $insertData['gram_panchayat'] = strtoupper($data['kgram_panchayat']);
        if (array_key_exists('kdistrict', $data))
            $insertData['district'] = strtoupper($data['kdistrict']);
        if (array_key_exists('kpostcode', $data))
            $insertData['pincode'] = strtoupper($data['kpostcode']);
        if (array_key_exists('kstate', $data))
            $insertData['state'] = strtoupper($data['kstate']);
        
        $this->db->from('bank_csp_kisok_address');
        $this->db->where('id', $data['id']);
        return $this->db->where('userId', $data['userId'])
        ->set(
            $insertData
        )
        ->update();
    }
    public function allbranchlist($filters = []){
        $this->db->select("*")->from('branchcode');
        if(!empty($filters['bankName'])){
            $this->db->where("bank",$filters['bankName']);
        }
        if(!empty($filters['district'])){
            $this->db->where("district",$filters['district']);
        }
        if(!empty($filters['ifsc_code'])){
            $this->db->where("ifsc",$filters['ifsc_code']);
        }
        if(!empty($filters['branch_code'])){
            $this->db->where("branchCode",$filters['branch_code']);
        }
        $branchcode = $this->db->get();
        return $branchcode->result();
    }
    public function branchlist($filters = [],$limit, $offset){
        $this->db->select("*")->from('branchcode');
        if(!empty($filters['bankName'])){
            $this->db->where("bank",$filters['bankName']);
        }
        if(!empty($filters['district'])){
            $this->db->where("district",$filters['district']);
        }
        if(!empty($filters['ifsc_code'])){
            $this->db->where("ifsc",$filters['ifsc_code']);
        }
        if(!empty($filters['branch_code'])){
            $this->db->where("branchCode",$filters['branch_code']);
        }
        
        $this->db->limit($limit, $offset); 
        $query = $this->db->get();
      //  echo $str = $this->db->last_query(); die;
        return $query->result();
    }
}