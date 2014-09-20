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
			$sql = "SELECT * FROM chat_messages WHERE id_chat_room = " . $roomID . " ORDER BY timestamp DESC;";
			$query = $this->db->query($sql);
	        return $query->result();
		}
		
		public function getSingleColum($columName, $tableName) {
			$sql = "SELECT " . $columName ." as nama FROM " . $tableName .";";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function addTicket($data) {
			$this->db->insert("data_ticket", $data);
		}
		
		public function showTicket($limit = -1, $offset=0) {
			$sql = "SELECT * FROM data_ticket";
			if ($limit > 0) {
				$sql = "SELECT * FROM data_ticket limit " . $offset . ", " . $limit . ";";
			};
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function ticketData($id) {
			$sql = "SELECT * FROM data_ticket WHERE id = " . $id . ";";
			$query = $this->db->query($sql);
			foreach ($query->result() as $row) {
				return $row;
			}			
		}
		
		public function editTicket($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('data_ticket', $data);
		}
		
		public function ticketCount() {
			$sql = "SELECT COUNT(*) as ticketCount FROM data_ticket;";
			$query = $this->db->query($sql);
			return $query->result()[0]->ticketCount;		
		}
		
		public function rekap_ticket_instansi() {
			$sql = "SELECT instansi.nama_instansi as label " . 
					"FROM instansi RIGHT JOIN data_ticket ON " .
					"instansi.nama_instansi = data_ticket.instansi ORDER BY " .
					"data_ticket.instansi;";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function rekap_ticket_jenis_kasus() {
			$sql = "SELECT jenis_kasus.kasus as label " .
					"FROM jenis_kasus RIGHT JOIN data_ticket ON " .
					"jenis_kasus.kasus = data_ticket.jenis_kasus ORDER BY " .
					"data_ticket.jenis_kasus;";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function rekap_ticket_level_penanganan() {
			$sql = "SELECT level_penanganan.nama as label " .
					"FROM level_penanganan RIGHT JOIN data_ticket ON " .
					"level_penanganan.nama = data_ticket.level_penanganan ORDER BY " .
					"data_ticket.level_penanganan;";
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
?>