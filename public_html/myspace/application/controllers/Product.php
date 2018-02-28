<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
    
        public function __construct()
        {
            parent::__construct();
        }   
        
        public function index()
        {
        
            $this->listing();
        }
        
        public function listing()
        {
            $this->load->view('public/product_listing');
        }
  
}
