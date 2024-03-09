
<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_social_media extends CI_Model
{
	// Definisi field/colomn tabel
	public $id_social_media;
	public $facebook;
	public $instagram;
	public $twitter;
	//

	// Definisi nama tabel
	protected $table      = "social_media";

	protected $primaryKey ="id_social_media";
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = "created_at";
	protected $updatedField  = "updated_at";
	protected $deletedField  = "deleted_at";

	public function loadData()
	{
		$this->db->select("*")
				->from($this->table);
		$obj = $this->db->get();
		return $obj->result_array();
	}

	public function loadData_byId()
	{
		$this->db->select("*")
				->from($this->table)
				->where([$this->primaryKey => 1]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return (count($data)) > 0 ? $data[0] : null;
	}

	public function countData(){
		$this->db->select($this->primaryKey)
				->from($this->table);
		$obj = $this->db->get();
		$data =$obj->result_array();
		return count($data);
	}

	public function checkDataById()
	{
		$this->db->select($this->primaryKey)
			->from($this->table)
			->where([$this->primaryKey => $this->id_social_media]);

		$obj = $this->db->get();
		$data  = $obj->result_array();
		return count($data) > 0 ? true : false;
	}

	public function searchWhere()
	{
		$this->db->select("*")
			->from($this->table)
			->where(["facebook" => $this->facebook]);

		$obj = $this->db->get();
		$data  = $obj->result_array();

		return (count($data) > 0) ? $data : null;
	}

	public function searchLike()
	{
		$this->db->select("*")
			->from($this->table)
			->like("facebook", $this->facebook);

		$obj = $this->db->get();
		$data  = $obj->result_array();

		return (count($data) > 0) ? $data : false;
	}

	public function add()
	{
		$data = array(
			"facebook" => $this->facebook,
			"instagram" => $this->instagram,
			"twitter" => $this->twitter,
			"youtube"=>$this->youtube
		);
		return $this->db->insert($this->table, $data);
	}

	public function update()
	{
		$data = array(
			"facebook" => $this->facebook,
			"instagram" => $this->instagram,
			"twitter" => $this->twitter,
			"youtube"=>$this->youtube
		);
		$this->db->where($this->primaryKey, 1);
		return $this->db->update($this->table, $data);
	}

	public function delete()
	{
		return $this->db->delete($this->table, array($this->primaryKey => $this->id_social_media));
	}
}
