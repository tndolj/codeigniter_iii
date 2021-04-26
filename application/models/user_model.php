<?php
/**
 * 
 */

 class User_Model extends CI_Model 
 {

  function __construct()
  {
    parent::__construct();
    $this->table = "user";  
  }

  public function get($id)
  {
    $query = $this->db->query("SELECT * FROM `user` WHERE id = {$id}")->result_array();

    if ($query) {
      return $query;
    }

    return false;
  }

  public function create($data)
  {
    $this->db->insert($this->table, $data);

    return true;
  }

  public function store($input_data)
  {
    $data = array(
      'name' => $input_data['name'],
      'surname' => $input_data['surname'],
      'age' => $input_data['age'],
    );

    $this->db->where('id', $input_data['id']);
    $this->db->update($this->table, $data);

    return true;
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);

    return true;
  }
 }