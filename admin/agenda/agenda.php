<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Agenda</title>
</head>

<body>
<div class="navigasi2">
		<div class="agenda-title"><img src="images/navigasi/agenda.png"  style="vertical-align:middle;" /> DATA AGENDA</div>
		<p><a href="cpanel.php?URLS=admin/agenda/add.php"><img src="images/navigasi/add.png" title="Add New" style="margin-left:350px;"></a>&nbsp;&nbsp;<a href="cpanel.php?URLS=admin/agenda/agenda.php&&hapus=all" onClick="return confirm('Are you sure delete all agenda data?');"><img src="images/navigasi/del-all.png" title="Delete All"></a>  </p>
		<p>
		<?php
		//update
			//session_start();
			include "../../koneksi.php";
		if (isset($_POST['edit'])){
			$id_agendas = $_POST['id_agenda'];
			$agenda = addslashes (strip_tags ($_POST['agenda']));
			$tempat = $_POST['tpt'];
			$tanggal = addslashes (strip_tags ($_POST['tgl']));
			$bidang = addslashes (strip_tags ($_POST['bidang']));

			if($agenda=='' and $tempat==''){echo "<script>alert('Agenda and Tempat Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($agenda==''){echo "<script>alert('Agenda Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($tempat==''){echo "<script>alert('Tempat Harus Di isi');javascript:history.go(-1);</script>";}
			else{
				$uploader=$_SESSION['myusername'];
				//$uploader="admin";
				$query = "UPDATE agenda SET agenda='$agenda',tempat='$tempat',tgl='$tanggal', bidang='$bidang',uploader='$uploader' WHERE id_agenda='$id_agendas'";
				$sql = mysql_query ($query);

				if ($sql)
						{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
						else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
				}
		}
		?>

		<?php
		//simpan
			//session_start();
			include "../../koneksi.php";
		if (isset($_POST['add'])){
			$isi = $_REQUEST['agenda'];
			$tpt = $_REQUEST['tpt'];
			$tgl = $_REQUEST['tgl'];
			$bidang = $_REQUEST['bidang'];

			if($isi=='' and $tpt==''){echo "<script>alert('Agenda and Tempat Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($isi==''){echo "<script>alert('Agenda Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($tpt==''){echo "<script>alert('Tempat Harus Di isi');javascript:history.go(-1);</script>";}
			else{
			$uploader=$_SESSION['myusername'];
			//$uploader="admin";
			$sql = "insert into agenda (agenda,tempat,tgl,bidang,uploader)
					values('$isi','$tpt','$tgl','$bidang','$uploader')";

			$insert_query=mysql_query($sql);

			if ($insert_query)
					{echo "<script>alert('Save New Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Save New Data Fail');javascript:history.go(1);</script>";}
			}}
		?>


		<?php
		//delete
			include "../../koneksi.php";
			if (isset($_GET['hapus'])) {
			$id = $_GET['hapus'];

				if ($id=="all"){
					$delete = "delete from agenda";
					$delete_query=mysql_query($delete);

					if ($delete_query)
					{echo "<script>alert('Delete All Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Delete All Data Fail');javascript:history.go(1);</script>";}
				}
				if ($id<>"all"){
					$delete = "delete from agenda where id_agenda =$id";
					$delete_query=mysql_query($delete);

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
		$query=" SELECT * FROM agenda order by id_agenda DESC";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-agenda'><div class='navigasi1'><a href='cpanel.php?URLS=admin/agenda/edit.php&&id=$noticia[id_agenda]' title='edit'><img src='images/navigasi/edit.png'></a> <a href='cpanel.php?URLS=admin/agenda/agenda.php&&hapus=$noticia[id_agenda]' onClick=\"return confirm('Are you sure delete agenda data no $noticia[id_agenda]?');\" title='delete'><img src='images/navigasi/del.png'></a></div>";

		 echo "<b>Agenda<br></b> ";
		 echo "<div style='font-family:Century;font-size:20px; margin-left:20px; margin-right:20px;'>$noticia[agenda]</div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:20px; margin-right:20px;'>";
		 echo "<b>No Agenda : </b>$noticia[id_agenda] | ";
		 echo "<b>&nbsp; Tanggal : </b>$noticia[tgl] | ";
		 echo "<b>Tempat : </b>$noticia[tempat] | ";
		 echo "<b>Bidang : </b>$noticia[bidang] | ";
		 echo "<b>Uploader : </b>$noticia[uploader]";
		 echo "</div>";
		 echo "</div>";
		}
	?>
</body>
</html>
