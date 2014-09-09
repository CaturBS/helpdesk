<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chatBox
 *
 * @author IT
 */
class chatBox extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('ChatModel');
        $this->load->library('session');
        $this->load->database();
    }
    
    public function index() {
        echo "tes";
    }
    
    public function chatWithOperator($operator) {
        $user = $this->session->userdata('username');
        $result = $this->ChatModel->startChatRoom($user, $operator);
        $data['room_id'] = $result;
        $data['username'] = $user;
        $data['sender'] = $user;
        $this->load->view("chat/chatForm", $data);
    }
    
    public function chatWithUser($user) {
        $operator = $this->session->userdata('username');
        $result = $this->ChatModel->startChatRoom($user, $operator);
        $data['room_id'] = $result;
        $data['username'] = $user;
        $data['operator'] = $operator;
        $data['sender'] = $operator;
        $this->load->view("chat/chatForm", $data);
        
    }
}
