<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAuth
{
	protected $CI;
    public function __construct()
    {

    	$this->CI =& get_instance();
        $this->CI->load->library('session');        
        $this->connection= new TwitterOAuth('0LoxUbEqku8ATr9OLclO819S7', 'Wii0NrGIde5le303oeZQmJCebJ2ZpBnwGMNzsOJQpfZjyndsZ9','1407707689589805056-Tn0A9Die74jSfzBxDxI4NzBnsc6ndW','RswXtUqTsuprTvvqximPt7dRmJ9ofaVuOeSnrt6j9N10B');        
       
    }
    public function getLogin(){

    	$this->request_token = $this->connection->oauth("oauth/request_token", array("oauth_callback" => base_url()."dashboard/twitterResponse"));
    	print_r($this->request_token);

        $_SESSION['oauth_token'] = $this->request_token['oauth_token'];
       $_SESSION['oauth_token_secret'] = $this->request_token['oauth_token_secret'];
       $url = $this->connection->url("oauth/authorize", array("oauth_token" => $this->request_token['oauth_token']));

       $this->CI->session->set_userdata('oauth_token', $this->request_token['oauth_token']);
		$this->CI->session->set_userdata('oauth_token_secret',$this->request_token['oauth_token_secret']);
    	
    	redirect($this->connection->url('oauth/authorize', array('oauth_token' => $this->request_token['oauth_token']), 'refresh'));

    }
    public function checkAuth(){

    	$this->connection = new TwitterOAuth(Consumer_Key, Consumer_Secret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

		$this->access_token = $this->connection->oauth('oauth/access_token', array('oauth_verifier' => $_REQUEST['oauth_verifier'], 'oauth_token'=> $_GET['oauth_token']));

	    $this->connection = new TwitterOAuth(Consumer_Key, Consumer_Secret, $this->access_token['oauth_token'], $this->access_token['oauth_token_secret']);

	    $this->user_info = $this->connection->get('account/verify_credentials');

	    return $this->user_info;

    }
}