<?PHP

if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
        $message = "Password ยืนยันไม่ตรงกัน !!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		exit();	
}


	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$data = array(
	"Fname"=>$_POST['txtName'],
	"Lname"=>$_POST['txtSurname'],
	"Pass"=>$_POST['txtPassword'],
	"Telephone"=>$_POST['txtTel']

);
session_start();
$id = $_SESSION['idlogin'];
	update("login",$data,"id_Login=".$id);
	
	echo("<script>");
	echo("alert('แก้ไขข้อมูลเรียบร้อย');");
	echo("window.top.location.href='main.php?menu=edit-user';");
	echo("</script>"); 
	?>