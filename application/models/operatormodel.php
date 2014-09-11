<?php
	class OperatorModel extends CI_Model {
		
		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function listUser($operator) {
			//echo $operator;
			$sql = "SELECT name, TIMESTAMPDIFF(SECOND,last_login, NOW()) AS last_login FROM user WHERE level='user'";
	        $query = $this->db->query($sql);
	        return $query->result();				
		}

		public function checkRoomID($operator, $user) {
			$sql = "SELECT id FROM chat_rooms WHERE admin = " . $this->db->escape($operator) .
				" AND user = " . $this->db->escape($user);
			$query = $this->db->query($sql);
			$id = -1;
			foreach ($query->result() as $row) {
				$id = $row->id;
			}
			return $id;
		}
		
		public function unreadMessageFromUser($room_id) {
			$sql = "SELECT COUNT(chat_messages.message) as unread_messages FROM chat_messages " .
					"LEFT JOIN chat_rooms ON " . 
					"chat_messages.id_chat_room = chat_rooms.id " .
					"WHERE " .
					"chat_rooms.id  = " . $room_id . " AND " .
					"chat_rooms.last_op_read < chat_messages.timestamp;";
			$query = $this->db->query($sql);
	        return $query->result()[0]->unread_messages;
			
		}
		
		public function showChat($roomID) {
				
		}
		
		public function listNamaOrganisasi() {
			$sql = "SELECT nama_organisasi as nama FROM tbl_organisasi;";
			$query = $this->db->query($sql);
	        return $query->result();
		}
		
	}
?>