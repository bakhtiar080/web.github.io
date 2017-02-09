<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/agenda/datetimepicker_css.js"></script>
<title>Add Data Gallery</title>
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
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;"><a href="cpanel1.php?page=admin/gallery/gallery.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  ADD NEW GALLERY </div></td>
  </tr>

  <tr>
    <td width="23">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p><strong>Judul Gallery </strong></p>
      <p>
        <textarea name="judul" cols="51" rows="10" id="judul" style="font-family:tahoma; font-size:16px; resize : none;"></textarea>
      </p>
      <p>&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p><strong>Deskripsi</strong></p>
       	 <p>
       	   <textarea name="des" cols="51" rows="10" id="des" style="font-family:tahoma; font-size:16px; resize : none;"></textarea>
   	    </p>
   	    <p>&nbsp; </p></td>
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
  <?php
      if($status == 'admin'){
  ?>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Bidang</strong></td>
    <td><select name="bidang" id="bidang" style="font-family:tahoma;font-size:16px">
          <option value="Sekretariat">Sekretariat</option>
          <option value="Pembangunan Ekonomi">Pembangunan Ekonomi</option>
          <option value="Pemerintahan">Pemerintahan</option>
          <option value="Sarpras">Sarpras</option>
          <option value="Tata Usaha">Tata Usaha</option>
          <option value="Kemasyarakatan">Kemasyarakatan</option>
        </select>      </td>
    <td>&nbsp;</td>
  </tr>
  <?php
      }else{
  ?>
      <input type="hidden" name="bidang" value="<?php echo $status ?>">
  <?php
      }
  ?>
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
        <input name="adds" type="Submit" id="adds" style="font-size:16px; font-family:tahoma;" value="    Save Gallery    "/>
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
