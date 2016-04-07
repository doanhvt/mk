<?php
class M_edit extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function update_account($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update("account",$data_update);       
    }
}
?>
