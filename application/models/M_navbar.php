<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_navbar extends CI_Model
{	
	// Definisi field/colomn tabel
	public $id_navbar;
	public $id_navbar_child;
	public $title;
	public $link;
	//

	// Definisi nama tabel
	protected $table      = 'navbar';
	protected $table_2      = 'navbar_child';
	protected $primaryKey = 'id_navbar';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadDataNavbar()
	{
		$this->db->select('*')
			->from($this->table)
			->order_by('id_navbar', 'asc');
		$obj = $this->db->get();
		return $obj->result_array();
	}

	public function searchData($search)
	{
		$this->db->select('*')
			->from($this->table)
			->like('title', $this->title);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data) > 0 ? $data : false;
	}

	public function loadDataChildById(){
		$this->db->select('*')
			->from('navbar_child')
			->where(['id_navbar' => $this->id_navbar]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data)>0 ? $data :null;
	}

	public function loadDataNavbarChild()
	{
		$this->db->select('*')
			->from($this->table_2);
		$obj = $this->db->get();
		return $obj->result_array();
	}

	public function addData()
	{
		$data = array(
			'title' => $this->title,
			'link' => $this->link
		);
		return $this->db->insert($this->table, $data);
	}
	
	public function addDataNavbarChild(){
		$data = array(
			'title_child' => $this->title,
			'link_child' => $this->link,
			'id_navbar' => $this->id_navbar
		);
		return $this->db->insert('navbar_child', $data);
	}

	public function loadData_byId(){
		$this->db->select('*')
			->from($this->table)
			->where(['id_navbar' => $this->primaryKey]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? $data[0]:null;
	}

	public function checkDataById(){
		$this->db->select('id_navbar')
			->from($this->table)
			->where(['id_navbar' => $this->primaryKey]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? true:false;
	}

	public function updateData()
	{
		$data = array(
			'title' => $this->title,
			'link' => $this->link
		);
		$this->db->where('id_navbar', $this->id_navbar);
		return $this->db->update($this->table, $data);
	}
	
	public function delete_data(){
		return $this->db->delete($this->table, array('id_navbar' => $this->id_navbar));
	}

	public function delete_data_navbar_child(){
		return $this->db->delete('navbar_child', array('id_navbar_child' => $this->id_navbar_child));
	}
	public function count_data(){
	    $this->db->select('id_navbar')
			->from($this->table);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data);
	}
}
