<?php
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    

$sql = "SELECT * FROM `room_meeting` WHERE name_Room = '".mysqli_real_escape_string($mysqli , $_POST['name_Room'])."' ";
$dbquery = $mysqli->query($sql);
$objResult = mysqli_fetch_array($dbquery);


if($objResult)
	{
		$message = "ชื่อห้องนี้มีอยู่ในระบบอยู่แล้ว !!!";	
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.top.location='main.php?menu=2editroom';</script>"; 
    exit;
}

else{
	$strSQL = "INSERT INTO `room_meeting` (`name_Room`, `capacity`) VALUES('".$_POST["name_Room"]."', 
	'".$_POST["capacity"]."')";
	$objQuery = mysqli_query($mysqli,$strSQL);

	$message = "เพิ่มห้องเรียบร้อย !!!";	
	echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script type='text/javascript'>window.top.location='main.php?menu=2editroom';</script>"; 
  exit;
}

?>