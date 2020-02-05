<?php
$aksi = "modul/mod_penjualan/aksi_penjualan.php";
?>
<script type="text/javascript">
 function bagi() {
    hb = eval(form.harga_bunga.value);
    dp = eval(form.dp.value);
    ten = eval(form.tenor.value);
    sc = hb - dp;
    ang = sc / ten;
    form.sisa_cicilan.value = sc;
    form.angsur_bulan.value = ang;
 }
</script>
    
<script type="text/javascript">
    function ten(){
        aa=eval(form.tenor.value);

        if ( aa == 6){
            form.bunga.value = 2;
        }
        else if ( aa == 12){
            form.bunga.value = 4;
        }
         else if ( aa == 24){
            form.bunga.value = 6;
        }
         else if ( aa == 36) {
            form.bunga.value = 8;
        }
        else{
            form.bunga.value = 0;
        }

        hj=eval(form.harga_penjualan.value);
        bunga=eval(form.bunga.value);
        sc = hj + (bunga/100 * hj);
        form.harga_bunga.value = sc;
    }

</script>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=penjualan">Penjualan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah penjualan</h2>
        </div>
        <div class="box-content">
            <form name="form" id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=penjualan&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Motor</label>
                        <div class="controls">
                            <select name="merk_motor" onchange='changeValueNama(this.value)' class="form-field">
                                <option value="">-- Pilih Motor --</option>
                                <?php
                                $con = mysqli_connect("localhost", "root","", "db_nyicil");
                                $query=mysqli_query($con, "select * from jenis_motor order by jenis_motor asc");
                                $result = mysqli_query($con, "select * from jenis_motor");
                                $jsArrayNama = "var idTipe = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="jenis_motor"  value="' . $row['jenis_motor'] . '">' . $row['jenis_motor'] . '</option>';
                                $jsArrayNama .= "idTipe['" . $row['jenis_motor'] . "'] = 
                                {
                                harga:'".addslashes($row['harga'])."'};\n";
                                }
                            ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal penjualan</label>
                        <div class="controls">
                            <input type="text" name="tgl_penjualan" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker"">
                                   <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Harga Jual</label>
                        <div class="controls">
                            <input type="text" name="harga_penjualan" id="harga_penjualan" value="" readonly="readonly" placeholder="--Pilih Jenis Motor--" >
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tenor</label>
                        <div class="controls">
                           <select name="tenor" style="width: 23.2%" onchange="ten()">
                              <option value="">-- Pilih Tenor --</option>
                              <option value=6 >6 Bulan</option>
                              <option value=12 >12 Bulan</option>
                              <option value=24 >24 Bulan</option>
                              <option value=36 >36 Bulan</option>
                            </select>
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Bunga</label>
                        <div class="controls">
                            <input type="text" name="bunga" id="bunga" readonly="readonly" placeholder="--Isi Tenor--">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Harga Kredit</label>
                        <div class="controls">
                            <input type="text" name="harga_bunga" id="harga_bunga" readonly="readonly" placeholder="--Isi Tenor--">
                            <span></span>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">DP</label>
                        <div class="controls">
                            <input type="number" name="dp" oninput="bagi()" id="dp">
                            <span></span>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Angsuran</label>
                        <div class="controls">
                            <input type="text" name="angsur_bulan" id="angsur_bulan" readonly="readonly" placeholder="--Isi Tenor & DP--">
                            <span></span>
                        </div>
                    </div>
                 
                      <div class="control-group">
                        <label class="control-label">Sisa Cicilan</label>
                        <div class="controls">
                            <input type="text" name="sisa_cicilan" class="form-field" readonly="readonly" placeholder="--Isi Tenor & DP--">
                                   <span></span>
                        </div>
                    </div>

                       <div class="control-group">
                        <label class="control-label">Pembeli</label>
                        <div class="controls">
                            <input type="text" name="pembeli" class="form-field"">
                                   <span></span>
                        </div>
                    </div>
        
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>
             <script type="text/javascript">
        <?php echo $jsArrayNama; ?>
        function changeValueNama(jenis_motor){
            console.log(jenis_motor);
            console.log(idTipe);    
            document.getElementById('harga_penjualan').value = idTipe[jenis_motor].harga;
        }
        </script>

        </div>
    </div><!--/span-->

</div><!--/row-->
<script  type="text/javascript">

</script>