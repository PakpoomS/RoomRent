<?php
include 'chk_session.php';
include("../config/thai_date.php");
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
$sql="SET CHARACTER SET UTF8";
query($sql);

$sql2 = "SELECT * FROM  `group` ";
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
					title: 'แก้ไขชื่อฝ่าย'
					});
           

		}
			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-university" aria-hidden="true"></i> แก้ไขฝ่าย</h3>
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
	$sql=" SELECT * FROM  `group` ";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                    <thead>
                                        <tr>
											<th width="18%">ชื่อฝ่าย</th>
                                            <th width="10%">ยกเลิกฝ่าย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
    <td class="name">
      <a href="#" id="name<?php echo $rs->id_Group ; ?>" data-url="edit-Group.php" data-pk="<?php echo $rs->id_Group ; ?>" data-value="<?php echo $rs->name_Group; ?>" data-name="name"><?php echo $rs->name_Group;?></a>
	</td>
    <td align="center">
      <a href="del-group.php?id=<?php echo $rs->id_Group; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
	</td>
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
							
                            </div>
                          
                    
                    
                    
    </div>   </div> 

    <form class="form-horizontal" method="post" action="addGroupAdmin.php">
					<label for="name" class="cols-sm-5 control-label"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มฝ่าย </label>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">ชื่อฝ่าย</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name_Group"  placeholder="กรุณาใส่ชื่อ" required/>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;เพิ่มฝ่าย</button>
						</div>
			
					</form>


                  
             
                    </div></div></div></div>
