<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('MLogin');
	}
	public function index()
	{
		$data = 0;
		$get = $this->input->get();
		if(isset($get['ps']))
		{
			switch($get['ps'])
			{
				case 1:
					$pesan = "<strong>Username</strong> dan <strong>password</strong> belum diisi";
					break;
				case 2:
					$pesan = "<strong>Username</strong> dan <strong>password</strong> tidak cocok dengan data manapun";
					break;
			}
			$data = array(
				'pesan' => $pesan
			);
		}
		$this->load->view('login', $data);
	}
	function aksiLogin()
	{
		$username = $this->input->post("username");
		$pass = $this->input->post("password");
		if($username=="" || $pass=="")
		{
			redirect(base_url("login?ps=1"));
		}
		else
		{
			$md_pass = md5($pass);

			$where = array(
				'username' => $username,
				'password' => $md_pass
			);

			$cek_login = $this->MLogin->cek_login('user', $where);
			$data_user = $this->MLogin->select_where('user', $where)->result_array();

			if($cek_login)
			{
				foreach($data_user as $a)
				{
					$id_user = $a['id'];
					$level = $a['level'];
					$nama = $a['nama'];
				}
				$data_session = array(
					'status' => "login",
					'id' => $id_user,
					'level' => $level,
					'nama' => $nama
				);
				$this->session->set_userdata($data_session);
				redirect(base_url());
			}
			else
			{
				redirect(base_url("login?ps=2"));
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
