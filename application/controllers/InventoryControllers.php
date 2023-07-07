<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventoryControllers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('InventoryModel', 'inventory');
		$this->load->library('form_validation');
		$this->load->helper(['form', 'url']);
	}
	public function index()
	{
		$data = [
			'title' => 'Inventory | Web Inventory'
		];

		if (!isset($_SESSION['logged_in'])) {
			return redirect('/');
		} else {
			if ($this->session->userdata('role_id') == 1) {
				redirect('dashboard');
			} else {
				$this->load->view('layouts/main', $data);
				$this->load->view('layouts/topbar');
				$this->load->view('layouts/side-navbar');
				$this->load->view('home/index', $data);
				$this->load->view('layouts/footer');
			}
		}
	}

	public function listInventory()
	{
		$this->db->select('*')->from('inventory')->join('categories', 'categories.id = inventory.category_id');
		$query = $this->db->get();
		// get table categories
		$categories = $this->db->get('categories');
		$data = [
			'title' => 'List Inventory  | Web Inventory',
			'inventory' => $query->result(),
			'categories' => $categories->result()
		];

		$this->load->view('layouts/main', $data);
		$this->load->view('layouts/topbar');
		$this->load->view('layouts/side-navbar');
		$this->load->view('inventory/index', $data);
		$this->load->view('layouts/footer');
	}

	public function indexCreate()
	{
		// join table user -> categories
		$this->db->select('*')->from('inventory')->join('categories', 'categories.id = inventory.category_id');
		$query = $this->db->get();
		// get table categories
		$categories = $this->db->get('categories');
		$data = [
			'title' => 'List Inventory  | Web Inventory',
			'categories' => $categories->result()
		];

		$this->load->view('layouts/main', $data);
		$this->load->view('layouts/topbar');
		$this->load->view('layouts/side-navbar');
		$this->load->view('inventory/create_inventory', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
		$this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Gagal! Menambahkan!
				</div>');
			return redirect('admin/inventory');
		} else {
			$name = $this->input->post('nama_barang');
			$slug = url_title($name, 'dash', true);
			$payload = [
				'slug' => $slug,
				'category_id' =>  $this->input->post('categories_id'),
				'kode_barang' =>  $this->input->post('kode_barang'),
				'nama_barang' =>  $this->input->post('nama_barang'),
				'jumlah_barang' =>  $this->input->post('jumlah_barang'),
				'harga_beli' =>  $this->input->post('harga'),
				'satuan_barang' =>  $this->input->post('satuan_barang'),
				'status_barang' => 1,
				'created_at' => date('Y-m-d'),
			];

			$upload_image = $_FILES['image'];

			if ($upload_image) {
				$config['upload_path']          = './public/assets/img/inventory';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 2048;
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$payload['image'] = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}

			$this->db->insert('inventory', $payload);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Barang berhasil ditambahkan!
				</div>');

			return redirect('admin/inventory');
		}
	}

	public function delete($slug)
	{
		$this->db->where('slug', $slug);
		$this->db->delete('inventory');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Barang terhapus!
	</div>');
		return redirect('admin/inventory');
	}

	public function update($id_barang)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
		$this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Gagal! Update!
					</div>');
			return redirect('admin/inventory');
		} else {
			$name = $this->input->post('nama_barang');
			$payload = [
				'category_id' =>  $this->input->post('categories_id'),
				'kode_barang' =>  $this->input->post('kode_barang'),
				'nama_barang' =>  $this->input->post('nama_barang'),
				'jumlah_barang' =>  $this->input->post('jumlah_barang'),
				'harga_beli' =>  $this->input->post('harga'),
				'satuan_barang' =>  $this->input->post('satuan_barang'),
				'status_barang' => 1,
				'created_at' => date('Y-m-d'),
			];

			$upload_image = $_FILES['image'];

			if ($upload_image) {
				$config['upload_path']          = './public/assets/img/inventory';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 2048;
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$old_image = $this->inventory->getImageById($id_barang);
				if ($old_image) {
					unlink('./public/assets/img/inventory' . $old_image);
				}
				// Ambil informasi gambar yang baru diunggah
				$image_data = $this->upload->data();
				$payload['image'] = $image_data['file_name'];
			} else {
				echo $this->upload->display_errors();
			}

			$this->inventory->updateData($id_barang, $payload);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Barang berhasil diupdate!
					</div>');

			return redirect('admin/inventory');
		}
	}
}
