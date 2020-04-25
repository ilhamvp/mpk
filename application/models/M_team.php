<?php 

class M_team extends CI_model {

    
    public function listsektor()
    {
        $sql="SELECT * FROM units, sektor WHERE units.id_sektor=sektor.id_sektor";
        $result = $this->db->query($sql);
        return $result->result_array();
        
    }

    public function sektor()
    {
        return $query = $this->db->get('sektor')->result_array();
        
    }

    

    
}