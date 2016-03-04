<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Help_Desk_Controller {
    
    public function index() {
        $this->data['title']="Help Desk";
        $this->data['page'] = "index";
        $this->loadView('homeview', array('guest','member','operator','administrator'));
    }
    
    public function chat() {
    	$this->load->view('chat/chat_update');
    }
    
    public function tutorial() {
        $this->data['title']="Help Desk";
        $this->data['page'] = "tutorial";
        $this->load->view('templates/header', $this->data);
        if ($this->session->userdata('userlevel') != "guest") {
            $this->load->view('templates/chat', $this->data);
        };
        $this->load->view('homeview', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function skpd($sub=NULL) {
        $this->data['title']="Help Desk";
        $this->data['page'] = "SKPD";
        $this->load->view('templates/header', $this->data);
        if ($this->session->userdata('userlevel') != "guest") {
            $this->load->view('templates/chat', $this->data);
        };
        if ($sub==NULL) {
            $this->load->view('skpd/index', $this->data);
        }
        $this->load->view('templates/footer', $this->data);
    }
    
    public function login($prevPage="home") {        
        $this->data['title']="Login Help Desk";
        $this->data['dataLogin'] = NULL;
        $this->data['prevPage'] = $prevPage;
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $dataLogin = $this->UserLoginModel->login($username, $password);
            $this->session->set_userdata('username', $dataLogin['username']);
            $this->session->set_userdata('userlevel', $dataLogin['userlevel']);            
            $this->data['dataLogin'] = $dataLogin;
        };
        $this->setUserNameData();
        $this->load->view('templates/header', $this->data);   
        if ($this->session->userdata('userlevel') != "guest") {
            $this->load->view('templates/chat', $this->data);
        };
        $this->load->view('loginform', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    
    public function logout() {
        $this->data['title']="Logout Help Desk";
        $this->session->set_userdata('username', 'guest');
        $this->session->set_userdata('userlevel', 'guest');
        $this->data['username']='guest';
        $this->data['userlevel']='guest';        
        $this->load->view('templates/header', $this->data);        
        $this->load->view('homeview', $this->data);
        $this->load->view('templates/footer', $this->data);            
    }
    
}
?>