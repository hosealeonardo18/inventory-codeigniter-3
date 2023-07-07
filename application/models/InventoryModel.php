<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventoryModel extends CI_Model
{

	public $title;
	public $content;
	public $date;

	public function getData()
	{
		$sql = "SELECT * FROM `inventory`";
		$query = $this->db->query($sql);
		if ($query) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function getImageById($id_barang)
	{
		// Ambil nama file gambar berdasarkan id_barang
		$this->db->select('image');
		$this->db->where('id_barang', $id_barang);
		$query = $this->db->get('inventory');
		$row = $query->row();
		if (isset($row)) {
			return $row->image;
		} else {
			return FALSE;
		}
	}

	public function kurangiStokInventory($id_barang, $jumlahBarang)
	{
		// Query untuk mengurangi stok barang di database
		$this->db->set('jumlah_barang', 'jumlah_barang - ' . $jumlahBarang, FALSE);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('inventory');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function tambahStokInventory($id_barang, $jumlahBarang)
	{
		// Query untuk mengurangi stok barang di database
		$this->db->set('jumlah_barang', 'jumlah_barang + ' . $jumlahBarang, FALSE);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('inventory');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function updateData($id, $payload)
	{
		// Update payload berdasarkan ID
		$this->db->where('id_barang', $id);
		$this->db->update('inventory', $payload);
	}
}
