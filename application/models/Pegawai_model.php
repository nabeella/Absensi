<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Pegawai_model extends CI_Model
{
    public function get_all()
    {
        $result = $this->db->get('data_pegawai');
        return $result->result();
    }

    public function find($id)
    {
        $this->db->where('id_pegawai', $id);
        $result = $this->db->get('data_pegawai');
        return $result->row();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('data_pegawai', $data);
        return $result;
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_pegawai', $id);
        $result = $this->db->update('data_pegawai', $data);
        return $result;
    }

    public function delete_data($id)
    {
        $this->db->where('id_pegawai', $id);
        $result = $this->db->delete('data_pegawai');
        return $result;
    }
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Karyawan_model.php */