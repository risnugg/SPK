<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',

			'trim|required'

		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$test['title'] = 'SPK User Login';
			$this->load->view('templates/auth_header1', $test);
			$this->load->view('templates/auth_footer');
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$siswa = $this->db->get_where('siswa', ['username' => $username])->row_array();
		//Jika User ada
		if ($siswa) {
			//Jika  User Active 
			if ($siswa['is_active'] == 1) {

				if (password_verify($password, $siswa['password'])) {
					$data = [
						'username' => $siswa['username'],
						'id_role'	=> $siswa['id_role']
					];
					$this->session->set_userdata($data);
					if ($siswa['id_role'] == 1) {
						redirect('index.php/admin');
					} else {
						redirect('index.php/user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect('index.php/Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak aktif</div>');
				redirect('index.php/Auth');
			}
		}
		//untuk mencari apakah username ada atau tidak
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah</div>');
			redirect('index.php/Auth');
		}
	}
	public function registration()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',

			'required|trim|is_unique[siswa.username]',
			array(
				'is_unique' => '%s telah terdaftar',
			)
		);


		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[5]|max_length[30]|matches[password2]',
			array(
				'min_length' => 'Password Too Short',
				'max_length' => 'Password Too Long',
				'matches' => 'Password doesnt match!',

			)
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');

		if ($this->form_validation->run() == false) {
			$test['title'] = 'SPK User Registration';
			$this->load->view('templates/auth_header', $test);
			$this->load->view('templates/auth_footer');
			$this->load->view('auth/registration');
		} else {
			$data = [
				'username' => ($this->input->post('username')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'tahun' => $this->input->post('tahun'),
				'id_role' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('siswa', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi telah berhasil</div>');


			redirect('index.php/Auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout</div>');
		redirect('index.php/Auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
