<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user','',TRUE);
	}

	function index(){
		//THIS METHOD WILL HAVE THE CREDENTIALS VALIDATION.
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
   		$this->form_validation->set_rules('passwrd', 'Password', 'trim|required|callback_check_database');

   		if($this->form_validation->run() == FALSE){
   			//FIELD VALIDATION FAILED. USER REDIRECTED TO LOGIN PAGE.
   			$this->load->view('login_view');
   		}else{
   			//GO TO PRIVATE AREA
   			redirect('home','refresh');
   		}
 
	}

	function check_database($passwrd){
		//FIELD VALIDATION SUCCEEDED. VALIDATE AGAINST DATABASE.
		$username = $this->input->post('username');

		//QUERY DATABASE
		$result = $this->user->login($username, $passwrd);

		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
						'id' => $row->id,
						'username' => $row->username
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}else{
			$this->form_validation->set_message('check_database','Invalid username or password');
			return false;
		}
	}
}

?>