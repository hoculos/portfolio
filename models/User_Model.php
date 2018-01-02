<?php

class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addUsers($email, $phone, $type, $password) {
        $this->db->insert('users', ['email' => $email,
            'phone' => $phone,
            'type' => $type,
            'password' => md5($password),
        ]);
    }

    public function get_All_users() {
        $delusers = $this->db->select('id,type,phone,email');
        $delusers = $this->db->get('users')->result_object();
        return $delusers;
    }

    public function get_status($login, $password) {
        $status = $this->db->where(array(
                    'phone' => $login,
                    'password' => md5($password),
                ))->get('users')->row_object();

        return $status;
    }
    
    public function get_user_by_id($id) {
        $status = $this->db->where(array(
                    'id' => $id,
                ))->get('users')->row_object();

        return $status;
    }

    public function deleteUsers($id) {
        $this->db->delete('users', array('id' => $id));
    }

}
