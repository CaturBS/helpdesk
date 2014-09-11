<?php
class Home extends CI_Controller {
    private $data = null;
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserLoginModel');
        $this->load->helper('url');
        $this->data['title']="Help Desk";
        $this->data['author']="Catur Budi Santoso mail: ctrbudisantoso@gmail.com";
        $this->data['username']="guest";
        $this->data['userlevel']="guest";
        $this->data['page'] = "";
        $this->setUserNameData();   
    }
    
    public function index() {
        $this->data['title']="Help Desk";
        $this->data['page'] = "index";
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
    
    private function setUserNameData() {
        if ($this->session->userdata('username')) {
            $this->data['username']=$this->session->userdata('username');
            $this->data['userlevel']=$this->session->userdata('userlevel');            
        };
    }
    
}
?>