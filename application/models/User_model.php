<?php 
class User_model extends CI_Model {
	public $status;
	public $roles;
	function __construct(){
		parent::__construct();
		$this->status = $this->config->item('status');
		$this->roles = $this->config->item('roles');
	}

	    public function insertUser($d)
    {  
            $string = array(
                'first_name'=>$d['firstname'],
                'last_name'=>$d['lastname'],
                'email'=>$d['email'],
                'role'=>$this->roles[0], 
                'status'=>$this->status[0]
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }

	public function isDuplicate($email){
		$this->db->get_where('users', array('email' => $email), 1);
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function insertToken($user_id){
		$token = substr(sha1(rand()),0,30);
		$date = date('Y-m-d');

		$string = array(
				'token'=> $token,
				'user_id'=> $user_id,
				'created'=> $date
			);
		$query = $this->db->insert_string('tokens',$string);
		$this->db->query($query);
		return $token;
	}

	public function isTokenValid($token)
    {
        $q = $this->db->get_where('tokens', array('token' => $token), 1);        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    } 

    public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1]
            );
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }

    public function checkLogin($post)
    {
        $this->load->library('Password');       
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        
        if(!$this->password->validate_password($post['password'], $userInfo->password)){
            error_log('Unsuccessful login attempt('.$post['email'].')');
            return false; 
        }
        
        $this->updateLoginTime($userInfo->id);
        
        unset($userInfo->password);
        return $userInfo; 
    }

    public function updateLoginTime($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

    public function updatePassword($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    } 

    function getUsersList(){
        $this->load->database();
            $usuarios = $this->db->get('users');
            return $usuarios->result();
    }

    function getUserCourses($email){
        $q = $this->db->get_where('usuarios_cursos', array('email' => $email));  
        if($this->db->affected_rows() > 0){
            $row = $q->result_array();
            return $row;
        }else{
            $error = $this->db->error();
            return '';
        }
    }

    function form_insert($data){
         // Inserting in Table(students) of Database(college)
        if(!$this->db->insert('usuariocurso', $data)){
            $error = $this->db->error();
            return $error;
        }
    }
}//CLASS END