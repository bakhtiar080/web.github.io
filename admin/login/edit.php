<?php
//session_start();
include "koneksi.php";
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
$query = "SELECT id_user, username, password, url_foto
         FROM userlogin WHERE id_user='$id_user'";
$sql = mysqli_query ($connect,$query);
$hasil = mysqli_fetch_array ($sql);
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
<form action="cpanel1.php?page=admin/login/login.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;">&nbsp;&nbsp;<a href="cpanel1.php?page=admin/login/login.php" title="Back"><img src="images/back.png" style="vertical-align:middle;"/></a> RUBAH DATA BERITA</div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><div class="infouser">
      <p>&nbsp;</p>
      <p><?php echo "<img src=$foto width=300px height=300px/>";?></p>
      <p>&nbsp;</p>
    </div></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p><strong>No User </strong></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input name="id_user" type="text" id="id_user" readonly="readonly" style="font-family:tahoma; font-size:16px;" value="<?php echo "$id_user";?>" size="5" maxlength="12"/>
    </p>
      <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="10">&nbsp;</td>
    <td width="157"><p><strong>Username</strong></p>
      <p>&nbsp;</p></td>
    	<td>
     		 <p>
     		   <input name="usr" type="text" id="usr" style="font-family:tahoma; font-size:16px;" value="<?php echo "$username";?>" size="30" maxlength="12"/>
   		   </p>
   		   <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p><strong>Password</strong></p>
      <p>&nbsp;</p></td>
    <td width="254"><label for="demo1">
      <input name="pwd" type="text" id="pwd" style="font-family:tahoma; font-size:16px;" value="<?php echo "$password";?>" size="30"/>
      <br />
      <br />
    </label></td>
    <td width="13">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><p><strong>Changes Statu</strong></p>
      <p>&nbsp;</p></td>
    <td><p>
      <select name="status" id="status" style="font-family:tahoma; font-size:16px;">
        <option value="Admin">Admin</option>
        <option value="Operator">Operator</option>
      </select>
        </p>
      <p>&nbsp;</p>
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p><strong>Changes Photo</strong></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input name="poto" type="file" id="poto" style="font-size:16px; font-family:tahoma;" />
    </p>
      <p>&nbsp; </p></td>
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
        <input name="edit" type="submit" id="edit" value="    Update    " style="font-size:16px; font-family:tahoma;" />
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
