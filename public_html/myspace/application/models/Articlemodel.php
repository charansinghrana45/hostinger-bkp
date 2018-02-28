<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articlemodel extends MY_Model {

        public function all_articles($limit,$offset)
	{
           $query = $this->db->select('*')
                   ->from('articles')
                   ->order_by('create_date','desc')
                   ->limit($limit,$offset)
                   ->get();
           return $query->result();
	}
    
	public function get_all_articles($user_id,$limit,$offset)
	{
           $query = $this->db->select('id,title')
                   ->from('articles')
                   ->where(array('user_id'=>$user_id))
                   ->order_by('create_date','desc')
                   ->limit($limit,$offset)
                   ->get();
           return $query->result();
	}
            
        public function count_all_articles()
	{
            $query = $this->db->select('id')
                   ->from('articles')
                   ->get();
           return $query->num_rows();
	}
        
        public function get_article_rows($user_id)
	{
           $query = $this->db->select('id')
                   ->from('articles')
                   ->where(array('user_id'=>$user_id))
                   ->get();
           return $query->num_rows();
	}
        
        public function get_article($user_id,$article_id)
	{
           $query = $this->db->select(array('id','title','body','article_image'))
                   ->from('articles')
                   ->where(array('user_id'=>$user_id,'id'=>$article_id))
                   ->get();
           return $query->row();
	}
        
        public function add_article($data)
        {
            return $this->db->insert('articles',$data);
        }
        
        public function edit_article($article_id,$data)
	{
         
         return  $this->db->update('articles',$data,array('id'=>$article_id));           
	}
        
        public function delete_article($user_id,$article_id,$file_path)
        {
           $article = $this->get_article($user_id, $article_id);
           unlink($file_path.'/'.$article->article_image);
           $image_data = pathinfo($article->article_image);
           unlink($file_path.'/thumb/'.$image_data['filename'].'_thumb'.'.'.$image_data['extension']);
           return $this->db->delete('articles',array('id'=>$article_id,'user_id'=>$user_id));
        }
        
        public function search($query, $limit, $offset, $condition = 'both')
        {
            $sqlquery = $this->db->select('*')->from('articles')->like('title',$query,$condition)->limit($limit,$offset)->get();
            return $sqlquery->result();
        }
        public function count_search_results($query,$condition = 'both')
        {
            $sqlquery = $this->db->select(array('id'))->from('articles')->like('title',$query,$condition)->get();
            return $sqlquery->num_rows();
        }
        
        public function find_article($id)
        {
            $query = $this->db->select()->from('articles')->where(array('id'=>$id))->get();
            return $query->row();
        }
}
