<?PHP
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$data = array(
	"id_Room"=>$_POST['value'],
	"status_M"=>1

);
	update("meeting",$data,"id_Meeting=".$_POST['pk']);
	
	echo("<script>");
	echo("alert('แก้ไขข้อมูลเรียบร้อย');");
	echo("window.top.location.href='main.php?menu=edit';");
	echo("</script>"); 
	?>