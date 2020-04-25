<?php

class Proyek extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //cek status login
        if (!$this->ion_auth->logged_in())
        {
          redirect('auth/login');
        }
      
        
        $this->load->model('M_proyek');
       
       
    }
   
    public function index()
    {     
        $data['judul']= 'List Proyek';
     
        //untuk mengambil unit_id yang di tampilkan dalam form add (type hidden)
        //$data['ambilunitid'] = $this->M_programkerja->datausers();
        

        // $data['program_kerja'] = $this->M_programkerja->Get_progja();
        // $data['get_kode'] = $this->M_programkerja->get_kode();
        $data['listproyek'] = $this->M_proyek->listproyek();
        $data['listunit'] = $this->M_proyek->listunit();
        $data['listclient'] = $this->M_proyek->listclient();
        
        $this->load->view('template/header');
        $this->load->view('proyek/listproyek',$data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {     
        $data['judul']= 'List Proyek';

        $data['detailproyek'] = $this->M_proyek->detailproyek($id);
        $data['statuskegiatan'] = $this->M_proyek->statuskegiatan();
        $data['kegiatan'] = $this->M_proyek->kegiatan($id);
        $data['jenislampiran'] = $this->M_proyek->jenislampiran($id);
        $data['listlampiran'] = $this->M_proyek->listlampiran($id);
        $data['persentasiselesai'] = $this->M_proyek->persentasiselesai($id);

        //kegiatan untuk kanban
        $data['kegiatanberurut'] = $this->M_proyek->kegiatanberurut($id);
        $data['jenis_kegiatan'] = $this->M_proyek->jenis_kegiatan();

        //log
        $data['logkegiatan'] = $this->M_proyek->logkegiatan($id);
        
        
        

        $this->load->view('template/header');
        $this->load->view('proyek/detailproyek',$data);
        $this->load->view('template/footer',$data);
    }

    public function ganttchart($id)
    {     
        $data['judul']= 'List Proyek';


        $data['showgrafik'] = $this->M_proyek->showgrafik($id);
        $data['listkegiatan'] = $this->M_proyek->listkegiatan($id);
      
        $this->load->view('gantt/header2',$data);

    }

    public function laporan($id){
       
        $data['printjeniskegiatan'] = $this->M_proyek->printjeniskegiatan($id);
        $data['printkegiatan'] = $this->M_proyek->printkegiatan($id);
        $data['detailproyek'] = $this->M_proyek->detailproyek($id);
        $data['persentasiselesai'] = $this->M_proyek->persentasiselesai($id);

    
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-proyek-".$id.".pdf";
        $this->pdf->load_view('laporan/laporan_pdf', $data);
    
    
    }


    //update kegitatan
    public function updatekegiatan($id)
	{
	
    $namakegiatan = $this->input->post('kegiatan');
    $deskripsi_kegiatan = $this->input->post('deskripsi');
    $bobot_kegiatan = $this->input->post('bobot');
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $tanggal = $this->input->post('tanggal');
    $id_kegiatan = $this->input->post('id_kegiatan');
    $tanggalmulai = $this->input->post('tanggalmulai');
    $tanggalrencanaselesai = $this->input->post('tanggalrencanaselesai');
    
    $i = 0;
	Foreach($namakegiatan as $key=>$val)
	{           
                $data[$i]['id_proyek'] = $id;
                $data[$i]['id_kegiatan'] = $id_kegiatan[$key];
				$data[$i]['nama_kegiatan'] = $val;
                $data[$i]['deskripsi_kegiatan'] = $deskripsi_kegiatan[$key];
                $data[$i]['bobot_kegiatan'] = $bobot_kegiatan[$key];
                $data[$i]['jenis_kegiatan'] = $jenis_kegiatan[$key];
                $data[$i]['tgl_mulai_kegiatan'] = $tanggalmulai[$key];
                $data[$i]['tgl_rencanaselesai'] = $tanggalrencanaselesai[$key];
				$i++;
    }
    $this->db->update_batch('kegiatan', $data, 'id_kegiatan');
    		
	$this->session->set_flashdata('flashdataberhasil', 'Perubahan Berhasil di Terapkan!');
		redirect('proyek/detail/'.$id);
    }

    public function addperencanaan($id)
	{
	//$this->M_proyek->hapuskegiatan($id);
	
    //data dari form
    $namakegiatan = $this->input->post('kegiatan');
    $deskripsi_kegiatan = $this->input->post('deskripsi');
    $bobot_kegiatan = $this->input->post('bobot');
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $tanggalmulai = $this->input->post('tanggalmulai');
    $tanggalrencanaselesai = $this->input->post('tanggalrencanaselesai');
    $id_kegiatan = $this->input->post('id_kegiatan');
    //var_dump($tanggal);
	//$catatan = $this->input->post('catatan',TRUE);
   
	$i = 0;
	Foreach($namakegiatan as $key=>$val)
	{
				$data[$i]['id_proyek'] = $id;
				$data[$i]['nama_kegiatan'] = $val;
                $data[$i]['deskripsi_kegiatan'] = $deskripsi_kegiatan[$key];
                $data[$i]['bobot_kegiatan'] = $bobot_kegiatan[$key];
                $data[$i]['jenis_kegiatan'] = $jenis_kegiatan[$key];
                $data[$i]['tgl_mulai_kegiatan'] = $tanggalmulai[$key];
                $data[$i]['tgl_rencanaselesai'] = $tanggalrencanaselesai[$key];
                $data[$i]['created_by'] = $this->session->userdata('user_id');
                $data[$i]['created_at'] = date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s');
				$i++;
    }
    
    $this->db->insert_batch('kegiatan', $data);
	$this->session->set_flashdata('flashdataberhasil', 'Perubahan Berhasil di Terapkan!');
		redirect('proyek/detail/'.$id);
    }


    public function updaterealisasi($id)
	{
	//hapus data tugas sesuai izin
	//$this->M_proyek->hapuskegiatan($id);
	
    //data dari form
    $id_kegiatan = $this->input->post('id_kegiatan');
    $namakegiatan = $this->input->post('kegiatan');
    // $deskripsi_kegiatan = $this->input->post('deskripsi');
    // $bobot_kegiatan = $this->input->post('bobot');
    // $tanggal = $this->input->post('tanggal');
    $status_kegiatan = $this->input->post('status_kegiatan');
    // $tgl_mulai_kegiatan = $this->input->post('tgl_mulai_kegiatan');
    $tgl_selesai_kegiatan = $this->input->post('tgl_selesai_kegiatan');
    //var_dump($tanggal);
	//$catatan = $this->input->post('catatan',TRUE);

	$i = 0;
	Foreach($namakegiatan as $key=>$val)
	{
                $data[$i]['id_proyek'] = $id;
                $data[$i]['id_kegiatan'] = $id_kegiatan[$key];
                $data[$i]['nama_kegiatan'] = $val;
                $data[$i]['id_status_kegiatan'] = $status_kegiatan[$key];
                $data[$i]['tgl_selesai_kegiatan'] = $tgl_selesai_kegiatan[$key];
                $data[$i]['updated_by'] = $this->session->userdata('user_id');
                $data[$i]['updated_at'] = date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s');
				$i++;
    }
    
    //var_dump($data);
    $this->db->update_batch('kegiatan', $data, 'id_kegiatan');
    
             $idkegiatanpush = $this->input->post('idkegiatanpush');
            //notifikasi
	        //$idkegiatan = $id_kegiatan[0]->id;
            $sql="SELECT * FROM kegiatan as a, proyek as b WHERE a.id_proyek=b.id_proyek and a.id_kegiatan='$idkegiatanpush'";
            $dataproyekdankegitan = $this->db->query($sql)->row();
            $namaproyek = $dataproyekdankegitan->nama_proyek;
            $id_proyek = $dataproyekdankegitan->id_proyek;

            //dikirimke pimpinan
            $kirimpimpinan="SELECT * FROM kegiatansektor, usersektor2 WHERE kegiatansektor.id_sektor=usersektor2.id_sektor AND id_kegiatan='$idkegiatanpush'";
            $iduserpimpinan = $this->db->query($kirimpimpinan)->row();
            $tampilid = $iduserpimpinan->id;
            //echo $tampilid;
            
            

            $message = "progress Proyek";
            $user_id = "6";
            $url = base_url()."proyek/detail/".$id_proyek;
            $headings = $namaproyek;
            $img = "https://cdn.iconscout.com/icon/free/png-256/codeigniter-1-458250.png";
            
            
            $content = array(
                "en" => "$message"
            );
            $headings = array(
                "en" => "$headings"
            );
    
            $fields = array(
                'app_id' => "d18d79df-2533-4bbd-8d04-9d1aab0d1690",
                'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
                'url' => $url,
                'contents' => $content,
                'chrome_web_icon' => $img,
                'headings' => $headings
            );
    
            $fields = json_encode($fields);
            //echo "sukses";
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic NWU2YjRmNzktOTU0MC00YmRkLWFkYTQtMDViMzNiNDExMGMw'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
            $response = curl_exec($ch);
            curl_close($ch);
		    //var_dump($idkegiatanpush);
            $this->session->set_flashdata('flashdataberhasil', 'Perubahan Data Realisasi Berhasil di Terapkan!');
            redirect('proyek/detail/'.$id);
    }

    
  
    public function diupload($id){
        $config['upload_path']="./assets/lampiran";
        $config['allowed_types']='pdf|docx';
        //$config['encrypt_name'] = TRUE;
         
        $namauntukalert = $data['upload_data']['file_name'];
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload("berkas")){
            echo "gagal";
        }else{
            $data = array('upload_data' => $this->upload->data());
             $data = array(
                      'id_proyek'=> $id,
                      'id_kegiatan'=> $this->input->post('id_kegiatan'),
                      'nama_lampiran' => $data['upload_data']['file_name'],
                      'deskripsi_lampiran'=> $this->input->post('deskripsi_lampiran'),
                      'id_jenislampiran'=> $this->input->post('id_jenislampiran'),
                      'ukuran_lampiran'=> $data['upload_data']['file_size'],
                      'file_type'=> $data['upload_data']['file_ext'],
                      'insert_by'=> $this->session->userdata('user_id'),
                      'insert_at' => date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s')
                      );
            $this->db->insert('bukti_lampiran',$data);
            $this->session->set_flashdata('flashdataberhasil', 'Lampiran berhasil di unggah');   
            redirect("proyek/detail/".$id);
        }
        
 
     }

     public function deletelampiran($id){
        

        //hapus file
        $carinama = $this->db->get_where('bukti_lampiran',['id_lampiran' => $id])->row();
        if($carinama){
            unlink("assets/lampiran/".$carinama->nama_lampiran);
        }
         //hapus di db
         $query = $this->db->delete('bukti_lampiran',['id_lampiran'=>$id]);
        
        $this->session->set_flashdata('flashdataberhasil', 'Data '.$carinama->nama_lampiran.' berhasil di hapus');   
        redirect('proyek/detail/2');
    }

     public function fotoprofile($id){
        $config['upload_path']="./assets/fotoprofile";
        $config['allowed_types']='gif|jpg|png|';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload("berkas")){
            $this->session->set_flashdata('flashdataberhasil', "Foto Gagal ditambahkan!");
            redirect("auth");
        }else{
            $data = array('upload_data' => $this->upload->data());
 
            
             $data = array(
                      'foto' => $data['upload_data']['file_name']
                      );
            
            $namafoto = $this->db->get_where('users',['id' => $id])->row();
            unlink("assets/fotoprofile/".$namafoto->foto);
            
            
            
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flashdataberhasil', "Foto Berhasil ditambahkan!");
            redirect("auth");
            //$result= $this->m_upload->simpan_upload($judul,$image);
            //echo json_decode($result);
        }
        
 
     }
    
     
    function hapuskegiatan($id){
        //mengambil id proyek
        $query = $this->db->query(" SELECT * from kegiatan where id_kegiatan ='$id'");
        $id_proyek = $query->row('id_proyek');

        $bukti_lampiran = $this->M_proyek->bukti_lampiran($id);
        
        if($bukti_lampiran>0){
            $this->session->set_flashdata('flashdatawarning', "Silahkan hapus lampiran sebelum menghapus kegiatan");
            redirect("proyek/detail/".$id_proyek);
        }else{
            $this->M_proyek->hapuskegiatan($id);
            $this->session->set_flashdata('flashdataberhasil', "Kegiatan Berhasil di hapus!");
            redirect("proyek/detail/".$id_proyek);
        }
        
    }

    // CRUD PROYEK
    public function addproyek()
    {
            $this->M_proyek->addproyek();
            //$idkegiatanpush = $this->input->post('idkegiatanpush');
            //notifikasi
	        //$idkegiatan = $id_kegiatan[0]->id;
            // $sql="SELECT * FROM kegiatan as a, proyek as b WHERE a.id_proyek=b.id_proyek and a.id_kegiatan='$idkegiatanpush'";
            // $dataproyekdankegitan = $this->db->query($sql)->row();
            // $namaproyek = $dataproyekdankegitan->nama_proyek;
            // $id_proyek = $dataproyekdankegitan->id_proyek;

            //dikirimke pimpinan
            $kirimpimpinan="SELECT * FROM proyek,units,sektor,usersektor2 WHERE proyek.unit_id=units.unit_id AND units.id_sektor=sektor.id_sektor AND usersektor2.id_sektor=sektor.id_sektor ORDER by proyek.created_at DESC LIMIT 1";
            $iduserpimpinan = $this->db->query($kirimpimpinan)->row();
            $tampilid = $iduserpimpinan->id;
            $nmproyek = $iduserpimpinan->nama_proyek;
            $id_proyek = $iduserpimpinan->id_proyek;
            //echo $tampilid;
            
            

            $message = "progress Proyek";
            $user_id = $tampilid;
            $url = base_url()."proyek/detail/".$id_proyek;
            $headings = $nmproyek;
            $img = "https://cdn.iconscout.com/icon/free/png-256/codeigniter-1-458250.png";
            
            
            $content = array(
                "en" => "$message"
            );
            $headings = array(
                "en" => "$headings"
            );
    
            $fields = array(
                'app_id' => "d18d79df-2533-4bbd-8d04-9d1aab0d1690",
                'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
                'url' => $url,
                'contents' => $content,
                'chrome_web_icon' => $img,
                'headings' => $headings
            );
    
            $fields = json_encode($fields);
            //echo "sukses";
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic NWU2YjRmNzktOTU0MC00YmRkLWFkYTQtMDViMzNiNDExMGMw'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
            $response = curl_exec($ch);
            curl_close($ch);
            
            $this->session->set_flashdata('flashdataberhasil', "Data Berhasil di tambahkan!");
            redirect('proyek');
    }


    
    public function editproyek($id)
    {     
        $this->M_proyek->editproyek($id);     
        $this->session->set_flashdata('flashdataberhasil', "Data Berhasil di ubah!");
        redirect('proyek');
    }
    public function hapusproyek($id)
    {     
        $this->M_proyek->hapusproyek($id);   
        $this->session->set_flashdata('flashdataberhasil', "Data Berhasil di hapus!");
        redirect('proyek');
    }

    

    // kanban
    public function parseJsonArray($jsonArray, $parentID = 0) {
        //$data = json_decode($_POST['data']);
        
        $return = array();
       // var_dump($jsonArray);
        foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
            }

            $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
            $return = array_merge($return, $returnSubSubArray);
        }
        return $return;
    }

    public function updatemenu()
    {
        
        $data = json_decode($_POST['data']);
        print_r($data); 
        $status = $data[0]->index;
        if(isset($data[1]->id)){
            
            $idkegiatan = $data[1]->id;
            $sql="SELECT * FROM kegiatan as a, proyek as b WHERE a.id_proyek=b.id_proyek and a.id_kegiatan='$idkegiatan'";
            $dataproyekdankegitan = $this->db->query($sql)->row();
            $namaproyek = $dataproyekdankegitan->nama_proyek;
            $id_proyek = $dataproyekdankegitan->id_proyek;

            //dikirimke pimpinan
            $kirimpimpinan="SELECT * FROM kegiatansektor, usersektor2 WHERE kegiatansektor.id_sektor=usersektor2.id_sektor AND id_kegiatan='$idkegiatan'";
            $iduserpimpinan = $this->db->query($kirimpimpinan)->row();
            $tampilid = $iduserpimpinan->id;
            echo $tampilid;
            
            

            $message = "progress Proyek";
            $user_id = $tampilid;
            $url = base_url()."proyek/detail/".$id_proyek;
            $headings = $namaproyek;
            $img = "https://cdn.iconscout.com/icon/free/png-256/codeigniter-1-458250.png";
            
            
            $content = array(
                "en" => "$message"
            );
            $headings = array(
                "en" => "$headings"
            );
    
            $fields = array(
                'app_id' => "d18d79df-2533-4bbd-8d04-9d1aab0d1690",
                'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
                'url' => $url,
                'contents' => $content,
                'chrome_web_icon' => $img,
                'headings' => $headings
            );
    
            $fields = json_encode($fields);
            //echo "sukses";
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic NWU2YjRmNzktOTU0MC00YmRkLWFkYTQtMDViMzNiNDExMGMw'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
            $response = curl_exec($ch);
            curl_close($ch);
            //return $response;
         }
         else{
            echo "id kosong";
         }
        
        $i=0;
        foreach($data as $key => $value) {
            $i++;
            $data = array(
                    'id_status_kegiatan' => $status,
                    'urutan' => $i,
                    'updated_by' => $this->session->userdata('user_id'),
                    'updated_at' => date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s')                
                    );
            $this->db->where('id_kegiatan',$value->id);
            $this->db->update('kegiatan', $data);
            
          }
        
        //notifikasi
      

        
    }
    
    
} 