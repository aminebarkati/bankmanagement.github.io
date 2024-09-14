<?php
// $id=mysqli_connect("localhost","id21722409_wisdom","Admin-123","id21722409_bank");
$id=mysqli_connect("localhost","root","","bank1");
if(!isset($_SESSION)){
  session_start();
}
if (!isset($_SESSION['user'])) {
echo "<script>window.location.replace('http://localhost/bank%20management/')</script>";
}
echo "<head><link rel='stylesheet' href='style/style.css'></head><style>
*{  color: white !important;
    text-shadow: 1px 1px 2px rgba(0, 0, 0,0.8);
}
</style>";