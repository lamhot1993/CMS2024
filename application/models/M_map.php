<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_map extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_map;
	public $location;
	//

	// Definisi nama tabel
	protected $table      = 'map';

	protected $primaryKey = 'id_map';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_map' => 1]);
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data)>0 ? $data[0] : false;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_map' => $this->id_map]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? $data[0] : null;
	}



	public function updateData()
	{
		$data = array(
			'location' => $this->location
		);
		$this->db->where('id_map', 1);
		return $this->db->update($this->table, $data);
	}

	

}
