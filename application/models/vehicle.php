<?php 
	class Vehicle extends CI_Model{
		public function getVehicles($name){
			$this->db->where('username', $name);
			$this->db->from('vehicle_info natural join brand join model using(model_id) join category using(category_id) join status using(status_id)');
			return $result = $this->db->get();
		}
		public function insertLogs($info){
			$this->db->insert('logs',$info);	
		}
		public function insertVehicles($info){
			$this->db->insert('vehicle_info',$info);
			$data = array(
					'chassis_no' => $info['chassis_no'],
					'category_id' => $info['category_id'],
					'brand_id' => $info['brand_id'],
					'model_id' => $info['model_id'],
					'status_id' => $info['status_id'],
					'created_at' => $info['created_at'] 
			);
			$this->insertLogs($data);
		}
		public function getRecentlost(){
			$this->db->where('status_id', 2);
			$this->db->order_by('updated_at', 'desc');
			$this->db->from('vehicle_info natural join brand join user_info using(username) join model using(model_id) join category using(category_id) join status using(status_id)');
			return $result = $this->db->get();
		}
		public function getAllStatus(){
			return $result = $this->db->get('status');
		}
		public function deleteVehicles($info){
			$this->db->where('chassis_no', $info);
			$this->db->delete('vehicle_info');
		}
		public function getVehicleCategory(){
			$result = $this->db->get('category');
			return $result->result_array();
		}
		public function getVehicleBrand($cat){
			$this->db->where('category.category_id', $cat);
			$this->db->from('category');
			$this->db->select('brand_name, brand_id');
			$this->db->join('brand', 'brand.category_id = category.category_id');
			$result = $this->db->get();
			//echo $result->num_rows();
			return $result->result_array();
		}
		public function getVehicleModel($bra){
			$this->db->where('brand.brand_id', $bra);
			$this->db->from('model');
			$this->db->select('model_id, model_name');
			$this->db->join('brand', 'brand.brand_id = model.brand_id');
			$result = $this->db->get();
			return $result->result_array();
		}
		public function countTableVehicleInfo(){
			
			return $this->db->get('vehicle_info')->num_rows();

		}
		public function countTableVehicleInfoCatStatus($category, $status){
			if($category!='0')
			$this->db->where('category_id', $category);
			if($status != '0')
			$this->db->where('status_id', $status);
			return $this->db->get('vehicle_info')->num_rows();

		}
		public function countTableVehicleInfoDate($category, $status, $sdate, $edate){
			if($category!='0')
			$this->db->where('category_id', $category);
			if($status != '0')
			$this->db->where('status_id', $status);
			$this->db->where('updated_at >= date', $sdate);
			$this->db->where('updated_at <= date', $edate);
			return $this->db->get('vehicle_info')->num_rows();

		}
		public function countTableVehicleInfoStat($stat){
			if($stat!='0')
			$this->db->where('status', $stat);
			return $this->db->get('vehicle_info')->num_rows();

		}
		public function getVehicle($chassis){
			$this->db->where('chassis_no', $chassis);
			$this->db->from('vehicle_info natural join brand join model using(model_id) join category using(category_id) join status using(status_id)');
			return $result = $this->db->get();
		}
		public function updateVehicle($data){
			$this->db->where('chassis_no', $data['chassis_no']);
			$this->db->update('vehicle_info', $data);
			$data['created_at'] = $data['updated_at'];
			unset($data['username']);
			unset($data['updated_at']);
			unset($data['photo']);
			$this->insertLogs($data);
			return;
		}
		public function updateVehicleImage($data){
			$this->db->where('chassis_no', $data['chassis_no']);
			$this->db->update('vehicle_info', $data);
			return;
		}
		public function allRecords($off){
			$this->db->from('vehicle_info natural join brand join model using(model_id) join user_info using(username) join category using(category_id) join status using(status_id)');
			$result = $this->db->get('',10,$off);
			return $result;
		}
		public function allRecordsByCatStatus($category,$status,$off){
			$this->db->from('vehicle_info natural join brand join model using(model_id) join user_info using(username) join category using(category_id) join status using(status_id)');
			if($category!='0')
			$this->db->where('category_id',$category);
			if($status!='0')
			$this->db->where('status_id',$status);
			$result = $this->db->get('',10,$off);
			return $result;
		}
		public function allRecordsByDate($category,$status,$sdate,$edate,$off){
			$this->db->from('vehicle_info natural join brand join model using(model_id) join user_info using(username) join category using(category_id) join status using(status_id)');
			if($category!='0')
			$this->db->where('category_id',$category);
			if($status!='0')
			$this->db->where('status_id',$status);
			$this->db->where('updated_at >= date', $sdate);
			$this->db->where('updated_at <= date', $edate);
			$result = $this->db->get('',10,$off);
			return $result;
		}
		public function allRecordsByChassis($status){
			$this->db->from('vehicle_info natural join brand join model using(model_id) join user_info using(username) join category using(category_id) join status using(status_id)');
			$this->db->where('chassis_no like','%'.$status.'%');
			$this->db->or_where('brand_name like','%'.$status.'%');
			$this->db->or_where('model_name like','%'.$status.'%');
			$result = $this->db->get();
			return $result;
		}
		public function getLogs($chassis){
			$this->db->where('chassis_no', $chassis);
			$this->db->from('logs natural join brand join model using(model_id) join category using(category_id) join status using(status_id)');
			$this->db->order_by('log_id', 'desc');
			return $this->db->get();
		}
	}
