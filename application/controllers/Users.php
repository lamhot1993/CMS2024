<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Users extends CI_Controller {

	public function AuthLogin(){
		$admin = $this->session->has_userdata('admin');
		$token = $this->session->has_userdata('token');
		
		if ($admin==false || $admin ==null || $token == false || $token == null)
		{
			return false;
		}else{
			
			$token = $this->session->userdata('token');
			$token = $token[0]->{"token"};

			$this->M_user->token = $token;
		
			if (!$this->M_user->checkToken()){
				$this->session->unset_userdata('admin');
				$this->session->unset_userdata('token');
				return false;
			}
		}
		return true;
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_navbar');
		$this->load->model('M_slideshows');
		$this->load->model('M_teacher');
		$this->load->model('M_footer');
		$this->load->model('M_map');
		$this->load->model('M_partner');
		$this->load->model('M_post');
		$this->load->model('M_teacher');
		$this->load->model('M_header');
		$this->load->model('M_page');
		$this->load->model('M_social_media');
		$this->load->model('M_school');
	}

	public function index(){	
			$data['data_navbar'] = $this->loadDataNavbar();
			$data['data_navbar_child'] = $this->loadDataNavbarChild();
			$data['data_slideshow'] = $this->loadDataSlideShows();
			$data['data_teacher'] = $this->loadDataTeachers();
			$data['data_footer'] = $this->loadDataFooter();
			$data['data_map'] = $this->loadDataMap();
			$data['data_partner'] = $this->loadDataPartner();
			$data['data_post'] = $this->loadDataPost();
			$data['data_post_limit'] = $this->loadDataPostLimit();
			$data['data_school'] = $this->loadDataSchools();
			$data['data_header'] = $this->loadDataHeader();
			$data['data_pages'] = $this->loadDataPage();
			$data['data_social_media'] = $this->loadDataSocialMedia();

			$this->load->view('user/home',$data);
	}

	private function loadDataPage(){
		return $this->M_page->loadData();
	}

	private function loadDataHeader(){
		$this->M_header->id_header = 1;
		return $this->M_header->loadData_byId();
	}


	private function loadDataSocialMedia(){
		$this->M_social_media->id_social_media = 1;
		return $this->M_social_media->loadData_byId();
	}

	private function loadDataPostLimit(){
		return ($this->M_post->loadData10());
	}

	private function loadDataPost(){
		return ($this->M_post->loadDataLimit());
	}

	private function loadDataPartner(){
		return ($this->M_partner->loadData());
	}

	private function loadDataMap(){
		return ($this->M_map->loadData());
	}
	
	private function loadDataFooter(){
		return ($this->M_footer->loadData());
	}

	private function loadDataSchools(){
		$this->M_school->id_school = 1;
		return $this->M_school->loadData_byId();
	}
	
	private function loadDataTeachers(){
		return ($this->M_teacher->loadData());
	}

	private function loadDataNavbar(){
		return ($this->M_navbar->loadDataNavbar());
	}

	private function loadDataNavbarChild(){
		return ($this->M_navbar->loadDataNavbarChild());
	}

	private function loadDataSlideShows(){
		return $this->M_slideshows->loadData();
	}

	public function login(){
		if (!$this->AuthLogin()){
			$this->load->view('user/login');
		}else{
			$this->load->view('user/admin');
		}
	}

	public function home(){
		if ($this->AuthLogin()){
			$this->load->view('user/home');
		}
		else{
			$this->load->view('user/login');
		}
	}


	public function logout(){
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('token');
		redirect(base_url('/'));
	}

	public function api_login()
	{
		$response = array('message'=>'Login Failed','result'=>false);

		$this->M_user->username =  $this->input->post('username');
		$this->M_user->password = $this->input->post('password');

		$result = $this->M_user->login();
		
		if ($result){

			$token= $this->M_user->getToken();
	
			$this->session->set_userdata('admin',true);
			$this->session->set_userdata('token',$token);

			$response = array('message'=>'Login Success','result'=>true);
		}
		echo json_encode($response);
	}

	public function api_load_data()
	{
		if (!$this->AuthLogin()){
			exit(json_encode(array('message'=>'access denied')));
		}
		$this->load->model('M_peserta');
		$result = $this->M_peserta->loadData();

		echo json_encode($result);
	}

	public function api_search_data(){
		if (!$this->AuthLogin()){
			exit(json_encode(array('message'=>'access denied')));
		}
		$this->load->model('M_peserta');
		$search = $this->M_peserta->id_peserta = $this->input->post('search');
	
		validationInput($search);

		$result = $this->M_peserta->searchData($search);
		echo json_encode($result);
	}

		
	public function api_delete_data(){

		if (!$this->AuthLogin()){
			exit(json_encode(array('message'=>'access denied')));
		}
		$this->load->model('M_peserta');
		$id_peserta=$this->M_peserta->id_peserta = $this->input->post('id_peserta');
	
		validationInput($id_peserta);

		$result = $this->M_peserta->delete_data();
		echo json_encode($result);
	}

}


