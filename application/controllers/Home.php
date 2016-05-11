<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start(); //When you load session library it's constructor does these for you.
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('home_view',$data);
		}else{
			//IF NO SESSION, REDIRECT TO LOGIN PAGE
			redirect('Login','refresh');
		}
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Home','refresh');
	}
}

?>