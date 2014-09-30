<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chat_services
 *
 * @author IT
 */
class ChatServices extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('ChatModel');
        $this->load->library('session');
        $this->load->database();
    }
    
    public function showOperators() { 
        $array1 = $this->ChatModel->showOperators();
        $array2 = [];
        foreach ($array1 as $row) {
            $row1 = [];
            $name = $row->name;
            $unread_message = $this->userCheckUnreadMessage($name);
            $row1['name'] = $name;
            $row1['last_activity_diff'] = $row->last_activity_diff;
            $row1['last_login_diff'] = $row->last_activity_diff;
            $row1['unread_message'] = $unread_message;
            $array2[] = $row1;
        };
        echo json_encode($array2);
    }
    
    public function showUsers($operator) {
        $array1 = $this->ChatModel->showUsers($operator);
        $array2 = [];
        foreach ($array1 as $row) {
            $row1 = [];
            $row1['id'] = $row->id;
            $user = $row->user;
            $row1['user']=$user;
            $row1['unread_message'] = $this->operatorCheckUnreadMessag($user);
            $row1['last_login_diff'] = $row->last_login_diff;
            $row1['last_activity_diff'] = $row->last_activity_diff;
            if ($row1['last_login_diff'] < 10 || $row1['unread_message'] > 0) {
        		$array2[] = $row1;
            }
        }
        
        echo json_encode($array2);
    }

    public function startRoomAsUser($operator) {
        /*$data['count'] = $this->ChatModel->startChatRoom($user, $admin);
        $this->load->view('servicetest', $data);*/
        $user = $this->session->userdata('username');
        $result = $this->ChatModel->startChatRoom($user, $operator);
        echo json_encode($result);
    }
    
    public function updateLoginTime($username) {
        echo $this->ChatModel->updateUserLoginTime($username);
    }
    
    
    public function showChatMessages($room_id, $level, $limitHour = 480) {        
        echo json_encode($this->ChatModel->showChatMessages($room_id, $limitHour));
        $this->updateReadMessageTime($room_id, $level);
    }
        
    public function insertChatMessages($sender, $messages, $room_id, $level = "operator") {
        $this->ChatModel->insertChatMessages($room_id, $sender, $messages, $level);
    }
    
    private function updateReadMessageTime($room_id, $level) {
        $this->ChatModel->updateReadMessageTime($room_id, $level);
    }
    
    public function userCheckUnreadMessage($operator) {
        $user = $this->session->userdata('username');
        $room_number = $this->ChatModel->roomNumber($user, $operator);
        return ($this->ChatModel->userCheckUnreadMessage($room_number));
    }
    
    public function operatorCheckUnreadMessag($user) {
        $operator = $this->session->userdata('username');
        $room_number = $this->ChatModel->roomNumber($user, $operator);
        return ($this->ChatModel->operatorCheckUnreadMessage($room_number));
    	
    }
    
}