<?php

class Delete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_view");
        $this->load->model("m_delete");
    }

    public function index() {
        $this->page();
    }

    public function page() {
        $data["title"] = "Delete Account";
        $config = array();
        $config["base_url"] = base_url("delete/page");
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
        $this->load->view("v_delete", $data);
    }

    public function delete_account() {
        $data = $this->input->post("data");
        if (!empty($data)) {
            foreach ($data as $item) {
                $this->m_delete->delete_account(intval($item));
            }
            $data_return = array(
                "message" => "Deleted successfully"
            );
            echo json_encode($data_return);
        } else {
            $data_return = array(
                "message" => "You need to select at least one account to delete"
            );
            echo json_encode($data_return);
        }
    }

}

?>
