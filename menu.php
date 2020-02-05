    <ul class="nav nav-tabs nav-stacked main-menu">
    <?php if ($_SESSION['hak_akses'] == 'admin') { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
        <li><a class="ajax-link" href="index.php?modul=petugas"><i class="icon-user"></i><span class="hidden-tablet"> Petugas</span></a></li>
        <li class="nav-header hidden-tablet">Laporan</li>
        <li><a class="ajax-link" href="index.php?modul=laporan_penjualan"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Penjualan</span></a></li>
    <?php } else { ?>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
       
        <li><a class="ajax-link" href="index.php?modul=jenis_motor"><i class="icon-tag"></i><span class="hidden-tablet"> Jenis Motor</span></a></li>
        
        <li class="nav-header hidden-tablet">Transaksi</li>

          <li><a class="ajax-link" href="index.php?modul=angsuran"><i class="icon-list"></i><span class="hidden-tablet"> Data Angsuran</span></a></li>

       
        <li><a class="ajax-link" href="index.php?modul=penjualan"><i class="icon-list"></i><span class="hidden-tablet"> Penjualan Motor</span></a></li>
        <li class="nav-header hidden-tablet">Laporan</li>
        <li><a class="ajax-link" href="index.php?modul=laporan_penjualan"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Penjualan</span></a></li>
    <?php } ?>
</ul>