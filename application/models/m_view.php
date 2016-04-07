<?php

class M_view extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_list_account() {
        $this->db->select("a.*,t.name");
        $this->db->from("account as a");
        $this->db->join("typeaccount as t", "a.typeacc = t.id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->select("a.*,t.name");
        $this->db->from("account as a");
        $this->db->join("typeaccount as t", "a.typeacc = t.id");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_one_account($id) {
        $this->db->select("a.*,t.name");
        $this->db->from("account as a");
        $this->db->join("typeaccount as t", "a.typeacc=t.id");
        $this->db->where("a.id", $id);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->first_row();
        } else {
            return FALSE;
        }
    }

}

?>
