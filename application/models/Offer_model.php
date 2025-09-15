<?php
class Offer_model extends CI_Model
{
    public function addOffer($data){
        $insertData = [];
        
        if (array_key_exists('offer_name', $data))
            $insertData['name'] = strtoupper($data['offer_name']);
        if (array_key_exists('offer_type', $data))
            $insertData['offer_type'] = $data['offer_type'];
        if (array_key_exists('offer_amount', $data))
            $insertData['offer_amount'] = $data['offer_amount'];   
        if (array_key_exists('to_date', $data))
            $insertData['to_date'] = $data['to_date'];        
        if (array_key_exists('from_date', $data))
            $insertData['from_date'] = $data['from_date'];
        if (array_key_exists('amount', $data))
            $insertData['amount'] = $data['amount'];
        if (array_key_exists('units', $data))
            $insertData['units'] = strtoupper($data['units']);
        if (array_key_exists('purpose', $data))
            $insertData['purpose'] = strtoupper($data['purpose']);
        if (array_key_exists('user_type', $data))
            $insertData['user_type'] = strtoupper($data['user_type']);
        $insertData['status'] = 'active';
        $insertData['created_by'] = $this->session->userdata('userId');
       
        $this->db->insert('offer', $insertData);
        return $insert_id = $this->db->insert_id();
    }
  
    public function getAllOffers(){
        $this->db->select("*")->from("offer");
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $response = $this->db->get()->result();
       
        return $response;
    }
    public function getAllfOffers(){
        $this->db->select("*")->from("offer");
        $this->db->group_start();
        $this->db->where('user_type','vendor');
        $this->db->or_where('user_type','all');
        $this->db->group_end();
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $this->db->where('status','active');
        $response = $this->db->get()->result();
        
        return $response;
    }
    public function getAllCOffers(){
        $this->db->select("*")->from("offer");
        $this->db->group_start();
        $this->db->where('user_type','customer');
        $this->db->or_where('user_type','all');
        $this->db->group_end();
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $this->db->order_by("name", "DESC");
        $this->db->where('status','active');
        $response = $this->db->get()->result();
        
        return $response;
    }
    public function getOffers($rowno,$rowperpage){
        $this->db->select("*")->from("offer");
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $this->db->order_by("name", "DESC");
        $this->db->limit($rowperpage, $rowno); 
        $response = $this->db->get()->result();
        
        return $response;
    }
    public function getfOffers($rowno,$rowperpage){
        $this->db->select("*")->from("offer");
        $this->db->group_start();
        $this->db->where('user_type','vendor');
        $this->db->or_where('user_type','all');
        $this->db->group_end();
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $this->db->where('status','active');
        $this->db->order_by("name", "DESC");
        $this->db->limit($rowperpage, $rowno); 
        $response = $this->db->get()->result();
        
        return $response;
    }
    public function getCOffers($rowno,$rowperpage){
        $this->db->select("*")->from("offer");
        $this->db->group_start();
        $this->db->where('user_type','customer');
        $this->db->or_where('user_type','all');
        $this->db->group_end();
        if($_GET['search']){
            $this->db->where('name',$_GET['search']);
        }
        $this->db->where('status','active');
        $this->db->order_by("name", "DESC");
        $this->db->limit($rowperpage, $rowno); 
        $response = $this->db->get()->result();
        
        return $response;
    }
    public function deleteOffer($id){
        $updateData =  [
            'status' => 'inactive',
            'updated_by' => $this->session->userdata('userId')
        ];

        return $this->db->from('offer')
            ->where('id', $id)
            ->set(
                $updateData
            )
            ->update();
    }
    public function getOfferById($id){
      
        $this->db->select("*")->from("offer");
        $this->db->where("id", $id);
        $response = $this->db->get();
      //  echo $str = $this->db->last_query(); die;
        $response = $response->row();
        return $response;
    }
    public function deactivate_expired_offers() {
       // $tomorrow = date("Y-m-d", strtotime("+1 day"));
       
        $query = "UPDATE offer SET to_date_converted = STR_TO_DATE(to_date, '%m/%d/%Y')";
        $this->db->query($query);
       
        $this->db->set('status', 'inactive');
        $this->db->where('to_date_converted <', date("Y-m-d"));
        $this->db->where('status', 'active');
        $this->db->update('offer');
      
      
       // echo $str = $this->db->last_query(); die;
        // Check how many rows were affected for logging purposes
        return $this->db->affected_rows();
    }
}