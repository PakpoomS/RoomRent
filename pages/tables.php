     <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header alert btn-info"><i class="fa fa-table" aria-hidden="true"></i> ตารางการขอใช้ห้องประชุม</h3>
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

	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$sql= " SELECT id_Meeting , Fname , Lname , name_Room , name_Group , topics , date_S , date_F , status_M FROM `meeting` LEFT JOIN `login` on  `login`.`id_Login` = `meeting`.`id_Login` LEFT JOIN `group` on `group`.`id_Group` = `meeting`.`id_Group` LEFT JOIN `room_meeting` on `room_meeting`.`id_Room` = `meeting`.`id_Room` ";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="18%" >ชื่อผู้จอง</th>
                                            <th width="10%">ฝ่าย</th>
                                            <th width="11%">เริ่ม</th>
                                            <th width="11%">สิ้นสุด</th>
                                            <th width="40%">ห้องประชุม</th>
                                            <th width="10%">หัวข้อ</th>
                                             <th width="10%">สถานะการจอง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
                                            <td><?php echo $rs->Fname;?> &nbsp; <?php echo $rs->Lname; ?> </td>
                                            <td><?php echo $rs->name_Group; ?></td>
                                            <td><?php echo $rs->date_S; ?></td>
                                            <td class="center"><?php echo $rs->date_F; ?></td>
                                            <td class="center"><?php echo $rs->name_Room; ?></td>
                                            <td class="center"><?php echo $rs->topics; ?> </td>
                                            <td class="center"><?php if($rs->status_M == 2) {echo "อนุมัติ";} elseif($rs->status_M == 1){echo "รออนุมัติ";}  ?></td>
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
                    
                    
                    
    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                    </div></div>