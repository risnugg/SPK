<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{


    public function getSubMenu()
    {
        $query = " SELECT `user_sub_menu`.*,.`user_menu`.`menu`
        FROM `user_sub_menu` join `user_menu`
        on `user_sub_menu`.`menu_id`=`user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function ubahMenu()
    {
        $id = $this->input->post('id', true);
        $menu = $this->input->post('menu', true);
        $this->db->where('id', $id)->update('user_menu', ['menu' => $menu]);
    }
    public function ubahsubMenu()
    {
        $id = $this->input->post('id', true);
        $title = $this->input->post('title', true);
        $menu_id = $this->input->post('menu_id', true);
        $url = $this->input->post('url', true);
        $icon = $this->input->post('icon', true);

        $this->db->where('id', $id)->update('user_sub_menu', ['title' => $title]);
        $this->db->where('id', $id)->update('user_sub_menu', ['menu_id' => $menu_id]);
        $this->db->where('id', $id)->update('user_sub_menu', ['url' => $url]);
        $this->db->where('id', $id)->update('user_sub_menu', ['icon' => $icon]);
    }
}
