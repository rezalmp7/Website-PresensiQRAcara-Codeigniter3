<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		if($this->session->userdata('status') != "login")
		{
			redirect(base_url('login/logout'));
		}
		$this->load->model('MAdmin');
	}
	public function index()	
	{
		/*--
		||------------Data Table Atas------------||
		--*/
		
		$data['dataPeserta'] = $this->MAdmin->select_all('peserta')->num_rows();
		$data['dataPembayaran'] = $this->MAdmin->select_select_sum_join_2table_type('peserta.id, peserta.nama, peserta.noHp, peserta.noTiket', 'pembayaran.angsuran', 'peserta', 'pembayaran', 'peserta.id = pembayaran.idUser', 'left', 'peserta.id')->result_array();
		$whareHargaTiket = array(
			'keterangan' => 'hargaTiket'
		);
		$data['dataNominalUmum'] = $this->MAdmin->select_where('nominalUmum', $whareHargaTiket)->row();
		$data['dataPresensi'] = $this->MAdmin->select_all('kehadiran')->num_rows();
		
		/*--
		||------------/Data Table Atas-----------||
		--*/


		/*--
		||----------Chart Data Pertanggal----------||
		--*/
		//Mengambil data tanggal
		$date = date('Y-m-d');
		$date1 = date('Y-m-d', strtotime('-1 days', strtotime($date)));
		$date2 = date('Y-m-d', strtotime('-2 days', strtotime($date)));
		$date3 = date('Y-m-d', strtotime('-3 days', strtotime($date)));
		//membuat variable where
		$whereTglNow = array(
			'tglInput' => $date
		);
		$whereTgl1 = array(
			'tglInput' => $date1
		);
		$whereTgl2 = array(
			'tglInput' => $date2
		);
		$whereTgl3 = array(
			'tglInput' => $date3
		);
		$data['date1'] = date('d', strtotime('-1 days', strtotime($date)));
		$data['date2'] = date('d', strtotime('-2 days', strtotime($date)));
		$data['date3'] = date('d', strtotime('-3 days', strtotime($date)));
		//mengambil database
		$dataTglNowRs = $this->MAdmin->select_where('peserta', $whereTglNow)->result();
		$dataTgl1Rs = $this->MAdmin->select_where('peserta', $whereTgl1)->result();
		$dataTgl2Rs = $this->MAdmin->select_where('peserta', $whereTgl2)->result();
		$dataTgl3Rs = $this->MAdmin->select_where('peserta', $whereTgl3)->result();
		//Membuat variabel untuk view
		$data['dataTglNow'] = count($dataTglNowRs);
		$data['dataTgl1'] = count($dataTgl1Rs);
		$data['dataTgl2'] = count($dataTgl2Rs);
		$data['dataTgl3'] = count($dataTgl3Rs);

		/*--
		||-----------Chart Data Kategori----------||
		--*/
		//membuat variable where
		$whereUmum = array(
			'kategori' => 'umum'
		);
		$whereMahasiswa = array(
			'kategori' => 'mahasiswa'
		);
		//mengambil database
		$dataKtgrUmumRs = $this->MAdmin->select_where('peserta', $whereUmum)->result();
		$dataKtgrMahasiswaRs = $this->MAdmin->select_where('peserta', $whereMahasiswa)->result(); 
		//membuat variable count untuk view
		$data['dataKtgrUmum'] = count($dataKtgrUmumRs);
		$data['dataKtgrMahasiswa'] = count($dataKtgrMahasiswaRs);
		/*--
		||----------/Chart Data Kategori----------||
		--*/

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
        $this->load->view('dashboard', $data);
	}
}
