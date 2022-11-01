<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Qrcode extends CI_Model
{
    private $_table = "tes_qrcode";
    private $_alat = "alat_kalibrasi";
    public function getAlldata()
    {
        return $this->db->get($this->_table)->result();
    }

    public function simpanDataQr($qr)
    {
        $this->db->insert($this->_table, $qr);
        return TRUE;
    }

    public function getID($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function getAllDatas()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('p_kalibrasi', 'p_kalibrasi.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
    }
    public function getAllKalbirasi()
    {
        return $this->db->get($this->_alat)->result();
    }
}
