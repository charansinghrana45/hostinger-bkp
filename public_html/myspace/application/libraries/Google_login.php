<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Google_Login
{

	protected $CI;
	protected $client;
	protected $objOAuthService;
	public function __construct() {
		require_once './vendor/autoload.php';
		$this->CI = & get_instance();
		
		// Create Client Request to access Google API
		$client_id = '';
		$client_secret = '';
		$redirect_uri = '';
		$simple_api_key = '';

		$this->client = new Google_Client();
		$this->client->setApplicationName("PHP Google OAuth Login Example");
		$this->client->setClientId($client_id);
		$this->client->setClientSecret($client_secret);
		$this->client->setRedirectUri($redirect_uri);
		//$this->client->setDeveloperKey($simple_api_key);
		$this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
		
		// Send Client Request
		$this->objOAuthService = new Google_Service_Oauth2($this->client);
	}
	
	public function get_google_login_url()
	{
		$loginUrl = $this->client->createAuthUrl();
		return $loginUrl;
	}
	
	public function get_user_data()
	{
		// Add Access Token to Session
		if ($this->CI->input->get('code')) {
			$this->client->authenticate($this->CI->input->get('code'));
			$accessToken = $this->client->getAccessToken();
			$this->CI->session->set_userdata('google_access_token',$accessToken);
		}
		
		// Set Access Token to make Request
		if($this->CI->session->userdata('google_access_token')) {
			$this->client->setAccessToken($this->CI->session->userdata('google_access_token'));
			$userdata = $this->objOAuthService->userinfo->get();
			//print_r($userdata);exit;
			return $userdata;
		}
		
		return false;
		
	}
	

}
