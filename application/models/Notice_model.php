<?php
class Notice_model extends CI_Model
{
    public function addNotice($data){
        $insertData =[];
       
        if (array_key_exists('notice', $data))
            $insertData['notice'] =  $data['notice'];
        if (array_key_exists('notice_for', $data))
            $insertData['user_type'] = $data['notice_for'];
        if (array_key_exists('introducer_code', $data))
            $insertData['regId'] = $data['introducer_code'];  
        if (array_key_exists('parentId', $data))
            $insertData['user_id'] = $data['parentId'];  
        
            
        $insertData['createdBy'] = $this->session->userdata('userId');
       
        $this->db->insert('notice', $insertData);
    }
  
    public function allNotice($page=0, $perPage=10){
        $this->db->select('notice.*,users.firstName,users.middleName,users.lastName')->from('notice')->join('users','users.id = notice.user_id')->where('notice.status','active');
        if($page != -1){
            $this->db->limit($perPage, $page);
        }
        $this->db->order_by('notice.id','desc');
        $response = $this->db->get(); 
        return $response = $response->result();
    }
    public function statusUpdate($id){
        $updateData =  [
            'status' => 'inactive'
        ];

        return $this->db->from('notice')
            ->where('id', $id)
            ->set(
                $updateData
            )
            ->update();
    }
}