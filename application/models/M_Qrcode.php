<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Qrcode extends CI_Model
{
    private $_table = "qr_code";
    private $_alat = "alat_kalibrasi";
    public function getAlldata()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('qr_code', 'qr_code.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
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
