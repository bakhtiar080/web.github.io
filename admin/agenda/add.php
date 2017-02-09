<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script src="admin/agenda/datetimepicker_css.js"></script>
<title>Add Data Agenda</title>
</head>

<body style="margin-top:10px;">
<form id="form1" name="form1" method="post" action="cpanel.php?URLS=admin/agenda/agenda.php">
<table width="434" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="agenda-title" style="vertical-align:middle;">&nbsp;&nbsp;<a href="cpanel.php?URLS=admin/agenda/agenda.php" title="Back"><img src="images/navigasi/back.png" style="vertical-align:middle;"/></a> <img src="images/navigasi/add.png" style="vertical-align:middle;"/> ADD NEW AGENDA</div></td>
  </tr>
  
  <tr>
    <td><p>&nbsp;</p>      </td>
    <td colspan="2"><p><strong>Agenda</strong></p>
       	 <textarea name="agenda" cols="51" rows="5" id="agenda" style="font-family:tahoma; font-size:16px; resize : none;"></textarea>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="23">&nbsp;</td>
    <td width="99"><p><strong>Tempat</strong></p></td>
    	<td>
     		 <input name="tpt" type="text" id="tpt" style="font-family:tahoma; font-size:16px;" size="40"/>
   		</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Tanggal</strong></td>
    <td width="258"><label for="demo1"></label><input type="Text" name="tgl" id="demo1" maxlength="25" size="25" onClick="javascript:NewCssCal('demo1')" style="cursor:pointer; font-family:tahoma; font-size:16px;"/></td>
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
        </select>
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
        <input name="add" type="submit" id="add" style="font-size:16px; font-family:tahoma;" value="    Save    "/>
      </div>
    </td>
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
