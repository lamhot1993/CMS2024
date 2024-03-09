<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	// Definisi field/colomn tabel
	public $id_peserta;
	public $nama_lengkap;
	public $alamat;
	public $kartu_keluarga;
	public $hp;
	public $agama;
	public $ayah;
	public $ibu;
	public $asal_sekolah;
	public $file_kartu_keluarga;
	public $tgl_daftar;
	//

	// Definisi nama tabel
	protected $table      = 'peserta';
	protected $primaryKey = 'id_peserta';
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
		return $data;
	}

	public function loadData_byId(){
		$this->db->select('*')
			->from($this->table)
			->where(['id_peserta' => $this->id_peserta]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? $data[0]:null;
	}

	public function checkDataById(){
		$this->db->select('id_peserta')
			->from($this->table)
			->where(['id_peserta' => $this->id_peserta]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? true:false;
	}

	public function loadFile(){
		$this->db->select('file_kartu_keluarga')
			->from($this->table)
			->where(['id_peserta' => $this->id_peserta]);

		$obj = $this->db->get();
		$data  = $obj->result();
		return count($data)>0 ? $data[0]:null;
	}

	public function getIdPeserta(){
		$this->db->select('id_peserta')
			->from($this->table)
			->where(['token' => $this->token]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? $data[0] : false;
	}

	public function search()
	{
		$this->db->select('*')
			->from($this->table)
			->where(['nama_lengkap' => $this->nama_lengkap]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}

	public function save_file_kartu_keluarga()
	{
		// $data = array(
		// 	'file_kartu_keluarga' => $this->file_kartu_keluarga
		// );
		// $this->db->where('id_peserta', $this->id_peserta);
		// return $this->db->update($this->table, $data);
		$query = $this->db->query("update peserta set file_kartu_keluarga='".$this->file_kartu_keluarga."' 
		WHERE id_peserta=".$this->id_peserta."");
		return $query;
	}

	public function save_data()
	{
		$data = array(
			'nama_lengkap' => $this->nama_lengkap,
			'agama' => $this->agama,
			'asal_sekolah' => $this->asal_sekolah,
			'alamat' => $this->alamat,
			'ayah' => $this->ayah,
			'ibu' => $this->ibu,
			'hp' => $this->hp,
			
		);
		$this->db->where('id_peserta', $this->id_peserta);
		return $this->db->update($this->table, $data);
	}

	public function daftar()
	{
		$data = array(
			'username' => $this->username,
			'password' => _md5($this->password),
			'token' => createTokenPeserta($this->username),
			'tgl_daftar'=>_getDate()
		);
		return $this->db->insert($this->table, $data);
	}

	public function searchData($search){
		$this->db->select('*')
		->from($this->table)
		->like('nama_lengkap' ,$search);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data)>0 ? $data : false;
	}

	public function checkUsername(){
		$this->db->select('id_peserta')
			->from($this->table)
			->where(['username' => $this->username]);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data)>0 ? true : false;
	}

	public function checkToken()
	{
		$this->db->select('id_peserta')
			->from($this->table)
			->where(['token' => $this->token]);

		$obj = $this->db->get();

		$data  = $obj->result();

		return count($data)>0 ? true : false;
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
	public function login(){
		$this->db->select('id_peserta')
			->from($this->table)
			->where(['username' => $this->username, 'password' => _md5($this->password)]);

		$obj = $this->db->get();
		$data  = $obj->result();

		return (count($data) > 0) ? true : false;
	}

	public function add()
	{
		$data = array(
			'nama_lengkap' => $this->nama_lengkap,
			'alamat' => $this->alamat,
			'kartu_keluarga' => $this->kartu_keluarga
		);
		return $this->db->insert($this->table, $data);
	}

	public function update()
	{
		$data = array(
			'nama_lengkap' => $this->nama_lengkap,
			'alamat' => $this->alamat,
			'kartu_keluarga' => $this->kartu_keluarga
		);
		$this->db->where('id_peserta', $this->id_peserta);
		return $this->db->update($this->table, $data);
	}

	public function delete_data(){
		return $this->db->delete($this->table, array('id_peserta' => $this->id_peserta));
	}
}
