<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_school extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_school;
	public $nama;
    public $alamat;
    public $hp;
    public $foto;
	//

	// Definisi nama tabel
	protected $table      = 'schools';
	protected $view      = 'view_school';

	protected $primaryKey = 'id_school';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	public function loadData()
	{
		$this->db->select('*')
			->from($this->table)
			->order_by('id_school', 'desc');
		$obj = $this->db->get();
		$data  = $obj->result_array();
		return $data;
	}

	public function loadData_byId()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['id_school' => $this->id_school]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? $data[0] : null;
	}

	public function checkDataById()
	{
		$this->db->select('id_school')
			->from($this->table)
			->where(['id_school' => $this->id_school]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data) > 0 ? true : false;
	}



	public function search()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['nama' => $this->nama]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}

	public function saveFoto(){
		$query = $this->db->query(
			"update schools set foto='".$this->foto."' 
		WHERE id_school=".$this->id_school."");
		return $query;
	}

	public function updateData()
	{
		$data = array(
			'nama' => $this->nama,
			'hp' => $this->hp,
			'alamat'=>$this->alamat
		);
		$this->db->where('id_school', $this->id_school);
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
		return $this->db->delete($this->table, array('id_school' => $this->id_school));
	}
}
