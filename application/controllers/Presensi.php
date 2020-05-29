<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Presensi extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata['status']!="login")
		{
			redirect(base_url('login/logout'));
		}
		$this->load->model('MAdmin');

	}
	public function index()
	{
		$data['dataPresensi'] = $this->MAdmin->select_select_join_3table_type('kehadiran.id as idKehadiran, peserta.id as idPeserta, peserta.nama as namaPeserta, peserta.noTiket, kehadiran.waktu, user.nama as namaPanitia', 'peserta', 'kehadiran', 'peserta.noTiket = kehadiran.noTiket', 'left', 'user', 'kehadiran.idPanitia = user.id', 'left')->result();
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
        $this->load->view('presensi', $data);
        $this->load->view('layout/footer');
	}
	function cetak()
	{
		
		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$spreadsheet->getProperties()
			->setTitle("Laporan Presensi Acara");

		$sheet = $spreadsheet->getActiveSheet();
		//setting the default row height
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		//Merge Cell for header/title
		$sheet->mergeCells('A1:D1');
		$sheet->mergeCells('I1:K1');
		//settingstyle
		$sheet->getStyle('A1')->getFont()->setName('Times New Roman');
		$sheet->getStyle('I1')->getFont()->setName('Times New Roman');
		$sheet->getStyle('A1')
			->getAlignment()->setHorizontal('center');
		$sheet->getStyle('I1')
			->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:D3')
			->getAlignment()->setHorizontal('center');
		$sheet->getStyle('I3:K3')
			->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1')->getFont()->setBold('bold');
		$sheet->getStyle('I1')->getFont()->setBold('bold');
		$sheet->getStyle('A3:D3')->getFont()->setBold('bold');
		$sheet->getStyle('I3:K3')->getFont()->setBold('bold');
		$sheet->getStyle('A1')->getFont()->setSize(12);
		$sheet->getStyle('I1')->getFont()->setSize(12);
		$sheet->getStyle('A3:D3')
			->getFont()->setSize(12);
		$sheet->getStyle('I3:K3')
			->getFont()->setSize(12);
		// manually set table data value
		$sheet->setCellValue('A1', 'DAFTAR KEHADIRAN PESERTA');
        $sheet->setCellValue('A3', 'No.'); 
        $sheet->setCellValue('B3', 'Nama Lengkat');
		$sheet->setCellValue('C3', 'Nomor Tiket');
		$sheet->setCellValue('D3', 'Jam Datang');
		
		$sheet->setCellValue('I1', 'DAFTAR ABSENSI PESERTA');
		$sheet->setCellValue('I3', 'No.');
		$sheet->setCellValue('J3', 'Nama Lengkap');
		$sheet->setCellValue('K3', 'Nomor Tiket');

		$dataUserPresensi = $this->MAdmin->select_select_join_2table_type('peserta.nama, peserta.noTiket, kehadiran.waktu', 'peserta', 'kehadiran', 'peserta.noTiket = kehadiran.noTiket', 'left')->result();

		$rowData1 = 4;
		$no1 = 1;
		foreach($dataUserPresensi as $dataPresensi)
		{
			if($dataPresensi->waktu == null)
			{
				continue;
			}
			$sheet->setCellValue('A'.$rowData1, $no1.'. ');
			$sheet->setCellValue('B'.$rowData1, $dataPresensi->nama);
			$sheet->setCellValue('C'.$rowData1, $dataPresensi->noTiket);
			$sheet->setCellValue('D'.$rowData1, $dataPresensi->waktu);
			$rowData1++;
			$no1++;
		}
		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => 'FF000000'],
				],
			],
		];
		$rowData1 = $rowData1-1;
		$sheet->getStyle('A3:D'.$rowData1)->applyFromArray($styleArray);
		$rowData2 = 4;
		$no2 = 1;
		foreach($dataUserPresensi as $dataAbsensi)
		{
			if($dataAbsensi->waktu != null)
			{
				continue;
			}
			$sheet->setCellValue('I'.$rowData2, $no2.'. ');
			$sheet->setCellValue('J'.$rowData2, $dataAbsensi->nama);
			$sheet->setCellValue('K'.$rowData2, $dataAbsensi->noTiket);
			$rowData2++;
			$no2++;
		}
		$rowData2 = $rowData2-1;
		$sheet->getStyle('I3:K'.$rowData2)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'list-of-jaegers'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file 
	}
}