<?php 

class M_users extends CI_model {

    public function listusers()
    {
      $sql="SELECT * FROM users";
	    $result = $this->db->query($sql);
	    return $result->result_array();
        
    }

    
}