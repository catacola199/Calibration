<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_AlatKalibrasi extends CI_Model
{
    private $_table = "alat_kalibrasi";

    public function getAllKalbirasi()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllAlat()
    {
        $sql = "SELECT alat_kalibrasi.id_alat,alat_kalibrasi.nama_alat,alat_kalibrasi.merk_alat, alat_kalibrasi.tipe_alat,alat_kalibrasi.noseri_alat,alat_kalibrasi.lokasi_alat,alat_kalibrasi.tglpengadaan_alat, 
        max(str_to_date(t_kalibrasi.tgl_kalibrasi,'%d/%m/%Y')) as tanggal,t_kalibrasi.quality_pass, t_kalibrasi.lampiran 
        from alat_kalibrasi left join t_kalibrasi on alat_kalibrasi.id_alat = t_kalibrasi.id_alat GROUP by alat_kalibrasi.nama_alat ;";
        return $this->db->query($sql)->result();
    }

    public function simpandatakalbirasi($data)
    {
        $this->db->insert('alat_kalibrasi', $data);
        return TRUE;
    }

    public function _uploadFileKalbirasi()
    {
        $config['upload_path']          = './upload/kalbirasi/file_lampiran/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_lampiran')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }


    public function getID($id)
    {
        return $this->db->get_where('alat_kalibrasi', ['id_alat' => $id])->row();
    }

    public function _deleteFile($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->file_brosur != "default.pdf") {
            $filename = explode(".", $brosur->file_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/kalbirasi/file/$filename.*"));
        }
    }
    public function del_alatkalibrasi($id)
    {

        $this->_deleteFile($id);
        return $this->db->delete('alat_kalibrasi', array("id_alat" => $id));
    }

    public function updatedataalatkalibrasi($data, $id)
    {
        $this->db->update('alat_kalibrasi', $data, $id);
        return TRUE;
    }
}
