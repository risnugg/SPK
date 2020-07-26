<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spk extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Spk_model');
        cek_login();
    }


    public function index()
    {
        $data['title'] = 'Kriteria';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['kri'] = $this->db->get('kriteria')->result_array();

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/index.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $data = [
                'kriteria' => $this->input->post('kriteria'),
                'jenis' => $this->input->post('jenis')
            ];

            $this->db->insert('kriteria', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Kriteria Added</div>');
            redirect('index.php/Spk');
        }
    }
    public function deletekr($id_kriteria)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['kriteria'] = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();

        $this->db->delete('kriteria', ['id_kriteria' => $id_kriteria]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kriteria Deleted</div>');
        redirect('index.php/spk');
    }
    public function editkr($id_kriteria)
    {
        $data['title'] = 'Ubah kriteria';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['kriteria'] = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/ubah_kriteria.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->Spk_model->ubahKr();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kriteria berhasil diubah!</div>');
            redirect('index.php/spk');
        }
    }


    public function jurusan()
    {
        $data['title'] = 'Jurusan';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->db->get('jurusan')->result_array();
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/jurusan.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $data = [
                'jurusan' => $this->input->post('jurusan')
            ];

            $this->db->insert('jurusan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Jurusan Added</div>');
            redirect('index.php/Spk/jurusan');
        }
    }
    public function deletejn($id_jurusan)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->db->get_where('jurusan', ['id_jurusan' => $id_jurusan])->row_array();

        $this->db->delete('jurusan', ['id_jurusan' => $id_jurusan]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan Deleted</div>');
        redirect('index.php/spk/jurusan');
    }
    public function editjn($id_jurusan)
    {
        $data['title'] = 'Ubah Jurusan';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->db->get_where('jurusan', ['id_jurusan' => $id_jurusan])->row_array();
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/ubah_jurusan.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->Spk_model->ubahJn();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jurusan berhasil diubah!</div>');
            redirect('index.php/spk/jurusan');
        }
    }


    public function Bobot()
    {
        $data['title'] = 'Bobot Kriteria';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Spk_model', 'bobot');
        $data['bobot'] = $this->bobot->getBobot();
        $data['kri'] = $this->db->get('kriteria')->result_array();
        $data['jurusan'] = $this->db->get('jurusan')->result_array();

        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/bobot.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'id_jurusan' => $this->input->post('id_jurusan'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'bobot' => $this->input->post('bobot'),

            ];

            $this->db->insert('detail_jk', $data);
            redirect('index.php/spk/bobot');
        }
    }
    public function deletebt($id_detail)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['detail_jk'] = $this->db->get_where('detail_jk', ['id_detail' => $id_detail])->row_array();

        $this->db->delete('detail_jk', ['id_detail' => $id_detail]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Bobot Deleted</div>');
        redirect('index.php/spk/jurusan');
    }
    public function editBobot($id_detail)
    {
        $data['title'] = 'Ubah Bobot';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['bt'] = $this->db->get_where('detail_jk', ['id_detail' => $id_detail])->row_array();
        $data['kri'] = $this->db->get('kriteria')->result_array();
        $data['jurusan'] = $this->db->get('jurusan')->result_array();
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/ubah_bobot.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'id_jurusan' => $this->input->post('id_jurusan'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'bobot' => $this->input->post('bobot'),

            ];

            $this->Spk_model->ubahBobot();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bobot Edited</div>');
            redirect('index.php/spk/bobot');
        }
    }
    public function subKr()
    {
        $data['title'] = 'Subkriteria';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Spk_model', 'subkriteria');
        $data['subkr'] = $this->subkriteria->test();
        $data['kri'] =$this->db->get('kriteria')->result_array();
       
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('range_nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('bobotsk', 'Bobot', 'required');
      


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/subkriteria.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            
    $datasub = array('keterangan'=>$this->input->post('keterangan'),
                        'range_nilai'=>$this->input->post('range_nilai'),
                        'bobotsk'=>$this->input->post('bobotsk'));
    $this->db->insert('subkriteria',$datasub);
 
    $id_subkriteria = $this->db->insert_id();
            
    $datadetail = array('id_subkriteria'=>$id_subkriteria,
                  'id_kriteria'=>$this->input->post('id_kriteria'));
    $this->db->insert('detail_sub',$datadetail);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subkriteria Added</div>');
      
            redirect('index.php/spk/subKr');
        }
    } 
    
    public function editsub($id_subkriteria)
    {
        $data['title'] = 'Ubah Keterangan';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['subkr'] = $this->db->get_where('subkriteria', ['id_subkriteria' => $id_subkriteria])->row_array();
        $data['detail'] = $this->db->get_where('detail_sub', ['id_subkriteria' => $id_subkriteria])->row_array();
        $data['kriteria'] =$this->db->get('kriteria')->result_array();
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('range_nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('bobotsk', 'Bobot', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/ubah_subkriteria.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'keterangan' => $this->input->post('keterangan'),
                'range_nilai' => $this->input->post('range_nilai'),
                'bobotsk' => $this->input->post('bobotsk'),
                

            ];

            $this->Spk_model->ubahSub();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subkriteria Edited</div>');
            redirect('index.php/spk/subKr');
        }
    }
    public function keterangan()
    {
        $data['title'] = 'Keterangan Subkriteria';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Spk_model', 'bobotsk');
       $data['bobotsk'] = $this->bobotsk->getBobotSK();
        $data['range'] = $this->db->get('range_penilaian')->result_array();
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('range_nilai', 'Range Nilai', 'required');
        $this->form_validation->set_rules('id_bot', 'Bobot', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/keterangan.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'range_nilai' => $this->input->post('range_nilai'),
                'id_bot' => $this->input->post('id_bot'),
            ];

            $this->db->insert('keterangan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Keterangan Added</div>');
            redirect('index.php/Spk/keterangan');
        }
    }
    public function deletekt($id_ket)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['keterangan'] = $this->db->get_where('keterangan', ['id_ket' => $id_ket])->row_array();
        $this->db->delete('keterangan', ['id_ket' => $id_ket]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Keterangan Deleted</div>');
        redirect('index.php/spk/keterangan');
    }
    
    public function editkt($id_ket)
    {
        $data['title'] = 'Ubah Keterangan';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['ket'] = $this->db->get_where('keterangan', ['id_ket' => $id_ket])->row_array();
        $data['range'] = $this->db->get('range_penilaian')->result_array();
        $this->form_validation->set_rules('Keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('id_bot', 'Bobot', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('spk/ubah_keterangan.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'Keterangan' => $this->input->post('Keterangan'),
                'id_bot' => $this->input->post('id_bot'),

            ];

            $this->Spk_model->ubahKet();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bobot Edited</div>');
            redirect('index.php/spk/keterangan');
        }
    }

public function range_p()
{
    $data['title'] = 'Bobot Subkriteria';
    $data['siswa'] = $this->db->get_where('siswa', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['range'] = $this->db->get('range_penilaian')->result_array();
    $this->form_validation->set_rules('bobotsk', 'Bobot', 'required');
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/user/header.php', $data);
        $this->load->view('templates/user/sidebar.php', $data);
        $this->load->view('templates/user/topbar.php', $data);
        $this->load->view('spk/range_penilaian.php', $data);
        $this->load->view('templates/user/footer.php');
    } else {
        $data = [
            'bobotsk' => $this->input->post('bobotsk'),
            
        ];

        $this->db->insert('range_penilaian', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Bobot Subkriteria Baru Ditambahkan</div>');
        redirect('index.php/spk/range_p');
    }
}
}