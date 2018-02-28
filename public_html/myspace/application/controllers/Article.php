<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {
    
        private $articles_per_page = 10;
        
        public function __construct() {
            parent::__construct();
            
            $this->load->model('articlemodel');
        }

        public function index()
	{
		
            $this->load->library('pagination');
            
            $config = array(
                'base_url' => base_url('article/index'),
                'per_page'=> $this->articles_per_page,
                'total_rows'=>$this->articlemodel->count_all_articles(),
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
                                 
            $articles['articles'] = $this->articlemodel->all_articles($this->articles_per_page,$this->uri->segment(3,0));
                       
            $this->load->view('public/articles_list',$articles);
		
	}  
        
    public function search()
    {
        $this->load->library('form_validation');
                        
        $this->form_validation->set_rules('query',"Search","required");
        
        $this->form_validation->set_error_delimiters('<p class="navbar-text">','</p>'); 
        
        if(!$this->form_validation->run())
        {
            $this->index();
        }
        else {
            $query = $this->input->post('query');
            return redirect('article/search_results/'.$query.'/'.$this->uri->segment(3,0));  
        }
        
    }
    public function search_results($query ='',$offset=0)
    {
               
        $this->load->library('pagination');
        
        $config = array(
                'base_url' => base_url('article/search_results/'.$query),
                'per_page'=> $this->articles_per_page,
                'total_rows'=>$this->articlemodel->count_search_results($query,'both'),
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
      
        $articles['articles'] = $this->articlemodel->search($query,$this->articles_per_page,$offset,'both');
        
        $this->load->view('public/search_results',$articles);
        
    }
    
    public function article($id = 0 )
    {
       $article['article'] = $this->articlemodel->find_article($id);

       if(!$article['article'])
       {
           echo 
           show_404();
       }
       else
       {
           $this->load->view('public/article_detail',$article);
       }
       
    }
}
