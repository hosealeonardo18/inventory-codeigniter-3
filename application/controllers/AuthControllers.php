<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthControllers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login | Web Inventory';

		if (isset($_SESSION['logged_in'])) {
			return redirect('admin');
		}
		$this->load->view('auth/templates/auth_header', $data);
		$this->load->view('auth/login/index');
		$this->load->view('auth/templates/auth_footer');
	}

	// auth register
	public function register()
	{
		$data['title'] = 'Register | Web Inventory';
		$this->load->view('auth/templates/auth_header', $data);
		$this->load->view('auth/register/index');
		$this->load->view('auth/templates/auth_footer');
	}

	// auth logout
	public function logout()
	{
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('logged_in');
		return redirect('/');
	}

	// create account
	public function create()
	{
		// validation
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'This email has already register!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login | Web Inventory';
			$this->load->view('auth/templates/auth_header', $data);
			$this->load->view('auth/register/index');
			$this->load->view('auth/templates/auth_footer');
		} else {
			$payload = [
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 1
			];

			$this->db->insert('users', $payload);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Congratulation, your account has been created!
				</div>');
			return redirect('/');
		}
	}

	// auth login
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login | Web Inventory';
			$this->load->view('auth/templates/auth_header', $data);
			$this->load->view('auth/login/index');
			$this->load->view('auth/templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('users', ['email' => $email])->row_array();

			if ($user) {
				if (password_verify($password, $user['password'])) {
					$payload = [
						'id' => $user['id'],
						'email' => $user['email'],
						'fullname' => $user['fullname'],
						'role_id' => $user['role_id'],
						'logged_in' => TRUE
					];

					$this->session->set_userdata($payload);

					return redirect('/admin');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Email or Password incorect!
					</div>');
					return redirect('/');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Email or Password incorect!
					</div>');
				return redirect('/');
			}
			// return redirect('/admin');
		}
	}
}
