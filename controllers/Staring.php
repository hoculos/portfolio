<?php

class Staring extends CI_Controller {

    private $dostup = array(
        '0' => array(
        ),
        '1' => array(
            'addstaring', 'editstaring'
        ),
        '777' => array(
           'adduser', 'deleteusers', 'addstaring' ,
            'deletestaring', 'editstaring'
        ),
        '' => array(
        )
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('Starting_Model');
        $this->load->model('User_Model');

        $user_id = $this->session->userdata('type');

        if ($this->router->fetch_method() != 'login' && $this->router->fetch_method() != 'index') {
            if (empty($user_id) || !in_array($this->router->fetch_method(), $this->dostup[$user_id])) {
                echo "у вас нет прав";
                exit();
            }
        }
    }

    public function addstaring() {
        $post = $this->input->post();

        if (isset($post['name'])) {
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $grafik = $this->input->post('grafik');
            $manager = $this->input->post('manager');
            $address = $this->input->post('address');

            $addstaring = array(
                'name' => $name,
                'description' => $description,
                'grafik' => $grafik,
                'manager' => $manager,
                'address' => $address
            );

            $this->Starting_Model->addStarting($addstaring);
        }

        $users = $this->User_Model->get_All_users();
        $this->load->view('editview', array('users' => $users));
    }

    //нужно рефакторить
    public function editstaring() {

        if ($_POST) {
            $post = $this->input->post('name');
            $post = $this->input->post('description');
            $post = $this->input->post('grafik');
            $post = $this->input->post('manager');
            $post = $this->input->post('address');

            $sendtomodel = array(
                'name' => $name,
                'description' => $description, //описание заведения
                'grafik' => $grafik,
                'manager' => $manager,
                'address' => $address
            );

            redirect('staring/Editstaring');
        }

        $this->load->view('editview');
        $this->Starting_Model->editStarting($id, $sendtomodel);
    }

    public function deletestaring() {
        //Удаление
        $id = $this->input->post('id');

        $delete = $this->Starting_Model->get_All_staring();
        $this->load->view('deletestaring', array('delete' => $delete));
        $this->Starting_Model->deleteStarting($id);
    }

}
