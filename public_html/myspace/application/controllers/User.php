<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('facebook_login');
	    $this->load->library('google_login');
            $this->load->library('form_validation');
            $this->load->model('userloginmodel');
        }   
    
        public function index()
        {
            if($this->session->userdata('fullname'))
            {
                return redirect('user/profile');
            }
            
            $this->login();
        }
        
        public function login()
        {
            if($this->session->userdata('fullname'))
            {
                return redirect('user/profile');
            }
            
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            
            $data['fb_login_url'] = $this->facebook_login->get_fb_login_url();

            $data['google_login_url'] = $this->google_login->get_google_login_url();
            
            if($this->form_validation->run()) {
                
                $login_data = $this->input->post();
                
                $logged_in_userdata = $this->userloginmodel->login_valid($login_data);
                        
                if($logged_in_userdata) {
                   
                    $this->session->set_userdata('fullname',$logged_in_userdata->fullname);
                    return redirect('user/profile');
                    
                }
                else {
                    $this->session->set_flashdata('error_invalid_credential','<p class="text-danger">Invalid Email or Password</p>');
                    $this->session->set_flashdata('error_invalid_credential','<p class="text-danger">Invalid Email or Password</p>');
                }
                    
            }
            
             $this->load->view('public/user_login',$data); 
        }
        
            
        public function fb_login()
        {
               
            $fb_userdata = $this->facebook_login->get_user_data();
            if($fb_userdata)
            {                             
               $this->session->set_userdata('fullname',$fb_userdata['name']);
                return redirect('user/profile');
            }
            else {
                $this->login();
            }
        }
		
	public function google_login()
        {
                  
            $google_userdata = $this->google_login->get_user_data();
		
            if($google_userdata)
            {                   
				
                if($google_userdata['name']) {
                        $user_id = $google_userdata['name'];
                }
                else {
                        $user_id = $google_userdata['email'];
                }

                $this->session->set_userdata('fullname',$user_id);
                return redirect('user/profile');
            }
            else {
                $this->login();
            } 
        }
        
        public function profile()
        {
		
            if(!$this->session->userdata('fullname'))
            {
                return $this->login();
            }
            $data['fullname'] = $this->session->userdata('fullname');
            $this->load->view('public/user_profile',$data);
        }
        
        public function logout()
        {
		
            if($this->session->userdata('google_access_token')) {
                    $redirectUrl = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue='.base_url('user/login');
            }
            else if($this->session->userdata('facebook_access_token')) {
                    $redirectUrl = $this->facebook_login->get_fb_logout_url();
            }
            else
            {
                    $redirectUrl = base_url('user/login');
            }
			
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('facebook_access_token');
            $this->session->unset_userdata('google_access_token');
			
            header('Location:'.$redirectUrl);

        }
		  
}
