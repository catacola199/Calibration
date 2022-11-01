<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Qrcode extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Qrcode');
		$this->load->model('M_Kalibrasi');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["qr"] = $this->M_Qrcode->getAlldata();
		$data["alat"] = $this->M_Kalibrasi->get_alat();
		$this->load->view("dashboard/qrcode", $data);
	}


	// Get Save User
	public function simpan_Qrcode()
	{
		$id = $this->input->post('id_alat');
		$dataalat = $this->M_Qrcode->getAlatID($id);
		$data =
			$dataalat->nama_alat . "  " .
			'dicobaaa';


		$qr = $this->generate_qrcode($data);

		$this->M_Qrcode->simpanDataQr($qr);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('qrcode'));
	}



	// Delete User akun
	public function delete_Qrcode($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Kalibrasi->del_alatkalibrasi($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('kalibrasis'));
		}
	}

	public function generate_qrcode($data)
	{
		/* Load QR Code Library */
		$this->load->library('ciqrcode');

		/* Data */
		$hex_data   = bin2hex($data);
		$save_name  = $hex_data . '.png';

		/* QR Code File Directory Initialize */
		$dir = 'upload/qrcode/';
		if (!file_exists($dir)) {
			mkdir($dir, 0775, true);
		}
		/* QR Configuration  */
		$config['cacheable']    = true;
		$config['imagedir']     = $dir;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(255, 255, 255);
		$config['white']        = array(255, 255, 255);
		$this->ciqrcode->initialize($config);

		/* QR Data  */
		$params['data']     = $data;
		$params['level']    = 'H';
		$params['size']     = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $save_name;

		$this->ciqrcode->generate($params);
		$id2 = $this->input->post('id_alat');
		$dataalat = $this->M_Qrcode->getAlatID($id2);
		$nama = $dataalat->nama_alat;
		/* Return Data */
		$return = array(
			'text' 		=> $nama,
			'file'      => $dir . $save_name
		);
		return $return;
	}

	public function download_qrcode($id)
	{
		$data = $this->db->get_where('tes_qrcode', ['id' => $id])->row();
		force_download($data->file, NULL);
	}
}
