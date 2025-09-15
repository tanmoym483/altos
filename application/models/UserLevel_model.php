<?php
class UserLevel_model extends CI_Model
{

  public $table_name = "user_level";
  public $user_id;
  public $level;
  public $h;
  public $lchild;
  public $rchild;
  public $ld;
  public $rd;
  public $createdAt;
  public $updatedAt;

  public function isExist($user_id)
  {
    $this->db->from($this->table_name);
    $this->db->where('user_id', $user_id);

    $query = $this->db->get();
    return $query->result();
  }

  public function add($user_id, $data)
  {
    $insertData = ['user_id' => $user_id,  'createdAt' => date('Y-m-d h:i:s')];
    if (array_key_exists('h', $data))
      $insertData['h'] = $data['h'];
    if (array_key_exists('lchild', $data))
      $insertData['lchild'] = $data['lchild'];
    if (array_key_exists('rchild', $data))
      $insertData['rchild'] = $data['rchild'];
    if (array_key_exists('ld', $data))
      $insertData['ld'] = $data['ld'];
    if (array_key_exists('rd', $data))
      $insertData['rd'] = $data['rd'];
    if (array_key_exists('level', $data))
      $insertData['level'] = $data['level'];
    $this->db->insert($this->table_name, $insertData);
  }
  public function update($user_id, $data)
  {
    $updateData = ['updatedAt' => date('Y-m-d h:i:s')];
    if (array_key_exists('h', $data))
      $updateData['h'] = $data['h'];
    if (array_key_exists('lchild', $data))
      $updateData['lchild'] = $data['lchild'];
    if (array_key_exists('rchild', $data))
      $updateData['rchild'] = $data['rchild'];
    if (array_key_exists('ld', $data))
      $updateData['ld'] = $data['ld'];
    if (array_key_exists('rd', $data))
      $updateData['rd'] = $data['rd'];
    if (array_key_exists('level', $data))
      $updateData['level'] = $data['level'];
    $this->db->from($this->table_name)
      ->where('user_id', $user_id)
      ->set(
        $updateData
      )
      ->update();
  }
}
