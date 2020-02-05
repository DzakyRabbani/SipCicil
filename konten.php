<?php
if ($_SESSION == NULL) {
    echo "<script>alert('Anda belum login, silahkan login untuk mengakses halaman administrator !.'); window.location = 'login.php'</script>";
} else {
    //NOTIFIKASI PESAN ERROR BERDASARKAN GET URL pesan
    include"fungsi/fungsi_pesan.php";
    //AKHIR NOTIFIKASI

    if ($_GET['modul'] == 'home') {
        include "modul/mod_home/home_admin.php";
    } elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL KARYAWAN
    elseif ($_GET['modul'] == 'petugas') {
        include "modul/mod_petugas/petugas.php";
    } elseif ($_GET['modul'] == 'tambah_petugas') {
        include "modul/mod_petugas/tambah_petugas.php";
    } elseif ($_GET['modul'] == 'ubah_petugas') {
        include "modul/mod_petugas/ubah_petugas.php";
    } elseif ($_GET['modul'] == 'hapus_petugas') {
        include "modul/mod_petugas/hapus_petugas.php";
    }

    //MODUL JABTAN
    elseif ($_GET['modul'] == 'jenis_motor') {
        include "modul/mod_jenis_motor/jenis_motor.php";
    } elseif ($_GET['modul'] == 'tambah_jenis_motor') {
        include "modul/mod_jenis_motor/tambah_jenis_motor.php";
    } elseif ($_GET['modul'] == 'ubah_jenis_motor') {
        include "modul/mod_jenis_motor/ubah_jenis_motor.php";
    } elseif ($_GET['modul'] == 'hapus_jenis_motor') {
        include "modul/mod_jenis_motor/hapus_jenis_motor.php";
    }

    //MODUL ANGSURAN
     elseif ($_GET['modul'] == 'angsuran') {
        include "modul/mod_angsuran/angsuran.php";
    } elseif ($_GET['modul'] == 'tambah_angsuran') {
        include "modul/mod_angsuran/tambah_angsuran.php";
    } elseif ($_GET['modul'] == 'ubah_angsuran') {
        include "modul/mod_angsuran/ubah_angsuran.php";
    } elseif ($_GET['modul'] == 'hapus_angsuran') {
        include "modul/mod_angsuran/hapus_angsuran.php";
    }

    
    //MODUL PENJUALAN
    elseif ($_GET['modul'] == 'penjualan') {
        include "modul/mod_penjualan/penjualan.php";
    } elseif ($_GET['modul'] == 'tambah_penjualan') {
        include "modul/mod_penjualan/tambah_penjualan.php";
    } elseif ($_GET['modul'] == 'laporan_penjualan') {
        include "modul/mod_penjualan/laporan_penjualan.php";
    } 


    //MODUL PASSWORD
    elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL UBAH FOTO
    elseif ($_GET['modul'] == 'foto') {
        include "modul/mod_profil/foto_admin.php";
    }
}
?>
