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
<title>Add More Photo Gallery</title>
</head>
<script language="javascript">  
  function fncCreateElement(){  
     
  var mySpan = document.getElementById('mySpan');  
     
  var myElement1 = document.createElement('input');  
  myElement1.setAttribute('type',"file");  
  myElement1.setAttribute('name',"fileUpload[]"); 
  myElement1.setAttribute('size',"40px");
  myElement1.setAttribute('style',"font-size:16px; font-family:tahoma;");
  mySpan.appendChild(myElement1);  
    
  var myElement2 = document.createElement('<br>');  
  mySpan.appendChild(myElement2);  
  }  
</script>

<body style="margin-top:10px;">
<form action="cpanel1.php?page=admin/gallery/gallery.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;"><a href="cpanel1.php?page=admin/gallery/gallery.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  ADD MORE PHOTO </div></td>
  </tr>
  
  <tr>
    <td width="23">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p><strong>Judul Berita</strong></p>
      <p>
        <textarea name="judul" cols="51" rows="10" readonly="readonly" id="judul" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo "$judul"; ?>
</textarea>
      </p>
      </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p><strong>Keterangan</strong></p>
      <p>
        <textarea name="des" cols="51" rows="10" readonly="readonly" id="des" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo"$des";?>
</textarea>
      </p></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="99"><p><strong>Foto</strong></p>
      </td>
    <td width="258"><label for="demo1"></label>
      <p>&nbsp;</p>      </td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p>
      <input name="btnButton" type="button" size="60" value="[ + ] Add More Photo" onclick="JavaScript:fncCreateElement();" style="font-family:tahoma; font-size:16px;" />
        <input name="fileUpload[]" type="file" size="40" style="font-family:tahoma; font-size:16px;" />
        <br />
        <span id="mySpan"></span> <br />      
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
    <td>
      <div align="right">
        <input name="add-more" type="submit" id="add-more" style="font-size:16px; font-family:tahoma;" value="    Save Gallery    "/>
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
