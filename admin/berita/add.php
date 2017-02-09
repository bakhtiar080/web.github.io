<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/berita/datetimepicker_css.js"></script>
<title>Add Data Berita</title>
</head>

<body style="margin-top:10px;">
<form action="cpanel1.php?page=admin/berita/berita.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div class="agenda-title"><a href="cpanel1.php?page=admin/berita/berita.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  Tambah Data Berita</div></td>
  </tr>

  <tr>
    <td width="23">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p><strong>Judul</strong></p>
      <p>
        <textarea name="judul" cols="51" rows="5" id="judul" maxlength="200" style="font-family:tahoma; font-size:16px; resize : none;"></textarea>
      </p>
      <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Photo</strong></td>
    <td><input name="poto" type="file" id="poto"  style="font-size:16px; font-family:tahoma;" size="28" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p>&nbsp;</p>
      <p><strong>Berita</strong></p>
   	  <p>
   	    <textarea name="berita" cols="51" rows="20" id="berita" style="font-family:tahoma; font-size:16px; resize : none;"></textarea>
   	  </p>
   	  <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td width="99"><strong>Tanggal</strong></td>
    <td width="258"><label for="demo1"></label>
      <p>
        <input type="Text" name="tgl" id="demo1" maxlength="25" size="25" onClick="javascript:NewCssCal('demo1')" style="cursor:pointer; font-family:tahoma; font-size:16px;"/>
      </p>      </td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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

  <tr>
    <td>&nbsp;</td>
    <td><strong>Upload File</strong></td>
    <td><input name="file_upload" type="file" id="file_upload"  style="font-size:16px; font-family:tahoma;" size="28" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
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
  </tr>
</table>
</form>
</body>
</html>
