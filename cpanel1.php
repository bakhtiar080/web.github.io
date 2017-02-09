<?php
session_start();

if (!isset($_SESSION['namaLog'])) {
  echo "<script>alert('Anda harus login lebih dahulu !!!'); window.location.href='login/loginpage.php'</script>";
}

$nama = $_SESSION['myusername'];
$status = $_SESSION['status'];
//$pwd = $_SESSION['mypassword'];
//echo "$nama $pwd";
if(!$_SESSION['myusername']){
//header("location:index.php");
}
		include "koneksi.php";
		$tampilkan_isi = "select * from userlogin where username='$nama'";
		$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
		while ($isi = mysqli_fetch_assoc($tampilkan_isi_sql))
		{
		// $foto = $isi['url_foto'];
		if (!is_file($isi['url_foto'])){$fotoss="images/User.png";}
		else {$fotoss=$isi['url_foto'];}
		 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bakorwil Bojonegoro</title>
<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
<link rel="SHORTCUT ICON" href="http://www.bakorwilmadiun.jatimprov.go.id/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/login.js" type="text/javascript"></script>
</head>

<body>
<div class="header_area">
	<div class="main_area">
    	<p class="collus_text">Jl. Pahlawan No. 31 Bojonegoro Fax : 0351-466778 Telp 0351-433256 Email : info@bakorwilbojonegoro@jatimprov.go.id</p>
    </div>
  <div class="main_area">
    <!--logo_part_start-->
    	<div class="logo_wrap">
        	<p class="logo_pad"><a href="cpanel1.php?page=login/login_success.php"><img src="images/logoCpanel.jpg" alt="Company Name" width="304" border="0" title="Company Name" /></a></p>
        </div>
        <!--logo_part_end-->
        <div class="navarea_wrap">
        <!--nav_part_start-->
        	<div class="nav_wrap">
            	<ul>
								<?php
									if ($status == 'admin') {
									?>
                	<li style="margin-left:300px;">
                    	<?php
										}else{
											?>
										<li style = "margin-left:420px;">
										<?php
									}

						if ($_REQUEST['page'] == 'admin/berita/berita.php')
						{echo "<a href='cpanel1.php?page=admin/berita/berita.php' class='homeactive'>Berita</a>";}
						else {echo "<a href='cpanel1.php?page=admin/berita/berita.php' class='home'>Berita</a>";}
						?>
                    </li>
                    <li>
						<?php
                        if ($_REQUEST['page'] == 'admin/gallery/gallery.php')
                        {echo "<a href='cpanel1.php?page=admin/gallery/gallery.php' class='homeactive'>Foto</a>";}
                        else {echo "<a href='cpanel1.php?page=admin/gallery/gallery.php' class='home'>Foto</a>";}
                     	?>
					</li>
					<?php
						if ($status == 'admin') {
					 ?>
                    <li >
                    	<?php
                        if ($_REQUEST['page'] == 'admin/login/login.php')
                        {echo "<a href='cpanel1.php?page=admin/login/login.php' class='homeactive'>Userlogin</a>";}
                        else {echo "<a href='cpanel1.php?page=admin/login/login.php' class='home'>Userlogin</a>";}
                        ?>
                    </li>
										<?php
												}
										 ?>
                </ul>
                <br class="blank" />
            </div>
            <!--nav_part_end-->
        </div>

  <!--header_part_start--><!--header_part_end-->
</div>
<div class="main_area">
	<div class="growth_wrap2" style="margin-top:120px;">
    	<?php
		echo "<p class='growth_text'><img src='$fotoss' width='150px' /></br><span class='develop_text'>Welcome $nama</span></p>";
		echo "<br><a href='login/logout.php' class='text-logout'><img src='images/logout.png' width='40px' height='40px' style='margin-left:60px;' alt='Logout'/></a>";
		echo "<a href='login/loginpage.php' class='text-logout'><img src='images/switch.png' width='40px' height='40px'/></a>";
		?>
    	    </div>
    <div class="body_wrap">
    	<?php include $Request_URL =$_REQUEST['page'];?>

     </div>
</div><br />
<!--footer_part_start-->

<div class="footer_wrap" style="margin-top:10px;">
	<div class="footer_area">
    	<div class="footer_nav_area">
        	<p class="footer_nav_text"><a href="cpanel1.php?page=admin/berita/berita.php" class="footer">Berita</a>  |  <a href="cpanel1.php?page=admin/gallery/gallery.php" class="footer">Foto</a>
					<?php
						if ($status == 'admin') {
					 ?>
					 	<a href="cpanel1.php?page=admin/login/login.php" class="footer">Userlogin</a>
						</p>
						<?php
					}
						 ?>
        </div>
        <div class="copy_wrap">&copy; Copyright 2016. Bakorwil Bojonegoro. All Reserved.</div>
        <br class="blank" />
    </div>
</div>
<!--footer_part_end-->
</body>
</html>
