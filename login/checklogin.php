<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="Bakorwil2"; // Database name
$tbl_name="userlogin"; // Table name

// Connect to server and select databse.
// mysql_connect("$host", "$username", "$password")or die("cannot connect");
// mysql_select_db("$db_name")or die("cannot select DB");
$koneksi=mysqli_connect($host, $username, $password, $db_name)or die("cannot connect");
mysqli_select_db($koneksi ,$db_name)or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

//$_SESSION['status']=$status;
$_SESSION['myusername']=$myusername;

// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);

// $cek="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
// if (mysqli_num_rows($cek)==1) {
//   $c=mysqli_fetch_assoc($cek);
//   $_SESSION['status']=$status;
//   $_SESSION['myusername']=$myusername;
//   if ($c['status']=='Super_Admin') {
//     header('location:../cpanel1.php?page=login/login_success.php');
//   }
// }

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($koneksi, $sql);
// while ($isi = mysqli_fetch_assoc($result)){
// $status=$isi['status'];
// }
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
  // Register $myusername, $mypassword and redirect to file "admin page.php"
  //session_register("myusername");
  //session_register("mypassword");
  // $_SESSION['status']=$status;
  // $_SESSION['myusername']=$myusername;
  $row = mysqli_fetch_assoc($result);
  $_SESSION['namaLog'] = $row['username'];
  $status = $row['status'];
  $_SESSION['status']=$status;
  $_SESSION['myusername']=$myusername;

  // if ($_SESSION['status']=='Super_Admin') {
  //   header('location:../cpanel1.php?page=login/login_success.php');
  // }

  header('location:../cpanel1.php?page=login/login_success.php');
  //echo "$myusername";
}

else {
  echo "<script>alert('LOGIN FAIL!!  Please Check Your Username dan Password!!');javascript:history.go(-1);</script>";
  //echo "$myusername";
}
ob_end_flush();
?>
