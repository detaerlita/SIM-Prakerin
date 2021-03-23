<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pem_join extends CI_Model
{
    public function duaTable($email)
    {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->join('pembimbing','pembimbing.id_username_pembimbing=user.id');
		$query = $this->db->get();
		return $query->result();
    }

    public function peserta($email)
    {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->join('peserta','peserta.id_username=user.id');
		$query = $this->db->get();
		return $query->result();
    }

    public function all_peserta()
    {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('peserta','peserta.id_username=user.id');
		$query = $this->db->get();
		return $query->result();
    }

    public function all_pembimbing()
    {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pembimbing','pembimbing.id_username_pembimbing=user.id');
		$query = $this->db->get();
		return $query->result();
    }
}
