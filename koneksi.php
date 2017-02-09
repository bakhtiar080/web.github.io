<?php
date_default_timezone_set('Asia/Bangkok');
$host="localhost";
$user="root";
$pwd="";
$DB="bakorwil2";

$connect=mysqli_connect($host, $user, $pwd, $DB) or die("koneksi gagal");
// $konek=mysql_connect($host,$user,$pwd) or die("Koneksi Gagal");
// $PilihDB=mysql_select_db($DB,$konek) or die("Database Tidak Ada");

?>
