<?php
include 'chk_session.php';
?>


    
<script>

    $(document).ready(function() {
		
		var currentYear = (new Date).getFullYear();
		//alert(currentYear);
      $('#dataTables1').dataTable({
		   responsive: true,
          "order": [[ 1, "desc" ]],
		 			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-users" aria-hidden="true"></i> แก้ไขสมาชิกผู้ใช้</h3>
                </div>
                <!-- /.col-lg-12 -->
          </div>

<div class="row">
                    <div class="col-lg-12">
					
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default"> 
 <div class="panel-heading">
                            รายละเอียด
                        </div>
 <?php
	include("../config/thai_date.php");
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$sql="SET CHARACTER SET UTF8";
	query($sql);
	//$sql="SELECT * FROM car ORDER BY id DESC ";  
	$sql= "SELECT @num := @num + 1 as row_num ,`prefix`.`name_Prefix`,`login`.`id_Login`,`login`.`Pass`,`login`.`Fname` , `login`.`Lname` , `group`.`name_Group`,`depart`.`name_Depart`, `login`.`UserID` FROM `login` LEFT JOIN `group` ON `login`.`id_Group` = `group`.`id_Group` LEFT JOIN `prefix` ON `login`.`id_Prefix` = `prefix`.`id_Prefix` LEFT JOIN `depart` ON `login`.`id_depart` = `depart`.`id_Depart` , (SELECT @num := 0) d WHERE `Login_status` = 2";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                    <thead>
                                        <tr>
                                        	
                                        <th>คำนำหน้า</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>กลุ่มงาน</th>
                                        <th>ฝ่าย</th>
                                        <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
                       <td><?php echo $rs->name_Prefix;?></td>
                       <td><?php echo $rs->Fname;?></td>
                       <td><?php echo $rs->Lname;?></td>
                       <td><?php echo $rs->UserID;?></td>
                       <td><?php echo $rs->Pass;?></td>
                       <td><?php echo $rs->name_Depart;?></td>
                       <td><?php echo $rs->name_Group;?></td>

<td align="center">
      <a href="del-userAdmin.php?id=<?php echo $rs->id_Login; ?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
	</td>
             
 
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
								
                            </div>
                          
                    
                    
                    
    </div>
                  
                </div> 
                    </div></div></div></div>
