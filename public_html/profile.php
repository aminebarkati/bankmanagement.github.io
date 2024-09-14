<?php
include("cnc.php");
//////////////////////
session_start();
$us= $_SESSION['user'];
//////////////////////////////
$req="select * from users where username='$us'";
$res=mysqli_query($id,$req);
$t=mysqli_fetch_assoc($res);
//////////////////////////
echo"<style>table,h3{margin-left:200px;font-size: larger;color:#1e444a;}h3{text-decoration:underline;font-size: x-large;}</style><h3>Client : $us</h3><table>";
foreach ($t as $key => $value) {
  if($key=="balance"){
      if ($value==-1000) {
        $m="Be carefull you have reached the red line !!";
      }elseif($value<0){
        $m="You are under balance we have loaned you some money!!";
      }else{
        $m="";
      }
      echo"<tr style='height:40px'>
        <td>$key :</td>
        <td >$value $\t".$m."</td>
      </tr>";
  }elseif ($key!="pass" && $key!="bd" && $key!="gender" ) {
      if ($key=="cardnum") {
        $_SESSION['cn'] = $value;
      }
      echo"<tr style='height:40px'>
        <td>$key :</td>
        <td >$value</td>
      </tr>";
  }
}
echo"</table>";