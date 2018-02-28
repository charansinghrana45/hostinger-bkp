<?php

 // Server File ( Api.php )
defined('BASEPATH') OR exit('No direct script access allowed');

// Including Phil Sturgeon's Rest Server Library in our Server file.
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{
  
    public function __construct() {
       
        parent::__construct();
        $this->load->model('servermodel');
    }
    
    public function index_get()
    {
        //
    }
           
    function books_get()
    {
        if(!$this->input->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $books = $this->servermodel->read( $this->input->get('id') );
  
        if($books)
        {
            $this->response($books, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
        
    }
    
    function books_delete()
    {
        if(!$this->input->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $books = $this->servermodel->delete( $this->input->get('id') );
  
        if($books)
        {
            $this->response('book deleted !', 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
        
    }
    
    function books_put()
    {
        $data = $this->input->input_stream();
        $result = $this->servermodel->update($data);
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
         
    }
    
    function books_post()
    {
        $data = $this->input->post();
        $result = $this->servermodel->insert($data);
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
    }
     
    
}


