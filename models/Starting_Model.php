<?php

class Starting_Model extends CI_Model {

    public function __Consruct() {
        parent::__construct();
    }

    public function addStarting($addstaring) {

        $this->db->insert('starrting', $addstaring);
    }

    public function editStarting($id, $sendtomodel) {
        $this->db->where('id', $id)->update('starring', $sendtomodel);
    }

    public function get_All_staring() {
        $delete = $this->db->select('id, name');
        $delete = $this->db->get('starrting')->result_object();
        return $delete;
    }

    public function deleteStarting($id) {
        $this->db->delete('starrting', array('id' => $id));
    }

}
