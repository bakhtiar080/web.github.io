<?php
//session_start();
include "../../koneksi.php";
if (isset($_GET['id'])) {
    $id_agenda = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
$query = "SELECT id_agenda, agenda, tempat, tgl, bidang, uploader
         FROM agenda WHERE id_agenda='$id_agenda'";
$sql = mysql_query ($query);
$hasil = mysql_fetch_array ($sql);
$id_agenda = $hasil['id_agenda'];
$agenda = stripslashes ($hasil['agenda']);
$tempat = stripslashes ($hasil['tempat']);
$tanggal = stripslashes ($hasil['tgl']);
$bidang = stripslashes ($hasil['bidang']);
$pengirim = stripslashes ($hasil['uploader']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/agenda/datetimepicker_css.js"></script>
<title>Edit Data Agenda</title>
</head>

<body style="margin-top:10px;">
<form id="form1" name="form1" method="post" action="cpanel.php?URLS=admin/agenda/agenda.php">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;">&nbsp;&nbsp;<a href="cpanel.php?URLS=admin/agenda/agenda.php" title="Back"><img src="images/navigasi/back.png" style="vertical-align:middle;"/></a> <img src="images/navigasi/edit1.png" style="vertical-align:middle;"/> EDIT AGENDA</div></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>No Agenda</strong> </td>
    <td><input name="id_agenda" type="text" id="id_agenda" style="font-family:tahoma; font-size:16px;" size="20" readonly="readonly" value="<?php echo $id_agenda?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p><strong>Agenda</strong></p>
       	 <textarea name="agenda" cols="51" rows="5" id="agenda"  style="font-family:tahoma; font-size:16px; resize : none;"><?php echo $agenda?></textarea>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="23">&nbsp;</td>
    <td width="99"><p><strong>Tempat</strong></p></td>
    	<td>
     		 <input name="tpt" type="text" id="tpt" style="font-family:tahoma; font-size:16px;" size="40" value="<?php echo $tempat?>"/>   		</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Tanggal</strong></td>
    <td width="258"><label for="demo1"></label><input type="Text" name="tgl" id="demo1" maxlength="25" size="25" onClick="javascript:NewCssCal('demo1')" style="cursor:pointer; font-family:tahoma; font-size:16px;" value="<?php echo $tanggal?>"/></td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Bidang</strong></td>
    <td>
      <p>
        <select name="bidang" id="bidang" style="font-family:tahoma;font-size:16px">
          <option value="Sekretariat">Sekretariat</option>
          <option value="Pembangunan Ekonomi">Pembangunan Ekonomi</option>
          <option value="Pemerintahan">Pemerintahan</option>
          <option value="Tata Usaha">Tata Usaha</option>
          <option value="Sarpras">Sarpras</option>
		  <option selected="<?php echo $bidang?>"><?php echo $bidang?></option>
        </select>
      </p>        </td>
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
