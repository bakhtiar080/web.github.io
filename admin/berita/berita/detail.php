<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Berita</title>
</head>

<body>
<div class="navigasi2">
		<div class="agenda-title"><a href="cpanel1.php?page=admin/berita/berita.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  DETAIL DATA BERITA </div>
		<p></p>

</div>
	<?php
	//tampil data
		include "koneksi.php";
		$id = $_GET['detail'];
		$query=" SELECT * FROM berita where id_berita=$id";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_array($result))
		{
		 echo "<div class='box-agenda'>";

		 echo "<div style='margin-left:50px; margin-right:50px; margin-top:10px;'><b></b></div>";
		 echo"<div style='font-family:Century;font-size:20px; margin-left:50px; margin-right:50px;'>$noticia[judul]</div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:50px; margin-right:50px;'>";
		 echo "<b>No Berita : </b>$noticia[id_berita] | ";
		 echo "<b>Tgl : </b>$noticia[tgl] | ";
		 echo "<b>Bidang : </b>$noticia[bidang] | ";
		 echo "<b>Uploader : </b>$noticia[uploader] | ";
		 echo "<b>Counter : </b>$noticia[counter]";
		 echo "</div>";
		 if ($noticia['url_foto']!="") {
		 echo "<br><div align=center><img src='$noticia[url_foto]' width='800px' height='600px'/></div>";
		 echo "<br>";
		 }
		 echo nl2br("<div align='justify' style='font-family:Century;font-size:17px; margin-left:50px; margin-right:50px;'>$noticia[isi_berita]</div><br>");
		 if ($noticia['url_file']!="") {
		 echo "<a style='margin-left: 50px; border:1px solid black; background-color:aqua; padding:3px' href='".$noticia['url_file']."'><strong>Download File</strong></a>";
		 }
		 
		 echo "</div>";
		}
	?>
</body>
</html>
