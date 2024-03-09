<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_admin;
	public $username;
	public $password;
	public $token;
	//

	// Definisi nama tabel
	protected $table      = 'admins';
	protected $primaryKey = 'id_admin';
	protected $useAutoIncrement = true;

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';


	public function login()
	{
		$this->db->select('id_admin')
			->from($this->table)
			->where(['username' => $this->username, 'password' => _md5($this->password)]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}

	public function getIdAdmin()
	{
		$this->db->select('id_admin')
			->from($this->table)
			->where(['username' => $this->username, 'password' => _md5($this->password)]);

		$obj = $this->db->get();
		$data  = $obj->result_array();

		return (count($data) > 0) ? $data[0] : false;
	}

	public function checkPassword(){
		$this->db->select('id_admin')
			->from($this->table)
			->where(['password' => _md5($this->password)]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}

	public function getToken()
	{
		$this->db->select('token')
			->from($this->table)
			->where(['username' => $this->username, 'password' => _md5($this->password)]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return $data;
	}

	public function checkToken()
	{
		$this->db->select('id_admin')
			->from($this->table)
			->where(['token' => $this->token]);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data)>0 ? true : false;
	}


	public function updatePassword()
	{
		$data = array(
			'password' => _md5($this->password)
		);
		$this->db->where('id_admin', $this->id_admin);
		return $this->db->update($this->table, $data);
	}

	public function add(){
		
		$data = array(
			'username' => 'admin',
			'password' => _md5('admin12345')
		);
		return $this->db->insert($this->table, $data);
	}
}
