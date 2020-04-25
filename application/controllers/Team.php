<?php

class Client extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // if(!$this->ion_auth->logged_in())
            

        //     {
                
        //         redirect(base_url()."login"); //tapi mungkin perlu menggunakan load->view untuk menambahkan link logout di index
        //     }
        
        $this->load->model('M_client');
       
       
    }
   
    public function index()
    {     
        $data['judul']= 'List Team';

        
        $data['allteam'] = $this->M_team->team();
        // $data['listclient'] = $this->M_client->listclient();
        
        
        $this->load->view('template/header');
        $this->load->view('client/listclient',$data);
        $this->load->view('template/footer');
    }

    

    
    
} 