<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Izin_model extends CI_Model 
{
    public function get_izin($id_user, $bulan, $tahun) 
    {
        $result = $this->db->query('SELECT DATE_FORMAT(tanggal, "%d-%m-%Y") AS tanggal, nik, keterangan, konfirmasi from izin where nik='.$id_user.' and DATE_FORMAT(tanggal, "%m") = '.$bulan.' and DATE_FORMAT(tanggal, "%Y") = '.$tahun.'')->result_array();
        return $result;
    }

    public function jml_izinharian($id_user)
    {
        return $this->db->get_where('izin', ['nik'=> $id_user, 'tanggal'=> date('Y-m-d'),])->num_rows();
    }

    public function izinharian($id_user)
    {
        return $this->db->get_where('izin', ['nik'=> $id_user, 'tanggal'=> date('Y-m-d'),])->row_array();
    }

    public function semuaizin($id_user)
    {
        return $this->db->get_where('izin', ['nik'=> $id_user])->result_array();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('izin', $data);
        return $result;
    }

}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Absensi_model.php */