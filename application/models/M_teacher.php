<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_teacher extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_teacher;
	public $name;
	public $ket;
	//

	// Definisi nama tabel
	protected $table      = 'teachers';
	protected $view      = 'view_teachers';

	protected $primaryKey = 'id_teacher';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table)
			->order_by('id_teacher', 'desc');
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return $data;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_teacher' => $this->id_teacher]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? $data[0] : null;
	}

	public function checkDataById()
	{
		$this->db->select('id_teacher')
			->from($this->table)
			->where(['id_teacher' => $this->id_teacher]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}

	public function getIdDocter()
	{
		$this->db->select('id_teacher')
			->from($this->table)
			->where(['id_teacher' => $this->id_teacher]);

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

	public function saveFoto(){
		$query = $this->db->query(
			"update teachers set foto='".$this->foto."' 
		WHERE id_teacher=".$this->id_teacher."");
		return $query;
	}

	public function updateData()
	{
		$data = array(
			'name' => $this->name,
			'ket' => $this->ket
		);
		$this->db->where('id_teacher', $this->id_teacher);
		return $this->db->update($this->table, $data);
	}

	public function addData()
	{
		$data = array(
			'name' => $this->name,
			'ket' => $this->ket
		);
		return $this->db->insert($this->table, $data);
	}

	public function searchData($search)
	{
		$this->db->select('*')
			->from($this->table)
			->like('name', $search);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data) > 0 ? $data : false;
	}

	public function delete_data()
	{
		return $this->db->delete($this->table, array('id_teacher' => $this->id_teacher));
	}
	public function count_data(){
	    $this->db->select('id_teacher')
			->from($this->table);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data);
	}
}
