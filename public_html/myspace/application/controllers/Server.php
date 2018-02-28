<?php

 // Server File ( Api.php )
defined('BASEPATH') OR exit('No direct script access allowed');

// Including Phil Sturgeon's Rest Server Library in our Server file.
require APPPATH . '/libraries/REST_Controller.php';

class Server extends REST_Controller{
    // Load model in constructor
    public function __construct() {
        
        parent::__construct();
        $this->load->model('servermodel');
    }
    
    // Server's Get Method
    public function data_get($id_param = NULL){
        
        $id = $this->input->get('id');
        
        if($id===NULL){
            $id = $id_param;
        }
        
        if ($id === NULL)
        {
            $data = $this->servermodel->read($id);
            if ($data)
            {
                $this->response($data, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                'status' => FALSE,
                'error' => 'No books were found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
        $data = $this->servermodel->read($id);
        if ($data)
        {
            $this->set_response($data, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
            'status' => FALSE,
            'error' => 'Record could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    // Server's Post Method
    public function data_post(){
        
        $data = array('book_name' => $this->input->post('dname'),
        'book_price' => $this->input->post('dprice'),
        'book_author' => $this->input->post('dauthor')
        );
        
        $this->servermodel->insert($data);
        $message = [
        'Book Name' => $data['book_name'],
        'Book Price' => $data['book_price'],
        'Book Author' => $data['book_author'],
        'message' => 'Added a resource'
        ];
        
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    // Server's Put Method
    public function data_put(){
        
        $data = $this->input->input_stream();
        $this->servermodel->update($data);
        $message = [
        'id' => $data['id'],
        'Book Name' => $data['book_name'],
        'Book Price' => $data['book_price'],
        'Book Author' => $data['book_author'],
        'message' => 'Added a resource'
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    
    // Server's Delete Method
    public function data_delete(){
        
        $id = $this->uri->segment(3);
        
        if($id===NULL){
            $this->set_response([
            'status' => FALSE,
            'error' => 'ID cannot be empty'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
       
        $data = $this->servermodel->delete($id);
        if ($data)
        {
            $this->set_response($data, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
            'status' => FALSE,
            'error' => 'Record could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
