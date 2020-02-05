<?php
$aksi = "modul/mod_angsuran/aksi_angsuran.php";

$query = mysqli_query($koneksi, "select * from angsuran");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=angsuran">Data Angsuran</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Data Angsuran</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_angsuran"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 7%; text-align: center;">
                            No.
                        </th>
                          <th style="width: 20%; text-align: center;">
                            Nama Pembeli
                        </th>
                         <th style="width: 20%; text-align: center;">
                            Cicilan
                        </th>
                         <th style="width: 20%; text-align: center;">
                            Tanggal Pembayaran
                        </th>
                        <th style="width: 5%; text-align: center;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $i++; ?></td>
                            <td style="text-align: center;"><?php echo $data['nama_pembeli']; ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['cicilan']); ?></td>
                            <td style="text-align: center;"><?php echo format_date($data['tgl_pembayaran']); ?></td>
                            <td>
                                <a href="<?php echo $aksi . '?modul=angsuran&&act=hapus&&id=' . $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


