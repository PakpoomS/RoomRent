<?PHP
	 if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	{delete("meeting","id_meeting=".$id);  }
	

		echo("<script>");
		echo("alert('แก้ไขข้อมูลเรียบร้อย');");
        echo("window.top.location.href='main.php?menu=delete';");
		echo("</script>"); 

	?>
