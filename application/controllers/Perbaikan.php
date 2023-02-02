<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Perbaikan');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["perbaikan"] = $this->M_Perbaikan->getAllPerbaikan();
		$data["alat"] = $this->M_Perbaikan->get_alat();
		$data["lokasi"] = $this->M_Perbaikan->get_lokasi();
		$this->load->view("dashboard/perbaikan", $data);
	}

	public function user_kr()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["perbaikan"] = $this->M_Perbaikan->getAllPerbaikan();
		$data["alat"] = $this->M_Perbaikan->get_alat();
		$data["lokasi"] = $this->M_Perbaikan->get_lokasi();
		$this->load->view("dashboard/perbaikan_kr", $data);
	}
	public function user_sus()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["perbaikan"] = $this->M_Perbaikan->getAllPerbaikan();
		$data["alat"] = $this->M_Perbaikan->get_alat();
		$data["lokasi"] = $this->M_Perbaikan->get_lokasi();
		$this->load->view("dashboard/perbaikan_suster", $data);
	}

	public function proses($id = null)
	{
		$idp = array(
			'id_permohonan' => $id
		);
		$no_permohonan = $this->db->get_where('permohonan_perbaikan', ["id_permohonan" => $id])->row()->no_permohonan;
		$data = array(
			'status' => 'PROSES'
		);
		$this->M_Perbaikan->updatedataperbaikan($data, $idp);
		$this->session->set_flashdata('notif', 'Permohonan dengan nomor ' .$no_permohonan. ' segera diproses');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function selesai($id = null)
	{
		$idp = array(
			'id_permohonan' => $id
		);
		$no_permohonan = $this->db->get_where('permohonan_perbaikan', ["id_permohonan" => $id])->row()->no_permohonan;
		$data = array(
			'status' => 'SELESAI'
		);
		$this->M_Perbaikan->updatedataperbaikan($data, $idp);
		$this->session->set_flashdata('notif', 'Permohonan dengan nomor ' .$no_permohonan. ' selesai diproses');
		redirect($_SERVER['HTTP_REFERER']);
	}


	// Get Save User
	public function save_perbaikan()
	{
		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'no_permohonan'	    => $this->input->post('no_permohonan'),
			'pemohon'		    => $this->input->post('lokasi_alat'),
			'keterangan'	    => $this->input->post('keterangan'),
			'status'			=> "BARU"

		);
		$this->M_Perbaikan->simpandataperbaikan($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('perbaikans'));
	}

	// Edit User
	public function edit_perbaikan($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["perbaikan"] = $this->M_Perbaikan->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_perbaikan()
	{
		$id_file= $this->input->post('id_kalibrasi');

		$id = array(
			'id_kalibrasi' => $this->input->post('id_kalibrasi')
		);

		if (!empty($_FILES['lampiran']['name'])) {
			$this->M_Perbaikan->_deleteFile($id_file);
			$update_file = $this->M_Perbaikan->_uploadFileKalibrasi();
		} else {
			$update_file = $this->input->post('oldlampiran');
		}

		$data = array(
			'id_alat'	        => $this->input->post('id_alat'),
			'tgl_kalibrasi'	    => $this->input->post('tgl_kalibrasi'),
			'lampiran'		    => $update_file,
			'quality_pass'	    => $this->input->post('quality_pass')
		);
		$this->M_Perbaikan->updatedatakalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('perbaikans'));
	}

	// Delete User akun
	public function delete_perbaikan($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Perbaikan->del_perbaikan($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('perbaikans'));
		}
	}

	function nama_alat(){
		$lokasi = $this->input->post('id',TRUE);
		$data = $this->M_Perbaikan->nama_alat($lokasi)->result();
		echo json_encode($data);
	}
}
