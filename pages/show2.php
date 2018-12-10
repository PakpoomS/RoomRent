<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ปฏิทินการใช้รถยนต์ คณะศึกษาศาสตร์ มหาวิทยาลัยบูรพา</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
    
 <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script></script>

    
</head>
<body>

<?php
	if(isset($_GET['id'])) {
    $_GET['id'];
} else {
    $_GET['id'] = '';
}
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	
	include '../config/thai_date.php';
	$sql=" SELECT id_Meeting , Fname , Lname , name_Room , name_Group , topics , date_S , date_F , status_M FROM `meeting` LEFT JOIN `login` on  `login`.`id_Login` = `meeting`.`id_Login` LEFT JOIN `group` on `group`.`id_Group` = `meeting`.`id_Group` LEFT JOIN `room_meeting` on `room_meeting`.`id_Room` = `meeting`.`id_Room` WHERE id_Meeting ='".$_GET['id']."' ";  
    $result = $mysqli->query($sql);
	$rs=$result->fetch_object();
		 ?>
			
    
          <div id="wrapper">
        
       
                        
				<div class="row">
							
				<div class="col-lg-8">
                             <div class="panel panel-default">
                        <div class="panel-heading">
                            รายละเอียดการจองห้องประชุม </div>
                          <div class="panel-body">
                          <button class="btn btn-info btn-sm" > ผู้ขอใช้ </button>
							<div class="alert alert-success">
                                <?php echo $rs->Fname;?> &nbsp; <?php echo $rs->Lname;  ?> 
                            </div>
                            <button class="btn btn-info btn-sm" > วัน-เวลาใช้ห้องประชุม</button>
                             <div class="alert alert-info">
                                เริ่ม <?php echo thai8($rs->date_S); ?> - <?php echo thai8($rs->date_F); ?>
                            </div>
                            
                            <button class="btn btn-info btn-sm" >ชื่อห้องประชุม</button>
                            <div class="alert alert-warning">
                                <?php echo $rs->name_Room; ?>
                            </div>
                             <button class="btn btn-info btn-sm" > ฝ่าย </button>
                           <div class="alert alert-success">
                               <?php echo $rs->name_Group; ?>
                            </div>
						</div><!-- .panel-body -->
						
						</div> <!-- panel panel-default -->
					</div> <!-- col-lg-6 -->


</div><!-- row -->
</div>


</body></html>