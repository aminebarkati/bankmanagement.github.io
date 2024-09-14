<?php
include("cnc.php");
//////////////////////
$idt=$_POST["idt"];
$ac=$_POST["ac"];
if(!isset($_SESSION)){
session_start();
$us= $_SESSION['user'];}
//////////////////////
if ($idt!='') {
$req="select * from transactions where id=$idt";
$res=mysqli_query($id,$req);
$t=mysqli_fetch_assoc($res);
if (mysqli_num_rows($res)==0) {
  echo"<script>alert('Transaction Id incorrect !!')</script>";
  include("transactions.php");
}elseif($t["state"]=="N" and $t["user2"]==$us){
  if ($ac=="Y") {
    $u=$t['user1'];
    $req2="select balance from users where username='$u'";
    $res2=mysqli_query($id,$req2);
    $b=mysqli_fetch_row($res2);
    if ($b[0]+1000>=$t["tram"]) {
      $nb=$b[0]-$t["tram"];
      $req4="update users set balance='$nb' where username='$u'";
      $res4=mysqli_query($id,$req4);
      ///////////////////////////////////////
      $req2="select balance from users where username='$us'";
      $res2=mysqli_query($id,$req2);
      $b=mysqli_fetch_row($res2);
      $nb=$b[0]+$t["tram"];
      echo $nb;
      $req3="update users set balance='$nb' where username='$us'";
      $res3=mysqli_query($id,$req3);
      /////////////////////////////////////////////
      $req1="update transactions set state='$ac' where id=$idt";
      $res1=mysqli_query($id,$req1);
      echo"<script>alert('action taken successfully')</script>";
    }else{
      echo"<script>alert('".$u." have insufficient balance')</script>";
      include("transactions.php");
    }
  }else{
    $req1="update transactions set state='$ac' where id=$idt";
    $res1=mysqli_query($id,$req1);
    echo"<script>alert('action taken successfully')</script>";
  }
  include("transactions.php");
}else{
    echo"<script>alert('action already taken or you are not authorized to take action on this transaction')</script>";
  include("transactions.php");
}
}else{
  echo"<script>alert('Transaction Id incorrect !!')</script>";
  include("transactions.php");
}
