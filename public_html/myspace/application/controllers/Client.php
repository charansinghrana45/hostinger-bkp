<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Client File ( Client.php )
class Client extends MY_Controller {

    // User's Login Credentials
    public function __construct() {
        parent::__construct();

        $this->load->library('rest');

        $config = array('server' => base_url('api'),
                //'api_key'         => 'Setec_Astronomy'
                //'api_name'        => 'X-API-KEY'
//                'http_user'       => 'admin',
//                'http_pass'       => '1234',
//                'http_auth'       => 'basic',
                //'ssl_verify_peer' => TRUE,
                //'ssl_cainfo'      => '/certs/cert.pem'
                );

        $this->rest->initialize($config);

    }
    
    public function index() {
       
       // $tweets = $this->rest->get('books'.$username.'.xml');
    }
    
    // Client's Get Method
    function get() {
        
        $id = $this->input->get('id');
        if($id==0){
           // $this->load->view('read');
        }
       
        $this->rest->format('application/json');
        $params['id'] = $id;
        $result = $this->rest->get('books', $params,'');

        echo "<pre>";
        print_r($result);
        // $this->rest->debug();
    }
    
    // Client's Delete Method
    public function delete() {
        
        $id = $this->input->get('id');

        if($id==0){
           // $this->load->view('read');
        }
        
        $this->rest->format('application/json');
        $this->rest->delete('books?id='.$id,'','');
        $this->rest->debug();
    }
    
        // Client's Put Method
    public function put(){
        
        $id = $this->input->get('id');
        
        if($id == 0){
            //$this->load->view('read');
        }
                
        $this->rest->format('application/json');
        
        $params = array(
            'id' => 2,
            'book_name' => 'php+',
            'book_price' => '258',
            'book_author' => 'patel'
        );
        
        $this->rest->put('books', $params,'');
        $this->rest->debug();
    }
    
    // Client's Post Method
    function post() {
        
        $id = $this->input->get('id');
        if($id==0){
            //$this->load->view('read');
        }
       
        $this->rest->format('application/json');
        $params = array(
            'book_name' => 'advanced php+',
            'book_price' => '300',
            'book_author' => 'veer'
        );
        $this->rest->post('books', $params,'');
        $this->rest->debug();
    }
         
    
    //use of curl library in CI
    function ci_curl($new_name, $new_email)
    {
        $username = 'admin';
        $password = '1234';

        $this->load->library('curl');

        $this->curl->create('http://localhost/restserver/index.php/example_api/user/id/1/format/json');

        // Optional, delete this line if your API is open
        $this->curl->http_login($username, $password);

        $this->curl->post(array(
            'name' => $new_name,
            'email' => $new_email
        ));

        $result = json_decode($this->curl->execute());

        if(isset($result->status) && $result->status == 'success')
        {
            echo 'User has been updated.';
        }

        else
        {
            echo 'Something has gone wrong';
        }
    }
}
