<?php

class Scan1 extends Ci_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_User');
		$this->load->model('M_AlatKalibrasi');
		$this->load->model('Scan_model');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function messageAlert($type, $title)
	{
		$messageAlert = "
			const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
			});

			Toast.fire({
					type: '" . $type . "',
					title: '" . $title . "'
			});
			";
		return $messageAlert;
	}

	function index()
	{
		$data["alat"] = $this->M_AlatKalibrasi->getAllKalbirasi();
		$data["role"] = $this->All_model->getAllRole();
		$this->load->view("dashboard/scan_v1",$data);
	}

	function cek_id()
	{
		$result_code = $this->input->post('id_alat');
		$cek_id = $this->Scan_model->cek_id($result_code);
		if(!$cek_id){
            $this->session->set_flashdata('error','Qrcode tidak ditemukan, coba lagi!!');
            redirect('scans');
        }else{
			// $this->session->set_flashdata('notif','Benar '.$result_code);
			$data["alat"] = $this->Scan_model->getDataAlat($result_code);
			$data["kalibrasi"] = $this->Scan_model->getDataKalibrasi($result_code);
			$data["pemeliharaan"] = $this->Scan_model->getDataPemeliharaan($result_code);
            $this->load->view("dashboard/h_scan", $data);
		}
	}
}
