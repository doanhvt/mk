<?php

class Pagination_2 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("m_view");
    }    
    public static function do_pagination($title,$url,$per_page,$offset,$view) {
        $data["title"] = $title;
        $config = array();
        $config["base_url"] = $url;
        $config["total_rows"] = count($this->m_view->get_list_account());
        $config["per_page"] = $per_page;
        $config["uri_segment"] = 3;
        $config['num_tag_open'] = '<div style="background-color:#EEEEE;width:30px;height:30px;display:inline-block;color:white;margin:1px;border-radius:3px 3px 3px 3px;border:1px solid #EEEEEE">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div style="background-color:#337AB7;width:30px;height:30px;display:inline-block;color:white;margin:1px;border-radius:3px 3px 3px 3px;border:1px solid #EEEEEE">';
        $config['cur_tag_close'] = '</div>';
        $config['prev_link'] = FALSE;
        $config['next_link'] = FALSE;

        $this->pagination->initialize($config);
        
        $data["list_account"] = $this->m_view->fetch_data($config["per_page"], $offset);
        $data["links"] = $this->pagination->create_links();
        $this->load->view($view, $data);
    }

}

?>
