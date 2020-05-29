<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata['status']!='login')
		{
			redirect(base_url('login'));
		}
		$this->load->model('MAdmin');
	}
	public function index()
	{
        $this->load->view('scan');
	}
	function tambahPresensi()
	{
		$post = $this->input->post();
		$where_cek = array(
			'noTiket' => $post['qrcode']
		);
		$cek_peserta = $this->MAdmin->select_where('peserta', $where_cek)->num_rows();
		$cek_presensi = $this->MAdmin->select_where('kehadiran', $where_cek)->num_rows();
		$waktuSekarang = date("h:i:sa");
		$idUser = $this->session->userdata['id'];
		if($cek_peserta<1)
		{
			redirect(base_url('scan?note=3&&no='.$post['qrcode']));
		}
		else
		{
			if($cek_presensi>=1)
			{
				redirect(base_url('scan?note=1&&no='.$post['qrcode']));
			}
			else
			{
				$data = array(
					'noTiket' => $post['qrcode'],
					'waktu' => $waktuSekarang,
					'idPanitia' => $idUser
				);
				$this->MAdmin->insert_data('kehadiran', $data);
				redirect(base_url('scan?note=2&&no='.$post['qrcode']));
			}
		}
	}
}