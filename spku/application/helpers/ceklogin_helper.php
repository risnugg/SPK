<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('index.php/auth');
    } else {

        $id_role = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $id_menu = $queryMenu['id'];

        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'id_role' => $id_role,
                'menu_id' => $id_menu
            ]
        );

        if ($userAccess->num_rows() < 1) {
            redirect('index.php/auth/blocked');
        }
    }
}
