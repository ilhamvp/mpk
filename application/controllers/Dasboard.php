<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
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

		if ($this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('flashdataberhasil', 'Perubahan Berhasil di Terapkan!');
			$this->admindps();
		}elseif($this->ion_auth->in_group('pimpinan'))
		{
			$this->pimpinan();

		}elseif($this->ion_auth->in_group('unit'))
		{
			$this->unit();

		}else{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
		}
	}

	public function admindps()
	{

		$data['jumlahproyek'] = $this->M_proyek->jumlahproyek();
		$data['proyekselesai'] = $this->M_proyek->proyekselesai();

		$data['jumlahclient'] = $this->M_proyek->jumlahclient();
		$data['clientselesai'] = $this->M_proyek->clientselesai();
		
		$this->load->view('template/header');
		$this->load->view('Dasboard/admindhc',$data);
		$this->load->view('template/footer');
	}

	public function unit()
	{
		$data['jumlahproyek'] = $this->M_proyek->jumlahproyek();
		$data['proyekselesai'] = $this->M_proyek->proyekselesai();

		$data['jumlahclient'] = $this->M_proyek->jumlahclient();
		$data['clientselesai'] = $this->M_proyek->clientselesai();
		
		$this->load->view('template/header');
		$this->load->view('Dasboard/admindhc',$data);
		$this->load->view('template/footer');
	}

	public function pimpinan()
	{
		$data['jumlahproyek'] = $this->M_proyek->jumlahproyek();
		$data['proyekselesai'] = $this->M_proyek->proyekselesai();

		$data['jumlahclient'] = $this->M_proyek->jumlahclient();
		$data['clientselesai'] = $this->M_proyek->clientselesai();
		
		$this->load->view('template/header');
		$this->load->view('Dasboard/admindhc',$data);
		$this->load->view('template/footer');
	}

}
