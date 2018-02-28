<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userloginmodel extends MY_Model {

	public function login_valid($login_data)
	{
           $query = $this->db->select()
                   ->from('users')
                   ->where(array('email'=>$login_data['email'],'password'=>$login_data['password']))
                   ->get();
           
	  if($query->num_rows())
          {
             return $query->row();
          }
          else
          {
              return false;
          }
	}
        
        
}
