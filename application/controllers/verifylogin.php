<?php

class Verifylogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_user");
    }
    public function index(){
        //This method will have the credentials validation
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username","Username","trim|required|xss_clean");
        $this->form_validation->set_rules("password","Password","trim|required|xss_clean|callback_check_database");
        
        if($this->form_validation->run() == FALSE){
            //Field validation failed.  User redirected to login page
            $data['title'] ="Login";
            $this->load->view("v_login",$data);
        }
        else{
            //Go to private area
            redirect("home","refresh");
        }
    }
    public function check_database($password){
        //Field validation succeeded.  Validate against database
        $username = $this->input->post("username");        
        //query the database
        $result = $this->m_user->login($username,$password);
        if($result){            
            $sess_arr = array();
            foreach($result as $row){
                $sess_arr = array(
                    "id"=> $row->id,
                    "username"=>$row->username,
                    "permission_group"=>$row->permission_group
                );
            }
            $this->session->set_userdata("logged_in",$sess_arr);
            return TRUE;
        }else{
            $this->form_validation->set_message("check_database","Invalid username or password");
            return FALSE;
        }
    }
}
?>

