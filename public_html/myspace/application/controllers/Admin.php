<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
       public function __construct()
        {
            parent::__construct();
            
            if(!$this->session->userdata('user_id'))
            {
                redirect('login/admin_login');
            }
            
            $this->load->model('articlemodel');
        }   
    
        public function dashboard()
	{
            $this->load->library('pagination');
            
            $config = array(
                'base_url' => base_url('admin/dashboard'),
                'per_page'=> 5,
                'total_rows'=>$this->articlemodel->get_article_rows($this->session->userdata('user_id')),
                'full_tag_open'=>'<ul class="pagination pagination-sm">',
                'full_tag_close'=>'</ul>',
                'first_tag_open'=>'<li>',
                'first_link'=>'<< First',
                'first_tag_close'=>'</li>',
                'last_tag_open'=>'<li>',
                'last_link'=>'Last >>',
                'last_tag_close'=>'</li>',
                'next_tag_open'=>'<li>',
                'next_tag_close'=>'</li>',
                'prev_tag_open'=>'<li>',
                'prev_tag_close'=>'</li>',
                'num_tag_open'=>'<li>',
                'num_tag_close'=>'</li>',
                'cur_tag_open'=>'<li class="active"><a href="">',
                'cur_tag_close'=>'</a></li>',
           
            );
        
            $this->pagination->initialize($config);
                                 
            $articles['articles'] = $this->articlemodel->get_all_articles($this->session->userdata['user_id'],$config['per_page'],$this->uri->segment(3));
            
            $this->load->view('admin/dashboard',$articles);     
		
	}   
        
        public function add_article()
	{
         
            $upload_error['upload_error'] = '';
            $this->load->view('admin/add_article',$upload_error);
		
	}   
        
        public function store_article()
        {      
            
            $upload_path = $this->config->item('article_image_upload_path').$this->session->userdata['user_id'];
            
            $file_name = '';
            if(isset($_FILES['article_image']['name']))
            {
               $file_name = time().'_'.$_FILES['article_image']['name'];
            }
        
            if(!file_exists($upload_path))
            {
                mkdir($upload_path,0777,true);
            }
            $config = array(
                
                'upload_path' =>$upload_path,
                'file_name' => $file_name,
                'allowed_types'=>'jpeg|jpg|png|gif',
                'max_size'=>'1024',
                'max_width'=>1024,
                'max_height'=>768
            );
            
            $this->load->library('upload');
            
            $this->upload->initialize($config);
                        
            $upload_error['upload_error'] = '';
            
            $this->load->library('form_validation');
            			
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');   
                                   
            if($this->form_validation->run('add_article_rule') && $this->upload->do_upload('article_image'))
            {
                            
               $post = $this->input->post();
               
               unset($post['submit']);
                              
               $post['user_id'] = $this->session->userdata('user_id');
               
               $post['create_date'] = date('Y-m-d h:i:s');
               
               $post['article_image'] = $file_name;
               
               //img thumbnail start
               
               if(!file_exists($upload_path.'/thumb'))
               {
                   mkdir($upload_path.'/thumb');
               }
               
                $config = array(
                    'image_library' => 'gd2',
                    'source_image' => $upload_path.'/'.$file_name,
                    'new_image'=> $upload_path.'/thumb/',
                    'create_thumb' => TRUE,
                    'maintain_ratio' => TRUE,
                    'width' => 75,
                    'height' =>50
                );
    
                $this->load->library('image_lib',$config);
                
                $this->image_lib->resize();
                              
               //img thumbnail close
                                            
               if($this->articlemodel->add_article($post) == TRUE) {
                    
                    $this->session->set_flashdata('message_display_class','alert-success');
                    $this->session->set_flashdata("success_message","You have added article successfully.");
                    return redirect('admin/dashboard');
               }
               else {     
                   
                   $main_file_path = $upload_path.'/'.$file_name;
                   $thumb_file_path = $upload_path.'/thumb/'.$file_name;
                   unlink($main_file_path);
                   unlink($thumb_file_path);
                   $this->session->set_flashdata('message_display_class','alert-danger');
                   $this->session->set_flashdata("faild_message","Article failed to add, Please try again");
                   return redirect('admin/add_article');
                }   
            }
            else {
             
              $upload_error['upload_error'] = $this->upload->display_errors('<p class="text-danger">','</p>');
              $this->load->view('admin/add_article',$upload_error);
            }
        }
        
        public function edit_article($article_id)
	{
         
            $data['article'] = $this->articlemodel->get_article($this->session->userdata['user_id'],$article_id);
            
            if($data['article'] == TRUE)
            {
                $this->load->view('admin/edit_article',$data);
            }
            else {
                    $this->session->set_flashdata('message_display_class','alert-danger');
                    $this->session->set_flashdata("success_message","You are not allowed to edit this article or article does not exists.");
                    return redirect('admin/dashboard');
            }
	    
	}  
   
        public function update_article($article_id)
        {
                        
            $data['article'] = $this->articlemodel->get_article($this->session->userdata['user_id'],$article_id);
                         
             $this->load->library('form_validation');
            			
             $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');   
             
             if($this->form_validation->run('add_article_rule'))
            {
               
               $post = $this->input->post();
               
               unset($post['submit']);

               $post['user_id'] = $this->session->userdata['user_id'];
             
               if($this->articlemodel->edit_article($article_id,$post) == TRUE) {
                   
                    $this->session->set_flashdata('message_display_class','alert-success');
                    $this->session->set_flashdata("success_message","You have updated article successfully.");
                    return redirect('admin/dashboard');
               }
               else {     
                   
                   $this->session->set_flashdata('message_display_class','alert-danger');
                   $this->session->set_flashdata("faild_message","Article failed to update, Please try again");
                   return redirect('admin/edit_article/',$article_id);
                }
               
            }
            else {
             
              $this->load->view('admin/edit_article',$data);
            }
        }
        
        public function delete_article($article_id)
        {                     
           
            $file_path = $this->config->item('article_image_upload_path').$this->session->userdata['user_id'];
               
            if($this->articlemodel->delete_article($this->session->userdata['user_id'],$article_id,$file_path) == TRUE)
            {                
               $this->session->set_flashdata('message_display_class','alert-success');
               $this->session->set_flashdata("success_message","You have deleted article successfully.");    
               return redirect('admin/dashboard');
            }
            
            else {
                    $this->session->set_flashdata('message_display_class','alert-danger');
                    $this->session->set_flashdata("success_message","You are not allowed to delete this article or article does not exists.");
                    return redirect('admin/dashboard');
            }
        }
}
