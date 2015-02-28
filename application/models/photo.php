<?php 
	class Photo extends CI_Model{
		public function addPhoto($data){

			$this->db->insert('photos', $data);
		}
		public function getPhotos($chassis){
			$this->db->where('chassis_no', $chassis);
			return $this->db->get('photos');
		}
		public function getPhotosActive($chassis){
			$this->db->where('chassis_no', $chassis);
			$this->db->where('main_or_not', "1");
			return $this->db->get('photos');
		}
		public function deletePhoto($id){
			$photo = $this->getPhoto($id)->row();
			if($photo->main_or_not == "0"){
				$this->db->where('photo_id', $id);
				return $this->db->delete('photos');
			}
			return "0";
		}
		public function getPhoto($id){
			$this->db->where('photo_id', $id);
			return $this->db->get('photos');
		}
		public function changeDispPic($id, $chassis){
			$this->db->where('chassis_no', $chassis);
			$data = array(
				'main_or_not' => '0'
				);
			$this->db->update('photos',$data);
			$this->db->where('photo_id', $id);
			$data = array(
				'main_or_not' => '1'
				);
			return $this->db->update('photos',$data);
			
		}
		public function updatePhoto($id, $data){
			$this->db->where('photo_id', $id);
			return $this->db->update('photos',$data);

		}
	}
