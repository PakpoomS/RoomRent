<?php
include 'chk_session.php';
include("../config/thai_date.php");
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
$sql="SET CHARACTER SET UTF8";
query($sql);

$sql2 = "SELECT * FROM `pass_register`";
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
			  
			  

                $('#dataTables1 .cap a').editable({
					type: 'text',
					title: 'แก้ไขรหัสผ่านสมัครสมาชิก'
					});

		}
			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขรหัสผ่านสมัครสมาชิก</h3>
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
	$sql=" SELECT * FROM pass_register";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                    <thead>
                                        <tr>
											<th width="18%">รหัสผ่าน</th>
                                            <th width="10%">รหัสสำหรับสมัครสมาชิกฝ่าย :</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
    
    <td class="cap">
      <a href="#" id="cap<?php echo $rs->passID; ?>" data-url="edit-passcheck.php" data-pk="<?php echo $rs->passID  ; ?>" data-value="<?php echo $rs->Pass; ?>" data-name="cap"><?php echo $rs->Pass;?></a>
    </td>
    <td>
    <?php echo $rs->GroupName;?>
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
