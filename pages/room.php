<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header alert btn-info"><i class="fa fa-list-alt" aria-hidden="true"></i>ข้อมูลห้องประชุมทั้งหมด</h3>
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
	$sql="SELECT * FROM room_meeting ORDER BY id_Room DESC LIMIT 120";  
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="18%" >No</th>
                                            <th width="11%">ชื่อห้อง</th>
                                            <th width="11%">ความจุจำนวนคน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
                                            <td class="center"><?php echo $rs->id_Room; ?></td>
                                            <td class="center"><?php echo $rs->name_Room; ?> </td>
                                            <td class="center"><?php echo $rs->capacity; ?></td>
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