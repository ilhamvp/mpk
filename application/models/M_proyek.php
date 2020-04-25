<?php 

class M_proyek extends CI_model {

    public function listproyek()
    {
        if($this->ion_auth->is_admin()){
            return $query = $this->db->get('proyek')->result_array();
        }elseif($this->ion_auth->in_group('unit')) {
            $idusersesi = $this->session->userdata('user_id');
            $sql="SELECT * from users where id='$idusersesi'";
            $result = $this->db->query($sql)->row();

            $sql="SELECT * FROM `proyek` WHERE unit_id=$result->unit_id";
            $result = $this->db->query($sql);
            return $result->result_array();
        }elseif($this->ion_auth->in_group('pimpinan')) {
            $idusersesi = $this->session->userdata('user_id');
            $sql="SELECT * FROM users,units,sektor WHERE users.unit_id=units.unit_id AND sektor.id_sektor=units.id_sektor and id='$idusersesi'";
            $result = $this->db->query($sql)->row();
            
            $sql="SELECT * FROM proyek, units, sektor WHERE proyek.unit_id=units.unit_id AND units.id_sektor=sektor.id_sektor and sektor.id_sektor=$result->id_sektor";
            $result = $this->db->query($sql);
            return $result->result_array();
        }
        
    }
    //tabel master unit
    

   

    public function listunit()
    {
        if($this->ion_auth->is_admin()){
            return $query = $this->db->get('units')->result_array();
        }elseif($this->ion_auth->in_group('unit')) {
            $idusersesi = $this->session->userdata('user_id');
            $sql="SELECT * from users where id='$idusersesi'";
            $result = $this->db->query($sql)->row();

            $sql="SELECT * FROM units WHERE unit_id=$result->unit_id";
            $result = $this->db->query($sql);
            return $result->result_array();
        }
        
        
    }

    //gantt chart
    public function showgrafik($id){
        $sql="SELECT * from kegiatan as a, jenis_kegiatan as b WHERE a.jenis_kegiatan=b.idjenis_kegiatan AND a.id_proyek='$id' GROUP BY a.jenis_kegiatan";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }

    public function listkegiatan($id){
        $sql="SELECT * from kegiatan as a, jenis_kegiatan as b WHERE a.jenis_kegiatan=b.idjenis_kegiatan AND a.id_proyek='$id'";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }

    //export pdf chart
    public function printjeniskegiatan($id){
        $sql="SELECT * from kegiatan as a, jenis_kegiatan as b WHERE a.jenis_kegiatan=b.idjenis_kegiatan AND a.id_proyek='$id' GROUP BY a.jenis_kegiatan";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }

    public function printkegiatan($id){
        $sql="SELECT * from kegiatan as a, jenis_kegiatan as b WHERE a.jenis_kegiatan=b.idjenis_kegiatan AND a.id_proyek='$id'";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }
    
    
    //tabel master client
    public function listclient()
    {
        return $query = $this->db->get('client')->result_array();
        
    }

    public function jenis_kegiatan()
    {
        return $query = $this->db->get('jenis_kegiatan')->result_array();
        
    }

    

    public function addproyek()
    {   
         
        //$iduser = $this->session->userdata('user_id');
       
        $data = [
            "nama_proyek" => $this->input->post('nama_proyek'),
            "deskripsi_proyek" => $this->input->post('deskripsi_proyek'),
            "tgl_mulai" => $this->input->post('tgl_mulai'),
            "tgl_perencanaan_selesai" => $this->input->post('tgl_perencanaan_selesai'),
            "nilai_proyek" => $this->input->post('nilai_proyek'),
            "unit_id" => $this->input->post('unit_id'),
            "id_client" => $this->input->post('id_client'),
            "status_proyek" => $this->input->post('status_proyek'),
            "created_by" => "1",
            "created_at" => date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s')
        ];

        $this->db->insert('proyek', $data);
    }

    public function editproyek($id)
    {   
  
        $data = [
            "nama_proyek" => $this->input->post('nama_proyek'),
            "deskripsi_proyek" => $this->input->post('deskripsi_proyek'),
            "tgl_mulai" => $this->input->post('tgl_mulai'),
            "tgl_perencanaan_selesai" => $this->input->post('tgl_perencanaan_selesai'),
            "nilai_proyek" => $this->input->post('nilai_proyek'),
            "unit_id" => $this->input->post('unit_id'),
            "id_client" => $this->input->post('id_client'),
            "status_proyek" => $this->input->post('status_proyek'),
            "update_by" => "1",
            "update_at" => date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s')
        ];

        $this->db->where('id_proyek', $id);
        $this->db->update('proyek', $data);
    }

    function hapusproyek($id){
        $this->db->delete('proyek', ['id_proyek' => $id]);
    }

    

    //persentase proyek selesai
    public function persentasiselesai($id)
    {
        $sql="SELECT SUM(bobot_kegiatan) as persentase FROM kegiatan WHERE id_proyek='$id' AND id_status_kegiatan=3";
	    $result = $this->db->query($sql);
	    return $result->row();
        
    }

    
    public function detailproyek($id)
    {
        $sql="SELECT * FROM proyek as a, units as b WHERE a.id_proyek='$id' AND a.unit_id=b.unit_id";
	    $result = $this->db->query($sql);
	    return $result->row();
        
    }

    public function logkegiatan($id)
    {
        $sql="SELECT log_kegiatan.*,users.first_name,users.last_name,users.foto,kegiatan.nama_kegiatan,proyek.nama_proyek from log_kegiatan, users,kegiatan,proyek WHERE log_kegiatan.id_user=users.id AND log_kegiatan.id_kegiatan=kegiatan.id_kegiatan AND proyek.id_proyek=log_kegiatan.id_proyek and log_kegiatan.id_proyek='$id' order by log_kegiatan.waktu_perubahan";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }

    //dasboard
    public function jumlahproyek()
    {
        $sql="SELECT COUNT(*)as jumlahproyek FROM proyek";
	    $result = $this->db->query($sql);
	    return $result->row();
    }

    public function proyekselesai()
    {
        $sql="SELECT COUNT(*)as proyekselesai FROM proyek where status_proyek='T'";
	    $result = $this->db->query($sql);
	    return $result->row();
    }

    public function jumlahclient()
    {
        $sql="SELECT COUNT(*)as jumlahclient FROM client";
	    $result = $this->db->query($sql);
	    return $result->row();
    }

    public function clientselesai()
    {
        $sql="SELECT COUNT(*)as clientselesai FROM proyek where status_proyek='T'";
	    $result = $this->db->query($sql);
	    return $result->row();
    }
    
    
    

    //untuk di controller auth
    public function userbyid($id)
    {
        $sql="SELECT * FROM users where id='$id'";
	    $result = $this->db->query($sql);
	    return $result->row();
        
    }

    public function groupbyid($id)
    {
        $sql="SELECT * FROM users_groups where user_id='$id'";
	    $result = $this->db->query($sql);
	    return $result->row();
        
    }

      

    public function statuskegiatan()
    {
        return $query = $this->db->get('status_kegiatan')->result_array();
        
    }

    public function jenislampiran()
    {
        return $query = $this->db->get('jenis_lampiran')->result_array();
        
    }

    public function listlampiran($id)
    {
        $sql="select a.*,b.jenis_lampiran,c.nama_kegiatan from bukti_lampiran as a, jenis_lampiran as b, kegiatan as c where a.id_proyek='$id' AND a.id_jenislampiran=b.id_lampiran AND a.id_kegiatan=c.id_kegiatan";
	    $result = $this->db->query($sql);
	    return $result->result_array();
        
    }

    public function kegiatan($id){
		
	    $sql="select * from kegiatan where id_proyek='$id'";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }

    public function kegiatanberurut($id){
		
	    $sql="select * from kegiatan where id_proyek='$id' order by urutan";
	    $result = $this->db->query($sql);
	    return $result->result_array();
    }
    
    function hapuskegiatan($id){
        $this->db->delete('kegiatan', ['id_kegiatan' => $id]);
    }

    function bukti_lampiran($id){
        $query = $this->db->query(" SELECT * from bukti_lampiran where id_kegiatan ='$id'");
        return $query->num_rows();
    }
    
    

    
}