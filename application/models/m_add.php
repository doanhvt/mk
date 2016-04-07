<?php

class M_add extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_type_account($data_insert) {
        $this->db->insert("typeaccount", $data_insert);
    }

    public function check_dupliate_type_account($data_check) {
        $this->db->select("*");
        $this->db->from("typeaccount");
        $this->db->where($data_check);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add_account($data_insert) {
        $this->db->insert("account", $data_insert);
    }

    public function get_list_type_account() {
        $this->db->select("*");
        $this->db->from("typeaccount");
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function check_dupliate_account($data_check) {
        $this->db->select("*");
        $this->db->from("account");
        $this->db->where($data_check);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
?>

