<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionControllers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransactionModel', 'transaction');
		$this->load->model('InventoryModel', 'inventory');
		$this->load->library('form_validation');
	}
	public function index()
	{

		$query = $this->inventory->getData();

		$data = [
			'title' => 'Inventory | Web Inventory',
			'transactions' => $query
		];

		if (!isset($_SESSION['logged_in'])) {
			return redirect('/');
		}

		$this->load->view('layouts/main', $data);
		$this->load->view('layouts/topbar');
		$this->load->view('layouts/side-navbar');
		$this->load->view('transactions/index', $data);
		$this->load->view('layouts/footer');
	}

	public function listTransaction()
	{
		$userLogin = $this->session->userdata('id');

		$this->db->select('*')->from('transactions')->join('inventory', 'inventory.id_barang = transactions.id_barang')->join('users', 'users.id = transactions.user_id');
		$this->db->where('transactions.user_id', $userLogin);
		$query = $this->db->get();
		$result = $query->result_array();

		$data = [
			'title' => 'Inventory | Web Inventory',
			'transactions' => $result
		];

		if (!isset($_SESSION['logged_in'])) {
			return redirect('/');
		}

		$this->load->view('layouts/main', $data);
		$this->load->view('layouts/topbar');
		$this->load->view('layouts/side-navbar');
		$this->load->view('transactions/transaction', $data);
		$this->load->view('layouts/footer');
	}

	public function transaction($id_barang)
	{
		$jumlahBarang = $this->input->post('jumlah_barang');
		$result = $this->inventory->kurangiStokInventory($id_barang, $jumlahBarang);

		if ($result) {
			$payload = [
				'user_id' => $this->session->userdata('id'),
				'id_barang' => $id_barang,
				'jumlah_barang_transaction' =>  $this->input->post('jumlah_barang'),
				'created_at' => date('Y-m-d'),
				'status' => 0
			];

			// insert to transaction
			$this->db->insert('transactions', $payload);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Transaction berhasil!
					</div>');

			return redirect('dashboard/transactions');
		}
	}

	public function returnInventory($id_transaction, $id_barang, $jumlahBarang)
	{

		$result = $this->inventory->tambahStokInventory($id_barang, $jumlahBarang);

		if ($result) {
			$payload = [
				'status' => 1
			];

			// insert to transaction
			$this->db->where('id_transaction', $id_transaction);
			$this->db->update('transactions', $payload);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Inventory Berhasil dikembalikan!
					</div>');

			return redirect('dashboard/transactions');
		}
	}
}
