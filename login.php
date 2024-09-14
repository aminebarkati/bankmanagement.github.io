<?php
include("cnc.php");
/////////////
$us=$_POST["user"];
$ps=$_POST["pass"];
//////////////////////
if(isset($us) && isset($ps)){
  $req="select * from admins where username='$us' and pass='$ps' ";
  $res=mysqli_query($id,$req);

  ////////////
  $req1="select * from users where username='$us' and pass='$ps' ";
  $res1=mysqli_query($id,$req1);
  //////////////
  if (mysqli_num_rows($res)==0 and mysqli_num_rows($res1)==0) {
      echo"<script>alert('Username or password is incorrect')</script>";
      echo "<script>window.location.replace('http://localhost/bank%20management/');</script>";
  }
  elseif (mysqli_num_rows($res1)>0) {
    $_SESSION['user'] = $us;
    include("clientHome.html");
  }else{
    $_SESSION['user'] = $us;
    require("adminHome.html");
  } 
}else{
    echo "<script>window.location.replace('http://localhost/bank%20management/');</script>";
}