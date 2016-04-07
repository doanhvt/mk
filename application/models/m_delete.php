<?php

class M_delete extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function delete_account($id) {
        $this->db->where('id', $id);
        $this->db->delete('account');
    }

}

?>
