<?php 
   class Email extends CI_Controller { 

      function __construct() { 
         parent::__construct(); 
          //load helper form
         $this->load->helper('form'); 
      } 

      public function index() { 

         $this->load->helper('form'); 
         $this->load->view(‘home’); 

      } 

      public function send_mail() { 

         $from_email = "ilhamvannyputrapp@gmail.com"; 
         $to_email = "ilhamvannyputra@gmail.com"; 

         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 587,
                'smtp_user' => $from_email,
                'smtp_pass' => 'namasaya534',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");   

         $this->email->from($from_email, 'bejo Kamu'); 
         $this->email->to($to_email);
         $this->email->subject('Test Pengiriman Email'); 
         $this->email->message('<html> 
         <head> 
             <title>Welcome to CodexWorld</title> 
         </head> 
         <body> 
             <h1>Thanks you for joining with us!</h1> 
             <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                 <tr> 
                     <th>Name:</th><td>CodexWorld</td> 
                 </tr> 
                 <tr style="background-color: #e0e0e0;"> 
                     <th>Email:</th><td>contact@codexworld.com</td> 
                 </tr> 
                 <tr> 
                     <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td> 
                 </tr> 
             </table> 
         </body> 
         </html>'); 

         //Send mail 
         if($this->email->send()){
                $this->session->set_flashdata("notif","Email berhasil terkirim."); 
                echo "berhasil terkirim";
         }else {
               echo "belum berhasil terkirim";
                $this->session->set_flashdata("notif","Email gagal dikirim."); 
                //$this->load->view(‘home’); 
         } 
      }
} 

