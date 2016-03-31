<?php

class Add extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_add");
    }
    public function index(){
        $data["title"] = "Create new account or new type of account !";
        $this->load->view("v_add",$data);
    }
    public function add_type_account(){
        $data["title"]="Create new type of account !";
        $this->load->view("v_add_type_account",$data);
    }
    public function verify_add_type_account(){
        $this->load->library("form_validation");
    }
}

?>
