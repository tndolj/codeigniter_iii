<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function create() {
      $data = array(
        'username' => $_POST['username'],
        'password' => md5($_POST['password']),
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'age' => $_POST['age'],
      );
      $create = $this->user_model->create($data);

      $this->toastr->success('Create success!');
      redirect('');
    }

    public function update($id) {
      $get_user = $this->user_model->get($id);
      $this->load->view('update', ['get_user' => $get_user[0]]);
    }

    public function store() {
      $get_user = $this->user_model->store($_POST);
      
      $this->toastr->success('Update success!');
      redirect('user/update/' . $_POST['id']);
    }

    public function delete() {
      $save = $this->user_model->delete($_POST['id']);

      $this->toastr->success('Delete success!');
      redirect('');
    }
}
