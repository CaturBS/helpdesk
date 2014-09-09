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
    //
    //
    
    public function showOperators() { 
        $sql = "SELECT id, name, full_name, level, "
                . "email,  TIMESTAMPDIFF(SECOND,last_login, NOW()) as last_activity_diff "
                . "FROM `user` WHERE  (level LIKE 'operator')";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function startChatRoom($user, $admin) {
        
        $this->db->where('user', $user);
        $this->db->where('admin', $admin);
        $query = $this->db->get('chat_rooms');
        $count = $this->db->count_all_results();        
        foreach ($query->result() as $row) {
            return $row->id;
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
    
    public function showUsers($operator, $diffTime=180) {
        $sql = "SELECT 
        		chat_rooms.id as id, 
        		chat_rooms.user as user, 
        		chat_rooms.last_chat_timestamp as last_chat_timestamp, 
        		TIMESTAMPDIFF(SECOND,chat_rooms.last_chat_timestamp, NOW()) as last_activity_diff, 
        		TIMESTAMPDIFF(SECOND,user.last_login, NOW()) as last_login_diff 
        		FROM chat_rooms 
        		LEFT JOIN user 
        		ON chat_rooms.user = user.name 
        		WHERE "
                . " chat_rooms.admin = '" . $operator . "' ORDER BY last_chat_timestamp DESC;";
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    public function insertChatMessages($room_id, $sender, $messages, $level="operator") {
        $sql = "UPDATE `chat_rooms` SET `last_chat_timestamp`=now() WHERE id=" . $room_id . ";";
        $this->db->query($sql);
        $messages1= str_replace("%20"," ",$messages);
        $messages2= str_replace("%3F","?",$messages1);
        $messages3= str_replace("%21","!",$messages2);
        $sql = "INSERT INTO `chat_messages`(`timestamp`, `sender`, `message`, "
                . "`id_chat_room`) VALUES (now(), "
                .$this->db->escape($sender).", " .$this->db->escape($messages3). 
                ", ".$room_id.");";
        $this->db->query($sql);
        $sql="";
        if ($level == "operator") {
            $sql="UPDATE `chat_rooms` SET `last_op_message`=now() WHERE id=" . $room_id . ";";
        } else {
            $sql="UPDATE `chat_rooms` SET `last_user_message`=now() WHERE id=" . $room_id . ";";
        };
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

    public function updateUserLoginTime($userName) {
        $sql = "UPDATE user SET last_login = now() WHERE name=" . $this->db->escape($userName);
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function updateReadMessageTime($room_id, $level) {
        if ($level == "operator") {
            $sql="UPDATE `chat_rooms` SET `last_op_read`=now() WHERE id=" . $room_id . ";";
        } else {
            $sql="UPDATE `chat_rooms` SET `last_user_read`=now() WHERE id=" . $room_id . ";";
        };
        $this->db->query($sql);        
    }


    public function userCheckUnreadMessage($room_id) {
        $sql = "SELECT last_user_read FROM chat_rooms " . 
            "WHERE id = ". $room_id . ";";        
        $query = $this->db->query($sql);
        $last_user_read = $query->result()[0]->last_user_read;
        $sql = "SELECT COUNT(*) as count FROM chat_messages WHERE ".
                "timestamp > " . $this->db->escape($last_user_read) . " AND " .
                "id_chat_room = " . $room_id . ";";
        $query = $this->db->query($sql);
        return $query->result()[0]->count;
    }

    public function operatorCheckUnreadMessage($room_id) {
    	$sql = "SELECT last_op_read FROM chat_rooms " .
    			"WHERE id = ". $room_id . ";";
    	$query = $this->db->query($sql);
    	$last_op_read = $query->result()[0]->last_op_read;
    	$sql = "SELECT COUNT(*) as count FROM chat_messages WHERE ".
    			"timestamp > " . $this->db->escape($last_op_read) . " AND " .
    			"id_chat_room = " . $room_id . ";";
    	$query = $this->db->query($sql);
    	return $query->result()[0]->count;
    }
    
    public function roomNumber($user, $operator) {
        $sql = "SELECT id FROM chat_rooms WHERE " . "admin = " . $this->db->escape($operator) .
                " AND user = " . $this->db->escape($user) . ";";              
        $query = $this->db->query($sql);
        if (count($query->result()) == 1) {
            return $query->result()[0]->id;
        } else {
            return -1;
        }
    }
}
