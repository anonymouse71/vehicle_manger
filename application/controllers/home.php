<?php 
	class Home extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url','date'));
		}
		public function index(){
				$data['success'] = 'true';
				$this->load->model('user');
				$this->load->model('vehicle');
				$this->load->model('photo');
				$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
				$data['recent_lost'] = $this->vehicle->getRecentlost();
				$this->load->view('home', $data);
		}
		public function details($chassis=null,$username=null){
			if($chassis == null || $username==null){
				die();
			}
			$data['success'] = 'true';
			$this->load->model('user');
			$this->load->model('vehicle');
			$this->load->model('photo');
			$data['owner_info'] = $this->user->getUserInfo($username);
			$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
			$data['logs'] = $this->vehicle->getLogs($chassis);
			$data['vehicle_info'] = $this->vehicle->getVehicle($chassis);
			$data['photos'] = $this->photo->getPhotosActive($chassis);
			$this->load->view('details', $data);
		}
		public function validateSignUpForm(){
			$this->load->model('user');
			$this->load->model('vehicle');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|numeric|min_length[12]');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[user_info.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
			$this->form_validation->set_rules('repass', 'Re-Type Password', 'required|min_length[6]|max_length[32]|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_message('is_unique','This Username Already Exist.');
			$this->form_validation->set_error_delimiters('<p class="error">*', '</p>');
			
			if ($this->form_validation->run() == false)
			{
				$data['success'] = 'false';
				$this->load->model('photo');
				$data['recent_lost'] = $this->vehicle->getRecentlost();
				$this->load->view('home',$data);
			}
			else
			{
				$data = array(
						'username' => $this->input->post('username'),
						'name' => $this->input->post('name'),
						'password' => $this->input->post('password'),
						'address' => $this->input->post('address'),
						'contact' => $this->input->post('contact_no'),
						'email' => $this->input->post('email')
					);
				$this->user->adduser($data);
				$this->load->view('after_sign_up');
			}
		}
		public function validateLoginForm(){
			$this->load->model('user');
			$this->load->model('vehicle');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				redirect('/', 'refresh');
			}
			else
			{
				$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
				if($this->user->getUser($data)){
					$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
					$data['success'] = 'false';
					$data['recent_lost'] = $this->vehicle->getRecentlost();
					//$this->load->view('home', $data);
					$this->loggedin();
				}
				else
				{
					redirect('/', 'refresh');
				}

			}
		}
		public function chassisCheck($Chassis){
			$this->load->model('vehicle');
			$data = $this->vehicle->getVehicle($Chassis);
			echo $data->num_rows();
		}

		//Users Area
		public function loggedin(){
			if($this->session->userdata('logged_in') == 'yes'){
				$this->load->model('user');
				$this->load->model('vehicle');
				$data['statuses'] = $this->vehicle->getAllStatus();
				$data['car_info'] = $this->vehicle->getVehicles($this->session->userdata('username'));
				$data['category'] = $this->vehicle->getVehicleCategory();
				$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
				$data['edit_profile_success'] = 'yes';
				$this->load->view('after_sign_in',$data);
				return;
			}
			die();
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect('/', 'refresh');
		}


		

		public function edit_profile(){
			$this->load->model('user');
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact No', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_error_delimiters('<p class="error">*', '</p>');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->model('vehicle');
				$data['statuses'] = $this->vehicle->getAllStatus();
				$data['car_info'] = $this->vehicle->getVehicles($this->session->userdata('username'));
				$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
				$data['category'] = $this->vehicle->getVehicleCategory();
				$data['edit_profile_success'] = 'no';
				$this->load->view('after_sign_in',$data);
			}
			else
			{
				$data = array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'contact' => $this->input->post('contact_no'),
						'email' => $this->input->post('email')
					);
				$this->user->updateUserData($data);
				/*$this->load->model('vehicle');
				$data['car_info'] = $this->vehicle->getVehicles($this->session->userdata('username'));
				$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
				$data['category'] = $this->vehicle->getVehicleCategory();
				//$this->load->view('after_sign_in',$data);*/
				$this->loggedin();
			}
			
		}

		public function addCarInfo(){
			$config['upload_path'] = './uploads/'.$this->input->post('chassis_no').'/';
			mkdir($config['upload_path']);
			$config['allowed_types'] = 'jpg|png';
			$file_name = date("Y_m_d_h_m_s");
			$config['file_name']	= $file_name;
			$config['overwrite'] = true;
			$config['max_size']  = '800';
			$this->load->model('vehicle');
			$this->load->model('photo');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('model_no', 'Model', 'required');
			$this->form_validation->set_rules('chassis_no', 'Chassis', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				
			}
			else
			{
				$this->load->library('upload', $config);
				$this->upload->do_upload();
				$record = $this->upload->data();
				$datestring = "%Y-%m-%d %h-%i-%s";
				$time = time();
				$time = $time+(timezones('UP5')*3600);
				$time = mdate($datestring,$time);
				$data = array(
					'username' => $this->session->userdata('username'),
					'category_id' => $this->input->post('category'),
					'brand_id' => $this->input->post('brand'),
					'model_id' => $this->input->post('model_no'),
					'chassis_no' => $this->input->post('chassis_no'),
					'status_id' => $this->input->post('status'),
					'created_at' => $time,
					'updated_at' => $time 
				);
				$this->vehicle->insertVehicles($data);
				$photo['link'] = 'uploads/'.$this->input->post('chassis_no').'/'.$file_name.$record['file_ext'];
				$photo['chassis_no'] = $this->input->post('chassis_no');
				$photo['main_or_not'] = "1";
				$this->photo->addPhoto($photo);
			}
			$this->loggedin();
		}
		public function updateVehicle(){
			$this->load->model('vehicle');
			$this->form_validation->set_rules('chassis_no', 'Chassis', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if($this->form_validation->run() == FALSE)
			{
				$this->loggedin();
			}
			else
			{
				$datestring = "%Y-%m-%d %h-%i-%s";
				$time = time();
				$time = $time+(timezones('UP5')*3600);
				$time = mdate($datestring,$time);
				$data = array(
							'username' => $this->session->userdata('username'),
							'category_id' => $this->input->post('category'),
							'brand_id' => $this->input->post('brand'),
							'model_id' => $this->input->post('model_no'),
							'chassis_no' => $this->input->post('chassis_no'),
							'status_id' => $this->input->post('status'),
							'updated_at' => $time 
						);
				$this->vehicle->updateVehicle($data);
				$this->loggedin();
			}
		}
		public function deleteVehicle($id){
			$this->load->model('vehicle');
			$this->vehicle->deleteVehicles($id);
			$this->loggedin();
		}
		//End Users Area

		//Ajax Controller
		public function afterSelectCategoryAjax($id){
			$this->load->model('vehicle');
			$data['brand'] = $this->vehicle->getVehicleBrand($id);
			$this->load->view('ajax/afterCategorySelect', $data);
		}
		public function afterSelectBrandAjax($id){
			$this->load->model('vehicle');
			$data['model'] = $this->vehicle->getVehicleModel($id);
			$this->load->view('ajax/afterBrandSelect', $data);
		}
		public function ajaxEditVehicleStatusChange($id){
			$this->load->model('vehicle');
			$data['statuses'] = $this->vehicle->getAllStatus();
			$data['car'] = $this->vehicle->getVehicle($id);
			$data['category'] = $this->vehicle->getVehicleCategory();
			$this->load->view('edit_vehicle', $data);
		}
		
		
		public function search(){
			$this->load->model('vehicle');
			$this->load->model('user');
			if($this->session->userdata('logged_in') == 'yes'){
				$data['user_info'] = $this->user->getUserInfo($this->session->userdata('username'));
				$this->load->view('search', $data);
			}
			else
			{
				$this->load->view('search');
			}
		}
		public function search_ajax($off = 0){
			$this->load->model('vehicle');
			$data['limit'] = $this->vehicle->countTableVehicleInfo();
			$data['records'] = $this->vehicle->allRecords($off);
			$data['next'] =  $off+10;
			$data['prev'] =  $off-10;
			$data['chas'] = 'no';
			$this->load->view('ajax/search_result_ajax',$data);
			
		}
		public function searchResultByCategory($cat,$status,$off=0){
			$this->load->model('vehicle');
			$data['limit'] = $this->vehicle->countTableVehicleInfoCatStatus($cat,$status);
			$data['records'] = $this->vehicle->allRecordsByCatStatus($cat,$status,$off);
			$data['next'] =  $off+10;
			$data['prev'] =  $off-10;
			$data['chas'] = 'no';
			$this->load->view('ajax/search_result_ajax',$data);
		}
		public function searchResultByDate($cat, $stat, $sdate, $edate,$off = 0){
			$this->load->model('vehicle');
			$data['limit'] = $this->vehicle->countTableVehicleInfoDate($cat, $stat, $sdate, $edate);
			$data['records'] = $this->vehicle->allRecordsByDate($cat, $stat, $sdate, $edate,$off);
			$data['next'] =  $off+10;
			$data['prev'] =  $off-10;
			$data['chas'] = 'no';
			$this->load->view('ajax/search_result_ajax',$data);
		}
		public function searchResultByChassis($Chassis = null){
			$this->load->model('vehicle');
			$data['records'] = $this->vehicle->allRecordsByChassis($Chassis);
			$data['chas'] = 'yes';
			$this->load->view('ajax/search_result_ajax',$data);
		}


		//PhotoManager 
		public function addVehiclePhoto($chassis){
			$config['upload_path'] = "./uploads/$chassis/";
			$config['allowed_types'] = 'jpg|png';
			$file_name = date("Y_m_d_h_m_s");
			$config['file_name'] = $file_name;
			$config['overwrite'] = true;
			$config['max_size']  = '800';
			$this->load->library('upload', $config);
			$this->load->model('photo');
			$datestring = "%Y-%m-%d %h-%i-%s";
			$time = time();
			$time = $time+(timezones('UP5')*3600);
			$time = mdate($datestring,$time);
			if($this->upload->do_upload())
			{
				$record = $this->upload->data();
				$data['chassis_no'] = $chassis;
				$data['link'] = 'uploads/'.$chassis.'/'.$file_name.$record['file_ext'];
				$data['main_or_not'] = "0";
				$this->photo->addPhoto($data);
			}
			$this->photoManager($chassis);
			
		}
		public function updateVehiclePhoto($id,$chassis){
			$config['upload_path'] = "./uploads/$chassis/";
			$config['allowed_types'] = 'jpg|png';
			$file_name = date("Y_m_d_h_m_s");
			$config['file_name'] = $file_name;
			$config['overwrite'] = true;
			$config['max_size']  = '800';
			$this->load->library('upload', $config);
			$this->load->model('photo');
			$datestring = "%Y-%m-%d %h-%i-%s";
			$time = time();
			$time = $time+(timezones('UP5')*3600);
			$time = mdate($datestring,$time);
			if($this->upload->do_upload())
			{
				$record = $this->upload->data();
				$data['link'] = 'uploads/'.$chassis.'/'.$file_name.$record['file_ext'];
				$this->photo->updatePhoto($id,$data);
			}
			$this->photoManager($chassis);
			
		}
		
		
		public function photoManager($chassis){
			$this->load->model('vehicle');
			$this->load->model('photo');
			$data['vehicle'] = $this->vehicle->getVehicle($chassis)->row();
			$data['photos'] = $this->photo->getPhotos($chassis);
			$data['photo'] = $data['photos']->row();
			$data['vehicle_count'] = $data['photos']->num_rows();
			$this->load->view('managephotos',$data);
		}
		
		public function ajaxGetPhotoEditView($id){
			$this->load->model('photo');
			$data['photo'] = $this->photo->getPhoto($id)->row();
			$this->load->view('ajax/photo',$data);
		}
		public function deletePhoto($id, $chassis){
			$this->load->model('photo');
			if($this->photo->deletePhoto($id) == "0"){
				redirect('home/photoManager/'.$chassis.'?failed=0', 'refresh');
			}
			$this->photoManager($chassis);
		}
		public function changeDisplayPicture($id, $chassis){
			$this->load->model('photo');
			$this->photo->changeDispPic($id, $chassis);
			$this->photoManager($chassis);
		}
	}
 ?>