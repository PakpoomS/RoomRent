<?php
include 'chk_session.php';
include("../config/thai_date.php");
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
$sql="SET CHARACTER SET UTF8";
query($sql);

$sql2 = "SELECT * FROM room_meeting";
$result2 = $mysqli->query($sql2);
?>
  
<script>
$.fn.editable.defaults.mode = 'popup';//inline
    $(document).ready(function() {
		
		var currentYear = (new Date).getFullYear();
		//alert(currentYear);
      $('#dataTables1').dataTable({
		   responsive: true,
          "order": [[ 1, "desc" ]],
		  
		  "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			  
			  
				$('#dataTables1 .name a').editable({
					type: 'text',
					title: 'แก้ไขชื่อห้อง'
					});
                $('#dataTables1 .cap a').editable({
					type: 'text',
					title: 'แก้ไขความจุห้องประชุม'
					});

				 $('#dataTables1 .size a').editable({
					type: 'select',
					title: 'แก้ไขความจุห้องประชุม',
					source: [
                        {value: '1', text: 'ใหญ่'},
                        {value: '2', text: 'เล็ก'},
    				]
					});
	

		}
			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-university" aria-hidden="true"></i> แก้ไขห้องประชุม</h3>
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
	
	//$sql="SELECT * FROM car ORDER BY id DESC";  
	$sql=" SELECT * FROM room_meeting ";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                    <thead>
                                        <tr>
											<th width="18%">ชื่อห้องประชุม</th>
                                            <th width="10%">ความจุ</th>
											<th width="10%">ขนาดห้องประชุม</th>
                                            <th width="10%">ยกเลิกห้องประชุม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
    <td class="name">
      <a href="#" id="name<?php echo $rs->id_Room ; ?>" data-url="editRoomAdmin.php" data-pk="<?php echo $rs->id_Room  ; ?>" data-value="<?php echo $rs->name_Room; ?>" data-name="name"><?php echo $rs->name_Room;?></a>
	</td>
    <td class="cap">
      <a href="#" id="cap<?php echo $rs->id_Room ; ?>" data-url="editCapAdmin.php" data-pk="<?php echo $rs->id_Room  ; ?>" data-value="<?php echo $rs->capacity; ?>" data-name="cap"><?php echo $rs->capacity;?></a>
    </td>
	<td class="size">
      <a href="#" id="cap<?php echo $rs->id_Room ; ?>" data-url="editSizeAdmin.php" data-pk="<?php echo $rs->id_Room  ; ?>" data-value="<?php echo $rs->Size; ?>" data-name="cap"><?php if($rs->Size == 2) {echo "เล็ก";} elseif($rs->Size == 1){echo "ใหญ่";}  ?></a>
    </td>
    <td align="center">
      <a href="del-roomAdmin.php?id=<?php echo $rs->id_Room; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
	</td>
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
							
                            </div>
                          
                    
                    
                    
    </div>   </div> 

    <form class="form-horizontal" method="post" action="addRoomAdmin.php">
					<label for="name" class="cols-sm-5 control-label"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มห้องประชุม </label>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">ชื่อห้องประชุม</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name_Room"  placeholder="กรุณาใส่ชื่อ" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">ความจุ</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="capacity"  placeholder="กรุณาใส่ความจุ" required/>
								</div>
							</div>
						</div>



						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;เพิ่มห้องประชุม</button>
						</div>
			
					</form>


                  
             
                    </div></div></div></div>
