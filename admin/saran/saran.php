<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Saran dan Kritik</title>
</head>

<body>
<div class="navigasi2">
		<div class="agenda-title"><img src="images/navigasi/saran.png" style="vertical-align:middle;" /> DATA SARAN DAN KRITIK </div>
		<p><a href="cpanel.php?URLS=admin/saran/saran.php&&hapus=all" onClick="return confirm('Are you sure delete all saran dan kritik data?');"><img src="images/navigasi/del-all.png" title="Delete All" style="margin-left:235px;"></a>  </p>
		<p>
		<?php
		//delete
			include '../../koneksi.php';
			if (isset($_GET['hapus'])) {
			$id = $_GET['hapus'];

				if ($id=="all"){
					$delete = "delete from pesan";
					$delete_query=mysqli_query($connect ,$delete);

					if ($delete_query)
					{echo "<script>alert('Delete All Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Delete All Data Fail');javascript:history.go(1);</script>";}
				}
				if ($id<>"all"){
					$delete = "delete from pesan where id_pesan =$id";
					$delete_query=mysqli_query($connect ,$delete);

					if ($delete_query)
					{echo "<script>alert('Delete Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Delete Data Fail');javascript:history.go(1);</script>";}
				}
			}

		?>
		</p>
</div>
	<?php
	//tampil data
		include "../../koneksi.php";
		$query=" SELECT * FROM pesan order by id_pesan DESC";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-agenda'><div class='navigasi1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cpanel.php?URLS=admin/saran/saran.php&&hapus=$noticia[id_pesan]' onClick=\"return confirm('Are you sure delete pesan data no $noticia[id_pesan]?');\" title='delete'><img src='images/navigasi/del.png'></a></div>";

		 echo "<b>Pesan<br></b> ";
		 echo "<div style='font-family:Century;font-size:20px; margin-left:20px; margin-right:20px;'>$noticia[pesan]</div>";
		 echo "<div style='font-size:12px; color:#666666; margin-left:20px; margin-right:20px;'>";
		 echo "<b>Nama Pengirim : </b>$noticia[nama] | ";
		 echo "<b>Email : </b>$noticia[mails] | ";
		 echo "<b>No : </b>$noticia[id_pesan] | ";
		 echo "<b>Tanggal : </b>$noticia[tgl] | ";
		 echo "<b>Ip Address : </b>$noticia[ipadd]";
		 echo "</div>";
		 echo "</div>";
		}
	?>
</body>
</html>
