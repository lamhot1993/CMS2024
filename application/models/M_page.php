<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_page extends CI_Model
{
	// Definisi field/colomn tabel
	public $id_page;
	public $name;
	public $slug;
	public $description;
	public $date_created;
	public $time_created;
	//

	// Definisi nama tabel
	protected $table      = 'page';

	protected $primaryKey = 'id_page';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table)
			->order_by('id_page', 'desc');
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return $data;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_page' => $this->id_page]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data) > 0 ? $data[0] : null;
	}

	public function checkDataById()
	{
		$this->db->select('id_page')
			->from($this->table)
			->where(['id_page' => $this->id_page]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}

	public function checkDataBySlug()
	{
		$this->db->select('id_page')
			->from($this->table)
			->where(['slug' => $this->slug]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}

	public function getIdPost()
	{
		$this->db->select('id_page')
			->from($this->table)
			->where(['id_page' => $this->id_page]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? $data[0] : false;
	}

	public function search()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['name' => $this->name]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}


	public function updateData()
	{
		$final_slug = str_replace(" ","-",$this->name);
		$final_slug = trim($final_slug);

		$data = array(
			'name' => $this->name,
			'slug' => strtolower($final_slug),
			'description' => $this->description
		);
		$this->db->where('id_page', $this->id_page);
		return $this->db->update($this->table, $data);
	}

	public function getDataById()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_page' => $this->id_page]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data) > 0 ? $data[0] : false;
	}

	public function getDataBySlug(){
		$this->db->select('*')
			->from($this->table)
			->where(['slug' => $this->slug]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data) > 0 ? $data[0] : false;
	}

	public function addData()
	{
		$final_slug = str_replace(" ","-",$this->name);
		$final_slug = trim($final_slug);

		$data = array(
			'name' => $this->name,
			'slug' => strtolower($final_slug),
			'description' => $this->description,
			'date_created' => _getDate(),
			'time_created' => _getTime(),
		);
		return $this->db->insert($this->table, $data);
	}

	public function searchData($search)
	{
		$this->db->select('*')
			->from($this->table)
			->like('name', $this->name);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data) > 0 ? $data : false;
	}

	public function delete_data()
	{
		return $this->db->delete($this->table, array('id_page' => $this->id_page));
	}
	public function count_data(){
	    $this->db->select('id_page')
			->from($this->table);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data);
	}
}
