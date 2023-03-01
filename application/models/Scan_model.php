<?php

class Scan_model extends Ci_Model
{

  function cek_id($id_alat)
  {
    $query_str = "SELECT * FROM alat_kalibrasi WHERE id_alat= ? ";
    $result = $this->db->query($query_str, array($id_alat));
    if ($result->num_rows() == 1) {
      return $result->row(0)->id_alat;
    } else {
      return false;
    }
  }
  public function getDataAlat($id_alat)
  {
    return $this->db->get_where('alat_kalibrasi', ['id_alat' => $id_alat])->row();
  }

  public function getDataKalibrasi($id_alat)
  {
    $this->db->select('*');
    $this->db->from('t_kalibrasi');
    $this->db->where('t_kalibrasi.id_alat = alat_kalibrasi.id_alat');
    $query = $this->db->get_where('alat_kalibrasi', ['alat_kalibrasi.id_alat' => $id_alat]);
    return  $query->result();
  }

  public function getDataUkes($id_alat)
  {
    $this->db->select('*');
    $this->db->from('ukes');
    $this->db->where('ukes.id_alat = alat_kalibrasi.id_alat');
    $query = $this->db->get_where('alat_kalibrasi', ['alat_kalibrasi.id_alat' => $id_alat]);
    return  $query->result();
  }

  public function getDataPemeliharaan($id_alat)
  {
    $this->db->select('*');
    $this->db->from('p_kalibrasi');
    $this->db->where('p_kalibrasi.id_alat = alat_kalibrasi.id_alat');
    $query = $this->db->get_where('alat_kalibrasi', ['alat_kalibrasi.id_alat' => $id_alat]);
    return  $query->result();
  }
}
