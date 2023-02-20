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
        return $this->db->get_where($this->_table, ['id_qr' => $id])->row();
    }

    public function getAlatID($id)
    {
        return $this->db->get_where($this->_alat, ['id_alat' => $id])->row();
    }

    public function getAllKalbirasi()
    {
        return $this->db->get($this->_alat)->result();
    }
    public function delete_Qrcode($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete('qr_code', array("id_qr" => $id));
    }
    public function _deleteFile($id)
    {
        $file = $this->getID($id);
        if ($file->file_qr != "default.pdf") {
            $filename = explode(".", $file->file_qr)[0];
            return array_map('unlink', glob(FCPATH . "upload/qrcode/$filename.*"));
        }
    }
    public function get_alat()
    {
        $query = $this->db->get('alat_kalibrasi');
        return $query->result_array();
    }

    public function get_lokasi()
    {
        $this->db->distinct();
        $this->db->select('lokasi_alat');
        $query = $this->db->get('alat_kalibrasi');
        return $query->result_array();
    }

    function nama_alat($lokasi)
    {
        $this->db->select('id_alat,nama_alat,lokasi_alat,noseri_alat');
        $this->db->group_by('noseri_alat');
        $query = $this->db->get_where('alat_kalibrasi', array('lokasi_alat' => $lokasi));
        return $query;
    }
}
