<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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
		if($this->session->userdata('status') != 'login' || ($this->session->userdata('level') != 3 && $this->session->userdata('level') != 1))
		{
			redirect(base_url('login/logout'));
		}
		$this->load->model('MAdmin');
	}
	public function index()
	{
		$data['dataPesertaPembayaran'] = $this->MAdmin->select_select_sum_join_2table_type('peserta.id, peserta.nama, peserta.noHp, peserta.noTiket', 'pembayaran.angsuran', 'peserta', 'pembayaran', 'peserta.id = pembayaran.idUser', 'left', 'peserta.id')->result_array();
		$whareHargaTiket = array(
			'keterangan' => 'hargaTiket'
		);
		$data['dataNominalUmum'] = $this->MAdmin->select_where('nominalUmum', $whareHargaTiket)->row();
		
		
		if($this->session->userdata('level') == 1)
		{
			$this->load->view('layout/header');
		}
		elseif($this->session->userdata('level') == 2)
		{
			$this->load->view('layout/headerUser');
		}
		else
		{
			$this->load->view('layout/headerKeuangan');
		}
        $this->load->view('pembayaran', $data);
        $this->load->view('layout/footer');
	}
	function aksi_edit_hargaTiket()
	{
		$post = $this->input->post();
		$set = array(
			'nominal' => $post['nominal']
		);
		$where = array(
			'keterangan' => 'hargaTiket'
		);
		$this->MAdmin->update_data('nominalUmum', $set, $where);

		redirect(base_url('pembayaran'));
	}
	function aksiTambahAngsuran()
	{
		$post = $this->input->post();

		$tglNow = date('Ymd');
		$table = $post['table'];
		$data = array(
			'angsuran' => $post['nominal'],
			'tgl' => $tglNow,
			'idUser' => $post['idUser']
		);
		$this->MAdmin->insert_data($table, $data);

		if($table==pembayaran)
		{
			redirect(base_url('pembayaran'));
		}
		else
		{
			redirect(base_url('pembayaran/panitia'));
		}
	}
	public function info($id)
	{
		$get = $this->input->get();
		$table = $get['pos'];

		if($table == 'peserta')
		{
			$wherePeserta = array(
				'peserta.id' => $id
			);
			$wherePembayaran = array(
				'idUser' => $id
			);
			$data['dataUser'] = $this->MAdmin->select_select_where_join_2table_type('peserta.nama, peserta.noHp, peserta.kategori, peserta.institut, peserta.noTiket, peserta.tglInput, user.nama as namaPanitia', 'peserta', 'user', 'peserta.idPanitia = user.id', $wherePeserta, 'left')->row();
			$data['dataInfoPembayaran'] = $this->MAdmin->select_where('pembayaran', $wherePembayaran)->result();
			$whereHargaTiket = array(
				'keterangan' => 'hargaTiket'
			);
			$data['dataHargaTiket'] = $this->MAdmin->select_where('nominalUmum', $whereHargaTiket)->row();
		}
		elseif($table == 'panitia')
		{
			$whereUser = array(
				'user.id' => $id
			);
			$wherePembayaran = array(
				'idUser' => $id
			);
			$data['dataUser'] = $this->MAdmin->select_select('nama, username, posisi, level', 'user')->row();
			$data['dataInfoPembayaran'] = $this->MAdmin->select_where('pembayaranpanitia', $wherePembayaran)->result();
		}
		if($this->session->userdata('level') == 1)
		{
			$this->load->view('layout/header');
		}
		elseif($this->session->userdata('level') == 2)
		{
			$this->load->view('layout/headerUser');
		}
		else
		{
			$this->load->view('layout/headerKeuangan');
		}
		$this->load->view('pembayaraninfo', $data);
		$this->load->view('layout/footer');
	}
	public function panitia()
	{
		$data['dataUserPembayaran'] = $this->MAdmin->select_select_sum_join_2table_type('user.id, user.nama, user.username, user.level', 'pembayaranpanitia.angsuran', 'user', 'pembayaranpanitia', 'user.id = pembayaranpanitia.idUser', 'left', 'user.id')->result_array();
		if($this->session->userdata('level') == 1)
		{
			$this->load->view('layout/header');
		}
		elseif($this->session->userdata('level') == 2)
		{
			$this->load->view('layout/headerUser');
		}
		else
		{
			$this->load->view('layout/headerKeuangan');
		}
		$this->load->view('pembayaranPanitia', $data);
		$this->load->view('layout/footer');
	}
}