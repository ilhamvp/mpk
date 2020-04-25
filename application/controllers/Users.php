<?php

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //cek status login
        if (!$this->ion_auth->logged_in())
        {
          redirect('auth/login');
        }
        
        $this->load->model('M_users');
       
       
    }
   
    public function index()
    {     
        $data['judul']= 'Master Users';
        $data['namatabel']= 'List Users';
        $data['breadcrumb']= 'Users';

        
        // $data['provinsi'] = $this->M_client->provinsi();
        $data['listusers'] = $this->M_users->listusers();
        
        
        $this->load->view('template/header',$data);
        $this->load->view('users/listuser',$data);
        $this->load->view('template/footer');
    }

    public function add()
    {     
        $data['judul']= 'Master Users';
        $data['namatabel']= 'List Users';
        $data['breadcrumb']= 'Users';

        
        // $data['provinsi'] = $this->M_client->provinsi();
        $data['listusers'] = $this->M_users->listusers();
        
        
        $this->load->view('template/header');
        $this->load->view('users/add',$data);
        $this->load->view('template/footer');
    }

    public function addclient()
    {
            $this->M_client->addclient();
            //$this->session->set_flashdata('flashberhasil', "Data Berhasil di tambahkan!");
            redirect('client');
    }

   

    
    
} 