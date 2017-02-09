<?php 
include "koneksi.php";
$judul = $_GET['judul'];
$des = $_GET['des'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/agenda/datetimepicker_css.js"></script>
<title>Edit Data Gallery</title>
</head>

<body style="margin-top:10px;">
<form action="cpanel1.php?page=admin/gallery/gallery.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;"><a href="cpanel1.php?page=admin/gallery/gallery.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  RUBAH DATA GALLERY </div></td>
  </tr>
  
  <tr>
    <td width="23">&nbsp;</td>
    <td colspan="2"><input name="juduls" type="hidden" id="juduls" value="<?php echo "$judul";?>" /></td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p><strong>Judul Berita</strong></p>
      <p>
        <textarea name="judul" cols="51" rows="10" id="judul" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo "$judul";?>
</textarea>
      </p>
      <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p><strong>Keterangan</strong></p>
       	 <textarea name="des" cols="51" rows="10" id="des" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo "$des";?>
</textarea>    </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p><br />
        <span id="mySpan"></span> <br />      
      </p>      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="99">&nbsp;</td>
    <td width="258">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <div align="right">
        <input name="edit" type="submit" id="edit" style="font-size:16px; font-family:tahoma;" value="    Update Gallery    "/>
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
<p>&nbsp;</p>
</form>
</body>
</html>
