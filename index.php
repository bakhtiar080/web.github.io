<?php
//$URLS = stripslashes($URLS);
//$URLS = mysql_real_escape_string($URLS);
if(!isset($_REQUEST['page'])){header( 'Location: index.php?page=content/beritaTerbaru.php' );}
?>
<?php
include "koneksi.php";
include "formatDate.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bakorwil Bojonegoro</title>
	<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
	<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
	<link rel="SHORTCUT ICON" href="http://www.bakorwilbojonegoro.jatimprov.go.id/favicon.ico">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="js/login.js" type="text/javascript"></script>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro|Proza+Libre' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="header_area">
		<div class="main_area">
			<p class="collus_text">Jl. Pahlawan No. 31 Bojonegoro Fax : 0351-466778 Telp 0351-433256 Email : info@bakorwilbojonegoro@jatimprov.go.id</p>
		</div>
		<div class="main_area">
			<!--logo_part_start-->
			<div class="logo_wrap">
				<p class="logo_pad"><a href="index.php"><img src="images/logo.jpg" alt="" width="304" border="0" title="" /></a></p>
			</div>
			<!--logo_part_end-->
			<div class="navarea_wrap">
				<!--nav_part_start-->
				<div class="nav_wrap">
					<ul>
						<li>
							<?php
							if ($_REQUEST['page'] == 'content/beritaTerbaru.php')
							{echo "<a href='index.php?page=content/beritaTerbaru.php' class='homeactive'>Beranda</a>";}
							else {echo "<a href='index.php?page=content/beritaTerbaru.php' class='home'>Beranda</a>";}
							?>
						</li>
						<li>
							<?php
							if ($_REQUEST['page'] == 'content/tentangKami.php')
							{echo "<div class='dropdown'><a href='index.php?page=content/tentangKami_sejarah.php' class='homeactive'>Tentang Kami</a>";
							echo "<div style='z-index:100' class='dropdown-content'>
								<b style='padding-right:200px'><a href='index.php?page=content/tentangKami_sejarah.php'>Sejarah</a>
								<a href='index.php?page=content/tentangKami_visiMisidanTupoksi.php'>Visi Misi dan Tupoksi</a>
								<a href='index.php?page=contenttentangKami_SO.php'>Struktur Organisasi</a>
								<a href='#'>Peraturan Perundangan</a>
									<a href='content/FilesDownload/PERDA_12_2008 PERDA_5_2001[C].pdf'>  - PERDA 12 2008</a>
  								<a href='content/FilesDownload/PERGUB_117_2008.pdf'>  - PERGUB 117 2008</a>
								</b>
							</div></div>";}
							else {echo "<div class='dropdown'><a href='index.php?page=content/tentangKami_sejarah.php' class='home'>Tentang Kami</a>";
							echo "<div style='z-index:100' class='dropdown-content'>
								<b style='padding-right:200px'><a href='index.php?page=content/tentangKami_sejarah.php'>Sejarah</a>
								<a href='index.php?page=content/tentangKami_visiMisidanTupoksi.php'>Visi Misi dan Tupoksi</a>
								<a href='index.php?page=content/tentangKami_SO.php'>Struktur Organisasi</a>
								<a href='#'>Peraturan Perundangan</a>
											<a href='content/FilesDownload/PERDA_12_2008 PERDA_5_2001[C].pdf'>  - PERDA 12 2008</a>
        							<a href='content/FilesDownload/PERGUB_117_2008.pdf'>  - PERGUB 117 2008</a>
								</b>
							</div></div>";
							}
							?>
						</li>
						<li>
							<?php
							if ($_REQUEST['page'] == 'content/profiledaerah.php')
							{echo "<a href='index.php?page=content/profiledaerah.php' class='homeactive'>Profil Daerah</a>";}
							else {echo "<a href='index.php?page=content/profiledaerah.php' class='home'>Profil Daerah</a>";}
							?>
						</li>
						<li>
							<?php
								if ($_REQUEST['page'] == 'content/berita.php'){
								echo "<div class='dropdown'><a href='index.php?page=content/berita.php' class='homeactive'>Berita</a>";
								echo "<div style='z-index:100' class='dropdown-content'>
								<b style='padding-right:200px'><a href='index.php?page=content/berita_PembangunanEkonomi.php'>Pembangunan Ekonomi</a>
								<a href='index.php?page=content/berita_kemasyarakatan.php'>Kemasyarakatan</a>
								<a href='index.php?page=content/berita_pemerintahan.php'>Pemerintahan</a>
								<a href='index.php?page=content/berita_sekretariat.php'>Sekretariat</a>
								<a href='index.php?page=content/berita_Sarpas.php'>Sarana dan Prasarana</a>
								</b>
							</div></div>";
								}
								else if ($_REQUEST['page'] == 'content/berita_selengkapnya.php'){
								echo "<div class='dropdown'><a href='index.php?page=content/berita.php' class='homeactive'>Berita</a>";
								echo "<div style='z-index:100' class='dropdown-content'>
								<b style='padding-right:200px'><a href='index.php?page=content/berita_PembangunanEkonomi.php'>Pembangunan Ekonomi</a>
								<a href='index.php?page=content/berita_kemasyarakatan.php'>Kemasyarakatan</a>
								<a href='index.php?page=content/berita_pemerintahan.php'>Pemerintahan</a>
								<a href='index.php?page=content/berita_sekretariat.php'>Sekretariat</a>
								<a href='index.php?page=content/berita_Sarpas.php'>Sarana dan Prasarana</a>
								</b>
								</div></div>";
								}
								else {
								echo "<div class='dropdown'><a href='index.php?page=content/berita.php' class='home'>Berita</a>";
								echo "<div style='z-index:100' class='dropdown-content'>
								<b style='padding-right:200px'><a href='index.php?page=content/berita_PembangunanEkonomi.php'>Pembangunan Ekonomi</a>
								<a href='index.php?page=content/berita_kemasyarakatan.php'>Kemasyarakatan</a>
								<a href='index.php?page=content/berita_pemerintahan.php'>Pemerintahan</a>
								<a href='index.php?page=content/berita_sekretariat.php'>Sekretariat</a>
								<a href='index.php?page=content/beritaSarpras.php'>Sarana dan Prasarana</a>
								</b>
								</div></div>";
								}
								?>
						</li>
						<li>
							<?php
							if ($_REQUEST['page'] == 'content/foto.php')
							{echo "<a href='index.php?page=content/foto.php' class='homeactive'>Foto</a>";}
							else {echo "<a href='index.php?page=content/foto.php' class='home'>Foto</a>";}
							?>
						</li>
						<li><a href="http://ppid.bojonegorokab.go.id/" class="home" target="_blank">PPID</a></li>
					</ul>
					<br class="blank" />
				</div>
				<!--nav_part_end-->
			</div>

			<!--header_part_start--><!--header_part_end-->
		</div>
		<div class="growth_wrap1">
			<?php include "content/slideshowbanner.php";?>

		</div>
		<div class="main_area">
			<div class="growth_wrap">
				<p class="growth_text">Bakorwil Bojonegoro<br /><span class="develop_text">Badan Koordinasi Wilayah Pemerintahan Dan Pembangunan Bojonegoro</span></p>
			</div>
			<div class="body_wrap">
				<?php include $Request_URL =$_REQUEST['page'];?>
				<div class="right_body_wrap">
					<?php include "content/right_menu1.php";?>
				</div>
				<div><img src="images/event_bottom.jpg" alt="" title="" /></div>
				<div class="right_body_wrap">
					<?php include "content/right_menu2.php";?>
				</div>
				<div><img src="images/event_bottom.jpg" alt="" title="" /></div>
			</div>

			<!--body_part_right_end-->
			<br class="blank" />
		</div><br />
		<!--footer_part_start-->

		<div class="footer_wrap">
			<div class="footer_area">
				<div class="footer_nav_area">
					<b><span class="web_text" style="color: #fff;">Contact Us</span>
					<p style="color: #fff;">Alamat : Jl. Pahlawan No. 31 Bojonegoro </p>
					<p style="color: #fff;">Email : info@bakorwilbojonegoro@jatimprov.go.id </p>
					<p style="color: #fff;">Fax : 0351-466778 Telp 0351-433256</p></b>
				</div>
			</div>
		</div>
		<!--footer_part_end-->
	</body>
	</html>
