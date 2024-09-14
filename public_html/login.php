<?php
include("cnc.php");
/////////////
$us=$_POST["user"];
$ps=$_POST["pass"];
//////////////////////
$req="select * from admins where username='$us' and pass='$ps' ";
$res=mysqli_query($id,$req);

////////////
$req1="select * from users where username='$us' and pass='$ps' ";
$res1=mysqli_query($id,$req1);
//////////////
if (mysqli_num_rows($res)==0 and mysqli_num_rows($res1)==0) {
echo "<script>window.location.replace('http://localhost/bank management/index.html');</script>";
}
elseif (mysqli_num_rows($res1)>0) {
  session_start();
  $_SESSION['user'] = $us;
  include("clientHome.html");
}else{
  session_start();
  $_SESSION['user'] = $us;
  require("adminHome.html");
}