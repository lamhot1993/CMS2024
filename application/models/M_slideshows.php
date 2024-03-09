<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_slideshows extends CI_Model
{
	// Definisi field/colomn tabel
	public $id_slideshow;
	public $image;
	public $title;
	public $description;
	//

	// Definisi nama tabel
	protected $table      = 'slideshows';

	protected $primaryKey = 'id_slideshow';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table);
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return $data;
	}

	public function saveFoto(){
		$query = $this->db->query(
			"update slideshows set image='".$this->image."' 
		WHERE id_slideshow=".$this->id_slideshow."");
		return $query;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_slideshow' => $this->id_slideshow]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? $data[0] : null;
	}

	public function checkDataById()
	{
		$this->db->select('id_slideshow')
			->from($this->table)
			->where(['id_slideshow' => $this->id_slideshow]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}

	public function getIdPost()
	{
		$this->db->select('id_slideshow')
			->from($this->table)
			->where(['id_slideshow' => $this->id_slideshow]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? $data[0] : false;
	}

	public function search()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['title' => $this->title]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}


	public function updateData()
	{
		$data = array(
			'title' => $this->title,
			'image' => $this->image,
			'description' => $this->description,
			'date_created' => _getDate(),
		);
		$this->db->where('id_slideshow', $this->id_slideshow);
		return $this->db->update($this->table, $data);
	}

	public function addData()
	{
		$data = array(
			'title' => $this->title,
			'description' => $this->description,
			'date_created' => _getDate(),
		);
		return $this->db->insert($this->table, $data);
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

	public function delete_data()
	{
		return $this->db->delete($this->table, array('id_slideshow' => $this->id_slideshow));
	}
}
