<?php
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("m_permission");
    }
    public function index(){
        $data['title'] = "ADMIN";
        $permission_group = $this->session->userdata("logged_in")["permission_group"];    
        $data["list_permission"] = $this->m_permission->get_user_permissions($permission_group);
        $this->load->view('v_home',$data);
    }
}
?>

