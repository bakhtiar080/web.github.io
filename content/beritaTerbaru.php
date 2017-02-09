<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
<title>Berita Terbaru</title>
</head>
<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Berita</span><span class="web_text" style="font-family:'Trajan Pro';"> Terbaru</span><br /><br />
    <?php

		//include "formatDate.php";
		include "koneksi.php";
		$tampilkan_isi = "select * from berita order by id_berita DESC LIMIT 0,7";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
		while ($isi =mysqli_fetch_assoc($tampilkan_isi_sql))
			{
				$id = $isi['id_berita'];
				$judul = $isi['judul'];
				$tgl = $isi['tgl'];
				$indo = indonesian_date($tgl);
				$isiberita =substr($isi['isi_berita'],0,380);
				$foto = $isi['url_foto'];
				$bidang= $isi['bidang'];
				$uploader = $isi['uploader'];
				echo "<div class='newss'><img src=$foto width=200 height=180 align=left style='overflow:hidden; margin-right:5px; margin-left:3px;'/>";
				echo "<b>$indo</b><br>";
				echo "<b style='font-size:14px;'><a href=index.php?page=content/berita_selengkapnya.php&&id=",$isi['id_berita']," style='text-decoration:none;'>$judul</a></b><br>$isiberita...</div>";
		 	}
	?>
    </div></div></div></div>
</body>
</html>
