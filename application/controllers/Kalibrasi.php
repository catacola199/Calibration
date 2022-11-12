<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalibrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Kalibrasi');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["kalibrasi"] = $this->M_Kalibrasi->getAllKalbirasi();
		$data["alat"] = $this->M_Kalibrasi->get_alat();
		$this->load->view("dashboard/kalibrasi", $data);
	}


	// Get Save User
	public function save_kalibrasi()
	{
		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'tgl_kalibrasi'	    => $this->input->post('tgl_kalibrasi'),
			'lampiran'		    => $this->M_Kalibrasi->_uploadFileKalibrasi(),
			'quality_pass'	    => $this->input->post('quality_pass')

		);
		$this->M_Kalibrasi->simpandatakalbirasi($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('kalibrasis'));
	}

	// Edit User
	public function edit_kalibrasi($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["kalibrasi"] = $this->M_Kalibrasi->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_kalibrasi()
	{
		$id_file= $this->input->post('id_kalibrasi');

		$id = array(
			'id_kalibrasi' => $this->input->post('id_kalibrasi')
		);

		if (!empty($_FILES['lampiran']['name'])) {
			$this->M_Kalibrasi->_deleteFile($id_file);
			$update_file = $this->M_Kalibrasi->_uploadFileKalibrasi();
		} else {
			$update_file = $this->input->post('oldlampiran');
		}

		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'tgl_kalibrasi'	    => $this->input->post('tgl_kalibrasi'),
			'lampiran'		    => $update_file,
			'quality_pass'	    => $this->input->post('quality_pass')
		);
		$this->M_Kalibrasi->updatedatakalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('kalibrasis'));
	}

	// Delete User akun
	public function delete_kalibrasi($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Kalibrasi->del_kalibrasi($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('kalibrasis'));
		}
	}
}
