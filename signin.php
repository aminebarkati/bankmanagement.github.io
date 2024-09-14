<?php
include("cnc.php");
/////////////////////
$us=strtolower($_POST["user"]);
$ps=$_POST["pass"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$cvv=$_POST["cvv"];
$email=$_POST["email"];
$m=date("m",strtotime("+6 months"));
$y=date("Y",strtotime("+6 months"));
//////////////////////
$req1="select * from users where username='$us'";
$res1=mysqli_query($id,$req1);
$req="select * from admins where username='$us'";
$res=mysqli_query($id,$req);
//////////////////////
if (mysqli_num_rows($res1)>0 || mysqli_num_rows($res)>0) {
  echo "<script>alert('the username is already used . if it s your s please head to the log in page')</script>";
  include("signin.html");
}else{
  $cdn="".rand(1,9);
  for ($i=1; $i <16 ; $i++) {
    $cdn=$cdn.rand(0,9);
  }
  $req0="select * from users";
  $res0=mysqli_query($id,$req0);
  if (mysqli_num_rows($res0)<5) {
    $am=1000;
    echo "<script>alert('signed in with success and gained 1000 $ for being one our five official user')</script>";
  }else{
    $am=0;
    echo "<script>alert('signed in with success')</script>";
  }
  /////////
  $req2="insert into users values('$us','$ps','$cdn','$m','$y','$cvv','$lname','$fname','$email','$gender','$dob',$am)";
  $res2=mysqli_query($id,$req2);
  include("index.html");
}