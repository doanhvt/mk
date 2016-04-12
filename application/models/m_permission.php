<?php

class M_permission extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add_group($groupName) {
        $this->db->set('groupName', $groupName);
        $this->db->insert('permission_groups');
        return $this->db->insert_id();
    }

    function add_permissions($groupID) {
        // delete all permissions on this groupID first
//        $this->db->where('groupID', $groupID);
//        $this->db->delete('permission_map');
        // get post
        $post = $this->input->post();

        foreach ($post as $key => $value) {
            if ($key != "permission-name") {
                $this->db->set('groupID', $groupID);
                $this->db->set('permissionID', $value);
                $this->db->insert('permission_map');
            }
        }
        return true;
    }

    function get_list_permission() {
        $this->db->select("*");
        $this->db->from("permissions");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_user_permissions($groupID) {
        // grab keys Update
        /*
          $this->CI->db->select('key');
          $this->CI->db->join('permissions', 'permissions.permissionID = permission_map.permissionID');

          // get groups
          $this->CI->db->where('groupID', $groupID);
         */

        $this->db->select('key');
        $this->db->from('permissions');
        $this->db->join('permission_map', 'permission_map.permissionID = permissions.permissionID');
        $this->db->where('groupID', $groupID);
        // get groups
        $query = $this->db->get();
        // set permissions array and return
        if ($query->num_rows()) {
            foreach ($query->result_array() as $row) {
                $permissions[] = $row['key'];
            }
            return $permissions;
        } else {
            return false;
        }
    }

    function check_duplicate_group($group_name) {
        $this->db->select("*");
        $this->db->from("permission_groups");
        $this->db->where("groupName", $group_name);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>
