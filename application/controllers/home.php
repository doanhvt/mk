<?php
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = "ADMIN";
        $this->load->view('v_home',$data);
    }
}
?>

