<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujikesesuaian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Ujikesesuaian');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["ukes"] = $this->M_Ujikesesuaian->getAllUkes();
		$data["alat"] = $this->M_Ujikesesuaian->get_alat();
		$data["lokasi"] = $this->M_Ujikesesuaian->get_lokasi();

		$this->load->view("dashboard/ujikesesuaian", $data);
	}


	// Get Save User
	public function save_ukes()
	{
		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'tgl_ukes'		    => $this->input->post('tgl_ukes'),
			'lampiran'		    => $this->M_Ujikesesuaian->_uploadFileKalibrasi(),
			'quality_pass'	    => $this->input->post('quality_pass')

		);
		$this->M_Ujikesesuaian->save_ukes($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('ukes'));
	}

	// Edit User
	public function edit_kalibrasi($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["kalibrasi"] = $this->M_Ujikesesuaian->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_ukes()
	{
		$id_file = $this->input->post('id_ukes');

		$id = array(
			'id_ukes' => $this->input->post('id_ukes')
		);

		if (!empty($_FILES['lampiran']['name'])) {
			$this->M_Ujikesesuaian->_deleteFile($id_file);
			$update_file = $this->M_Ujikesesuaian->_uploadFileKalibrasi();
		} else {
			$update_file = $this->input->post('oldlampiran');
		}

		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'tgl_kalibrasi'	    => $this->input->post('tgl_kalibrasi'),
			'lampiran'		    => $update_file,
			'quality_pass'	    => $this->input->post('quality_pass')
		);
		$this->M_Ujikesesuaian->updatedatakalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('ukes'));
	}

	// Delete User akun
	public function delete_kalibrasi($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Ujikesesuaian->del_kalibrasi($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('kalibrasis'));
		}
	}

	function nama_alat()
	{
		$lokasi = $this->input->post('id', TRUE);
		$data = $this->M_Ujikesesuaian->nama_alat($lokasi)->result();
		echo json_encode($data);
	}
}
