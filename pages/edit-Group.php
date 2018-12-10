<?PHP
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$data = array(
	"name_Group"=>$_POST['value'],

);
	update("`group`",$data,"id_Group=".$_POST['pk']);
	
	echo("<script>");
	echo("alert('แก้ไขข้อมูลเรียบร้อย');");
	echo("window.top.location.href='main.php?menu=edit';");
	echo("</script>"); 
	?>