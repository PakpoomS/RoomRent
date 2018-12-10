<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    

   /* $q="SELECT * FROM tbl_event WHERE date(event_start)>='".$_GET['start']."'  ";  
    $q.=" AND date(event_end)<='".$_GET['end']."' ORDER by event_id";  */

    
	$q=" SELECT id_Meeting , Fname , Lname , name_Room , name_Group , topics , date_S , date_F , status_M FROM `meeting` LEFT JOIN `login` on  `login`.`id_Login` = `meeting`.`id_Login` LEFT JOIN `group` on `group`.`id_Group` = `meeting`.`id_Group` LEFT JOIN `room_meeting` on `room_meeting`.`id_Room` = `meeting`.`id_Room` ";
    $q.=" WHERE `date_S` >= '".$_GET['start']."'  AND `date_F` <= '".$_GET['end']."' ORDER by id_Meeting ";
	$result = $mysqli->query($q);
	
	while($rs=$result->fetch_object()){

			if($rs->status_M == "2"){
				$color = "#52f441";
			}

			if($rs->status_M == "1"){
				$color = "#EC971F";
			}
		


        $json_data[]=array(  
            "id"=>$rs->id_Meeting,
            "title"=>$rs->topics,
            "start"=>$rs->date_S,
            "end"=>$rs->date_F,
			"url"=>"show2.php?id=".$rs->id_Meeting,
			"color"=>$color,
				
            //"url"=>$rs->event_url,
            //"allDay"=>($rs->event_allDay==true)?true:false      
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );    
		//$json= array_push($json, $json_data);
    }  

$json = json_encode($json_data) ;  

if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}  
?>  