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

        $('#dataTables1 .start-time a').editable({
        		type: 'combodate',
				title: 'แก้ไข-เวลาเริ่มใช้ห้องประชุม',
				template : 'ปี-YYYY เดือน-MM วัน-DD เวลา-HH:mm:ss',
				format: 'YYYY-MM-DD HH:mm:ss',    
        		viewformat: 'YYYY-MM-DD HH:mm:ss',    
				combodate: {
                minYear: '<?php echo date("Y")-2; ?>',
				maxYear: '<?php echo date("Y")+2; ?>',
				minuteStep: 10
           		}
        		});
    
         $('#dataTables1 .end-time a').editable({
          		type: 'combodate',
  				title: 'แก้ไข-เวลาสิ้นสุดใช้ห้องประชุม',
  				template : 'ปี-YYYY เดือน-MM วัน-DD เวลา-HH:mm:ss',
  				format: 'YYYY-MM-DD HH:mm:ss',    
          		viewformat: 'YYYY-MM-DD HH:mm:ss',    
  				combodate: {
                  minYear: '<?php echo date("Y")-2; ?>',
  				maxYear: '<?php echo date("Y")+2; ?>',
  				 minuteStep: 10
             		}
        		});	



      $('#dataTables1').dataTable({
		   responsive: true,
          "order": [[ 1, "desc" ]],
		  
		  "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			  
				$('#dataTables1 .status a').editable({
					type: 'select',
    				title: 'เปลี่ยนสถานะ',
					source: [
                        {value: '1', text: 'รออนุมัติ'},
                        {value: '2', text: 'อนุมัติ'},
    				]
        		});					
				
		
		}
			  
			  
      	    });
      	  });
		  
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-paper-plane" aria-hidden="true"></i> อนุมัติการขอใช้ห้องประชุม</h3>
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
	$sql=" SELECT  id_Meeting , Fname , Lname , `meeting`.id_Room , name_Room , name_Group , topics , date_S , date_F , status_M ,`login`.`id_Login` FROM `meeting` LEFT JOIN `login` on  `login`.`id_Login` = `meeting`.`id_Login` LEFT JOIN `group` on `group`.`id_Group` = `meeting`.`id_Group` LEFT JOIN `room_meeting` on `room_meeting`.`id_Room` = `meeting`.`id_Room` ";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
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
   
                          
										<td><?php echo $rs->Fname; $rs->Lname; ?> </td>
                                            <td><?php echo $rs->name_Group; ?></td>
                                            <td><?php echo $rs->date_S; ?></td>
                                            <td><?php echo $rs->date_F; ?></td>
                                            <td><?php echo $rs->name_Room; ?></td>
                                            <td class="center"><?php echo $rs->topics; ?> </td>
                                            <td class="status">
      												<a href="#" id="status <?php echo $rs->id_Meeting ; ?>" data-url="edit-status.php" data-pk="<?php echo $rs->id_Meeting; ?>"  data-value="<?php echo $rs->status_M; ?>" data-name="status"><?php if($rs->status_M == 2) {echo "อนุมัติ";} elseif($rs->status_M == 1){echo "รออนุมัติ";}  ?></a>
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
