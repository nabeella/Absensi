<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    public function get_absen($id_user, $bulan, $tahun)
    {
        $result = $this->db->query('SELECT DATE_FORMAT(tgl, "%d-%m-%Y") AS tgl, jam_masuk, jam_pulang, keterangan from absensi where id_pegawai='.$id_user.' and DATE_FORMAT(tgl, "%m") = '.$bulan.' and DATE_FORMAT(tgl, "%Y") = '.$tahun.'')->result_array();
        return $result;
    }

    public function jml_absenharian($id_user)
    {
        return $this->db->get_where('absensi', ['id_pegawai'=> $id_user, 'tgl'=> date('Y-m-d'),])->num_rows();
    }

    public function absenharian($id_user)
    {
        return $this->db->get_where('absensi', ['id_pegawai'=> $id_user, 'tgl'=> date('Y-m-d'),])->row_array();
    }

    public function semuaabsen($id_user)
    {
        return $this->db->get_where('absensi', ['id_pegawai'=> $id_user])->result_array();
    }

    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('id_pegawai', $id_user);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Absensi_model.php */