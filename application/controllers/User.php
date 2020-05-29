<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		if($this->session->userdata('status')!='login' || $this->session->userdata('level') != 1)
		{
			redirect(base_url('login/logout'));
		}
		$this->load->model('MAdmin');
	}
	public function index()
	{
		$data['dataUser'] = $this->MAdmin->select_select('id, nama, username, posisi, level','user')->result();
		

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
        $this->load->view('user', $data);
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
		$this->load->view('usertambah');
		$this->load->view('layout/footer');
	}
	function tambahAksi()
	{
		$post = $this->input->post();
		
		$mdPassword = md5($post['password']);
		$data = array(
			'nama' => $post['nama'],
			'username' => $post['username'],
			'password' => $mdPassword,
			'posisi' => $post['posisi'],
			'level' => $post['level']
		);
		$this->MAdmin->insert_data('user', $data);
		
		redirect(base_url('user'));
	}
	public function edit($id)
	{
		$whereEdit = array(
			'id' => $id
		);

		$data['dataEditUser'] = $this->MAdmin->select_select_where('id, nama, username, posisi, level, password', 'user', $whereEdit)->row();
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
		$this->load->view('useredit', $data);
		$this->load->view('layout/footer');
	}
	function editAksi()
	{
		$post = $this->input->post();

		if($post['passwordBaru']==null)
		{
			$password = $post['passwordLama'];
		}
		else
		{
			$password = md5($post['passwordBaru']);
		}

		$where = array(
			'id' => $post['id']
		);
		$set = array(
			'nama' => $post['nama'],
			'username' => $post['username'],
			'password' => $password,
			'posisi' => $post['posisi'],
			'level' => $post['level']
		);
		$this->MAdmin->update_data('user', $set, $where);

		redirect(base_url('user'));
	}
	public function hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$this->MAdmin->delete_data('user', $where);

		redirect(base_url('user'));
	}
}
