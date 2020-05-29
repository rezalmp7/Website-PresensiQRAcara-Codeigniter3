<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

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
		if($this->session->userdata('status') != 'login' || $this->session->userdata('level') != 1)
		{
			redirect(base_url('login/logout'));
		}
		$this->load->model('MAdmin');
	}
	
	public function index()
	{
		$data['dataPeserta'] = $this->MAdmin->select_select('nama, noHp, kategori, noTiket, id', 'peserta')->result();

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
        $this->load->view('peserta', $data);
        $this->load->view('layout/footer');
	}
	public function info($id)
	{
		$wherePeserta = array(
			'peserta.id' => $id
		);
		$data['dataPeserta'] = $this->MAdmin->select_select_where_join_2table_type('peserta.nama as pNama, peserta.kategori, peserta.noHp, peserta.institut, peserta.noTiket, user.nama as uNama, peserta.tglInput', 'peserta', 'user', 'peserta.idPanitia = user.id', $wherePeserta, 'left')->row(); 
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
		$this->load->view('pesertainfo', $data);
		$this->load->view('layout/footer');
	}
	public function tambah()
	{
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
		$this->load->view('pesertatambah');
		$this->load->view('layout/footer');
	}
	function tambahAksi()
	{
		$post = $this->input->post();
		$tglNow = date('Ymd');
		$idPanitia = $this->session->userdata['id'];

		$data = array(
			'nama' => $post['nama'],
			'noHp' => $post['noHp'],
			'kategori' => $post['kategori'],
			'institut' => $post['institut'],
			'noTiket' => $post['noTiket'],
			'idPanitia' => $idPanitia,
			'tglInput' => $tglNow
		);

		$this->MAdmin->insert_data('peserta', $data);
		redirect(base_url('peserta'));
	}
	public function edit($id)
	{
		$where = array(
			'id' => $id
		);
		$data['dataPeserta'] = $this->MAdmin->select_where('peserta', $where)->row();

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
		$this->load->view('pesertaedit', $data);
		$this->load->view('layout/footer');
	}
	function editAksi()
	{
		$post = $this->input->post();
		$set = array(
			'nama' => $post['nama'],
			'noHp' => $post['noHp'],
			'kategori' => $post['kategori'],
			'institut' => $post['institut'],
			'noTiket' => $post['noTiket']
		);
		$where = array(
			'id' => $post['id']
		);
		$this->MAdmin->update_data('peserta', $set, $where);
		redirect(base_url('peserta'));

	}
	function hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$this->MAdmin->delete_data('peserta', $where);
		redirect(base_url('peserta'));
	}
}