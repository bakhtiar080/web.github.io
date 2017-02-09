<?php
//session_start();
include "koneksi.php";
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
$query = "SELECT id_berita,judul,tgl,isi_berita,url_foto,bidang FROM berita WHERE id_berita='$id_berita'";
$sql = mysqli_query ($connect ,$query);
$hasil = mysqli_fetch_assoc ($sql);
$id_berita = $hasil['id_berita'];
$judul = stripslashes ($hasil['judul']);
$tgl = stripslashes ($hasil['tgl']);
$berita = stripslashes ($hasil['isi_berita']);
$foto = stripslashes ($hasil['url_foto']);
$bidang = stripslashes ($hasil['bidang']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/agenda/datetimepicker_css.js"></script>
<title>Edit Data Berita</title>
</head>

<body style="margin-top:10px;">
<form action="cpanel1.php?page=admin/berita/berita.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><div class="agenda-title"><a href="cpanel1.php?page=admin/berita/berita.php" title="Back"><img src="images/back.png" border="0" style="vertical-align:middle;"/></a>  RUBAH DATA BERITA </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="23">&nbsp;</td>
      <td colspan="2"><div align="center">
        <p><img src="<?php echo"$foto";?>" width="510px" /></p>
        <p>&nbsp;</p>
      </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>No Berita </strong></td>
      <td><p>
        <input name="id_berita" type="text" id="id_berita" readonly="readonly" style="font-family:tahoma; font-size:16px;" value="<?php echo "$id_berita";?>" size="5" maxlength="12"/>
        </p>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><p>&nbsp;</p>
        <p><strong>Judul</strong>
        </p>
        <p>
          <textarea name="judul" cols="51" rows="5" id="judul" maxlength="200" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo"$judul";?></textarea>
        </p>
        <p>&nbsp;</p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Photo</strong></td>
      <td><input name="poto" type="file" id="poto" style="font-size:16px; font-family:tahoma;" size="28" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><p>&nbsp;</p></td>
      <td colspan="2"><p>&nbsp;</p>
        <p><strong>Berita</strong></p>
        <p>
          <textarea name="berita" cols="51" rows="20" id="berita" style="font-family:tahoma; font-size:16px; resize : none;"><?php echo"$berita";?></textarea>
        </p>
      <p>&nbsp; </p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="99"><p><strong>Tanggal</strong></p>
      <p>&nbsp;</p></td>
      <td width="258"><label for="demo1"></label>
          <p>
            <input name="tgl" type="text" id="demo1" style="cursor:pointer; font-family:tahoma; font-size:16px;" onclick="javascript:NewCssCal('demo1')" value="<?php echo"$tgl";?>" size="25" maxlength="25"/>
        </p>
        <p>&nbsp;</p></td>
      <td width="29">&nbsp;</td>
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
          <option value="Tata_Usaha">Tata Usaha</option>
          <option value="Sarpras">Sarpras</option>
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

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">
          <input name="edit" type="submit" id="edit" style="font-size:16px; font-family:tahoma;" value="    Update    "/>
      </div></td>
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
