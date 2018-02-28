<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends MY_Model {

	public function login_valid($username,$password)
	{
           $query = $this->db->select(array('id','username','email'))
                   ->from('admin_users')
                   ->where(array('username'=>$username,'password'=>$password))
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
