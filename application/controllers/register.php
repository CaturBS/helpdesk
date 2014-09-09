<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userlogin
 *
 * @author IT
 */
class Register extends CI_Controller{
    private $data = null;
    public function __construct() {
        parent::__construct();
        $this->data['title']="Help Desk";
        $this->data['author']="Catur Budi Santoso mail: ctrbudisantoso@gmail.com"; 
        $this->data['username']="guest";
        $this->data['userlevel']="guest";
        $this->load->model('UserLoginModel');
    }
    
    public function index() {
        
        if ($this->input->post() == FALSE){
            $this->data['posted'] = FALSE;
        } else {
            $this->data['posted'] = TRUE;
            /*$data = array(
                'name' => $this->data['name'],
                'password' => $this->data['password'],
                'email' => $this->data['email'],
            );*/
            $this->UserLoginModel->insertUser($this->input->post('name'), $this->input->post('password'), 
                    $this->input->post('level'), $this->input->post('email'));
        }
        $this->load->view('templates/header', $this->data);
        $this->load->view('registerview', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}
