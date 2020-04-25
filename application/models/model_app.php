<?php 
class Model_app extends CI_model{
    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }
}