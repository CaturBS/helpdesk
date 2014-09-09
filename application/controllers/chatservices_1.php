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
    
    public function showOnlineOperators() { 
        $text = $this->ChatModel->showOnlineOperators();
        echo json_encode($text);
    }

    public function startRoomAsUser($operator) {
        /*$data['count'] = $this->ChatModel->startChatRoom($user, $admin);
        $this->load->view('servicetest', $data);*/
        $user = $this->session->userdata('username');
        $result = $this->ChatModel->startChatRoom($user, $operator);
        echo json_encode($result);
    }
    
    public function updateActivityTime($username) {
        echo $this->ChatModel->updateUserActivityTime($username);
    }
    
    
    public function showChatMessages($room_id, $limitHour = 24) {        
        echo json_encode($this->ChatModel->showChatMessages($room_id, $limitHour));
    }
        
    public function insertChatMessages($sender, $messages, $room_id) {
        $this->ChatModel->insertChatMessages($room_id, $sender, $messages);
    }
    
    public function showUsersInChat($operator) {
        echo json_encode($this->ChatModel->showRooms($operator));
    }
    
    private $chat_id = 0;
    public function createChatDialog() {
        echo '
        <div id="chatBox_'. $this->chat_id.'">
            dfjdsklj kljk
        </div>';
    }
    
    
    
}
