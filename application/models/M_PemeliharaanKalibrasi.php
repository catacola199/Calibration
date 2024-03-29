<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_PemeliharaanKalibrasi extends CI_Model
{


    public function getAllPemeliharaan()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('p_kalibrasi', 'p_kalibrasi.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
    }

    public function simpandatapemeliharaan($data)
    {
        $this->db->insert('p_kalibrasi', $data);
        return TRUE;
    }

    public function getID($id)
    {
        return $this->db->get_where('p_kalibrasi', ['id_pemeliharaan' => $id])->row();
    }

    public function del_pemeliharaan($id)
    {
        return $this->db->delete('p_kalibrasi', array("id_pemeliharaan" => $id));
    }

    public function updatedatapemeliharaan($data, $id)
    {
        $this->db->update('p_kalibrasi', $data, $id);
        return TRUE;
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

    function nama_alat($lokasi){
		$this->db->select('id_alat,nama_alat,lokasi_alat,noseri_alat');
		$this->db->group_by('noseri_alat');
		$query = $this->db->get_where('alat_kalibrasi', array('lokasi_alat' => $lokasi));
		return $query;
	}
}
