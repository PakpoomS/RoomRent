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
	$sql2="SELECT typecar AS carA, COUNT(typecar) AS typecarResult FROM car WHERE timego like '%$a[$i]%' GROUP BY carA";  
	$result2 = $mysqli->query($sql2);
	while($rs2=$result2->fetch_object()){
		
		
		if($rs2 ->carA == '40-0770'){
			echo "		a:'".$rs2 ->typecarResult."', ";
		}
		
		if($rs2 ->carA == 'นค7118'){
			echo " b: '".$rs2 ->typecarResult."', ";
			}
			
		if($rs2 ->carA == 'นง625'){
			echo " c: '".$rs2 ->typecarResult."', ";
		}			

		if($rs2 ->carA == 'ผบ8461'){
			echo " d: '".$rs2 ->typecarResult."', ";
		}			

		if($rs2 ->carA == 'รถเช่า'){
			echo " e: '".$rs2 ->typecarResult."'";
		}
		


}

		?>
		},			
<?php
}
?>			
       
		],
        xkey: 'y',
       	ykeys: ['a', 'b', 'c', 'd', 'e'],
 		labels: ['40-0770', 'นค7118','นง625','ผบ8461','รถเช่า'],
        hideHover: 'auto',
        resize: true
    });

});
</script>