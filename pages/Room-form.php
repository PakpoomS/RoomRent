<?php
include 'chk_session.php';
require '../config/mysql.php';
require '../config/connect.php';
require '../config/thai_date.php';
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';



include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$sql= "SELECT *  FROM `room_meeting` where size = 1";
	$sqlL= "SELECT *  FROM `room_meeting` where size = 2";
	$result = $mysqli->query($sql);	
	$resultL = $mysqli->query($sqlL);
	$sql2 = "SELECT * FROM `login` WHERE id_Login = '".$_SESSION['idlogin']."'";
	$result2 = $mysqli->query($sql2);	
	$rs2=$result2->fetch_object()
?>
<script>

  </script>

  <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-warning"><i class="fa fa-check-square-o" aria-hidden="true"></i></i>จองห้องประชุม</h4>
                </div>
                <!-- /.col-lg-12 -->
          </div>
    <form role="form" name="ss01" id="ss01" class="form-group" method="post" action="?menu=insert">          

            <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                             
                                <div class="col-lg-12">
   
                                  
                                  <div class="row">     
      									
                                        <div class="col-lg-4">
										<div class="form-group">      
                                            <label>ผู้จอง</label>
                                            <label class="form-control input-sm" type="text" ><?php echo $rs2->Fname; ?> &nbsp; <?php echo  $rs2->Lname;  ?></label>
											<input type="hidden"  type="text" name="idLogin" value="<?php echo $rs2->id_Login; ?>" required>
											<input type="hidden"  type="text" name="idGroup" value="<?php echo $rs2->id_Group; ?>" required>
                                              </div></div>	
                                              
                                              <div class="col-lg-4">
											<div class="form-group">   
                                       	<label>เพื่อใช้ในการ</label>
                                            <input class="form-control input-sm" type="text" name="topics" required>
    										   </div></div>	                                          
 										</div>

									  <div class="row">                                           
                                              <div class="col-lg-8">
											<div class="form-group">
                                            <label>ขนาดห้องประชุมที่ต้องการจอง</label>
											<select class="form-control input-sm" type="text" name="selectRoom" onchange="yesnoCheck(this);">
													<option value="">เลือกขนาดห้องประชุม</option>		
													<option value="1">ใหญ่</option>				
													<option value="2">เล็ก</option>		
											</select>
                                     </div></div>	  </div>

<div id = "d11" style ="display:none">
<img src="src/Large.jpg"  style="width:500px;height:400px;"  >
</div>

<div id = "d22" style ="display:none" >
<img src="src/Small.jpg"  style="width:500px;height:400px;" >
</div>


										<div class="row" id="d1" style ="display:none">                                           
                                              <div class="col-lg-8">
											<div class="form-group">
											
                                            <label>ห้องประชุมที่ต้องการจอง</label>
											<select class="form-control input-sm " id="DL" type="text" name="idroom" required >
											<?php
												 while($rs=$result->fetch_object()){ 
													?>
  													<option value="<?php echo $rs->id_Room ?>"><?php echo $rs->name_Room ?></option>				
											<?php
											}
											?>
											</select>
                                              </div></div>	  </div>

											  <div class="row" id="d2" style ="display:none" >                                           
                                              <div class="col-lg-8">
											<div class="form-group">
                                            <label>ห้องประชุมที่ต้องการจอง</label>
											<select class="form-control input-sm " id="DS" type="text" name="idroom" required>
											<?php
												 while($rs3=$resultL->fetch_object()){ 
													?>
  													<option value="<?php echo $rs3->id_Room ?>"><?php echo $rs3->name_Room ?></option>				
											<?php
											}
											?>
											</select>
                                              </div></div>	  </div>
										 
	

									<div class="row">     
      									<div class="col-lg-4">
										<div class="form-group">
                                       	<label>เริ่มต้นเวลา</label>
				<div class="input-group date" id="datetimepicker1">
                    <input name="date-start" class="form-control input-sm"  type="text" required />
					 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
		
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				locale: 'th',	
					format: 'L'
				});
	             });
        </script>
		</div>
		</div>
   
      									<div class="col-lg-4">
										<div class="form-group">
                                       	<label>สิ้นสุดเวลา</label>
				<div class='input-group date' id='datetimepicker2'>
                    <input name="date-end" class="form-control input-sm" type="text" required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
      
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
				locale: 'th',	
					format: 'L'
				});
				 
            });
        </script>
		</div>
		</div>
		
</div>                                                               
                                    
                                    
                                    <div class="row">  
                                    
                                    <div class="col-lg-8">
									<div class="form-group">
                            
 
          
                                      </div></div>
                                                    
                                      
                                      
                                       <div class="col-lg-8">
										<div class="form-group">
						<button type="submit" class="btn btn-success" id="btnConfirm" >ยืนยัน</button>
						<button type="reset" class="btn btn-default">Reset</button>
                                      </div>
                                      </div>                                      
                                      
                                        </div>
  
    							</div></div></div></div></div></div>


<script>
    function yesnoCheck(that) {
        if (that.value == "1") {
	
            document.getElementById("d1").style.display = "block";
			document.getElementById("d11").style.display = "block";
			document.getElementById("d2").style.display = "none";
			document.getElementById("d22").style.display = "none";
			document.getElementById("DS").disabled = true;
			document.getElementById("DL").disabled = false;
        }else if(that.value == "2"){
			document.getElementById("d1").style.display = "none";
			document.getElementById("d11").style.display = "none";
			document.getElementById("d2").style.display = "block";
			document.getElementById("d22").style.display = "block";
			document.getElementById("DL").disabled = true;
			document.getElementById("DS").disabled = false;
		}
		else {
			document.getElementById("d1").style.display = "none";
			document.getElementById("d2").style.display = "none";
			document.getElementById("d11").style.display = "none";
			document.getElementById("d22").style.display = "none";
			document.getElementById("DL").disabled = true;
			document.getElementById("DS").disabled = true;	
        }
    }

</script>



  </form>



