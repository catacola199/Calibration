<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemeliharaanKalibrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_PemeliharaanKalibrasi');
		$this->load->model('M_Kalibrasi');
		$data["alat"] = $this->M_Kalibrasi->get_alat();
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["pemeliharaan"] = $this->M_PemeliharaanKalibrasi->getAllPemeliharaan();
		$data["alat"] = $this->M_Kalibrasi->get_alat();
		$this->load->view("dashboard/pemeliharaankalibrasi", $data);
	}

	// Get Save User
	public function save_pemeliharaan()
	{
		$data = array(
			'id_alat'	      	  	 => $this->input->post('id_alat'),
			'tgl_pemeliharaan'	  	 => $this->input->post('tgl_pemeliharaan'),
			'petugas'	   			 => $this->input->post('nama_petugas')
		);
		$this->M_PemeliharaanKalibrasi->simpandatapemeliharaan($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('pemeliharaankalibrasis'));
	}

	// Edit User
	public function edit_pemeliharaan($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["alat_kalibrasi"] = $this->M_PemeliharaanKalibrasi->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_pemeliharaan()
	{
		$id = array(
			'id_pemeliharaan'	   	 => $this->input->post('id_pemeliharaan')
		);

		$data = array(
			'id_alat' 				 => $this->input->post('id_alat'),
			'tgl_pemeliharaan'	  	 => $this->input->post('tgl_pemeliharaan'),
			'petugas'	   			 => $this->input->post('nama_petugas')
		);
		$this->M_PemeliharaanKalibrasi->updatedatapemeliharaan($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('pemeliharaankalibrasis'));
	}

	// Delete User akun
	public function delete_pemeliharaan($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_PemeliharaanKalibrasi->del_pemeliharaan($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('pemeliharaankalibrasis'));
		}
	}
}
