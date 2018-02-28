<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_login
{    
    protected $fb;
    protected $helper;
    protected $CI;
    public function __construct() {
       
        $this->CI =& get_instance();
        
        require_once './facebook/autoload.php';
        
        $this->fb = new Facebook\Facebook([
        'app_id' => '',
        'app_secret' => '',
        'default_graph_version' => 'v2.5',
        ]);
        
        $this->helper = $this->fb->getRedirectLoginHelper();
    }
  
    public function get_fb_login_url()
    {        
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $this->helper->getLoginUrl(base_url('user/fb_login'), $permissions);
        
        return $loginUrl;
    }
    
    public function get_user_data()
    {
        try {
          $accessToken = $this->helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        if (isset($accessToken)) {
          // Logged in!
          $accessToken = (string) $accessToken;
          $this->CI->session->set_userdata('facebook_access_token',$accessToken);

          $this->fb->setDefaultAccessToken($this->CI->session->userdata('facebook_access_token'));
          $response = $this->fb->get('/me?locale=en_US&fields=name,email');
          $userdata = $response->getDecodedBody();
     
          return $userdata;
        }
        
        return FALSE;
    }
	
	public function get_fb_logout_url()
	{
		return $this->helper->getLogoutUrl($this->CI->session->userdata('facebook_access_token'), base_url('user/login'));
	}

}
