<?php
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    

$sql = "SELECT * FROM `group` WHERE name_Group = '".mysqli_real_escape_string($mysqli , $_POST['name_Group'])."' ";
$dbquery = $mysqli->query($sql);
$objResult = mysqli_fetch_array($dbquery);


if($objResult)
	{
		$message = "ชื่อฝ่ายนี้มีอยู่ในระบบอยู่แล้ว !!!";	
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.top.location='main.php?menu=5editGroup';</script>"; 
    exit;
}

else{
	$strSQL = "INSERT INTO `group` (`name_Group`) VALUES('".$_POST["name_Group"]."')";
	$objQuery = mysqli_query($mysqli,$strSQL);

	$message = "เพิ่มฝ่ายเรียบร้อย !!!";	
	echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script type='text/javascript'>window.top.location='main.php?menu=5editGroup';</script>"; 
  exit;
}

?>