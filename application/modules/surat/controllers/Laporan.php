<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}

		$this->load->model("ModelLaporan");
	}

	public function index()
	{
		$data['js'] = array(
			"https://raw.githubusercontent.com/mgalante/jquery.redirect/master/jquery.redirect.js",
			"assets/js/download.js",
			"assets/app/surat/laporan_surat.js"
		);

		$data['expand'] = 'laporan';
		$data['active'] = 'laporan';

		$this->load->view("include/header", $data);
		$this->load->view("laporan");
		$this->load->view("include/footer");
	}

	public function get_datatables()
	{
		$data["draw"] 			 = intval($this->input->post("draw"));
		$data["recordsTotal"] 	 = $this->ModelLaporan->count_total();
		$data["recordsFiltered"] = $this->ModelLaporan->count_filtered();

		$laporan = $this->ModelLaporan->get_datatables();

		$datatable = array();
		foreach ($laporan as $surat) {
			$surat["sec_id"] = encrypt_url($surat["id"]);
			$datatable[] = $surat;
		}
		$data["data"]	= $datatable;
		echo (json_encode($data));
	}

	public function generate_pdf()
	{
		// print("Page of Generate PDF Report");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

		$html = "";
		$html .= "<table>";
		$html .= "<tr style='margin-bottom: 10px;'>";
		$html .= "<td width='30%'><img width='60px' style='margin-bottom: 10px; margin-left:20px' src='" . base_url() . "/assets/images/logo-dprd-prov.png'/></td>";
		$html .= "<td width='70%' style='text-align: center'><h3>Laporan Surat <p>Unit Pengolah Bidang Pembinaan dan Pengawasan Kearsipan</p></h3></td>";
		$html .= "</tr>";
		$html .= "</table>";
		$laporan = $this->ModelLaporan->get_datatables();
		$html .= "<table border='1'>";
		$html .= "<tr>";
		$html .= "<th>No</th>";
		$html .= "<th>Nomor Surat</th>";
		$html .= "<th>Tipe Surat</th>";
		$html .= "<th>Isi</th>";
		$html .= "<th>Diterima</th>";
		$html .= "<th>Kecepatan</th>";
		$html .= "<th>Sifat Surat</th>";
		// $html .= "<th>Nomor Agenda</th>";
		$html .= "<th>Status Surat</th>";
		$html .= "<th>Asal Surat</th>";
		$html .= "<th>Tujuan Surat</th>";
		$html .= "</tr>";
		$no = 1;
		foreach ($laporan as $surat) {

			$html .= "<tr>";
			$html .= "<td>" . $no++ . "</td>";
			$html .= "<td>" . $surat['nomor_surat'] . '<br>' . convertTanggal(date('Y-m-d', strtotime($surat['tanggal_surat']))) . "</td>";
			$html .= "<td>" . $surat['tipe_surat'] . "</td>";
			$html .= "<td>" . $surat['isi'] . "</td>";
			$html .= "<td>" . convertTanggal(date('Y-m-d', strtotime($surat['tanggal_diterima']))) . "</td>";
			$html .= "<td>" . $surat['kecepatan_surat'] . "</td>";
			$html .= "<td>" . $surat['sifat_surat'] . "</td>";
			// $html .= "<td>" . $surat['nomor_agenda'] . "</td>";
			$html .= "<td>" . $surat['status_surat'] . "</td>";
			$html .= "<td>" . $surat['asal_surat'] . "</td>";
			$html .= "<td>" . $surat['tujuan_surat'] . "</td>";
			$html .= "</tr>";
		}

		$html .= "</table>";
		$html .= "<div style='margin-right:95px; margin-top:15px;'><p style='text-align:right;'>Bandar Lampung, ".convertTanggal(date('Y-m-d'))."</p></div>";
		$html .= "<table>";
		$html .= "<tr style='margin-top: 5px;'>";
		$html .= "<td width='40%'>";
		$html .= "<p>Diketahui Oleh:</p>";
		$html .= "<p>Kepala Bidang Pembinaan dan Pengawasan Kearsipan </p><br><br><br><br>";
		$html .= "<p style='text-decoration: underline;'>Mamiyani, SE., MM.</p>";
		$html .= "<p>Pembina";
		$html .= "<p>NIP. 19730502 199603 2 003";
		$html .= "</td>";
		$html .= "<td width='35%'></td>";
		$html .= "<td width='25%' style='margin-left:150px'>";
		$html .= "<p>Dibuat Oleh:</p>";
		$html .= "<p>Arsiparis Terampil </p><br><br><br><br>";
		$html .= "<p style='text-decoration: underline;'>Retno Widayanti, A.Md.</p>";
		$html .= "<p>Penata";
		$html .= "<p>NIP. 19780324 201001 2 004";
		$html .= "</td>";
		$html .= "</tr>";
		$html .= "</table>";

		$mpdf->SetFooter('Laporan Surat | | {PAGENO}');
		$mpdf->WriteHTML($html);

		redirect($mpdf->Output('Cetak Laporan ' . date('d-m-Y') . '.pdf', 'I'));
		
	}

	public function generate_excel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->mergeCells('A2:K2');
		$sheet->mergeCells('A3:K3');
		$sheet->getStyle('A2:K2')
			->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle('A2:K2')->getFont()->setSize(14)->setBold(true);
		$sheet->getStyle('A3:K3')
			->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle('A5:K5')
			->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A5:K5')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('95B3D7');
		$sheet->getStyle('A5:K5')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)->getColor()
		->setARGB('FF000000');
		$sheet->getStyle('A:K')
			->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle('A3:K3')->getFont()->setSize(14)->setBold(true);
		$sheet->getStyle('E')->getAlignment()->setWrapText(true);
		$sheet->getStyle('J')->getAlignment()->setWrapText(true);
		$sheet->getStyle('K')->getAlignment()->setWrapText(true);
		$sheet->getRowDimension(5)->setRowHeight(30);
		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(12);
		$sheet->getColumnDimension('D')->setWidth(10);
		$sheet->getColumnDimension('E')->setWidth(50);
		$sheet->getColumnDimension('F')->setWidth(17);
		$sheet->getColumnDimension('G')->setWidth(15);
		$sheet->getColumnDimension('H')->setWidth(10);
		$sheet->getColumnDimension('I')->setWidth(10);
		$sheet->getColumnDimension('J')->setWidth(30);
		$sheet->getColumnDimension('K')->setWidth(30);
		$sheet->setCellValue('A2', 'Laporan Surat');
		$sheet->setCellValue('A3', 'Unit Pengolah Bidang Pembinaan dan Pengawasan Kearsipan');
		$sheet->setCellValue('A5', 'No');
		$sheet->setCellValue('B5', 'Nomor Surat');
		$sheet->setCellValue('C5', 'Tanggal Surat');
		$sheet->setCellValue('D5', 'Tipe Surat');
		$sheet->setCellValue('E5', 'Isi Surat');
		$sheet->setCellValue('F5', 'Tanggal Diterima');
		$sheet->setCellValue('G5', 'Kecepatan Surat');
		$sheet->setCellValue('H5', 'Sifat Surat');
		$sheet->setCellValue('I5', 'Status Surat');
		$sheet->setCellValue('J5', 'Asal Surat');
		$sheet->setCellValue('K5', 'Tujuan Surat');

		$surat = $this->ModelLaporan->get_datatables();
		$no = 1;
		$x = 6;

		foreach ($surat as $row) {
			$sheet->getStyle('A'.$x.':K'.$x)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)->getColor()
			->setARGB('FF000000');
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row['nomor_surat']);
			$sheet->setCellValue('C' . $x, convertTanggal(date('Y-m-d', strtotime($row['tanggal_surat']))));
			$sheet->setCellValue('D' . $x, $row['tipe_surat']);
			$sheet->setCellValue('E' . $x, $row['isi']);
			$sheet->setCellValue('F' . $x, convertTanggal(date('Y-m-d', strtotime($row['tanggal_diterima'])), false));
			$sheet->setCellValue('G' . $x, $row['kecepatan_surat']);
			$sheet->setCellValue('H' . $x, $row['sifat_surat']);
			$sheet->setCellValue('I' . $x, $row['status_surat']);
			$sheet->setCellValue('J' . $x, $row['asal_surat']);
			$sheet->setCellValue('K' . $x, $row['tujuan_surat']);

			$x++;
		}


		$writer = new Xlsx($spreadsheet);
		$filename = 'Cetak Laporan ' . date('d-m-Y');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		// ob_start();
		// $writer->save('php://output');
		// $xlsx = ob_get_contents();
		// ob_end_clean();

		// $response =  array(
		// 	'status' => 'success',
		// 	'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsx)
		// );

		// echo json_encode($response);
		
		// exit();
		// redirect();
	}
}
