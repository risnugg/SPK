<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{


    public function getSiswa()
    {
        $query = " SELECT `siswa`.*
        FROM `siswa` 
        where id_role ='2'
        order by id_siswa ASC";
        return $this->db->query($query)->result_array();
    }
    public function ubahS()
    {
        $id_siswa = $this->input->post('id_siswa', true);
        $n = $this->input->post('nama', true);        
        $k = $this->input->post('kelas', true);
        $t = $this->input->post('tahun', true);


        $this->db->where('id_siswa', $id_siswa)->update('siswa', ['nama' => $n]);
        $this->db->where('id_siswa', $id_siswa)->update('siswa', ['kelas' => $k]);
        $this->db->where('id_siswa', $id_siswa)->update('siswa', ['tahun' => $t]);
    }
}
?>