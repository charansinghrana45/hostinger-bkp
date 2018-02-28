<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
    
        public function __construct()
        {
            parent::__construct();
        }   
        
        public function index()
        {
           $this->load->view('public/page_home');
        }

        public function About()
        {
           $this->load->view('public/page_about_us');
        }    
        
        public function Contact()
        {
            $this->load->view('public/page_contact_us');
            
        }   
        
  
}
