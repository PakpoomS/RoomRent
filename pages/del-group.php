<?PHP
	 if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

if($id == 1 ){
    echo("<script>");
	echo("alert('ไม่สามารถยกเลิกฝ่าย Admin ได้ !!!!!!!');");
    echo("window.top.location.href='main.php?menu=5editGroup';");
    echo("</script>"); 
    exit;
}else
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	{delete("`group`","id_Group=".$id);  }
	

		echo("<script>");
		echo("alert('แก้ไขข้อมูลเรียบร้อย');");
        echo("window.top.location.href='main.php?menu=5editGroup';");
		echo("</script>"); 

	?>