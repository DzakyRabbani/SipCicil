<?php
session_start();

include "../../fungsi/koneksi.php";

$id_jenis_motor= $_GET['idjenismotor'];
$hasil = mysqli_query("SELECT * FROM jenis_motor WHERE id_jenis_motor = '$idjenismotor'");
  
echo "<option>--pilih Jenis Motor--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_jenis_motor]> $w[jenis_motor]</option>";
}
?>
