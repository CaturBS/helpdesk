<?php
class Operator extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserLoginModel');
        $this->load->model('OperatorModel');
        $this->data['title']="Administrator - Help Desk";
        $this->data['author']="Catur Budi Santoso mail: ctrbudisantoso@gmail.com";
        $this->data['username']="guest";
        $this->data['userlevel']="guest";
        $this->data['page'] = "";
        $this->setUserNameData();		
	}
    
	public function index() {
        $this->data['page'] = "operator";
        $this->load->view('templates/header', $this->data);
        if ($this->session->userdata('userlevel') != "guest") {
            $this->load->view('templates/chat', $this->data);
        };
        $this->load->view('operator/index', $this->data);
        $this->load->view('templates/footer', $this->data);
	}
	
	public function chat() {
        $this->data['page'] = "chat operator";
        $this->load->view('templates/header', $this->data);
        $this->load->view('operator/chat', $this->data);
        $this->load->view('templates/footer', $this->data);		
	}
	
    private function setUserNameData() {
        if ($this->session->userdata('username')) {
            $this->data['username']=$this->session->userdata('username');
            $this->data['userlevel']=$this->session->userdata('userlevel');            
        };
    }
    
    public function list_user_service() {
    	$users_data = array();
    	$operator = $this->session->userdata('username');
    	$users = $this->OperatorModel->listUser($operator);
    	foreach ($users as $row) {
    		$data = array();  		
    		$data['name'] = $row->name;
    		$data['online'] = ($row->last_login < 10)?"online":"offline";
    		$room_id =  $this->OperatorModel->checkRoomID($operator, $row->name);
    		$data['room_id'] = $room_id;
    		if ($room_id != -1) {
    			$data['unread_messages'] =  $this->OperatorModel->unreadMessageFromUser($room_id);    				
    		} else {
    			$data['unread_messages'] = 0;
    		}
    		$users_data[] = $data;
    	}
    	echo json_encode($users_data);
    }
    
    public function chatWith($roomID) {
    	$data['room_id'] = $roomID;
    	$operator = $this->session->userdata('username');
        $this->load->view('operator/room', $data);
    	    	
    }
}
?>