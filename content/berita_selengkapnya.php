<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
<title>Berita Selengkapnya</title>
<style type="text/css">
<!--
.style2{color: #FFCC66; font-size: 12px}
.style3 {	font-size: 14px; font-family: Tahoma; font-weight: bold;}
.style4 {	font-size: 16px; font-family: Tahoma; font-weight: bold;}
.style89{color: #000099; font-size: 10px}
.style95{color: #000000; font-size: 12px; line-height:150%}
-->
</style>
</head>
<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Berita</span><span class="web_text"> Selengkapnya</span><br /><br />
<?php
		//include "koneksi.php";
		//include "formatDate.php";
		//To protect MySQL injection (more detail about MySQL injection)
		//$id = stripslashes($id);
		//$id = mysql_real_escape_string($id);

		$id = $_REQUEST['id'];
		$query=" SELECT * FROM berita where id_berita=$id";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);

		//hitung counter pembaca
			$query = "UPDATE berita SET counter=counter+1
			  WHERE id_berita='$id'";
    		$sql = mysqli_query ($connect ,$query);

		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div style='margin-left:50px; margin-right:50px; margin-top:10px;'></div>";
		 echo"<b><div style='font-family:Tahoma;font-size:20px; margin-left:0px; margin-right:0px; text-align:left;'>$noticia[judul]</div></b>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:0px; margin-right:0px;'><br>";
		 //echo "<b>No Berita : </b>$noticia[id_berita] | ";
		 $indo=indonesian_date($noticia['tgl']);
		 echo "<b>Tanggal : </b>$indo | ";
		 echo "<b>Bidang : </b>$noticia[bidang] | ";
		 echo "<b>Uploader : </b>$noticia[uploader] | ";
		 echo "<b>Dibaca : </b>$noticia[counter]";
		 echo "</div><br>";
		 echo "<div align=center><img src='$noticia[url_foto]' width='650px' height='420px'/></div>";
		 echo "<br>";
		 echo nl2br("<div align='justify' style='font-family:Tahoma;font-size:17px; margin-left:0px; margin-right:0px;line-height:30px'>$noticia[isi_berita]</div><br>");
     if ($noticia['url_file']!="") {
       echo "<br>";
       echo "<a style='border:1px solid black; background-color:aqua; padding:3px' href='".$noticia['url_file']."'><strong>Download File</strong></a>";
		 }
    }
	?>
</div></div></div></div>
</body>
</html>
