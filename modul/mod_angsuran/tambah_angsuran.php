<?php
$aksi = "modul/mod_angsuran/aksi_angsuran.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=angsuran">Data Angsuran</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Angsuran</h2>
        </div>

         



        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=angsuran&act=tambah" method="post">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label">Nama Pembeli</label>
                        <div class="controls">
                           <select name="nama_pembeli" class="form-control" class="form-control form-control-md" id="" onchange='changeValueNama(this.value)' required="required">
                            <option value="" disabled="disabled" selected="selected"> Nama Pembeli</option>
                            <?php
                                $con = mysqli_connect("localhost", "root","", "db_nyicil");
                                $query=mysqli_query($con, "select * from penjualan order by pembeli asc");
                                $result = mysqli_query($con, "select * from penjualan");
                                $jsArrayNama = "var idTipe = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="pembeli"  value="' . $row['pembeli'] . '">' . $row['pembeli'] . '</option>';
                                $jsArrayNama .= "idTipe['" . $row['pembeli'] . "'] = 
                                {
                                id_penjualan:'" . addslashes($row['id_penjualan']) .
                                    "',
                                angsur_bulan:'".addslashes($row['angsur_bulan'])."'};\n";
                                }
                            ?>
                </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Penjualan</label>
                        <div class="controls">
                            <input type="text" id="id_penjualan" name="id_penjualan" class="form-field" readonly="readonly">
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Cicilan</label>
                        <div class="controls">
                            <input type="text" id="cicilan" name="cicilan" class="form-field" readonly="readonly">
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Tanggal Pembayaran</label>
                        <div class="controls">
                            <input type="text" name="tgl_pembayaran" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker"">
                                   <span></span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button id="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>
             <script type="text/javascript">
        <?php echo $jsArrayNama; ?>
        function changeValueNama(pembeli){
            console.log(pembeli);
            console.log(idTipe);
            document.getElementById('id_penjualan').value = idTipe[pembeli].id_penjualan;    
            document.getElementById('cicilan').value = idTipe[pembeli].angsur_bulan;
        }
        </script>
        </div>
    </div><!--/span-->
</div><!--/row-->