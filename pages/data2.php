<?php
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล  
	//นับทั้งปี  
	$sql="SELECT SUBSTR(timego,1,4) AS timeResult FROM car GROUP BY timeResult";  
    $result = $mysqli->query($sql);
	//$total = $result->row;
	
	while($rs=$result->fetch_object()){
	//echo $rs ->timeResult." - ";
	$a[] = $rs ->timeResult;//จับยัดใส่อะเรย์
	}


?>
<script>
$(function() {

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
		
		<?php
		for($i=3;$i<=count($a)-1;$i++){
		?>	 
		{
			y: '<?php echo $a[$i]; ?>',
		 
<?php
	$sql2="SELECT driver AS DriA, COUNT(driver) AS driverResult FROM car WHERE timego like '%$a[$i]%' GROUP BY DriA";  
	$result2 = $mysqli->query($sql2);
	while($rs2=$result2->fetch_object()){
		
		
		if($rs2 ->DriA == 'ภิญโญ'){
			echo "		a:'".$rs2 ->driverResult."', ";
		}
		
		if($rs2 ->DriA == 'มนต์ชัย'){
			echo " b: '".$rs2 ->driverResult."', ";
			}
			
		if($rs2 ->DriA == 'สายชล'){
			echo " c: '".$rs2 ->driverResult."', ";
		}			

		if($rs2 ->DriA == 'วิสุทธิ์'){
			echo " d: '".$rs2 ->driverResult."', ";
		}			




}

		?>
		},			
<?php
}
?>			
       
		],
        xkey: 'y',
       	ykeys: ['a', 'b', 'c', 'd'],
 		labels: ['ภิญโญ', 'มนต์ชัย','สายชล','วิสุทธิ์'],
        hideHover: 'auto',
        resize: true
    });

});
</script>