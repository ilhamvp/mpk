<?php

class Client extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //cek status login
        if (!$this->ion_auth->logged_in())
        {
          redirect('auth/login');
        }
        
        $this->load->model('M_client');
       
       
    }
   
    public function index()
    {     
        $data['judul']= 'List Proyek';

        
        $data['provinsi'] = $this->M_client->provinsi();
        $data['listclient'] = $this->M_client->listclient();
        
        
        $this->load->view('template/header');
        $this->load->view('client/listclient',$data);
        $this->load->view('template/footer');
    }

    public function addclient()
    {
            $this->M_client->addclient();
            //$this->session->set_flashdata('flashberhasil', "Data Berhasil di tambahkan!");
            redirect('client');
    }

    public function provinsi()
    {     
        $data['judul']= 'Master Provinsi';
        $data['namatabel']= 'List Provinsi';
        $data['breadcrumb']= 'Provinsi';

        
        $data['provinsi'] = $this->M_client->provinsi();
        // $data['listclient'] = $this->M_client->listclient();

        $this->load->view('template/header');
        $this->load->view('client/listprovinsi',$data);
        $this->load->view('template/footer');
    }

    
    
} 