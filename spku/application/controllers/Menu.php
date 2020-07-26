<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Menu_model');
        cek_login();
    }


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('menu/index.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('index.php/Menu');
        }
    }


    public function editMenu($id)
    {
        $data['title'] = 'Ubah Menu';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('menu/ubah_menu.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->Menu_model->ubahMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil diubah!</div>');
            redirect('index.php/Menu');
        }
    }


    public function deletemenu($id)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Menu Deleted</div>');
        redirect('index.php/Menu');
    }

    public function deleteSubmenu($id)

    {
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Menu Deleted</div>');
        redirect('index.php/Menu/subMenu');
    }

    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['siswa'] = $this->db->get_where('siswa', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('menu/submenu.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            redirect('index.php/menu/submenu');
        }
    }
    public function editSubMenu($id)
    {
        $data['title'] = 'Ubah Sub Menu';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['sm'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header.php', $data);
            $this->load->view('templates/user/sidebar.php', $data);
            $this->load->view('templates/user/topbar.php', $data);
            $this->load->view('menu/ubah_submenu.php', $data);
            $this->load->view('templates/user/footer.php');
        } else {
            $this->Menu_model->ubahsubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sub Menu berhasil diubah!</div>');
            redirect('index.php/menu/submenu');
        }
    }
}
