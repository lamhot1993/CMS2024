<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_header extends CI_Model
{		
	// Definisi field/colomn tabel
	public $id_header;
	public $foto;
	//

	// Definisi nama tabel
	protected $table      = 'header';
	protected $primaryKey = 'id_header';
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
		$data  = $obj->result();
		return count($data)>0 ? $data[0] : false;
	}

	public function loadData_byId(){
		$this->db->select('*')
			->from($this->table)
			->where(['id_header' => $this->id_header]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data)>0 ? $data[0]:null;
	}

	public function saveFoto(){
		$query = $this->db->query(
			"update header set foto='".$this->foto."' 
		WHERE id_header=1");
		return $query;
	}

	public function updateData()
	{
		$data = array(
			'foto' => $this->foto		
		);
		$this->db->where('id_header', $this->id_header);
		return $this->db->update($this->table, $data);
	}
	
	public function delete_data(){
		return $this->db->delete($this->table, array('id_news' => $this->id_news));
	}
}
