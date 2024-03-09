<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Post extends CI_Controller
{

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
		$this->load->model('M_school');
		$this->load->model('M_header');
		$this->load->model('M_page');
		$this->load->model('M_social_media');
	}

	private function loadDataPage(){
		return $this->M_page->loadData();
	}
	
	private function loadDataNavbar()
	{
		return ($this->M_navbar->loadDataNavbar());
	}

	private function loadDataNavbarChild()
	{
		return ($this->M_navbar->loadDataNavbarChild());
	}

	private function loadDataSocialMedia(){
		$this->M_social_media->id_social_media = 1;
		return $this->M_social_media->loadData_byId();
	}

	public function detail($id_post = null)
	{
		if ($id_post) {

			$this->M_post->id_post = $id_post;

			$check = $this->M_post->checkDataById();

			if ($check) {
				$data['data'] = $this->M_post->getDataById();
				$data['data_navbar'] = $this->loadDataNavbar();
				$data['data_navbar_child'] = $this->loadDataNavbarChild();
				$data['data_footer'] = $this->loadDataFooter();
				$data['data_partner'] = $this->loadDataPartner();
				$data['data_map'] = $this->loadDataMap();
				$data['data_slideshow'] = $this->loadDataSlideShows();
				$data['data_school'] = $this->loadDataSchool();
				$data['data_header'] = $this->loadDataHeader();
				$data['data_pages'] = $this->loadDataPage();
				$data['data_post_limit'] = $this->loadDataPostLimit();
				$data['data_social_media'] = $this->loadDataSocialMedia();

				$this->load->view('user/post', $data);
			} else {
				redirect('.');
			}
		} else {
			redirect('.');
		}
	}
	
	private function loadDataPostLimit()
	{
		return ($this->M_post->loadData10());
	}

	private function loadDataHeader()
	{
		$this->M_header->id_header = 1;
		return $this->M_header->loadData_byId(1);
	}

	private function loadDataSchool()
	{
		$this->M_school->id_school = 1;
		return $this->M_school->loadData_byId(1);
	}

	private function loadDataSlideShows()
	{
		return $this->M_slideshows->loadData();
	}

	private function loadDataMap()
	{
		return ($this->M_map->loadData());
	}

	private function loadDataPartner()
	{
		return ($this->M_partner->loadData());
	}

	private function loadDataFooter()
	{
		return ($this->M_footer->loadData());
	}
}
