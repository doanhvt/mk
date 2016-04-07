<?php

class View extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_view");
    }

    public function index() {
        $this->page();
    }

    public function page() {
        $data["title"] = "List Account";
        $config = array();
        $config["base_url"] = base_url("view/page");
        $config["total_rows"] = count($this->m_view->get_list_account());
        $config["per_page"] = 6;
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
        $this->load->view("v_view", $data);
    }

    public function view_password($id) {
        $data["title"] = "Get password";
        $data["password"] = pack("H*", $this->m_view->get_one_account($id)->password);
        $data["answer"] = $this->m_view->get_one_account($id)->answer;
        $this->load->view("v_password", $data);
    }

}
?>

