<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
       public function index()
        {
           if($this->session->userdata('user_id'))
           {
               return redirect('admin/dashboard');
           }
            $this->load->view('admin/admin_login');
        } 
    
    public function admin_login()
	{
		$this->load->library('form_validation');
                $this->form_validation->set_rules('username','Username','required|alpha_numeric|trim');
                $this->form_validation->set_rules('password','Password','required');
		
                $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
                
                if($this->form_validation->run())
                {
                    $this->load->model('loginmodel');
                    
                    $username = $this->input->post('username');
                    $passowrd = $this->input->post('password');
                    
                    $result = $this->loginmodel->login_valid($username,$passowrd);
                    
                    if($result)
                    {
                                              
                        $this->session->set_userdata('user_id',$result->id);
                        $this->session->set_userdata('username',$result->username);
                        $this->session->set_userdata('email',$result->email);
                        
                        return redirect('admin/dashboard');
                    }
                    else
                    {
                        $this->session->set_flashdata('error_invalid_credential','<p class="text-danger">Invalid Username or Password</p>');
                        return redirect('login/admin_login');
                    }
                    
                }
                else
                {
                  $this->load->view('admin/admin_login');
                                      
                }
	}
        
    public function admin_logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
      return redirect('login/admin_login');
    }
}
