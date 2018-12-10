<?PHP
	
			
			include '../config/mysql.php';
			include '../config/connect.php';	
			include '../config/thai_date.php';
//$timexx = "2558-02-01 15:00:00";
//$timego = thai9($_POST['value']);
//$timego = thai10($timexx);


//echo $timexx."<br>";
//echo $timego."<br>";
//echo $pk."<br>";

$startUpdate = $mysql->queryResult(
 "
	UPDATE `meeting` SET 
			`date_F` = %s 

	 WHERE 
	`meeting`.`id_Meeting` = %s 
	
    ",
    array(
		
		//$timego,
		thai10($_POST['value']),
		$_POST['pk'],

		
    )
);
	echo("<script>");
	echo("alert('แก้ไขข้อมูลเรียบร้อย');");
	echo("window.top.location.href='main.php?menu=edit';");
	echo("</script>"); 
	?>