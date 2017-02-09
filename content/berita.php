<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
<title>Berita</title>
</head>
<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Berita</span><span class="web_text"> Bakorwil Bojonegoro</span><br /><br />
<?php
//include "formatDate.php";
include "koneksi.php";
//To protect MySQL injection (more detail about MySQL injection)
//$start = stripslashes($start);
//$start = mysql_real_escape_string($start);
//$limit = stripslashes($limit);
//$limit = mysql_real_escape_string($limit);
//$eu = stripslashes($eu);
//$eu = mysql_real_escape_string($eu);

$page_name="index.php?page=content/berita.php";// If you use this code with a different page ( or file ) name then change this
if(isset($_GET['start']))
{
    $start = $_GET['start'];

	if(strlen($start) > 0 and !is_numeric($start)){
	echo "Data Error";
	exit;}
}
else{$start=0;}


$eu = ($start - 0);
$limit = 9;// No of records to be shown per page.
$this1 = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;

$query2=" SELECT * FROM berita";
$result2=mysqli_query($connect ,$query2);
echo mysqli_error($connect);
$nume=mysqli_num_rows($result2);

$query="SELECT * FROM berita order by tgl DESC limit $eu, $limit ";
$result=mysqli_query($connect ,$query);
echo mysqli_error($connect);

while($noticia = mysqli_fetch_assoc($result))
{
 				$id = $noticia['id_berita'];
				$judul = $noticia['judul'];
				$tgl = $noticia['tgl'];
				$indo = indonesian_date($tgl) ;
				$isiberita =substr($noticia['isi_berita'],0,320);
				$foto = $noticia['url_foto'];
				$bidang= $noticia['bidang'];
				$uploader = $noticia['uploader'];
				echo "<div class='newss'><img src=$foto width=150px height=150px align=left style='overflow:hidden; margin-right:5px; margin-left:3px;'/>";
				echo "<b>$indo</b><br>";
				echo "<b><a href=index.php?page=content/berita_selengkapnya.php&&id=",$noticia['id_berita']," style='text-decoration:none;'>$judul</a></b><br>$isiberita ...</div>";

}
echo "<div class='box-paging'>";

if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging

/////////////// Start the bottom links with Prev and next link with page numbers /////////////////
//echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
echo "Halaman :  ";
if($back >=0) {
print "<a href='$page_name&&start=$back'><font face='Tahoma' size='4' >&laquo;</font></a>&nbsp";
}
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
//echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo "&nbsp<a href='$page_name&&start=$i'><font face='Tahoma' size='2'>$l</font></a>";
}
else {echo "&nbsp<font face='Verdana' size='4' color=blue>$l</font>";}/// Current page is not displayed as link and given font color red
$l=$l+1;
}

///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) {
print "&nbsp<a href='$page_name&&start=$next'><font face='Tahoma' size='4' >&raquo;</font></a>";}

}// end of if checking suffic
echo "</div>";
?>
</div></div></div></div>
</body>
</html>
