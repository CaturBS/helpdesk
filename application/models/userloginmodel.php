<?php
class UserLoginModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
    }
    
    public function insertUser($name, $password, $level, $email="NA") {
        $passwordEncrypted = $this->encrypt->encode($password);
        $data = array(
            'name'=>$name,
            'password'=>$passwordEncrypted,
            'level'=>$level,
            'email'=>$email,
            'last_login' => 'now()'
        );
        $this->db->insert('user', $data);
    }
    
    public function login($name, $password) {
        $data = array(
            'success'=>FALSE,
            'username'=>'guest',
            'userlevel'=>'guest'
        );
        $this->db->where('name', $name);        
        $query = $this->db->get('user');        
        foreach ($query->result() as $row) {
            $passwordEncrypted = $row->password;
            $passwordDecrypted = $this->encrypt->decode($row->password);
            if ($password == $passwordDecrypted) {
                $data['success'] = TRUE;
                $data['username'] = $row->name;
                $data['userlevel']= $row->level;
                $data['last_login'] = $row->last_login;
            };
            $data['password'] = $passwordDecrypted;
        };
        return $data;
    }
}

?>