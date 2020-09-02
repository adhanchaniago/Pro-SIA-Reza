<?php

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model');
		$this->load->model('Service_model');
		$this->load->model('Transaksi_detail_model');

		$this->load->library('cetak_pdf');

		date_default_timezone_set('asia/jakarta');
	}

	public function laporan_penjualan()
	{
		$pdf = new FPDF('L', 'mm', 'Letter');


		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualan();

		// $pdf = new PDF('L');
		$title = 'Laporan Penjualan';
		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$header = array(

			array("label" => "Nomor Penjualan", "length" => 40, "align" => "C"),
			array("label" => "Barang", "length" => 60, "align" => "C"),
			array("label" => "Staff", "length" => 37, "align" => "C"),
			array("label" => "Jam", "length" => 30, "align" => "C"),
			array("label" => "Tanggal", "length" => 30, "align" => "C"),
			array("label" => "Jumlah", "length" => 30, "align" => "C"),
			array("label" => "Total", "length" => 30, "align" => "C")
		);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial');
		$fill = false;

		foreach ($penjualan as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_hari($hari)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanHari($hari);
		$pdf = new FPDF('L', 'mm', 'Letter');
		$title = 'Laporan Penjualan';
		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$header = array(

			array("label" => "Nomor Penjualan", "length" => 40, "align" => "C"),
			array("label" => "Barang", "length" => 60, "align" => "C"),
			array("label" => "Staff", "length" => 37, "align" => "C"),
			array("label" => "Jam", "length" => 30, "align" => "C"),
			array("label" => "Tanggal", "length" => 30, "align" => "C"),
			array("label" => "Jumlah", "length" => 30, "align" => "C"),
			array("label" => "Total", "length" => 50, "align" => "C")
		);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill = false;

		foreach ($penjualan as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_bulan($bulan)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanBulan($bulan);
		$pdf = new FPDF('L', 'mm', 'Letter');
		$title = 'Laporan Penjualan';
		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$header = array(

			array("label" => "Nomor Penjualan", "length" => 40, "align" => "C"),
			array("label" => "Barang", "length" => 60, "align" => "C"),
			array("label" => "Staff", "length" => 37, "align" => "C"),
			array("label" => "Jam", "length" => 30, "align" => "C"),
			array("label" => "Tanggal", "length" => 30, "align" => "C"),
			array("label" => "Jumlah", "length" => 30, "align" => "C"),
			array("label" => "Total", "length" => 50, "align" => "C")
		);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill = false;

		foreach ($penjualan as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_tahun($tahun)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanTahun($tahun);
		$pdf = new FPDF('L', 'mm', 'Letter');
		$title = 'Laporan Penjualan';
		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$header = array(

			array("label" => "Nomor Penjualan", "length" => 40, "align" => "C"),
			array("label" => "Barang", "length" => 60, "align" => "C"),
			array("label" => "Staff", "length" => 37, "align" => "C"),
			array("label" => "Jam", "length" => 30, "align" => "C"),
			array("label" => "Tanggal", "length" => 30, "align" => "C"),
			array("label" => "Jumlah", "length" => 30, "align" => "C"),
			array("label" => "Total", "length" => 30, "align" => "C")
		);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill = false;

		foreach ($penjualan as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}


	public function jurnal($waktu = '', $angka = '')
	{
		global $title;

		if ($waktu != '') {
			$jurnal = $this->Transaksi_detail_model->laporan_jurnal_waktu($waktu, $angka);
		} else {
			$jurnal = $this->Transaksi_detail_model->laporan_jurnal();
		}

		$pdf = new FPDF('P', 'mm', 'Letter');

		if ($waktu == 'hari') {
			$title = 'Jurnal Tanggal ' . date('d F Y', time());
		} elseif ($waktu == 'bulan') {
			if ($angka != '') {
				$title = 'Jurnal Bulan ' . $angka;
			} else {
				$title = 'Jurnal Bulan ' . date('F Y', time());
			}
		} elseif ($waktu == 'tahun') {
			if ($angka != '') {
				$title = 'Jurnal Tahun ' . $angka;
			} else {
				$title = 'Jurnal Tahun ' . date('Y', time());
			}
		} else {
			$title = 'Jurnal';
		}

		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$header = array(

			array("label" => "Tanggal", "length" => 40, "align" => "C"),
			array("label" => "Akun", "length" => 83, "align" => "C"),
			array("label" => "Debit", "length" => 37, "align" => "C"),
			array("label" => "Kredit", "length" => 30, "align" => "C")
		);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill = false;

		$tgl = '';

		foreach ($jurnal as $baris) {

			if ($tgl != $baris['tanggal']) {
				$pdf->Cell($header[0]['length'], 6, $baris['tanggal'] . '/' . $baris['bulan'], 1, '0', 'C', $fill);
			} else {
				$pdf->Cell($header[0]['length'], 6, '', 1, '0', 'C', $fill);
			}

			$tgl = $baris['tanggal'];

			if ($baris['kredit'] > 0) {
				$pdf->Cell($header[1]['length'], 6, '      ' . $baris['akun'], 1, '0', 'L', $fill);
			} else {
				$pdf->Cell($header[1]['length'], 6, $baris['akun'], 1, '0', 'L', $fill);
			}

			$pdf->Cell($header[2]['length'], 6, $baris['debit'], 1, '0', 'R', $fill);
			$pdf->Cell($header[3]['length'], 6, $baris['kredit'], 1, '0', 'R', $fill);

			$fill = !$fill;
			$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function buku_besar($waktu = '', $angka = '')
	{
		global $title;
		$pdf = new FPDF('L', 'mm', 'Letter');
		$akuns = $this->db->get('akun')->result_array();

		if ($waktu == 'hari') {
			$title = 'Buku Besar Tanggal ' . date('d F Y', time());
		} elseif ($waktu == 'bulan') {
			if ($angka != '') {
				$title = 'Buku Besar Bulan ' . $angka;
			} else {
				$title = 'Buku Besar Bulan ' . date('F Y', time());
			}
		} elseif ($waktu == 'tahun') {
			if ($angka != '') {
				$title = 'Buku Besar Tahun ' . $angka;
			} else {
				$title = 'Buku Besar Tahun ' . date('Y', time());
			}
		} else {
			$title = 'Buku Besar';
		}

		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial');
		$fill = false;

		$akun_ganjil = [];
		$akun_genap = [];
		$no = 1;

		foreach ($akuns as $ak) {
			if ($no % 2 == 1) {
				$akun_in_trans = $this->db->get_where('transaksi_detail', ['id_akun' => $ak['id']])->num_rows();

				if ($akun_in_trans > 0) {
					array_push($akun_ganjil, $ak);
				}
			} else {
				$akun_in_trans = $this->db->get_where('transaksi_detail', ['id_akun' => $ak['id']])->num_rows();

				if ($akun_in_trans > 0) {
					array_push($akun_genap, $ak);
				}
			}

			$no++;
		}

		if ($akun_ganjil > $akun_genap) {
			array_push($akun_genap, '0');
		}

		for ($e = 0; $e < count($akun_ganjil); $e++) {
			$pdf->Cell(10, 6, 'D', 'B', '0', 'L', $fill);
			$pdf->Cell(70, 6, $akun_ganjil[$e]['akun'], 'B', '0', 'C', $fill);
			$pdf->Cell(10, 6, 'K', 'B', '0', 'L', $fill);

			$pdf->Cell(10, 6, '', '', '0', 'L', $fill);

			if ($akun_genap[$e] != '0') {
				$pdf->Cell(10, 6, 'D', 'B', '0', 'L', $fill);
				$pdf->Cell(70, 6, $akun_genap[$e]['akun'], 'B', '0', 'C', $fill);
				$pdf->Cell(10, 6, 'K', 'B', '0', 'L', $fill);
			}

			$pdf->Ln();

			// GANJIL
			if ($waktu == '') {
				$akun_debit_ganjil = $this->Transaksi_detail_model->get_debit($akun_ganjil[$e]['id']);
				$akun_kredit_ganjil = $this->Transaksi_detail_model->get_kredit($akun_ganjil[$e]['id']);
			} else {
				$akun_debit_ganjil = $this->Transaksi_detail_model->get_debit_waktu($akun_ganjil[$e]['id'], $waktu, $angka);
				$akun_kredit_ganjil = $this->Transaksi_detail_model->get_kredit_waktu($akun_ganjil[$e]['id'], $waktu, $angka);
			}


			$jumlah_debit_ganjil = count($akun_debit_ganjil);
			$jumlah_kredit_ganjil = count($akun_kredit_ganjil);

			$akun_debit_ganjil_1 = $akun_debit_ganjil;
			$akun_kredit_ganjil_1 = $akun_kredit_ganjil;

			$jumlah_baris = max(array($jumlah_debit_ganjil, $jumlah_kredit_ganjil));

			//GENAP
			if ($akun_genap[$e] != '0') {
				if ($waktu == '') {
					$akun_debit_genap = $this->Transaksi_detail_model->get_debit($akun_genap[$e]['id']);
					$akun_kredit_genap = $this->Transaksi_detail_model->get_kredit($akun_genap[$e]['id']);
				} else {
					$akun_debit_genap = $this->Transaksi_detail_model->get_debit_waktu($akun_genap[$e]['id'], $waktu, $angka);
					$akun_kredit_genap = $this->Transaksi_detail_model->get_kredit_waktu($akun_genap[$e]['id'], $waktu, $angka);
				}

				$jumlah_debit_genap = count($akun_debit_genap);
				$jumlah_kredit_genap = count($akun_kredit_genap);

				$akun_debit_genap_1 = $akun_debit_genap;
				$akun_kredit_genap_1 = $akun_kredit_genap;

				$jumlah_baris = max(array($jumlah_debit_ganjil, $jumlah_debit_genap, $jumlah_kredit_ganjil, $jumlah_kredit_genap));
			}

			if ($akun_genap[$e] != '0') {
				for ($i = 1; $i <= $jumlah_baris; $i++) {
					array_push($akun_kredit_ganjil, '0');
					array_push($akun_debit_ganjil, '0');
					array_push($akun_kredit_genap, '0');
					array_push($akun_debit_genap, '0');
				}

				for ($i = 0; $i < $jumlah_baris; $i++) {
					if ($akun_debit_ganjil[$i] != '0') {
						$pdf->Cell(10, 6, $akun_debit_ganjil[$i]['tanggal'] . '/' . $akun_debit_ganjil[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_debit_ganjil[$i]['debit'], 'R', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', 'R', '0', 'R', $fill);
					}

					if ($akun_kredit_ganjil[$i] != '0') {
						$pdf->Cell(10, 6, $akun_kredit_ganjil[$i]['tanggal'] . '/' . $akun_kredit_ganjil[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_kredit_ganjil[$i]['kredit'], '', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', '', '0', 'R', $fill);
					}

					$pdf->Cell(10, 6, '', '', '0', 'R', FALSE);

					if ($akun_debit_genap[$i] != '0') {
						$pdf->Cell(10, 6, $akun_debit_genap[$i]['tanggal'] . '/' . $akun_debit_genap[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_debit_genap[$i]['debit'], 'R', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', 'R', '0', 'R', $fill);
					}

					if ($akun_kredit_genap[$i] != '0') {
						$pdf->Cell(10, 6, $akun_kredit_genap[$i]['tanggal'] . '/' . $akun_kredit_genap[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_kredit_genap[$i]['kredit'], '', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', '', '0', 'R', $fill);
					}

					$pdf->ln();
				}
			} else {

				for ($i = 1; $i <= $jumlah_baris; $i++) {
					array_push($akun_kredit_ganjil, '0');
					array_push($akun_debit_ganjil, '0');
				}

				for ($i = 0; $i < $jumlah_baris; $i++) {
					if ($akun_debit_ganjil[$i] != '0') {
						$pdf->Cell(10, 6, $akun_debit_ganjil[$i]['tanggal'] . '/' . $akun_debit_ganjil[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_debit_ganjil[$i]['debit'], 'R', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', 'R', '0', 'R', $fill);
					}

					if ($akun_kredit_ganjil[$i] != '0') {
						$pdf->Cell(10, 6, $akun_kredit_ganjil[$i]['tanggal'] . '/' . $akun_kredit_ganjil[$i]['bulan'], '', '0', 'L', $fill);
						$pdf->Cell(35, 6, $akun_kredit_ganjil[$i]['kredit'], '', '0', 'R', $fill);
					} else {
						$pdf->Cell(10, 6, '', '', '0', 'L', $fill);
						$pdf->Cell(35, 6, '', '', '0', 'R', $fill);
					}

					$pdf->ln();
				}
			}

			if ($akun_genap[$e] != '0') {
				$jumlah_debit_genap = 0;
				$jumlah_kredit_genap = 0;
			}

			$jumlah_debit_ganjil = 0;
			$jumlah_kredit_ganjil = 0;
			$jumlah = [];
			$saldo = [];

			foreach ($akun_debit_ganjil_1 as $a) {
				$jumlah_debit_ganjil = $jumlah_debit_ganjil + $a['debit'];
			}

			foreach ($akun_kredit_ganjil_1 as $a) {
				$jumlah_kredit_ganjil = $jumlah_kredit_ganjil + $a['kredit'];
			}

			array_push($jumlah, max(array($jumlah_debit_ganjil, $jumlah_kredit_ganjil)));

			if ($jumlah_debit_ganjil < $jumlah_kredit_ganjil) {
				array_push($saldo, $jumlah_kredit_ganjil - $jumlah_debit_ganjil);
			} else {
				array_push($saldo, $jumlah_debit_ganjil - $jumlah_kredit_ganjil);
			}

			if ($akun_genap[$e] != '0') {
				foreach ($akun_debit_genap_1 as $a) {
					$jumlah_debit_genap = $jumlah_debit_genap + $a['debit'];
				}

				foreach ($akun_kredit_genap_1 as $a) {
					$jumlah_kredit_genap = $jumlah_kredit_genap + $a['kredit'];
				}

				array_push($jumlah, max(array($jumlah_debit_genap, $jumlah_kredit_genap)));

				if ($jumlah_debit_genap < $jumlah_kredit_genap) {
					array_push($saldo, $jumlah_kredit_genap - $jumlah_debit_genap);
				} else {
					array_push($saldo, $jumlah_debit_genap - $jumlah_kredit_genap);
				}
			}

			if ($jumlah_debit_ganjil > $jumlah_kredit_ganjil) {
				$pdf->Cell(10, 6, '', '', '0', 'L', true);
				$pdf->Cell(35, 6, '', 'R', '0', 'R', true);

				$pdf->Cell(10, 6, 'sld', '', '0', 'L', true);
				$pdf->Cell(35, 6, $saldo[0], '', '0', 'R', true);
			} else {
				$pdf->Cell(10, 6, 'sld', '', '0', 'L', true);
				$pdf->Cell(35, 6, $saldo[0], 'R', '0', 'R', true);

				$pdf->Cell(10, 6, '', '', '0', 'L', true);
				$pdf->Cell(35, 6, '', '', '0', 'R', true);
			}

			$pdf->Cell(10, 6, '', '', '0', 'R', FALSE);

			if ($akun_genap[$e] != '0') {
				if ($jumlah_debit_genap > $jumlah_kredit_genap) {
					$pdf->Cell(10, 6, '', '', '0', 'L', true);
					$pdf->Cell(35, 6, '', 'R', '0', 'R', true);

					$pdf->Cell(10, 6, 'sld', '', '0', 'L', true);
					$pdf->Cell(35, 6, $saldo[1], '', '0', 'R', true);
				} else {
					$pdf->Cell(10, 6, 'sld', '', '0', 'L', true);
					$pdf->Cell(35, 6, $saldo[1], 'R', '0', 'R', true);

					$pdf->Cell(10, 6, '', '', '0', 'L', true);
					$pdf->Cell(35, 6, '', '', '0', 'R', true);
				}
			}

			$pdf->ln();

			$pdf->Cell(10, 6, 'Jml', '', '0', 'L', true);
			$pdf->Cell(35, 6, $jumlah[0], 'R', '0', 'R', true);

			$pdf->Cell(10, 6, 'Jml', '', '0', 'L', true);
			$pdf->Cell(35, 6, $jumlah[0], '', '0', 'R', true);

			$pdf->Cell(10, 6, '', '', '0', 'R', FALSE);

			if ($akun_genap[$e] != '0') {
				$pdf->Cell(10, 6, 'Jml', '', '0', 'L', true);
				$pdf->Cell(35, 6, $jumlah[1], 'R', '0', 'R', true);

				$pdf->Cell(10, 6, 'Jml', '', '0', 'L', true);
				$pdf->Cell(35, 6, $jumlah[1], '', '0', 'R', true);
			}

			$pdf->ln();
			$pdf->ln();
		}


		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function neraca_saldo($waktu = '', $angka = '')
	{
		global $title;
		$akuns = $this->db->get('akun')->result_array();
		$pdf = new FPDF('L', 'mm', 'Letter');

		if ($waktu == 'hari') {
			$title = 'Neraca Saldo Tanggal ' . date('d F Y', time());
		} elseif ($waktu == 'bulan') {
			if ($angka != '') {
				$title = 'Neraca Saldo Bulan ' . $angka;
			} else {
				$title = 'Neraca Saldo Bulan ' . date('F Y', time());
			}
		} elseif ($waktu == 'tahun') {
			if ($angka != '') {
				$title = 'Neraca Saldo Tahun ' . $angka;
			} else {
				$title = 'Neraca Saldo Tahun ' . date('Y', time());
			}
		} else {
			$title = 'Neraca Saldo';
		}

		$pdf->AddPage();
		$pdf->SetTitle($title);
		$pdf->AliasNbPages();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial');
		$fill = false;

		foreach ($akuns as $ak) {

			$this->db->select_sum('td.debit');
			$this->db->from('transaksi_detail td');
			$this->db->join('transaksi t', 't.id = td.id_transaksi');
			$this->db->join('akun a', 'td.id_akun = a.id');
			$this->db->where('td.id_akun', $ak['id']);

			if ($waktu == 'hari') {
				$this->db->where('tanggal', date('d', time()));
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			} elseif ($waktu == 'bulan') {
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			} elseif ($waktu == 'tahun') {
				$this->db->where('tahun', date('Y', time()));
			}

			$debit = $this->db->get()->row_array();

			$this->db->select_sum('td.kredit');
			$this->db->from('transaksi_detail td');
			$this->db->join('transaksi t', 't.id = td.id_transaksi');
			$this->db->join('akun a', 'td.id_akun = a.id');
			$this->db->where('td.id_akun', $ak['id']);

			if ($waktu == 'hari') {
				$this->db->where('tanggal', date('d', time()));
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			} elseif ($waktu == 'bulan') {
				if ($angka != '') {
					$this->db->where('bulan', $angka);
					$this->db->where('tahun', date('Y', time()));
				} else {
					$this->db->where('bulan', $angka);
					$this->db->where('tahun', date('Y', time()));
				}
			} elseif ($waktu == 'tahun') {
				if ($angka != '') {
					$this->db->where('tahun', $angka);
				} else {
					$this->db->where('tahun', date('Y', time()));
				}
			}

			$kredit = $this->db->get()->row_array();

			if ($debit['debit'] > $kredit['kredit']) {
				$tipe = 'debit';
				$debit = $debit['debit'] - $kredit['kredit'];
				$kredit = 0;
			} else {
				$tipe = 'kredit';
				$kredit = $kredit['kredit'] - $debit['debit'];
				$debit = 0;
			}

			$saldo[] = [$ak['akun'], $debit, $kredit];
		}

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(0, 0, 255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0, 0, 0);

		$pdf->Cell(15, 8, 'No.', 1, '0', 'C', true);
		$pdf->Cell(95, 8, 'Akun', 1, '0', 'C', true);
		$pdf->Cell(40, 8, 'Debit', 1, '0', 'C', true);
		$pdf->Cell(40, 8, 'Kredit', 1, '0', 'C', true);

		$pdf->Ln();

		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial');
		$fill = false;
		$i = 1;
		$jumlah_debit = 0;
		$jumlah_kredit = 0;

		foreach ($saldo as $baris) {

			$pdf->Cell(15, 6, $i, 1, '0', 'C', $fill);
			$pdf->Cell(95, 6, $baris[0], 1, '0', 'L', $fill);

			if ($baris[1] == '0') {
				$pdf->Cell(40, 6, '', 1, '0', 'C', $fill);
			} else {
				$pdf->Cell(40, 6, 'Rp. ' . $baris[1], 1, '0', 'R', $fill);
			}

			if ($baris[2] == '0') {
				$pdf->Cell(40, 6, '', 1, '0', 'C', $fill);
			} else {
				$pdf->Cell(40, 6, 'Rp. ' . $baris[2], 1, '0', 'R', $fill);
			}

			$jumlah_debit = $jumlah_debit + $baris[1];
			$jumlah_kredit = $jumlah_kredit + $baris[2];

			$fill = !$fill;
			$i++;
			$pdf->Ln();
		}

		$pdf->Cell(15, 8, '', 1, '0', 'C', $fill);
		$pdf->Cell(95, 8, '', 1, '0', 'C', $fill);
		$pdf->Cell(40, 8, 'Rp. ' . $jumlah_debit, 1, '0', 'R', $fill);
		$pdf->Cell(40, 8, 'Rp. ' . $jumlah_kredit, 1, '0', 'R', $fill);

		$pdf->SetX(220);
		$pdf->Cell(0, 20, 'Patamuan,' . date('d F Y') . '', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell(0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell(0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}
}
