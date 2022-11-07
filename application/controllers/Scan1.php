<?php

class Scan1 extends Ci_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_User');
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

		$this->load->view("dashboard/scan_v1");
	}

	function cek_id()
	{
		$user = $this->user;
		$result_code = $this->input->post('id_karyawan');
		$tgl = date('Y-m-d');
		$jam_klr = date('h:i:s');
		$jam_msk = date('h:i:s');
		$cek_id = $this->Scan_model->cek_id($result_code);
		$cek_abs_klr = $this->Scan_model->kar_abs_klr($result_code, $tgl);
		if (!$cek_id) {
?>
			<script>
				alert('Data tidak ditemukan , harap memasukan QR CODE sesuai NIK masing-masing!');
			</script> <?php
						$url = base_url() . 'scan1';
						$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal'));
						header("refresh:1;url=$url");
					} else if ($cek_abs_klr && $jam_msk != '00:00:00') { ?>
			<script>
				alert('Selamat tinggal ');
			</script> <?php
						$this->Scan_model->kar_abs_klr($result_code, $tgl);
						$url = base_url() . 'scan1';
						$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen pulang'));

						header("refresh:1;url=$url");
					} else if ($cek_id) { ?>
			<script>
				alert('kehadiran telah di input');
			</script> <?php
						$this->Scan_model->kar_abs_msk($result_code);
						$url = base_url() . 'scan1';
						$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen masuk'));
						header("refresh:1;url=$url");
					}
				}
			}
