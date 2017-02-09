<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Gallery</title>
</head>

<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Gallery</span><span class="web_text"> Foto</span><br /><br />
<div class="navigasi2">
		<p><a href="cpanel1.php?page=admin/gallery/add.php">+ Tambah Data Baru</a>&nbsp;&nbsp;
		<?php
      	if($status == 'admin'){
  		?>
		<a href="cpanel1.php?page=admin/gallery/gallery.php&&status=all" onClick="return confirm('Are you sure delete all gallery data?');">Hapus Semua Data</a>  </p>
		<?php
			}
		 ?>
		<p>
		<?php
		//update
			if (isset($_POST['edit'])) {
				include "koneksi.php";
				$albums=$_POST['juduls'];
				$album=$_POST['judul'];
				$deskripsi=$_POST['des'];
				rename("admin/gallery/images/$albums","admin/gallery/images/$album");
				$query = "UPDATE gallery SET judul='$album',deskripsi='$deskripsi', url_foto='admin/gallery/images/$album/' WHERE judul='$albums'";
				$insert_query=mysqli_query($connect ,$query);

				if ($insert_query)
					{echo "<script>alert('Update Gallery Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Update Gallery Data Fail');javascript:history.go(1);</script>";}
			}
		?>

		<?php
		//add more photo
			if (isset($_POST['add-more'])) {
				include "koneksi.php";
				$album=$_POST['judul'];
				$deskripsi=$_POST['des'];
				$pathFolder="admin/gallery/images/$album";
				//mkdir("$pathFolder",0755);

				for($i=0;$i<count($_FILES["fileUpload"]["name"]);$i++)
				{
				if($_FILES["fileUpload"]["name"][$i] != "")
				{
				if(copy($_FILES["fileUpload"]["tmp_name"][$i],"$pathFolder/".$_FILES["fileUpload"]["name"][$i]))
				{  //echo "Upload File  ".$_FILES["fileUpload"]["name"][$i]." Berhasil!!!!.<br>";
				$gambar= $_FILES["fileUpload"]["name"][$i];
				$Url=addslashes("$pathFolder/");

				//insert to employee
				$sql = "insert into gallery(judul,deskripsi,url_foto,pic)
						values('$album','$deskripsi','$Url','$gambar')";
				$insert_query=mysqli_query($connect ,$sql);
				if ($insert_query)
					{echo "<script>alert('Add More Photo Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Add More Photo Fail');javascript:history.go(1);</script>";}
				}}}
			}
		?>

		<?php
		//simpan
			//session_start();
			include "koneksi.php";
			if (isset($_POST['adds'])) {
			if ($_POST['judul']=="" or $_POST['des']==""){
			echo "<script>alert('Judul dan Deskipsi Gallery Harus di isi!!');javascript:history.go(-1);</script>";
			}
			else{
			$album=$_POST['judul'];
			$deskripsi=$_POST['des'];
			//$tgl = date("y/m/d");
			$pathFolder="admin/gallery/images/$album";
			mkdir("$pathFolder",0777);

			for($i=0;$i<count($_FILES["fileUpload"]["name"]);$i++)
			{
			if($_FILES["fileUpload"]["name"][$i] != "")
			{
			if(copy($_FILES["fileUpload"]["tmp_name"][$i],"$pathFolder/".$_FILES["fileUpload"]["name"][$i]))
			{  //echo "Upload File  ".$_FILES["fileUpload"]["name"][$i]." Berhasil!!!!.<br>";
			$gambar= $_FILES["fileUpload"]["name"][$i];
			$Url=addslashes("$pathFolder/");

			//insert to employee
			$sql = "insert into gallery(judul,deskripsi,url_foto,pic)
					values('$album','$deskripsi','$Url','$gambar')";
			echo mysqli_error($connect);
			$insert_query=mysqli_query($connect,$sql);

			}
			}
			}
			if ($insert_query)
					{echo "<script>alert('Save New Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Save New Data Fail');javascript:history.go(1);</script>";}
			}}
		?>


		<?php
			//delete
			include "koneksi.php";
			if (isset($_GET['status'])) {
			$status = $_GET['status'];
				if ($status=="all"){
					//delete all
					$select= "select judul from gallery group by judul";
					$select_query=mysqli_query($connect ,$select);
					$rows = mysqli_num_rows ($select_query);
					if($rows<>'0'){
							while($result = mysqli_fetch_assoc($select_query))
								{
									$judul=$result['judul'];
									$pathFolder="admin/gallery/images/$judul";

								}
							$delete = "delete from gallery";
							$delete_query=mysqli_query($connect ,$delete);


							if (is_dir($pathFolder))
								  $dir_handle = opendir($pathFolder);
							   if (!$dir_handle)
								  return false;
							   while($file = readdir($dir_handle)) {
								  if ($file != "." && $file != "..") {
									 if (!is_dir($pathFolder."/".$file))
										unlink($pathFolder."/".$file);
									 else
										delete_directory($pathFolder.'/'.$file);
								  }
							   }    closedir($dir_handle);
							   rmdir($pathFolder);
							if ($delete_query)
								{echo "<script>alert('Delete All Data Success');javascript:history.go(1);</script>";}
							else {echo "<script>alert('Delete All Data Fail');javascript:history.go(1);</script>";}
						}

				}


				//delete picture
				if ($status=="picture"){
					$id=$_GET['idpic'];

					$select= "select judul,url_foto,pic from gallery where id_gallery=$id";
					$select_query=mysqli_query($connect ,$select);
					$result = mysqli_fetch_assoc($select_query);

					$pathFolder="admin/gallery/images/$result[judul]";
					$judul=$result['judul'];

					$select2= "select * from gallery where judul='$judul'";
					$select_query2=mysqli_query($connect ,$select2);
					$juduls=mysqli_num_rows($select_query2);

						if ($juduls>'1') {
							$myFile = "$result[url_foto]$result[pic]";
							@unlink($myFile);

							//delete from database
							$delete = "delete from gallery where id_gallery= $id";
							$delete_query=mysqli_query($connect ,$delete);

							if ($delete_query)
							{echo "<script>alert('Delete Picture Success');javascript:history.go(1);</script>";}
							else {echo "<script>alert('Delete Picture Fail');javascript:history.go(1);</script>";}
							}


						if($juduls=='1'){
							if (is_dir($pathFolder))
								  	$dir_handle = opendir($pathFolder);
							   	if (!$dir_handle)
								  	return false;
							   	while($file = readdir($dir_handle)) {
								  	if ($file != "." && $file != "..") {
									 	if (!is_dir($pathFolder."/".$file))
											unlink($pathFolder."/".$file);
										 else
											delete_directory($pathFolder.'/'.$file);
								  			}
							   }    closedir($dir_handle);
							   rmdir($pathFolder);
							   	//delete from database
								$delete = "delete from gallery where id_gallery= $id";
								$delete_query=mysql_query($delete);
							}
				}

				//delete album
				if ($status=="album"){
					$judul=$_GET['judul'];
					$select= "select judul from gallery where judul='$judul'";
					$select_query=mysqli_query($connect ,$select);
					while($result = mysqli_fetch_assoc($select_query))
						{
							$judul=$result['judul'];
							$pathFolder="admin/gallery/images/$judul";

						}
					$delete = "delete from gallery where judul='$judul'";
					$delete_query=mysqli_query($connect ,$delete);


					if (is_dir($pathFolder))
						  $dir_handle = opendir($pathFolder);
					   if (!$dir_handle)
						  return false;
					   while($file = readdir($dir_handle)) {
						  if ($file != "." && $file != "..") {
							 if (!is_dir($pathFolder."/".$file))
								unlink($pathFolder."/".$file);
							 else
								delete_directory($pathFolder.'/'.$file);
						  }
					   }    closedir($dir_handle);
					   rmdir($pathFolder);
					if ($delete_query)
						{echo "<script>alert('Delete Album Data Success');javascript:history.go(1);</script>";}
					else {echo "<script>alert('Delete Album Data Fail');javascript:history.go(1);</script>";}

				}
			}

		?>
		</p>
</div>
	<?php
	//tampil data
		include "koneksi.php";
    $_SESSION['status']=$status;
    if ($status=='admin') {
		$query=" SELECT judul,deskripsi FROM gallery group by judul DESC";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-agenda'><div class='navigasi5'><a href='cpanel1.php?page=admin/gallery/add-more.php&&judul=$noticia[judul]&&des=$noticia[deskripsi]' title='add more photo'>Tambah Foto</a> <a href='cpanel1.php?page=admin/gallery/edit.php&&judul=$noticia[judul]&&des=$noticia[deskripsi]' title='edit gallery'>Rubah</a> <a href='cpanel1.php?page=admin/gallery/gallery.php&&status=album&&judul=$noticia[judul]' onClick=\"return confirm('Are you sure delete this album data');\" title='delete gallery album'>Hapus</a></div>";

		 echo "<b><br></b> ";
		 echo "<div style='font-family:Century;font-size:20px; margin-left:20px; margin-right:20px;'>$noticia[judul]</div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:20px; margin-right:20px;'>";
		 echo "$noticia[deskripsi]";
		 echo "</div>";


			 echo "<div class='box-gallery' align='center'>";
			 $judul=$noticia['judul'];
			 $query1="SELECT id_gallery,url_foto,pic FROM gallery where judul='$judul'";
			 $result1=mysqli_query($connect ,$query1);
			 echo mysqli_error($connect);
			 while($noticia1 = mysqli_fetch_assoc($result1))
			 {
			 //echo "$noticia1[url_foto]$noticia1[pic]";
			echo "<img src='$noticia1[url_foto]$noticia1[pic]' width='160px' height='160px' style='margin-top:10px; margin-left:10px;'/><a href='cpanel1.php?page=admin/gallery/gallery.php&&status=picture&&idpic=$noticia1[id_gallery]' onClick=\"return confirm('Are you sure delete this picture');\" title='delete this picture' title='delete this picture' style='margin-left:-20px; margin-top:10px; position:absolute;'><img src='images/del1.jpg'/></a>";
			 }
			 echo "</div>";

		echo "</div>";
		}

  }else {
    include "koneksi.php";
    $query=" SELECT judul,deskripsi FROM gallery group by judul DESC";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-agenda'>";

		 echo "<b><br></b> ";
		 echo "<div style='font-family:Century;font-size:20px; margin-left:20px; margin-right:20px;'>$noticia[judul]</div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:20px; margin-right:20px;'>";
		 echo "$noticia[deskripsi]";
		 echo "</div>";


			 echo "<div class='box-gallery' align='center'>";
			 $judul=$noticia['judul'];
			 $query1="SELECT id_gallery,url_foto,pic FROM gallery where judul='$judul'";
			 $result1=mysqli_query($connect ,$query1);
			 echo mysqli_error($connect);
			 while($noticia1 = mysqli_fetch_assoc($result1))
			 {
			 //echo "$noticia1[url_foto]$noticia1[pic]";
			echo "<img src='$noticia1[url_foto]$noticia1[pic]' width='160px' height='160px' style='margin-top:10px; margin-left:10px;'/>";
			 }
			 echo "</div>";

		echo "</div>";
  }
}
	?>
          </div></div></div></div>
</body>
</html>
