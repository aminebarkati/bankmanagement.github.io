<?php
include("cnc.php");
/////////////////////////
$req1="select count(*) from users";
$req2="select count(*) from users where balance<0 and balance>-1000 ";
$req3="select count(*) from users where balance=-1000";
$req4="select count(*) from users where balance=0";
$res1=mysqli_query($id,$req1);
$res2=mysqli_query($id,$req2);
$res3=mysqli_query($id,$req3);
$res4=mysqli_query($id,$req4);
$n1=mysqli_fetch_row($res1)[0];
$n2=((mysqli_fetch_row($res2)[0])/$n1)*100;
$n3=((mysqli_fetch_row($res3)[0])/$n1)*100;
$n4=((mysqli_fetch_row($res4)[0])/$n1)*100;
$n22=$n2+$n3;
$n33= $n2+$n3+$n4;
/////////////////////////
$req5="select sum(balance) as total from users where balance>0";
$req6="select sum(balance) as total from users where balance<0";
$res6=mysqli_query($id,$req6);
$res5=mysqli_query($id,$req5);
$dd=mysqli_fetch_row($res5)[0];
$bb=abs(mysqli_fetch_row($res6)[0]);
$tt=$dd+$bb;
$n5=($dd/$tt)*100;
////////////////////////
$req7="select count(*) from users where gender='M'";
$res7=mysqli_query($id,$req7);
$mls=((mysqli_fetch_row($res7)[0])/$n1)*100;
///////////////////////
$m=date("m",time());
$y=date("Y",time());
$req0="select count(*) from users where exp_yy<$y or (exp_yy=$y and  exp_mm<$m)";
$res0=mysqli_query($id,$req0);
$n0=((mysqli_fetch_row($res0)[0])/$n1)*100;
echo"
<style>
  #shape1{
    margin:auto;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    background: conic-gradient(#3498db  0%, #3498db $n0%, #e74c3c $n0%, #e74c3c 100%);;
  }
  #shape4{
    margin:auto;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    background: conic-gradient(#3498db  0%, #3498db $mls%, #e74c3c $mls%, #e74c3c 100%);;
  }
  #shape3{
    margin:auto;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    background: conic-gradient(#3498db  0%, #3498db $n5%, #e74c3c $n5%, #e74c3c 100%);;
  }
  #shape2{
    margin:auto;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    background: conic-gradient(#3498db  0%, #3498db $n2%, #f39c12  $n2%, #f39c12  $n22%,#e74c3c $n22%,#e74c3c $n33%,#2ecc71 $n33%,#2ecc71 100%);
  }
  .t1 td,.t1{
    border:none;
    border-left: 1px solid #dddddd;
  }
  
</style>
    <br><br>
    <table class='t1'>
      <tr>
        <td><div id='shape4'></div></td>
        <td><div id='shape1'></div></td>
        <td><div id='shape3'></div></td>
        <td><div id='shape2'></div></td>
      </tr>
      <tr>
        <td>
            <button class='btn' style='background-color:#3498db;'></button><label>Males</label><br>
            <button class='btn' style='background-color:#e74c3c;'></button><label>Females</label>
        </td>
        <td>
            <button class='btn' style='background-color:#3498db;'></button><label>user's card expired</label><br>
            <button class='btn' style='background-color:#e74c3c;'></button><label>user's card valid</label>
        </td>
        <td>
            <button class='btn' style='background-color:#3498db;'></button><label>total deposits : $dd</label><br>
            <button class='btn' style='background-color:#e74c3c;'></button><label>totol borrowed money : $bb</label>
        </td>
        <td>
            <button class='btn' style='background-color:#3498db;'></button><label>user's balance between 0 and -999</label><br>
            <button class='btn' style='background-color:#f39c12;'></button><label>user's balance equal to -1000</label><br>
            <button class='btn' style='background-color:#e74c3c;'></button><label>user's balance equal to 0</label><br>
            <button class='btn' style='background-color:#2ecc71;'></button><label>user's balance more than 0</label>
        </td>
      </tr>
    </table><br><br>
";
/////////////////////////
$req="select * from users";
$res=mysqli_query($id,$req);
echo"
  <form action='users.php' method='post' id='search_bar'>
    <input type='text' name='se' id='se' placeholder='Search for transactions'>
    <select name='sop' id='sop'>
      <option value='' hidden selected>Search by</option>
      <option value='username'>Username</option>
      <option value='cardnum'>Card number</option>
      <option value='exp_mm'>expiry month</option>
      <option value='exp_yy'>expiry year</option>
      <option value='email'>email</option>
      <option value='gender'>gender</option>
      <option value='bd'>birthday</option>
      <option value='balance'>balance</option>
    </select>
    <select name='or' id='or'>
      <option value='' hidden selected>Select Order</option>
      <option value='asc' >ascending</option>
      <option value='desc'>descending</option>
    </select>
    <select name='ord' id='ord'>
      <option value='' hidden selected>Order by</option>
      <option value='username'>Username</option>
      <option value='cardnum'>Card number</option>
      <option value='exp_mm'>expiry month</option>
      <option value='exp_yy'>expiry year</option>
      <option value='email'>email</option>
      <option value='gender'>gender</option>
      <option value='bd'>birthday</option>
      <option value='balance'>balance</option>
    </select>
    <input type='submit' value='Search' id='sb'>
  </form>
  <br>
  <table class='t1'>
  <tr>
    <th>Username</th>
    <th>Card number</th>
    <th>expiry month</th>
    <th>expiry year</th>
    <th>cvv</th>
    <th>email</th>
    <th>gender</th>
    <th>birthday</th>
    <th>balance</th>
  </tr>";
if (isset($_POST["sop"])) {
  $se=$_POST["se"];
  $sop=$_POST["sop"];
  $dir=$_POST["or"];
  $ord=$_POST["ord"];
  if ($sop!="" && $se!="") {
        $req="select * from users where ".$sop." like '%$se%'";
    }
  if ($dir!="" && $ord!="") {
      $req=$req." "."order by $ord $dir";
    }
  $res=mysqli_query($id,$req);
}
for ($i=0; $i <mysqli_num_rows($res) ; $i++) { 
    $t=mysqli_fetch_assoc($res);
    echo"<tr style='height:40px'>";
    foreach ($t as $key => $value) {
      if ($key=="gender" ) {
        if ($value=="M") {
            echo"<td>Male</td>";
        }else{
          echo"<td>Female</td>";
        }
      }elseif ($key=="balance") {
        echo"<td>$value $</td>";
      }
      elseif($key!="pass" and $key!="fname" and $key!="lname"){
        echo"<td>$value</td>";
      }

    }
    echo"</tr>";
}
echo "</table><br><br>";