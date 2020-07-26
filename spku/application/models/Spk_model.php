<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spk_model extends CI_Model
{


    public function getBobot()
    {
        $query = " SELECT `detail_jk`.*,.`jurusan`.`jurusan`,`kriteria`.`kriteria`
        FROM `detail_jk` join `jurusan`
        on `detail_jk`.`id_jurusan`=`jurusan`.`id_jurusan`
        join `kriteria` on `detail_jk`.`id_kriteria`=`kriteria`.`id_kriteria`
        order by id_jurusan ASC";
        return $this->db->query($query)->result_array();
    }
    public function ubahBobot()
    {
        $id_detail = $this->input->post('id_detail', true);
        $jurusan = $this->input->post('id_jurusan', true);
        $kriteria = $this->input->post('id_kriteria', true);
        $bobot = $this->input->post('bobot', true);


        $this->db->where('id_detail', $id_detail)->update('detail_jk', ['id_jurusan' => $jurusan]);
        $this->db->where('id_detail', $id_detail)->update('detail_jk', ['id_kriteria' => $kriteria]);
        $this->db->where('id_detail', $id_detail)->update('detail_jk', ['bobot' => $bobot]);
    }
    public function ubahKr()
    {
        $id_kriteria = $this->input->post('id_kriteria', true);
        $kriteria = $this->input->post('kriteria', true);
        $jenis = $this->input->post('jenis', true);
        $this->db->where('id_kriteria', $id_kriteria)->update('kriteria', ['kriteria' => $kriteria]);
        $this->db->where('id_kriteria', $id_kriteria)->update('kriteria', ['jenis' => $jenis]);
    }

    public function ubahJn()
    {
        $id_jurusan = $this->input->post('id_jurusan', true);
        $jurusan = $this->input->post('jurusan', true);
        $this->db->where('id_jurusan', $id_jurusan)->update('jurusan', ['jurusan' => $jurusan]);
    }
    public function getsubkr()
    {

        $query = " SELECT `subkriteria`.*,.`jurusan`.`jurusan`,`kriteria`.`kriteria`,`detail_jk`.*
        FROM `subkriteria` 
        join `kriteria`
        on `subkriteria`.`id_kriteria`=`kriteria`.`id_kriteria`
        join `detail_jk` 
        on `detail_jk`.`id_kriteria`=`kriteria`.`id_kriteria`
        join `jurusan`
        on `detail_jk`.`id_jurusan`=`jurusan`.`id_jurusan`

        order by id_jurusan ASC ";
        return $this->db->query($query)->result_array();
    }
    
        public function test()
        {

            $query = " SELECT `subkriteria`.*,.`detail_sub`.`id_kriteria`,`detail_sub`.`id_subkriteria`,`kriteria`.`kriteria`,`detail_jk`.`id_kriteria`,`jurusan`.`jurusan`
            from `subkriteria` 
            join `detail_sub` 
            on
            `subkriteria`.`id_subkriteria`=`detail_sub`.`id_subkriteria`
            join `kriteria` 
            on `detail_sub`.`id_kriteria`=`kriteria`.`id_kriteria`
            join `detail_jk`
            on `kriteria`.`id_kriteria`=`kriteria`.`id_kriteria`
            join `jurusan`
            on `detail_jk`.`id_jurusan`=`jurusan`.`id_jurusan`
            where kriteria.id_kriteria=detail_sub.id_kriteria  and subkriteria.id_subkriteria=detail_sub.id_subkriteria 
            group by jurusan.id_jurusan,detail_sub.id_detail asc";
            
        return $this->db->query($query)->result_array();
        }

        public function getdetailsb()
        {
            $query = "SELECT `detail_sub`.*,.`kriteria`.`id_kriteria`,`kriteria`
            FROM `detail_sub`
            join `kriteria`
            on `detail_sub`.`id_kriteria`=`kriteria`.`id_kriteria`
            where detail_sub.id_kriteria = kriteria.id_kriteria";

            return $this->db->query($query)->result_array();

        }
       

    public function getBobotSK()
    {
        $query = " SELECT `keterangan`.*,.`range_penilaian`.`bobotsk`
        FROM `keterangan` join `range_penilaian`
        on `keterangan`.`id_bot`=`range_penilaian`.`id`";
        return $this->db->query($query)->result_array();
    }
    public function ubahKet()
    {
        $id_ket = $this->input->post('id_ket', true);
        $id_bot = $this->input->post('id_bot', true);
        $keterangan = $this->input->post('Keterangan', true);
        $range_nilai = $this->input->post('range_nilai', true);


        $this->db->where('id_ket', $id_ket)->update('keterangan', ['id_bot' => $id_bot]);
        $this->db->where('id_ket', $id_ket)->update('keterangan', ['Keterangan' => $keterangan]);
        $this->db->where('id_ket', $id_ket)->update('keterangan', ['range_nilai' => $range_nilai]);
    
    }
    
    public function ubahSub()
    {  
          $id_subkriteria = $this->input->post('id_subkriteria', true);
          $id_kriteria = $this->input->post('id_kriteria', true);
          $keterangan=   $this->input->post('keterangan', true);
        $range_nilai = $this->input->post('range_nilai', true);
        $bobotsk = $this->input->post('bobotsk', true);



        $this->db->where('id_subkriteria', $id_subkriteria)->update('subkriteria', ['keterangan' => $keterangan]);
        $this->db->where('id_subkriteria', $id_subkriteria)->update('subkriteria', ['range_nilai' => $range_nilai]);
        $this->db->where('id_subkriteria', $id_subkriteria)->update('subkriteria', ['bobotsk' => $bobotsk]);
        $this->db->where('id_subkriteria', $id_subkriteria)->update('detail_sub', ['id_kriteria' => $id_kriteria]);
      
    }

}
