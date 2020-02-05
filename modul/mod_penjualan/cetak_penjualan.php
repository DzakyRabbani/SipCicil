<?php
session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";

$bulan = substr($_POST['bulan'],0,2);
$tahun = substr($_POST['bulan'],3,4);

$query = mysqli_query($koneksi,"select * from penjualan
								WHERE MONTH(tgl_penjualan) = '$bulan' AND YEAR(tgl_penjualan) = '$tahun'")or die(mysqli_error());
$num = mysqli_num_rows($query);

        if ($num == 0) {
            echo "<script language='javascript'>
                        alert('Data penjualan tidak ditemukan atau masih kosong');
                        window.location='../../index.php?modul=laporan_penjualan';
			</script>";
        }

        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L');

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN PENJUALAN MOTOR', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 5, 'Periode Bulan : ' . format_month($bulan) . ' ' . $tahun, 0, 1, 'C');
        $pdf->Ln();

        $w = array(6, 23, 25, 28, 28, 30, 30, 30 ,30 ,30); //163
        //=========0, 1,  2,  3,  4,  5,  6, 7=====//

        $list = array('NO', 'MERK' , 'TGL PEMBELIAN', 'HARGA JUAL', 'ANGSURAN', 'PEMBELI' ,'KETERANGAN');
        //=============0, ========1, ========== 2, ======= 3, ======== 4,  =======5, ======6,  ==========7,   
        $pdf->setX(50);
        $pdf->SetFont('Arial', 'B', 7);

        $pdf->Cell($w[0], 6, 'NO', 'TLR', 0, 'L');
        $pdf->Cell($w[1], 6, 'MERK', 'TLR', 0, 'C');
        $pdf->Cell($w[2], 6, 'TANGGAL', 'TLR', 0, 'C');
        $pdf->Cell($w[3], 6, 'HARGA JUAL', 'TLR', 0, 'C');
        $pdf->Cell($w[4], 6, 'TENOR', 'TLR', 0, 'C');
        $pdf->Cell($w[5], 6, 'HARGA KREDIT', 'TLR', 0, 'C');
        $pdf->Cell($w[6], 6, 'ANGSURAN', 'TLR', 0, 'C');
        $pdf->Cell($w[7], 6, 'PEMBELI', 'TLR', 0, 'C');
       
        $pdf->Ln();
		
        //Color and font restoration
        $pdf->setX(4);
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(1);
        $pdf->SetFont('Arial', '', 7);
        //Data

        $fill = false;
        $i = 0;
        $thbeli = 0;
        $thjual = 0;
        $laba = 0;
        $tlaba = 0;

        while ($row = mysqli_fetch_array($query)) {
            $thjual += $row['harga_penjualan'];
			$laba = $row['harga_penjualan'];

            $pdf->setX(50);
            $pdf->Cell($w[0], 6, $row['id_penjualan'], 'TLRB', 0, 'L', $fill);
            $pdf->Cell($w[1], 6, $row['merk_motor'], 'TLRB', 0, 'C', $fill);
            $pdf->Cell($w[2], 6, format_date($row['tgl_penjualan']), 'TLRB', 0, 'C', $fill);
            $pdf->Cell($w[3], 6, format_money($row['harga_penjualan']), 'TLRB', 0, 'C', $fill);
            $pdf->Cell($w[4], 6, $row['tenor'], 'TLRB',0,'C',$fill);
            $pdf->Cell($w[5], 6, format_money($row['harga_bunga']), 'TLRB',0,'C',$fill);
            $pdf->Cell($w[6], 6, format_money($row['angsur_bulan']), 'TLRB',0,'C',$fill);
            $pdf->Cell($w[7], 6, $row['pembeli'], 'TLRB',1,'C',$fill);


           
            $fill = !$fill;
        }
        $r_thbeli = $thbeli / $num;
        $r_thjual = $thjual / $num;
        $r_laba = $tlaba / $num;


        //footer selalu sama
        $pdf->SetFont('Arial', '', 9);
        $pdf->Ln(10);
		$pdf->setX(68);
        $pdf->Cell(5, 6, 'Bang Jek Motor, ' . format_date(date('Y-m-d')), 0, 1, 'C', 0);
        $pdf->Ln(10);
		$pdf->setX(80);
        $pdf->Cell(163 / 2, 6, 'Disiapkan Oleh,', 0, 0, 'C');
        $pdf->Cell(163 / 2, 6, 'Diketahui Oleh,', 0, 0, 'C');

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Ln(20);
		$pdf->setX(80);
        $pdf->Cell(163 / 2, 6, $_SESSION['nama'], 0, 0, 'C', 0);
        $pdf->Cell(163 / 2, 6, 'Dzaky', 0, 1, 'C', 0);

        $pdf->Ln(-2);
        $pdf->SetFont('Arial', '', 9);
		$pdf->setX(80);
        $pdf->Cell(163 / 2, 6, 'Petugas', 0, 0, 'C', 0);
        $pdf->Cell(163 / 2, 6, 'Pimpinan', 0, 0, 'C', 0);
        $pdf->Output();
?>