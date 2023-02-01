<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Perbaikan extends CI_Model
{
    private $_table = "permohonan_perbaikan";

    public function getAllPerbaikan()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('permohonan_perbaikan', 'permohonan_perbaikan.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
    }

    public function simpandataperbaikan($data)
    {
        $this->db->insert('permohonan_perbaikan', $data);
        return TRUE;
    }

    public function _uploadFilePerbaikan()
    {
        $config['upload_path']          = './upload/perbaikan/file_lampiran/';
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
        return $this->db->get_where('permohonan_perbaikan', ['id_permohonan' => $id])->row();
    }

    public function _deleteFile($id)
    {
        $file = $this->getID($id);
        if ($file->lampiran != "default.pdf") {
            $filename = explode(".", $file->lampiran)[0];
            return array_map('unlink', glob(FCPATH."upload/perbaikan/file_lampiran/$filename.*"));
        }
    }
    public function del_perbaikan($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete('permohonan_perbaikan', array("id_permohonan" => $id));
    }

    public function updatedataperbaikan($data, $id)
    {
        
        $this->db->update('permohonan_perbaikan', $data, $id);
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
