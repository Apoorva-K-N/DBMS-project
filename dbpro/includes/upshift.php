<?php
session_start();
include 'dbcon.php';
$eid="";
$did="";
$sh="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$eid =$_POST["eid"];
	$did =$_POST["did"];
	$sh =$_POST["shift"];
}
$sl="select eid from shift where eid='$eid'";
$r=mysqli_query($conn,$sl);
$row= mysqli_fetch_array($r);
if($row[0]){
$sql="update shift set sh='$sh' where eid='$eid'";
mysqli_query($conn,$sl);
}
else{
$sql="insert into shift (eid,did,sh) VALUES ('$eid','$did','$sh')";
mysqli_query($conn,$sql);}
header("refresh:0.5;url=dash.php");
exit();
mysqli_close($conn);