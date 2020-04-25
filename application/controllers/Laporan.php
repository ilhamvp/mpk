<?php

class Laporan extends CI_Controller {
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
   
    public function laporan_pdf(){

      $data = array(
          "dataku" => array(
              "nama" => "Petani Kode",
              "url" => "http://petanikode.com"
          )
      );
  
      $this->load->library('pdf');
  
      $this->pdf->setPaper('A4', 'potrait');
      $this->pdf->filename = "laporan-petanikode.pdf";
      $this->pdf->load_view('laporan/laporan_pdf', $data);
  
  
  }

} 