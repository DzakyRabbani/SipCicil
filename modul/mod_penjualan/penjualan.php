<?php
$aksi = "modul/mod_penjualan/aksi_penjualan.php";

$query = mysqli_query($koneksi, "select * from penjualan ");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=penjualan">Penjualan Motor</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Penjualan Motor</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_penjualan"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                            <th style="width: 7%; text-align: center;">
                            No.
                            </th>
                          <th style="width: 8%; text-align: center;">
                            Jenis Motor
                         </th>
                          <th style="width: 15%; text-align: center;">
                            Tanggal Jual
                          </th>
                          <th style="width: 15%; text-align: center;">
                            Harga Jual
                          </th>
                          <th style="width: 15%; text-align: center;">
                            Tenor
                          </th>
                          <th style="width: 15%; text-align: center;">
                            Bunga
                         </th>
                          <th style="width: 15%; text-align: center;">
                            Harga Kredit
                          </th>
                           <th style="width: 15%; text-align: center;">
                            DP
                          </th>
                          <th style="width: 15%; text-align: center;">
                            Angsuran
                         </th>
                          <th style="width: 15%; text-align: center;">
                            Sisa Cicilan
                          </th>
                         <th style="width: 15%; text-align: center;">
                            Pembeli
                         </th>
                          <th style="width: 15%; text-align: center;">
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
                            <td style="text-align: center;"><?php echo $data['merk_motor']; ?></td>
                            <td style="text-align: center;"><?php echo format_date($data['tgl_penjualan']); ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['harga_penjualan']); ?></td>
                            <td style="text-align: center;"><?php echo $data['tenor']; ?></td>
                            <td style="text-align: center;"><?php echo $data['bunga']; ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['harga_bunga']); ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['dp']); ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['angsur_bulan']); ?></td>
                            <td style="text-align: center;"><?php echo format_money($data['sisa_cicilan']); ?></td>
                            <td style="text-align: center;"><?php echo $data['pembeli']; ?></td>
        
                            <td>
								<a href="modul/mod_penjualan/faktur_penjualan.php<?php echo '?id=' . $data['id_penjualan']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <a href="<?php echo $aksi . '?modul=penjualan&&act=hapus&&id=' . $data['id_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


