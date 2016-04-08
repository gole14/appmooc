<?php 
	class user extends CI_Model{
		function login($username,$passwrd){
			$this -> db -> select('id, username, passwrd');
			$this -> db -> from('user');
			$this -> db -> where('username', $username);
			$this -> db -> where('passwrd', MD5($passwrd));
			$this -> db -> limit(1);

			$query = $this -> db -> get();

			if($query -> num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}
	}

?>