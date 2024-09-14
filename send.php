<?php
include("cnc.php");
//////////////////////
$us=$_SESSION["user"];
$cn=$_SESSION["cn"];
$ru=$_POST["ru"];
$rcn=$_POST["rcn"];
$am=$_POST["am"];
$vp=$_POST["vp"];
$trdt=date('Y-m-d',time());
//////////////////////
$req2="select * from users where username='$us' and pass='$vp'";
$res2=mysqli_query($id,$req2);
$t=mysqli_fetch_assoc($res2);
$req1="select * from users where username='$ru' and cardnum='$rcn'";
$res1=mysqli_query($id,$req1);
if (mysqli_num_rows($res2)>0 && mysqli_num_rows($res1)>0 && $am>5) {
  $req="insert into transactions (user1,card1,user2,card2,trdt,tram) values('$us','$cn','$ru','$rcn','$trdt','$am')";
  $res=mysqli_query($id,$req);
  echo "<script >alert('transaction sent to opperation successfully to username ".$ru." with ".$rcn." as card number')</script >";
  include("transactions.php");
}else{
  echo "<script >alert('Invalid Username or Invalid password or Card Number or amount(>5$)')</script >";
  include("send1.php");
}