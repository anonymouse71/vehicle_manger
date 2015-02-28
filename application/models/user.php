<?php 
	class User extends CI_Model{
		public function addUser($data){
			$this->db->insert('user_info', $data);
		}
		public function getUser($data){
			$this->db->where($data);
			$result = $this->db->get('user_info');
			if($result->num_rows() > 0){
				$session_data = array(
					'logged_in' => 'yes',
					'username' => $data['username']
				);
				$this->session->set_userdata($session_data);
				return true;
			}
			else
				return false;

		}
		public function getUserInfo($data){
			$this->db->where('username', $data);
			return $result = $this->db->get('user_info');
		}
		public function updateUserData($data){
			$this->db->where('username', $this->session->userdata('username'));
			$this->db->update('user_info', $data);
		}
	}
 ?>