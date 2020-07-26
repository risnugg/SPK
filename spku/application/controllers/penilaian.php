    <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Spk_model');
        $this->load->model('Penilaian_model');
        $this->load->model('Siswa_model');
        cek_login();
    }
    public function index()
    {
        $data['title'] = 'Penilaian';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $data['kriteria']= $this->Penilaian_model->get_kriteria()->result();
        $this->load->model('Penilaian_model', 'penilaian');
        $data['penilaian'] = $this->penilaian->getpenilaian();
        $this->load->model('Siswa_model', 'siswa');
        $data['siswa1'] = $this->siswa->getSiswa();
      
       
        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required');
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
     

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('penilaian/index.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'id_siswa' => $this->input->post('id_siswa'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nilai' => $this->input->post('bobot'),

            ];

            $this->db->insert('penilaian', $data);
            redirect('penilaian');
        }
        
    }
	function get_sub_category(){
		$kriteria_id = $this->input->post('id',TRUE);
		$data = $this->Penilaian_model->get_subkriteria($kriteria_id)->result();
        echo json_encode($data);
       
	}

    function get_bobot(){
		$subkriteria_id = $this->input->post('id_detail',TRUE);
		$data = $this->Penilaian_model->get_bobotsk($subkriteria_id)->result();
		echo json_encode($data);
	}

    public function deletepen($id_nilai)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['penilaian'] = $this->db->get_where('penilaian', ['id_nilai' => $id_nilai])->row_array();
        $this->db->delete('penilaian', ['id_nilai' => $id_nilai]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Penilaian Deleted</div>');
        redirect('penilaian');
    }
    public function editpen($id_nilai)
    {
        $data['title'] = 'Ubah Penilaian';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['penilaian'] = $this->db->get_where('penilaian', ['id_nilai' => $id_nilai])->row_array();
        $data['kriteria'] =$this->db->get('kriteria')->result_array();
        $this->load->model('Siswa_model', 'siswa');
        $data['siswa1'] = $this->siswa->getSiswa();
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('penilaian/ubah_penilaian.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->Penilaian_model->ubahPen();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Penilaian berhasil diubah!</div>');
            redirect('penilaian');
        }
    }
    public function saw()
    {
        $data['title'] = 'SAW';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Penilaian_model', 'tabel1');
        $data['penilaian'] = $this->tabel1->tabel1();
        $this->load->model('Penilaian_model', 'max');
        $data['max'] = $this->max->max();
        $this->load->model('Penilaian_model', 'max1');
        $data['max1'] = $this->max1->max1();
        $this->load->model('Penilaian_model', 'max3');
        $data['max3'] = $this->max3->max3();
        $this->load->model('Penilaian_model', 'max2');
        $data['max2'] = $this->max2->max2();
        $this->load->model('Penilaian_model', 'min');
        $data['min'] = $this->min->min();
        $this->load->model('Penilaian_model', 'min1');
        $data['min1'] = $this->min1->min1();
        $this->load->model('Penilaian_model', 'min2');
        $data['min2'] = $this->min2->min2();
      
        $data['nilai'] =$this->db->get('penilaian')->result_array();
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('penilaian/saw.php', $data);
            $this->load->view('templates/user/footer.php');
      
  
           
        }
}   