<?php

class Notifikasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_proyek');
       
       
    }
   
    public function index()
    {     
        // $data['judul']= 'List Proyek';
     
        // //untuk mengambil unit_id yang di tampilkan dalam form add (type hidden)
        // //$data['ambilunitid'] = $this->M_programkerja->datausers();
        

        // // $data['program_kerja'] = $this->M_programkerja->Get_progja();
        // // $data['get_kode'] = $this->M_programkerja->get_kode();
        // $data['listproyek'] = $this->M_proyek->listproyek();
        // $data['listunit'] = $this->M_proyek->listunit();
        // $data['listclient'] = $this->M_proyek->listclient();
        
        // $this->load->view('template/header');
        // $this->load->view('proyek/listproyek',$data);
        // $this->load->view('template/footer');
        $this->load->view('notifikasi/site_subscribe');
    }

    function send_message(){
        $message = $this->input->post("message");
        $user_id = $this->input->post("user_id");
		$url = $this->input->post("url");
		$headings = $this->input->post("headings");
		$img = $this->input->post("img");
		
		
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
        return $response;
    }



    
    
    
    
} 