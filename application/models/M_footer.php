<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_footer extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_footer;
	public $footer;
	//

	// Definisi nama tabel
	protected $table      = 'footer';

	protected $primaryKey = 'id_footer';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_footer' => 1]);
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data)>0 ? $data[0] : false;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_footer' => $this->id_footer]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? $data[0] : null;
	}

	public function checkDataById()
	{
		$this->db->select('id_footer')
			->from($this->table)
			->where(['id_footer' => $this->id_footer]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}


	public function search()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['spesialis' => $this->spesialis]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}


	public function updateData()
	{
		$data = array(
			'footer' => $this->footer
		);
		$this->db->where('id_footer', 1);
		return $this->db->update($this->table, $data);
	}



	public function delete_data()
	{
		return $this->db->delete($this->table, array('id_footer' => $this->id_footer));
	}
}
