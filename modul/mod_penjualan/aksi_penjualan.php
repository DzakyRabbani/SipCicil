<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";
    include"../../fungsi/format_number.php";

    //MODUL TAMBAH GURU
    if ($module == 'penjualan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $merk_motor = $_POST['merk_motor'];
		$tgl_penjualan = format_indotosql($_POST['tgl_penjualan']);
		$harga_penjualan= trim_number($_POST['harga_penjualan']);
        $tenor = $_POST['tenor'];
        $bunga = $_POST['bunga'];
        $harga_bunga = $_POST['harga_bunga'];
        $dp = $_POST['dp'];
        $angsur_bulan = $_POST['angsur_bulan'];
        $sisa_cicilan = $_POST['sisa_cicilan'];
        $pembeli = $_POST['pembeli'];
       
        $cek = mysqli_query($koneksi,"SELECT * FROM penjualan 
									WHERE id_penjualan = '$id_penjualan'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Penjualan yang anda masukkan sudah ada. Periksa kembali data penjualan yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO penjualan(
                                    merk_motor,
                                    tgl_penjualan,
                                    harga_penjualan,
                                    tenor,
                                    bunga,
                                    harga_bunga,
                                    dp,
                                    angsur_bulan,
                                    sisa_cicilan,
                                    pembeli)
                            VALUES(
                                    '$merk_motor',
                                    '$tgl_penjualan',
                                    '$harga_penjualan',
                                    '$tenor',
                                    '$bunga',
                                    '$harga_bunga',
                                    '$dp',
                                    '$angsur_bulan',
                                    '$sisa_cicilan',
									'$pembeli')") or die(mysqli_error());
									
				mysqli_query($koneksi,"UPDATE penjualan SET status = 1 WHERE id_penjualan = $id_penjualan");
				
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }elseif ($module == 'penjualan' AND $act == 'hapus') {
            $query = mysqli_query($koneksi,"DELETE FROM penjualan WHERE id_penjualan='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
    }
}
?>
