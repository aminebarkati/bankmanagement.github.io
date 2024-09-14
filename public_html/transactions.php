<?php
include("cnc.php");
//////////////////////
if(!isset($_SESSION)){
  session_start();
  $us= $_SESSION['user'];
}
echo "<style>
*{  color:#1e444a;}
table, th, td {
  text-align:center;
  border: 1px solid black;
  border-collapse: collapse;
}
input{
  margin-top:15px;
}
table,h3,a{
  margin:auto;
  width:80%;
  font-size: large;
}
h3{
  text-decoration:underline;
  font-size: x-large;
}
form{
  margin:auto;
  width:400px;
}
</style>";
/////////////////////////

//////////////////////////////
$req1="select * from admins where username='$us'";
$res1=mysqli_query($id,$req1);
if (mysqli_num_rows($res1)==0) {
  $req="select * from transactions where user1='$us' or user2='$us'";
}else{
  $req="select * from transactions";
}
$res=mysqli_query($id,$req);
//////////////////////////
if (mysqli_num_rows($res1)==0) {
  echo "<br><h3>Client : $us</h3><br><br><a style='margin-left:150px;' href='send.html'>make a transaction</a><br><br>";
  echo"  <form action='edit.php' method='post'>
    <fieldset>
      <legend>Take action </legend>
      <input type='text' name='idt' id='idt' placeholder='transaction ID'>
      <select name='ac' id='ac'>
        <option value='Y'>Approve</option>
        <option value='R'>Reject</option>
      </select>
      <input type='submit' value='submit'>
    </fieldset>
  </form><br><br>";
}elseif(mysqli_num_rows($res)>0){
  /////////////////////////
$req1="select count(*) from transactions";
$req2="select count(*) from transactions where state='Y'";
$req3="select count(*) from transactions where state='R'";
$res1=mysqli_query($id,$req1);
$res2=mysqli_query($id,$req2);
$res3=mysqli_query($id,$req3);
$n1=mysqli_fetch_row($res1)[0];
$n2=((mysqli_fetch_row($res2)[0])/$n1)*100;
$n3=((mysqli_fetch_row($res3)[0])/$n1)*100;
$n22=$n2+$n3;
///////////////////////
echo"
<style>
  #shape{
    margin:auto;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    background: conic-gradient(#3498db  0%, #3498db $n2%, #2ecc71  $n2%, #2ecc71  $n22%,#e74c3c $n22%,#e74c3c 100%);
  }
  .btn{
    width:10px;
    height:10px;
  }
  label{
    margin-left:20px;
  }
  #t1 *,#t1{
    border:none;
  }
</style>
    <br><br>
    <table id='t1'>
      <tr>
        <td><div id='shape'></div></td>
      </tr>
      <tr>
      <td>
        <button class='btn' style='background-color:#3498db;'></button><label>transacations approved</label><br>
        <button class='btn' style='background-color:#2ecc71;'></button><label>transacations regected</label><br>
        <button class='btn' style='background-color:#e74c3c;'></button><label>transacations in process</label><br>
        </td>
      </tr>
    </table><br><br><br>
";
}
//////////////////////////
echo"<br><table><tr>
  <th>Transaction ID</th>
  <th>Sender's Username</th>
  <th>Card number</th>
  <th>Receiver's Username</th>
  <th>Card number</th>
  <th>Date of transaction</th>
  <th>Amount</th>
  <th>State</th>
</tr>";
if (mysqli_num_rows($res)>0) {
  for ($i=0; $i <mysqli_num_rows($res) ; $i++) { 
    $t=mysqli_fetch_assoc($res);
    echo"<tr style='height:40px'>";
    foreach ($t as $key => $value) {
      if ($key=="state" && $value=="N") {
      echo"
        <td>waiting for action</td>";
      }elseif($key=="state" && $value=="Y"){
        echo"<td>approved</td>";
      }elseif($key=="state" && $value=="R"){
        echo"<td>Rejected</td>";
      }else {
        echo"<td>$value</td>";
      }

    }
    echo"</tr>";
}
}else{
  echo "<tr><td colspan='8'>No Transaction Yet!</td></tr>";
}


echo"</table>";