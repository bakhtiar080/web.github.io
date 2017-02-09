<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Info</title>
<style type="text/css">
<!--
.style3 {font-size: 10px; font-family: Tahoma; color:#FFFFFF;}
.style4 {font-weight: bold; color:#FFFFFF}
.style5 {font-size: 10px; font-family: Tahoma; font-weight: bold; color:#FFFFFF}
.style7 {color: #CCCCCC; font-family: Tahoma; font-weight: bold; font-size: 11px; }
-->
</style>
</head>

<body>
<table width="146" border="0">
  <tr>
    <td colspan="3" bgcolor="#9D0039"><div align="center"><span class="style5">Informasi User </span></div></td>
  </tr>
  <tr>
    <td width="45"><span class="style3">Nama</span></td>
    <td width="3">:</td>
    <td width="159"><span class="style4"><?php echo "<span class='style13'>".$_SESSION['myusername']."</span>"; ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">Status</span></td>
    <td>:</td>
    <td><span class="style4"><?php echo "<span class='style13'>".$_SESSION['status']."</span>"; ?></span></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><p>
      <?php
	
		include "../koneksi.php"; 
		$usrname= "$_SESSION[myusername]";
		$tampilkan_isi = "select * from userlogin where username='$usrname'"; 
		$tampilkan_isi_sql = mysql_query($tampilkan_isi); 
		while ($isi = mysql_fetch_array($tampilkan_isi_sql)) 
		{ 
		 $foto = $isi['url_foto']; 
		 
		if (!is_file($isi['url_foto'])){
			echo "<center><img src=../images/NoPhoto.gif width='120' height='160'/>";}
		else {
			echo "<p align='center'><img src='$foto' width='100%' height='100%'/></p>";}
			//$url="$noticia[url_foto]";}
		 }

	?>
	  </p>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#9D0039"><div align="center" class="style3"><a href="../control-panel/logout.php"><img src="../images/admin/logout.png" width="48" height="48" border="0" /></a><span class="style7"><br>LOGOUT</span></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>





</html>
