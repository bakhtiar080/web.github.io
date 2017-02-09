<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<title>Add Data Userlogin</title>
</head>

<body style="margin-top:10px;">
<form action="cpanel1.php?page=admin/login/login.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="508" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5"><div align="center" class="agenda-title" style="vertical-align:middle;">&nbsp;&nbsp;<a href="cpanel1.php?page=admin/login/login.php" title="Back"><img src="images/back.png" style="vertical-align:middle;"/></a>   Tambah Data Userlogin</div></td>
  </tr>

  <tr>
    <td width="20">&nbsp;</td>
    <td width="94"><strong>Username</strong></td>
    <td width="22"><p>&nbsp;</p></td>
    	<td>
     		 <input name="usr" type="text" id="usr" style="font-family:tahoma; font-size:16px;" size="40" maxlength="12"/>   		</td>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Password</strong></td>
    <td>&nbsp;</td>
    <td width="345"><label for="demo1">
      <input name="pwd" type="text" id="pwd" style="font-family:tahoma; font-size:16px;" size="40"/>
    </label></td>
    <td width="27"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Status</strong></td>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td>
      <p>
        <select name="status" id="status" style="font-family:tahoma; font-size:16px;">
          <option value="Admin">Admin</option>
          <option value="Kemasyarakatan">Kemasyarakatan</option>
          <option value="Pembangunan Ekonomi">Pembangunan Ekonomi</option>
          <option value="Pemerintahan">Pemerintahan</option>
          <option value="Sekretariat">Sekretariat</option>
          <option value="Sarana dan Prasarana">Sarana dan Prasarana</option>
        </select>
      </p>
      <p>&nbsp;</p></td>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Photo</strong></td>
    <td>&nbsp;</td>
    <td><input name="poto" type="file" id="poto" style="font-size:16px; font-family:tahoma;"/></td>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <div align="right">
        <input name="add" type="submit" id="add" style="font-size:16px; font-family:tahoma;" value="    Save    "/>
      </div>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>
