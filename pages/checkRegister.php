<?php
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    

if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
        $message = "Password ยืนยันไม่ตรงกัน !!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		exit();	
}


	
if($_POST["txtGroup"] == 1){
	$status = 1;
}else{
	$status = 2;
};






$sql = "SELECT * FROM `login` WHERE UserID = '".mysqli_real_escape_string($mysqli , $_POST['txtUsername'])."' ";
$dbquery = $mysqli->query($sql);
$objResult = mysqli_fetch_array($dbquery);


$sql2 = "SELECT `pass` FROM pass_register WHERE `passID`= '$status' and `pass` = '".mysqli_real_escape_string($mysqli , $_POST['txtCheck'])."' ";
$dbquery2 = $mysqli->query($sql2);
$objResult2 = mysqli_fetch_array($dbquery2);



if($objResult)
	{
		$message = "ชื่อผู้ใช้ซ้ำ กรุณาตั้งชื่อใหม่";	
		echo "<script type='text/javascript'>alert('$message');</script>";
}
else if(!$objResult2){
	$message = "รหัสยืนยันไม่ถูกต้อง";	
	echo "<script type='text/javascript'>alert('$message');</script>";
}


else if($_POST["txtDepart"] == 'other'){

	$strSQL2 = "INSERT INTO `Depart` (`name_Depart`) VALUES('".$_POST["txtDepartOther"]."')";
	$objQuery = mysqli_query($mysqli,$strSQL2);
	

	$sqlSeDepart = "SELECT `id_Depart` FROM `Depart` WHERE `name_Depart`= '".mysqli_real_escape_string($mysqli , $_POST['txtDepartOther'])."' ";
	$result2 = $mysqli->query($sqlSeDepart);
	$Depart = $result2->fetch_object();

	$strSQL3 = "INSERT INTO `login` (`id_Prefix`, `Fname`, `Lname`, `id_Group` ,`id_depart` , `Login_status`, `UserID`, `Pass`, `Telephone`) VALUES('".$_POST["txtMr"]."', 
	'".$_POST["txtName"]."','".$_POST["txtSurname"]."','".$_POST["txtGroup"]."','".$Depart->id_Depart."','".$status."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtTel"]."')";
	$objQuery = mysqli_query($mysqli,$strSQL3);

	$message = "สมัครสมาชิกเรียบร้อย";	
	echo "<script type='text/javascript'>alert('$message');</script>";

	echo "<script type='text/javascript'>window.top.location='index.php?menu=home';</script>"; exit;

	
}

else{
	$strSQL = "INSERT INTO `login` (`id_Prefix`, `Fname`, `Lname`, `id_Group` ,`id_depart` , `Login_status`, `UserID`, `Pass`, `Telephone`) VALUES('".$_POST["txtMr"]."', 
	'".$_POST["txtName"]."','".$_POST["txtSurname"]."','".$_POST["txtGroup"]."','".$_POST["txtDepart"]."','".$status."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtTel"]."')";
	$objQuery = mysqli_query($mysqli,$strSQL);

	$message = "สมัครสมาชิกเรียบร้อย";	
	echo "<script type='text/javascript'>alert('$message');</script>";

	echo "<script type='text/javascript'>window.top.location='index.php?menu=home';</script>"; exit;
}

?>