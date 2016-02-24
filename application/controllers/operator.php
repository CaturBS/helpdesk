<?php
class Operator extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserLoginModel');
        $this->load->model('OperatorModel');
        $this->load->model('ChatModel');
        $this->load->helper('url');
        if ($this->session->userdata('userlevel') != "administrator") {
        	redirect('home/login/operator');
        }
        $this->data['title']="Administrator - Help Desk";
        $this->data['author']="Catur Budi Santoso mail: ctrbudisantoso@gmail.com";
        $this->data['username']="guest";
        $this->data['userlevel']="guest";
        $this->data['page'] = "operator";
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
        $this->data['page'] = "operator";
        $this->load->view('templates/header', $this->data);
        $this->load->view('operator/index', $this->data);
        $this->load->view('operator/chat', $this->data);
        $this->load->view('templates/footer', $this->data);		
	}
	
    private function setUserNameData() {
        if ($this->session->userdata('username')) {
            $this->data['username']=$this->session->userdata('username');
            $this->data['userlevel']=$this->session->userdata('userlevel');            
        };
    }
    
    public function sms() {
        $this->data['page'] = "operator";
        $this->load->view('templates/header', $this->data);
        $this->load->view('operator/index', $this->data);
        $this->load->view('operator/sms/index', $this->data);
        $this->load->view('templates/footer', $this->data);	    	
    }
    
    public function listSMSNumber() {
    	echo json_encode($this->OperatorModel->listSMSNumber());
    }    
    public function listSMSNumberUnread() {
    	echo json_encode($this->OperatorModel->listSMSNumberUnread());
    }
    public function listSMSNumberRead() {
    	echo json_encode($this->OperatorModel->listSMSNumberRead());
    }
    public function listSMSBySender($sender) {
    	echo json_encode($this->OperatorModel->listSMSBySender($sender));    	
    }
    public function readListSMS() {
    	echo json_encode($this->OperatorModel->readListSMS());
    }
    
    public function readSMS($id) {
    	echo json_encode($this->OperatorModel->readSMS($id));
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
        
    public function chatWith($roomID, $chatID, $userName) {
    	$data['room_id'] = $roomID;
    	$data['chat_id'] = $chatID;
    	$data['user'] = $userName;
    	$data['username'] = $this->session->userdata('username');
        $this->load->view('operator/room', $data);
    	    	
    }
    
    public function showChat($roomID) {
    	echo json_encode($this->OperatorModel->showChat($roomID));
    }
    
    private function addTicket($dataPost) {
    	$data = $dataPost;    	
    	unset($data['submit']);
    	unset($data['create-update']);
    	$this->OperatorModel->addTicket($data);
    }
    
    public function ticket($action="index", $id = -1) {
    	$this->data['dataForm'] = array();
    	if ($action == "index") {
    		$this->load->view('templates/header', $this->data);
    		$this->load->view('operator/index', $this->data);
    		$this->load->view('operator/ticket', $this->data);
    		$this->load->view('templates/footer', $this->data);
    	} else if ($action == "add") {
    		$this->data['postSent'] = $this->input->post('submit');
    		$this->data['formAction'] = "add";
    		if ($this->input->post('submit') == "add") {
    			$this->addTicket($this->input->post());
    		}    		
    		$dataForm = array(
    			"user"=>"",
    			"tanggal_buka"=>date("Y-m-d"),
    			"tanggal_tutup"=>"",
    			"status"=>"buka"
    		);
    		$this->data['dataForm'] = (object) $dataForm;
    		$this->data['create_update'] = "create";
    		
	        $this->load->view('templates/header', $this->data);
	        $this->load->view('operator/index', $this->data);
	    	$this->load->view('operator/ticket', $this->data);
    		
	    	$this->load->view('operator/ticket_form', $this->data);
	    	
	    	$this->load->view('templates/footer', $this->data);
    	} else if ($action == "update") {
    		$this->data['postSent'] = $this->input->post('submit');
    		$this->data['formAction'] = "update";
    		$this->data['dataForm'] = $this->OperatorModel->ticketData($id);
    		$this->data['create_update'] = "update";

    		$this->load->view('templates/header', $this->data);
    		$this->load->view('operator/index', $this->data);
    		$this->load->view('operator/ticket', $this->data);
    		
    		$this->load->view('operator/ticket_form', $this->data);
    		

    		$this->load->view('templates/footer', $this->data);
    	} else if ($action == "manage") {
    		$this->manajemen_ticket();
    	}
    }
    
    private function manajemen_ticket() {
    	$this->load->view('templates/header', $this->data);
    	$this->load->view('operator/index', $this->data);
    	$this->load->view('operator/ticket', $this->data);
    	
    	$this->load->view('operator/ticket/manajemen_ticket', $this->data);
    	
    	$this->load->view('templates/footer', $this->data);
    }
    public function add_ticket() {
    	$dataForm['postSent'] = FALSE;
    	if ($this->input->post('submit') != FALSE) {
    		$dataForm['postSent'] = TRUE;
    		$data = $this->input->post();
    		unset($data['submit']);    		
    		echo $this->OperatorModel->addTicket($data);    		
    	} else {
	    	$this->load->view('templates/header_small', $dataForm); 
    		$this->load->view('operator/add_ticket_form', $dataForm);
	    	$this->load->view('templates/footer_small', $dataForm);
    	}
    }
    public function edit_ticket($id, $prev_page = "operator/ticket/manage") {
    	$this->data['dataForm'] = array();
    	$this->data['postSent'] = $this->input->post('submit');
    	if ($this->input->post('submit') == "update") {
    		$data = $this->input->post();
    		unset($data['submit']);
    		$this->OperatorModel->editTicket($id, $data);
    		redirect(site_url($prev_page));
    	} else {
	    	$this->data['dataForm'] = $this->OperatorModel->ticketData($id);
	    	$this->data['create_update'] = "update";    	
	    	$this->load->view('templates/header_small', $this->data); 
	    	$this->load->view('operator/edit_ticket_form', $this->data);
	    	$this->load->view('templates/footer_small', $this->data);
    	}
    }
    
    public function rekap_ticket() {
    	$this->load->view('templates/header', $this->data);
    	$this->load->view('operator/index', $this->data);
    	$this->load->view('operator/ticket/rekap', $this->data);
    	$this->load->view('templates/footer', $this->data);
    }
    public function rekap_ticket_service($type = "instansi") {
    	$array1 = array();
    	if ($type == "instansi") {
    		$array1 = $this->OperatorModel->rekap_ticket_instansi();
    	} else if ($type == "jenis_kasus") {
    		$array1 = $this->OperatorModel->rekap_ticket_jenis_kasus();
    	} else {
    		$array1 = $this->OperatorModel->rekap_ticket_level_penanganan();
    	}
    	$array2 = array();
    	$instansi = "";
    	$i = -1;
    	$count = 0;
    	foreach ($array1 as $row) {
    		if ($instansi != $row->label) {
    			$i++;
    			$count = 1;
    			$instansi = $row->label;    			
    		} else {
    			$count++;
    		}
    		$array2[$i] = (object) array("label"=>$row->label, "data"=>$count);
    	}
    	echo json_encode($array2);
    }
        
    
    //web service
    

    public function insertChatMessages($room_id, $sender, $messages, $level="operator") {
    	$this->ChatModel->insertChatMessages($room_id, $sender, $messages, $level="operator");
    }
    
    public function ticketCount() {
    	echo $this->OperatorModel->ticketCount();
    }
    public function list_instansi_service() {
    	$array = $this->OperatorModel->getSingleColum("nama_instansi", "instansi");
    	$array2 = array();
    	foreach ($array as $row) {
    		$array2[] = $row->nama;
    	}
    	echo json_encode($array2);
    }
    
    public function list_jenis_kasus_service() {
    	$array = $this->OperatorModel->getSingleColum("kasus", "jenis_kasus");
    	$array2 = array();
    	foreach ($array as $row) {
    		$array2[] = $row->nama;
    	}
    	echo json_encode($array2);    	
    }

    public function list_level_penanganan_service() {
    	$array = $this->OperatorModel->getSingleColum("nama", "level_penanganan");
    	$array2 = array();
    	foreach ($array as $row) {
    		$array2[] = $row->nama;
    	}
    	echo json_encode($array2);
    }
    
    public function showTicket($limit = -1, $offset=0) {
    	$array = $this->OperatorModel->showTicket($limit, $offset);
    	echo json_encode($array);
    }    
    
    public function detailTicket($id) {
    	$data = $this->OperatorModel->ticketData($id);
    	$this->load->view('operator/detail_ticket', $data);
    	//print_r($data);
    }
    
    public function sendSMS() {
    	$receiverNumber = $this->input->post('receiverNumber');
    	$message = $this->input->post('message');
     	$this->OperatorModel->sendSMS($receiverNumber, $message);    	
    }
}
?>