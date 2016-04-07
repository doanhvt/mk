<?php

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_view");
        $this->load->model("m_add");
        $this->load->model("m_edit");
        $this->load->library("form_validation");
    }

    public function index_2() {
        $data["title"] = "List Account";
        $data["list_account"] = $this->m_view->get_list_account();
        $this->load->view("v_edit", $data);
    }

    public function index() {
       $this->page();
    }

    public function page() {
        $data["title"] = "Edit Account";
        $config = array();
        $config["base_url"] = base_url("edit/page");
        $config["total_rows"] = count($this->m_view->get_list_account());
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $config['num_tag_open'] = '<div style="background-color:#EEEEE;width:30px;height:30px;display:inline-block;color:white;margin:1px;border-radius:3px 3px 3px 3px;border:1px solid #EEEEEE">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div style="background-color:#337AB7;width:30px;height:30px;display:inline-block;color:white;margin:1px;border-radius:3px 3px 3px 3px;border:1px solid #EEEEEE">';
        $config['cur_tag_close'] = '</div>';
        $config['prev_link'] = FALSE;
        $config['next_link'] = FALSE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["list_account"] = $this->m_view->fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view("v_edit", $data);
    }

    public function edit_account($id) {
        $data["title"] = "Edit account";
        $data["account"] = $this->m_view->get_one_account($id);
        $data["type_account_list"] = $this->m_add->get_list_type_account();
        $this->load->view("v_edit_account", $data);
    }

    public function verify_edit_account($id) {
        $this->form_validation->set_rules("username", "Username", "trim|required|xss_clean");
        $this->form_validation->set_rules("password", "Password", "trim|required|matches[re-password]|callback_account_check");
        $this->form_validation->set_rules("re-password", "Re-password", "trim|required");
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Edit account";
            $data["account"] = $this->m_view->get_one_account($id);
            $data["type_account_list"] = $this->m_add->get_list_type_account();
            $this->load->view("v_edit_account", $data);
        } else {
            $data_update = array(
                "typeacc" => $this->input->post("typeaccount"),
                "username" => $this->input->post("username"),
                "password" => bin2hex($this->input->post("password")),
                "secret_question" => $this->input->post("secret-question"),
                "answer" => $this->input->post("answer")
            );
            $this->m_edit->update_account($data_update, $id);
            $data["message"] = "Update data successfully";
            $this->load->view("v_add_success", $data);
        }
    }

    public function account_check($password) {
        $data_check = array(
            "typeacc" => $this->input->post("typeaccount"),
            "username" => $this->input->post("username"),
            "password" => bin2hex($password),
            "secret_question" => $this->input->post("secret-question"),
            "answer" => $this->input->post("answer")
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
