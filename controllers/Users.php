<?php

class Users extends CI_Controller {

    private $dostup = array(
        '0' => array(
        ),
        '1' => array(
            'addstaring', 'editstaring'
        ),
        '777' => array(
            'adduser', 'deleteusers', 'addstaring',
            'deletestaring', 'editstaring'
        ),
        '' => array(
        )
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');

        $user_id = $this->session->userdata('type');

        if ($this->router->fetch_method() != 'login' && $this->router->fetch_method() != 'index') {
            if (empty($user_id) || !in_array($this->router->fetch_method(), $this->dostup[$user_id])) {
                echo "у вас нет прав";
                exit();
            }
        }
    }

    public function index() {
        $this->login();
    }

    public function adduser() {

        // echo $this->session->userdata('id');

        $phone = $this->input->post('login');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $type = $this->input->post('type');

        $this->User_Model->addUsers($email, $phone, $type, $password);
        $this->load->view('adduserview');
    }

    public function deleteusers() {
        $id = $this->input->post('id');

        $delusers = $this->User_Model->get_All_users();
        $this->load->view('deleteuser', array('delusers' => $delusers));
        $this->User_Model->deleteUsers($id);
    }

    public function login() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        if (!empty($login) and ! empty($password)) {

            $status = $this->User_Model->get_status($login, $password);


            if (!empty($status)) {
                $this->session->set_userdata('type', $status->type);
                $this->session->set_userdata('id', $status->id);
                redirect('users/Adduser');
            }

            if ($status == NULL) {
                echo "Логин или пароль не верны";
            }
        }
        $this->load->view('login'); //
    }

}
