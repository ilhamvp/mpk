<?php

class Sektor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //cek status login
        if (!$this->ion_auth->logged_in())
        {
          redirect('auth/login');
        }
        
        $this->load->model('M_sektor');
       
       
    }
   
    public function index()
    {     
        $data['judul']= 'List Proyek';
     
        //untuk mengambil unit_id yang di tampilkan dalam form add (type hidden)
        //$data['ambilunitid'] = $this->M_programkerja->datausers();
        

        // $data['program_kerja'] = $this->M_programkerja->Get_progja();
        // $data['get_kode'] = $this->M_programkerja->get_kode();
        // $data['listproyek'] = $this->M_proyek->listproyek();
        // $data['listunit'] = $this->M_proyek->listunit();
        $data['listsektor'] = $this->M_sektor->listsektor();
        $data['sektor'] = $this->M_sektor->sektor();
        
        $this->load->view('template/header');
        $this->load->view('sektor/listsektor',$data);
        $this->load->view('template/footer');
    }

} 