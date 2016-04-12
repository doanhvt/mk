<?php

class Permission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_permission");
        $this->load->library("form_validation");
    }

    public function index() {
        $data["title"] = "Add permission";
        $this->load->view("v_permission", $data);
    }

    public function add_permission_group() {
        $data["title"] = "Add group permission";
        $data["list_permission"] = $this->m_permission->get_list_permission();
        $this->load->view("v_add_permission_group", $data);
    }

    public function add_permission_group_data() {
        $this->form_validation->set_rules("permission-name", "Permission", "trim|required|xss_clean|callback_check_duplicate");
        if ($this->form_validation->run() === FALSE) {
            $data["title"] = "Add group permission";
            $data["list_permission"] = $this->m_permission->get_list_permission();
            $this->load->view("v_add_permission_group", $data);
        } else {
            $data_post = $this->input->post();
            $group_id = $this->m_permission->add_group($data_post["permission-name"]);
            $this->m_permission->add_permissions($group_id);
            echo "ok";
        }
    }
    public function check_duplicate($permission_name){
        if($this->m_permission->check_duplicate_group($permission_name)){
           return TRUE; 
        }else{
            $this->form_validation->set_message("check_duplicate","The permission is already existed");
            return FALSE;
        }
    }
}

?>
