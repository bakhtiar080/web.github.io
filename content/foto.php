<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="bakorwil, bakorwil bojonegoro, bojonegoro, kota bojonegoro, jawa timur">
<meta name="description" content="Bakorwil Bojonegoro - Pemerintahan Provinsi Jawa Timur">
<link rel="stylesheet" href="gallery/colorbox.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="colorbox/jquery.colorbox.js"></script>
	<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$(".group1").colorbox({rel:'group1'});
			$(".group2").colorbox({rel:'group2', transition:"fade"});
			$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
			$(".group4").colorbox({rel:'group4', slideshow:true});
			$(".ajax").colorbox();
			$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
			$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			$(".inline").colorbox({inline:true, width:"50%"});
			$(".callbacks").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});

			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});

	</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Gallery</title>
</head>

<body>
<div class="body_wrap">
    	<div class="left_body_wrap">
        	<div class="left_body_main">
            <!--body_part_left_start-->
            	<div class="main_wrap">
                <p><span class="welcome_text">Foto</span><span class="web_text"> Galleri</span><br /><br />

	<?php
	//tampil data
		//include "koneksi.php";
		//To protect MySQL injection (more detail about MySQL injection)
		//$start = stripslashes($start);
		//$start = mysql_real_escape_string($start);
		//$limit = stripslashes($limit);
		//$limit = mysql_real_escape_string($limit);
		//$eu = stripslashes($eu);
		//$eu = mysql_real_escape_string($eu);

		$page_name="index.php?page=content/foto.php";// If you use this code with a different page ( or file ) name then change this
		if(isset($_GET['start']))
		{
			$start = $_GET['start'];

			if(strlen($start) > 0 and !is_numeric($start)){
			echo "Data Error";
			exit;}
		}
		else{$start=0;}


		$eu = ($start - 0);
		$limit = 5;// No of records to be shown per page.
		$this1 = $eu + $limit;
		$back = $eu - $limit;
		$next = $eu + $limit;

		$query2=" SELECT * FROM gallery group by judul";
		$result2=mysqli_query($connect ,$query2);
		echo mysqli_error($connect);
		$nume=mysqli_num_rows($result2);

		$query=" SELECT * FROM gallery group by judul ASC limit $eu, $limit";
		$result=mysqli_query($connect ,$query);
		echo mysqli_error($connect);
		while($noticia = mysqli_fetch_assoc($result))
		{
		 echo "<div class='box-galls'>";
		 echo "<div style='font-family:Tahoma;font-size:20px; margin-left:25px; margin-right:20px;'><b>$noticia[judul]</b></div>";
		 echo "<div align='justify' style='font-size:12px; color:#666666; margin-left:24px; margin-right:20px; line-height:20px;'>";
		 echo "$noticia[deskripsi]";
		 echo "</div>";


			 $judul=$noticia['judul'];
			 $query1="SELECT * FROM gallery where judul='$judul'";
			 $result1=mysqli_query($connect ,$query1);
			 echo mysqli_error($connect);
			 while($noticia1 = mysqli_fetch_assoc($result1))
			 {
				 echo "<a class='group4' href='$noticia1[url_foto]$noticia1[pic]' title='Foto Album'><img src='$noticia1[url_foto]$noticia1[pic]'  width='140px' height='140px' style='margin-left:20px; margin-top:20px; margin-bottom:10px;'/></a>";
			 }

		echo "</div>";
		}
		echo "<div class='box-paging2'>";

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
