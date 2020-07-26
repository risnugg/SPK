<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        cek_login();
    }


    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        //   echo 'selamat datang ' . $data['siswa']['nama'];

        $this->load->view('templates/user/header.php', $data);
        $this->load->view('templates/user/sidebar.php', $data);
        $this->load->view('templates/user/topbar.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('templates/user/footer.php');
    }
}
