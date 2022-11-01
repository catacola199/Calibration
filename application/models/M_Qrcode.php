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

    public function getAlatID($id)
    {
        return $this->db->get_where($this->_alat, ['id_alat' => $id])->row();
    }

    public function getAllKalbirasi()
    {
        return $this->db->get($this->_alat)->result();
    }
}
