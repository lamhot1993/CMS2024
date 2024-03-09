<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_partner extends CI_Model
{	
	// Definisi field/colomn tabel
	public $id_partner;
	public $title;
	public $image;
	public $link;
	//

	// Definisi nama tabel
	protected $table      = 'partners';
	protected $primaryKey = 'id_partner';
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

	public function checkDataById(){
		$this->db->select('id_news')
			->from($this->table)
			->where(['id_news' => $this->id_news]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? true:false;
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


	public function saveFoto(){
		$query = $this->db->query(
			"update partners set image='".$this->foto."' 
		WHERE id_partner=".$this->id_partner."");
		return $query;
	}

	public function updateData()
	{
		$data = array(
			'title' => $this->title,
			'link' => $this->link
		);
		$this->db->where('id_partner', $this->id_partner);
		return $this->db->update($this->table, $data);
	}

	public function addData()
	{
		$data = array(
			'title' => $this->title,
			'link' => $this->link
		);
		return $this->db->insert($this->table, $data);
	}
	
	public function delete_data(){
		return $this->db->delete($this->table, array('id_partner' => $this->id_partner));
	}
}
