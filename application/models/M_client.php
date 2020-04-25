<?php 

class M_client extends CI_model {

    public function listclient()
    {
      $sql="SELECT * FROM client as a, provinsi as b WHERE a.provinsi_client=b.id_provinsi";
	    $result = $this->db->query($sql);
	    return $result->result_array();
        
    }

    //tabel master unit
    public function listunit()
    {
        return $query = $this->db->get('units')->result_array();
        
    }
    public function provinsi()
    {
        return $query = $this->db->get('provinsi')->result_array();
        
    }

    public function addclient()
    {        
        $data = [
            "kontak_client" => $this->input->post('kontak_client'),
            "nama_perusahaan" => $this->input->post('nama_perusahaan'),
            "telepon_client" => $this->input->post('telepon_client'),
            "email_client" => $this->input->post('email_client'),
            "provinsi_client" => $this->input->post('provinsi_client'),
            "alamat_client" => $this->input->post('alamat_client'),
            "created_by" => "1",
            "created_at" => date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s')
        ];

        $this->db->insert('client', $data);
    }
    
    
 
    

    
}