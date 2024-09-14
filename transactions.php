<?php
include("cnc.php");
//////////////////////
$us= $_SESSION['user'];
echo "
<style>

form{
  margin:auto;
  width:400px;
}
#mkt *{
margin-left:10px;
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
if (mysqli_num_rows($res1)==0 && mysqli_num_rows($res)>0) {
  echo "<br><br><a id='mbt' href='send1.php' id='mkt'>make a transaction</a><br><br>";
  echo"  <form action='edit.php' method='post'>
    <fieldset>
      <legend>Take action </legend>
      <input type='text' name='idt' id='idt' placeholder='transaction ID'>
      <select name='ac' id='ac'>
        <option value='Y'>Approve</option>
        <option value='R'>Reject</option>
        <option value='C'>Cancel</option>
      </select><input type='submit' value='submit'>
    </fieldset>
  </form><br><br>";
}elseif(mysqli_num_rows($res)>0){
  /////////////////////////
  $req1="select count(*) from transactions";
  $req2="select count(*) from transactions where state='Y'";
  $req3="select count(*) from transactions where state='R'";
  $req4="select count(*) from transactions where state='C'";
  $res1=mysqli_query($id,$req1);
  $res2=mysqli_query($id,$req2);
  $res3=mysqli_query($id,$req3);
  $res4=mysqli_query($id,$req4);
  $n1=mysqli_fetch_row($res1)[0];
  $n2=((mysqli_fetch_row($res2)[0])/$n1)*100;
  $n3=((mysqli_fetch_row($res3)[0])/$n1)*100;
  $n4=((mysqli_fetch_row($res4)[0])/$n1)*100;
  $n22=$n2+$n3;
  $n33=$n22+$n4;
  ///////////////////////
  echo"
  <style>
  #shape{
      margin:auto;
      width: 200px;
      height: 200px;
      border-radius: 100%;
      background: conic-gradient(#3498db  0%, #3498db $n2%, #2ecc71  $n2%, #2ecc71  $n22%,#f39c12 $n22%,#f39c12 $n33%,#e74c3c $n33% ,#e74c3c 100%);
  </style>
  <br><br>
  <table class='t1'>
    <tr>
    <td><div id='shape'></div></td>
    </tr>
    <tr>
    <td>
      <button class='btn' style='background-color:#3498db;'></button><label>transacations approved</label><br>
      <button class='btn' style='background-color:#2ecc71;'></button><label>transacations regected</label><br>
      <button class='btn' style='background-color:#f39c12 ;'></button><label>transacations canceled</label><br>
      <button class='btn' style='background-color:#e74c3c;'></button><label>transacations in process<label><br>
      </td>
    </tr>
  </table><br><br>
  ";
}
echo "
  <form action='transactions.php' method='post' id='search_bar'>
    <input type='text' name='se' id='se' placeholder='Search for transactions'>
    <select name='sop' id='sop'>
      <option value='' hidden selected>Search by</option>
      <option value='id'>Transaction ID</option>
      <option value='user1'>Sender's Username</option>
      <option value='card1'>Sender's Card number</option>
      <option value='user2'>Receiver's Username</option>
      <option value='card2'>Receiver's Card number</option>
      <option value='trdt'>Date of transaction</option>
      <option value='tram'>Amount</option>
      <option value='state' title=' (Y) for approved \n(R) for rejected \n(C) for canceled'>State</option>
    </select>
    <select name='or' id='or'>
      <option value='' hidden selected>Select Order</option>
      <option value='asc' >ascending</option>
      <option value='desc'>descending</option>
    </select>
    <select name='ord' id='ord'>
      <option value='' hidden selected>Order by</option>
      <option value='id'>Transaction ID</option>
      <option value='user1'>Sender's Username</option>
      <option value='card1'>Sender's Card number</option>
      <option value='user2'>Receiver's Username</option>
      <option value='card2'>Receiver's Card number</option>
      <option value='trdt'>Date of transaction</option>
      <option value='tram'>Amount</option>
      <option value='state' title=' (Y) for approved \n(R) for rejected \n(C) for canceled'>State</option>
    </select>
    <input type='submit' value='Search' id='sb'>
  </form>
  <br>
  <table class='t1'>
    <tr>
      <th>Transaction ID</th>
      <th>Sender's Username</th>
      <th>Card number</th>
      <th>Receiver's Username</th>
      <th>Card number</th>
      <th>Date of transaction</th>
      <th>Amount</th>
      <th>State</th>
    </tr>
";

if (isset($_POST["sop"])) {
  $se=$_POST["se"];
  $sop=$_POST["sop"];
  $dir=$_POST["or"];
  $ord=$_POST["ord"];
  if ($sop!="") {
    if ($se!="") {
      $req1="select * from admins where username='$us'";
      $res1=mysqli_query($id,$req1);
      if (mysqli_num_rows($res1)==0) {
        $req="select * from transactions where (user1='$us' or user2='$us') and ".$sop." like '%$se%'";
      }else{
        $req="select * from transactions where ".$sop." like '%$se%'";
      }
    }
    
  }
  if ($dir!="" && $ord!="") {
      $req=$req." "."order by $ord $dir";
    }
    $res=mysqli_query($id,$req);
}
if (mysqli_num_rows($res)>0) {
    for ($i=0; $i < mysqli_num_rows($res) ; $i++) { 
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
        }elseif($key=="state" && $value=="C"){
          echo"<td>Canceled</td>";
        }else {
          echo"<td>$value</td>";
        }
      }
      echo"</tr>";
    }
  }else{
    echo "<tr><td colspan='8'>No matching Transactions!</td></tr>";
}
echo"</table><br><br>";
