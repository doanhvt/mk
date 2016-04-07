<?php

class Add extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_add");
        $this->load->library("form_validation");
    }

    public function index() {
        $data["title"] = "Create new account or new type of account";
        $this->load->view("v_add", $data);
    }

    public function add_type_account() {
        $data["title"] = "Create new type of account";
        $this->load->view("v_add_type_account", $data);
    }

    public function verify_add_type_account() {
        $this->form_validation->set_rules("name", "Name", "trim|required|xss_clean|callback_name_check");
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Create new account or new type of account !";
            $this->load->view("v_add_type_account", $data);
        } else {
            $data_insert = array(
                "name" => $this->input->post("name")
            );
            $this->m_add->add_type_account($data_insert);
            $data["message"] = "Insert data successfully !";
            $this->load->view("v_add_success", $data);
        }
    }

    public function name_check($name) {
        $data_check = array(
            "name" => $name
        );
        if ($this->m_add->check_dupliate_type_account($data_check) == FALSE) {
            $this->form_validation->set_message('name_check', 'The %s field is already existed');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add_account() {
        $data["title"] = "Create new account";
        $data["type_account_list"] = $this->m_add->get_list_type_account();
        $this->load->view("v_add_account", $data);
    }

    public function verify_add_account() {
        $this->form_validation->set_rules("username", "Username", "trim|required|xss_clean");
        $this->form_validation->set_rules("password", "Password", "trim|required|matches[re-password]|callback_account_check");
        $this->form_validation->set_rules("re-password", "Re-password", "trim|required");
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Create new account !";
            $data["type_account_list"] = $this->m_add->get_list_type_account();
            $this->load->view("v_add_account", $data);
        } else {
            $data_insert = array(
                "typeacc" => $this->input->post("typeaccount"),
                "username" => $this->input->post("username"),
                "password" => bin2hex($this->input->post("password")),
                "secret_question" => $this->input->post("secret-question"),
                "answer"=>$this->input->post("answer")
            );
            $this->m_add->add_account($data_insert);
            $data["message"] = "Insert data successfully";
            $this->load->view("v_add_success", $data);
        }
    }

    public function account_check($password) {
        $data_check = array(
            "typeacc" => $this->input->post("typeaccount"),
            "username" => $this->input->post("username"),
            "password" => bin2hex($password)
        );
        if ($this->m_add->check_dupliate_account($data_check) == FALSE) {
            $this->form_validation->set_message('account_check', 'This account is already existed');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>
