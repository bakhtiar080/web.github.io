<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Data Userlogin</title>
</head>

<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Data</span><span class="web_text"> User</span><br /><br />
<div class="navigasi4">
		<p><a href="cpanel1.php?page=admin/login/add.php">  +Tambah Data Baru</a> <a href="cpanel1.php?page=admin/login/login.php&&hapus=all" onClick="return confirm('Are you sure delete all userlogin data?');">Hapus Semua Data</a>  </p>
		<p>
		<?php
		//update
			//session_start();
			include "koneksi.php";
		if (isset($_POST['edit'])){
			$id_user = $_POST['id_user'];
			$usr = $_POST['usr'];
			$pwd = $_POST['pwd'];
			$status = $_POST['status'];
			$fileName = $_FILES['poto']['name'];

			if($usr=='' and $pwd==''){echo "<script>alert('Username and Password Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($usr==''){echo "<script>alert('Username Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($pwd==''){echo "<script>alert('Password Harus Di isi');javascript:history.go(-1);</script>";}
			else{
					if($fileName==''){

						$query = "UPDATE userlogin SET username='$usr',password='$pwd',status='$status' WHERE id_user='$id_user'";
						$sql = mysqli_query ($connect ,$query);

						if ($sql)
								{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
								else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
						}

					if($fileName<>''){
							$uploadDir = 'admin/login/images/';
							$fileName = $_FILES['poto']['name'];
							$tmpName = $_FILES['poto']['tmp_name'];
							$fileSize = $_FILES['poto']['size'];
							$fileType = $_FILES['poto']['type'];

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

							$query = "UPDATE userlogin SET username='$usr',password='$pwd',status='$status' ,url_foto='$filePath' WHERE id_user='$id_user'";
							$sql = mysqli_query ($connect ,$query);

							if ($sql)
									{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
									else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
						}
				}
		}
		?>

		<?php
		//simpan
			include "koneksi.php";
		if (isset($_POST['add'])){
			$usr = addslashes (strip_tags ($_POST['usr']));
			$pwd = addslashes (strip_tags ($_POST['pwd']));
			$status = addslashes (strip_tags ($_POST['status']));

			if($usr=='' and $pwd==''){echo "<script>alert('Username and Password Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($usr==''){echo "<script>alert('Username Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($pwd==''){echo "<script>alert('Password Harus Di isi');javascript:history.go(-1);</script>";}
			else{

				$uploadDir = 'admin/login/images/';
				$fileName = $_FILES['poto']['name'];
				$tmpName = $_FILES['poto']['tmp_name'];
				$fileSize = $_FILES['poto']['size'];
				$fileType = $_FILES['poto']['type'];

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

				$sql = "insert into userlogin (username,password,status,url_foto)
					values('$usr','$pwd','$status','$filePath')";

				$insert_query=mysqli_query($connect ,$sql);

				if ($insert_query)
					{echo "<script>alert('Save New Data Success');javascript:history.go(1);</script>";}
				else {echo "<script>alert('Save New Data Fail');javascript:history.go(1);</script>";}
				}
			}
		?>


		<?php
		//delete
			include "koneksi.php";
			if (isset($_GET['hapus'])) {
			$id = $_GET['hapus'];

				if ($id=="all"){
					$delete = "delete from userlogin where status <> 'Super Admin'";
					$delete_query=mysqli_query($connect ,$delete);

					//$dir="admin/login/images/";
					$dir = 'admin/login/images/';
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

					$select= "select url_foto from userlogin where id_user=$id";
					$select_query=mysqli_query($connect,$select);
					$delete = "delete from userlogin where id_user= $id";
					$delete_query=mysqli_query($connect ,$delete);
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
		$query=" SELECT * FROM userlogin where status<>'Super Admin'order by id_user";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		if (!is_file($noticia['url_foto'])){$foto="images/User.png";}
		else {$foto=$noticia['url_foto'];}

		 echo "<div class='box-login'><div class='navigasi3'><a href='cpanel1.php?page=admin/login/edit.php&&id=$noticia[id_user]' title='edit'><img src='images/edit.png'></a> <a href='cpanel1.php?page=admin/login/login.php&&hapus=$noticia[id_user]' onClick=\"return confirm('Are you sure delete userlogin $noticia[username]?');\" title='delete'><img src='images/del.png'></a></div>";
		 echo "<img src='$foto' width='205px' height='183px' style='margin-top:2px; margin-left:3px;'><br>";
		 echo "<div style='font-size:12px;'>";
		 echo "<b>Username : </b>$noticia[username]<br>";
		 echo "<b>Status : </b>$noticia[status]<br>";
		 echo "</div></div>";

		}
	?>
       </div></div></div></div>
</body>
</html>
