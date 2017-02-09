<?php
//session_start();
include "koneksi.php";

if (isset($_SESSION['myusername'])) {
    $usrname = $_SESSION['myusername'];
} else {
    die ("Error. No Id Selected! ");
}

if (isset($_POST['edit'])){
			$id_user = $_POST['id_user'];
			$usr = $_POST['usr'];
			$pwd = $_POST['pwd'];
			$fileName = $_FILES['poto']['name'];
			
			if($usr=='' and $pwd==''){echo "<script>alert('Username and Password Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($usr==''){echo "<script>alert('Username Harus Di isi');javascript:history.go(-1);</script>";}
			elseif($pwd==''){echo "<script>alert('Password Harus Di isi');javascript:history.go(-1);</script>";}
			else{
					if($fileName==''){
				
						$query = "UPDATE userlogin SET username='$usr',password='$pwd' WHERE id_user='$id_user'";
						$sql = mysql_query ($query);
					
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
							
							$queryfoto = "SELECT url_foto FROM userlogin WHERE username='$usrname'";
							$sql = mysql_query ($queryfoto);
							$hasil = mysql_fetch_array ($sql);
							$myFile = "$hasil[url_foto]";
							@unlink($myFile);
							
							$query = "UPDATE userlogin SET username='$usr',password='$pwd',url_foto='$filePath' WHERE id_user='$id_user'";
							$sql = mysql_query ($query);
						
							if ($sql)
									{echo "<script>alert('Update Data Success');javascript:history.go(1);</script>";}
									else {echo "<script>alert('Update Data Fail');javascript:history.go(1);</script>";}
						}
				}
		}

$query = "SELECT id_user, username, password, url_foto
         FROM userlogin WHERE username='$usrname'";
$sql = mysql_query ($query);
$hasil = mysql_fetch_array ($sql);
$id_user = $hasil['id_user'];
$username = stripslashes ($hasil['username']);
$password = stripslashes ($hasil['password']);
$foto = stripslashes ($hasil['url_foto']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Edit Data Userlogin</title>
</head>

<body style="margin-top:10px;">
<form action="cpanel.php?URLS=admin/login/edit-profile.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;">&nbsp;&nbsp;<a href="cpanel.php?URLS=admin/login/login.php" title="Back"><img src="images/navigasi/back.png" style="vertical-align:middle;"/></a> <img src="images/navigasi/edit1.png" style="vertical-align:middle;"/> EDIT YOUT PROFILE </div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><div class="infouser"><?php echo "<img src=$foto width=147px height=183px/>";?></div></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="id_user" type="hidden" id="id_user" value="<?php echo "$id_user";?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="10">&nbsp;</td>
    <td width="157"><p><strong>Changes Usrname</strong></p></td>
    	<td>
     		 <input name="usr" type="text" id="usr" style="font-family:tahoma; font-size:16px;" value="<?php echo "$username";?>" size="30" maxlength="12"/>   		</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Changes Pwd</strong></td>
    <td width="254"><label for="demo1">
      <input name="pwd" type="text" id="pwd" style="font-family:tahoma; font-size:16px;" value="<?php echo "$password";?>" size="30"/>
    </label></td>
    <td width="13">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><strong>Changes Photo</strong></td>
    <td><p>
      <input name="poto" type="file" id="poto" style="font-size:16px; font-family:tahoma;" />      
        </p>
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <div align="right">
        <input name="edit" type="submit" id="edit" value="    Update Profile    " style="font-size:16px; font-family:tahoma;" />
      </div>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
