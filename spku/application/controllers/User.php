<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Siswa_model');
        cek_login();
    }



    public function index()
    {
        $data['title'] = 'My Profile';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        //   echo 'selamat datang ' . $data['siswa']['nama'];
        $this->load->view('templates/user/header.php', $data);
        $this->load->view('templates/user/sidebar.php', $data);
        $this->load->view('templates/user/topbar.php', $data);
        $this->load->view('user/index.php', $data);
        $this->load->view('templates/user/footer.php');
    }
    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Siswa_model', 'siswa');
        $data['siswa1'] = $this->siswa->getSiswa();
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('user/siswa.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'tahun' => $this->input->post('tahun'),
                'id_role' => 2,
				'is_active' => 1,
				'date_created' => time()

            ];

            $this->db->insert('siswa', $data);
            redirect('user/siswa');
        }
    }
    public function deletesiswa($id_siswa)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['siswa1'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $this->db->delete('siswa', ['id_siswa' => $id_siswa]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Siswa Deleted</div>');
        redirect('user/siswa');
    }
    public function editsiswa($id_siswa)
    {
        $data['title'] = 'Ubah Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa1'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();  
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('user/ubah_siswa.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'tahun' => $this->input->post('tahun'),

            ];

            $this->Siswa_model->ubahS();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Siswa Edited</div>');
            redirect('user/siswa');
        }
    }
}
