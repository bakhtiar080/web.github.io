<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Berita</title>
</head>

<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Data</span><span class="web_text"> Berita</span><br /><br />

		<div class="navigasi2">

		<p>
		<a href="cpanel1.php?page=admin/berita/add.php">+ Tambah Data Baru</a>&nbsp;&nbsp;
		<?php
      	if($status == 'admin'){
  		?>
		<a href="cpanel1.php?page=admin/berita/berita.php&amp;&amp;hapus=all" onClick="return confirm('Are you sure delete all berita data?');">Hapus Semua Data</a>  </p>
		<?php
			}
		 ?>
		<p>
		<?php
		//update
			//session_start();
			include "koneksi.php";
		if (isset($_POST['edit'])){
			$id_berita = $_POST['id_berita'];
			$judul = $_POST['judul'];
			$berita = $_POST['berita'];
			$tgl = $_POST['tgl'];
			$bidang = $_POST['bidang'];
			$fileName = $_FILES['poto']['name'];
			$uploader= $_SESSION['myusername'];



			if($judul=='' and $berita==''){echo "<script>alert('Judul and Berita Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($judul==''){echo "<script>alert('Judul Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($berita==''){echo "<script>alert('berita Harus Di isi');javascript:history.go(-1);</script>";}
			else{
					if($fileName==''){

						$query = "UPDATE berita SET judul='$judul', tgl='$tgl', isi_berita='$berita', bidang='$bidang', uploader='$uploader' WHERE id_berita='$id_berita'";
						$sql = mysqli_query ($connect ,$query);

						if ($sql)
								{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
								else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
						}

					if($fileName<>''){
					$queryfoto = "SELECT url_foto FROM berita WHERE id_berita='$id_berita'";
					$sql = mysqli_query ($connect ,$queryfoto);
					$hasil = mysqli_fetch_assoc ($sql);
					$myFile = "$hasil[url_foto]";
					@unlink($myFile);
							$uploadDir = 'admin/berita/images/';
							$fileName = $_FILES['poto']['name'];
							$tmpName = $_FILES['poto']['tmp_name'];
							$fileSize = $_FILES['poto']['size'];
							$fileType = $_FILES['poto']['type'];

							if($fileSize>'1000000'){echo "<script>alert('File Foto Max 1MB');javascript:history.go(1);</script>";}
				                        else{
							$filePath = $uploadDir . $fileName;
							$result = move_uploaded_file($tmpName, $filePath);
							if (!$result) {
							//echo "Upload Gambar Gagal";
							//exit;
							}
							if(!get_magic_quotes_gpc())
							{
							$fileName = addslashes($fileName);
							$filePath = addslashes($filePath);}

						$query = "UPDATE berita SET judul='$judul', tgl='$tgl', url_foto='$filePath', isi_berita='$berita', bidang='$bidang', uploader='$uploader' WHERE id_berita='$id_berita'";
							$sql = mysqli_query ($connect ,$query);

							if ($sql)
									{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
									else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
						}
				}
		}}
		?>

		<?php
		//simpan
			//session_start();
			include "koneksi.php";
							$filePath='';
				$filePath2='';
		if (isset($_POST['add'])){
			$judul = $_REQUEST['judul'];
			$tgl = $_REQUEST['tgl'];
			$berita = $_REQUEST['berita'];
			$bidang = $_REQUEST['bidang'];
			$uploader=$_SESSION['myusername'];

			if($judul=='' and $berita==''){echo "<script>alert('Judul and Berita Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($judul==''){echo "<script>alert('Judul Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($berita==''){echo "<script>alert('Berita Harus Di isi');javascript:history.go(-1);</script>";}
			else{

				if(!empty($_FILES['poto']['name'])){
					$uploadDir = 'admin/berita/images/';
					$fileName = $_FILES['poto']['name'];
					$tmpName = $_FILES['poto']['tmp_name'];
					$fileSize = $_FILES['poto']['size'];
					$fileType = $_FILES['poto']['type'];

					if($fileSize>'10000000'){echo "<script>alert('File Foto Max 1MB');javascript:history.go(1);</script>";}
					else{
					$filePath = $uploadDir . $fileName;
					$result = move_uploaded_file($tmpName, $filePath);
					if (!$result) {
					//echo "Upload Gambar Gagal";
					//exit;
					}

					if(!get_magic_quotes_gpc())
					{
					$fileName = addslashes($fileName);
					$filePath = addslashes($filePath);
					}

				}
				}
				if(!empty($_FILES['file_upload']['name'])){
					$uploadDir2 = 'admin/berita/lampiran/';
					$fileName2 = $_FILES['file_upload']['name'];
					$tmpName2 = $_FILES['file_upload']['tmp_name'];
					$fileSize2 = $_FILES['file_upload']['size'];
					$fileType2 = $_FILES['file_upload']['type'];

					if($fileSize2>'1000000000'){
						echo "<script>alert('File Foto Max 1MB');javascript:history.go(1);</script>";}
					else{
					$filePath2 = $uploadDir2 . $fileName2;
					$result2 = move_uploaded_file($tmpName2, $filePath2);
					if (!$result2) {
					//echo "Upload Gambar Gagal";
					//exit;
					}

					if(!get_magic_quotes_gpc())
					{
					$fileName2 = addslashes($fileName2);
					$filePath2 = addslashes($filePath2);
					}

				}
				}
				//upload file





			$sql = "insert into berita (judul,tgl,isi_berita,url_foto,bidang,uploader,counter,url_file)
					values('$judul','$tgl','$berita','$filePath','$bidang','$uploader',0,'$filePath2')";

			$insert_query=mysqli_query($connect ,$sql);

			if ($insert_query)
					{echo "<script>alert('Save New Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Save New Data Fail');javascript:history.go(1);</script>";}
			}}
		?>


		<?php
		//delete
			include "koneksi.php";
			if (isset($_GET['hapus'])) {
			$id = $_GET['hapus'];

				if ($id=="all"){
					$delete = "delete from berita";
					$delete_query=mysqli_query($connect ,$delete);

					$dir = 'admin/berita/images/';
					if($dh = opendir($dir)){
						while(($file = readdir($dh))!== false){
							if(file_exists($dir.$file)) @unlink($dir.$file);
						}
							closedir($dh);
					}

					if ($delete_query)
					{echo "<script>alert('Delete All Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Delete All Data Fail');javascript:history.go(1);</script>";}
				}
				if ($id<>"all"){
					$select= "select url_foto from berita where id_berita=$id";
					$select_query=mysqli_query($connect,$select);
					$delete = "delete from berita where id_berita= $id";
					$delete_query=mysqli_query($connect, $delete);
					while($result = mysqli_fetch_assoc($select_query))
					{
					$myFile = "$result[url_foto]";
					@unlink($myFile);}

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
		include "koneksi.php";
		$query=" SELECT * FROM berita order by id DESC";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-agenda'><div class='navigasi1'><a href='cpanel1.php?page=admin/berita/edit.php&&id=$noticia[id_berita]' title='edit'>Rubah</a> <a href='cpanel1.php?page=admin/berita/berita.php&&hapus=$noticia[id_berita]' onClick=\"return confirm('Are you sure delete news data no $noticia[id_berita]?');\" title='delete'>Hapus</a> <a href='cpanel1.php?page=admin/berita/detail.php&&detail=$noticia[id_berita]' title='detail'>Detail</a> </div>";

		 echo "<b style='margin-left:20px;'></b>";
		 echo"<div style='font-family:Century;font-size:18px; margin-left:20px; margin-right:20px;'>$noticia[judul]</div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:20px; margin-right:20px;'>";
		 echo "<b>No Berita : </b>$noticia[id_berita] | ";
		 echo "<b>Tanggal : </b>$noticia[tgl] | ";
		 echo "<b>Bidang : </b>$noticia[bidang] | ";
		 echo "<b>Uploader : </b>$noticia[uploader] | ";
		 echo "<b>Counter : </b>$noticia[counter]";
		 echo "</div>";
		 echo "</div>";
		}
	?>
        </div></div></div></div>
</body>
</html>
