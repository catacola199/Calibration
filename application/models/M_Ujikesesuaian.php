<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Ujikesesuaian extends CI_Model
{
    private $_table = "alat_kalibrasi";

    public function getAllUkes()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('ukes', 'ukes.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
    }

    public function save_ukes($data)
    {
        $this->db->insert('ukes', $data);
        return TRUE;
    }

    public function _uploadFileKalibrasi()
    {
        $config['upload_path']          = './upload/kalibrasi/file_lampiran/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        //$config['file_name']            = $this->input->post('nama_alat');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lampiran')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }


    public function getID($id)
    {
        return $this->db->get_where('ukes', ['id_ukes' => $id])->row();
    }

    public function _deleteFile($id)
    {
        $file = $this->getID($id);
        if ($file->lampiran != "default.pdf") {
            $filename = explode(".", $file->lampiran)[0];
            return array_map('unlink', glob(FCPATH . "upload/kalibrasi/file_lampiran/$filename.*"));
        }
    }
    public function del_kalibrasi($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete('ukes', array("id_ukes" => $id));
    }

    public function updatedatakalibrasi($data, $id)
    {

        $this->db->update('ukes', $data, $id);
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

    function nama_alat($lokasi)
    {
        $this->db->select('id_alat,nama_alat,lokasi_alat,noseri_alat');
        $this->db->group_by('noseri_alat');
        $query = $this->db->get_where('alat_kalibrasi', array('lokasi_alat' => $lokasi));
        return $query;
    }
}
