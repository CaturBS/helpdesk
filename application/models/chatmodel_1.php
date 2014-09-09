<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chat_model
 *
 * @author IT
 */
class ChatModel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //untuk user
    public function startChatRoom($user, $admin) {
        
        $this->db->where('user', $user);
        $this->db->where('admin', $admin);
        $query = $this->db->get('chat_rooms');
        $count = $this->db->count_all_results();        
        foreach ($query->result() as $row) {
            return $row;
        };   
        $sql = "INSERT INTO `chat_rooms`(`start_chat_timestamp`, `last_chat_timestamp`, `admin`, `user`) 
            VALUES (now(), now(), ".$this->db->escape($admin).", ".$this->db->escape($user).")";
        $this->db->query($sql);
        
        $insert_id = $this->db->insert_id();
        $query = NULL;
        $this->db->where('id', $insert_id);   
        $query = $this->db->get('chat_rooms');   
        foreach ($query->result() as $row) {
            return $row;
        };   
        return $insert_id;
    }
    
    
    public function showOperators() { 
        $sql = "SELECT * FROM `user` WHERE (TIMESTAMPDIFF(SECOND,last_activity, NOW()) < 10) && (level LIKE 'operator')";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function showRooms($operator, $diffTime=180) {
        $sql = "SELECT * FROM `chat_rooms` WHERE (TIMESTAMPDIFF(SECOND,last_chat_timestamp, NOW()) < ".$diffTime.") "
                . "&& admin = '" . $operator . "';";
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    public function insertChatMessages($room_id, $sender, $messages) {
        $sql = "UPDATE `chat_rooms` SET `last_chat_timestamp`=now() WHERE id=" . $room_id . ";";
        $this->db->query($sql);
        $messages2= str_replace("%20"," ",$messages);
        $messages1= substr ($messages2, 1);
        $sql = "INSERT INTO `chat_messages`(`timestamp`, `sender`, `message`, "
                . "`id_chat_room`) VALUES (now(), "
                .$this->db->escape($sender).", " .$this->db->escape($messages1). 
                ", ".$room_id.");";
        $this->db->query($sql);
    }
    
    public function showChatMessages($id_room, $limitHour = 24) {
        $sql = "SELECT chat_rooms.admin as admin, chat_rooms.user as user, "
                . "chat_messages.timestamp as timestamp, chat_messages.sender as sender,"
                . "chat_messages.message as message "
                . "FROM `chat_messages` "
                . "INNER JOIN chat_rooms "
                . "WHERE "
                . "(TIMESTAMPDIFF(HOUR,timestamp, NOW()) < " . $limitHour. ") && "
                . "(id_chat_room = ".$id_room." ) && "
                . "(chat_messages.id_chat_room = chat_rooms.id);";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updateUserActivityTime($userName) {
        $sql = "UPDATE user SET last_activity = now() WHERE name=" . $this->db->escape($userName);
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
