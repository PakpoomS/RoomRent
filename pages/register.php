<?php

include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
$sql = "Select * from `group`";
$sql2 = "Select * from `depart`";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
?>

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header alert btn-info"><i class="fa fa-check-square" aria-hidden="true"></i> &nbsp; สมัครสมาชิก</h3>
                </div>
                <!-- /.col-lg-12 -->
          </div>					
<div class="row">
<div class="col-md-10">
<div class="main-login main-center">
					<form class="form-inline" method="post" action="checkRegister.php" target="iframe_target">
					<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
					
					<div class="col-xs-4">
						<label for="username" class="cols-sm-2 control-label">คำนำหน้า</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<select  class="form-control" type="text" name="txtMr" placeholder="คำนำหน้า" required>
											<option value="" disabled selected>คำนำหน้า</option>
											<option value="1">นาย</option>
  											<option value="2">นาง</option>
  											<option value="3">นางสาว</option>
				</select>
								</div>
							</div>
						</div>




						<div class="col-xs-4">
							<label for="name" class="cols-sm-2 control-label">ชื่อ</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtName"  placeholder="กรุณาใส่ชื่อ" required/>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<label for="email" class="cols-sm-2 control-label">นามสกุล</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtSurname"  placeholder="กรุณาใส่นามสกุล" required/>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtUsername" placeholder="กรุณาใส่ Username" required/>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="txtPassword"   placeholder="กรุณาใส่ Password" required/>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<label for="confirm" class="cols-sm-2 control-label">ยืนยัน Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="txtConPassword"  placeholder="กรุณาใส่ยืนยัน Password" required/>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
						<label for="username" class="cols-sm-2 control-label">เบอร์โทรศัพท์</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtTel" placeholder="กรุณาใส่เบอร์โทรศัพท์" required/>
								</div>
							</div>
						</div>

<div class="col-xs-4">
						<label for="username" class="cols-sm-2 control-label">หน่วยงาน</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<select  class="form-control" type="text" name="txtDepart" placeholder="ฝ่าย" required onchange="yesnoCheck(this);">
										<option value="" disabled selected>ตำแหน่งหน่วยงาน</option>
<?php
 while($rs2=$result2->fetch_object()){
?>
							  			<option value="<?php echo $rs2->id_Depart; ?>"><?php echo $rs2->name_Depart; ?></option>
<?php
}
?>
										<option value="other"> อื่น ๆ </option>
						</select>
								</div>
							</div>
						</div>

<div class="col-xs-4" id="ifYes" style ="display:none">
						<label for="username" class="cols-sm-2 control-label">ระบุหน่วยงาน</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtDepartOther" placeholder="กรุณาระบุหน่วยงาน" required/>
								</div>
							</div>
</div>

						<div class="col-xs-4" id="ifYes3">
						<label for="username" class="cols-sm-2 control-label">ตำแหน่งกลุ่มงาน</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<select  class="form-control" type="text" name="txtGroup" placeholder="ฝ่าย" required onchange="yesnoCheck2(this);">
										<option value="0" selected>ตำแหน่งกลุ่มงาน</option>
<?php
 while($rs=$result->fetch_object()){
?>
							  			<option value="<?php echo $rs->id_Group; ?>"><?php echo $rs->name_Group; ?></option>
<?php
}
?>
									<option value="other">อื่น ๆ </option>
						</select>
								</div>
							</div>
						</div>




<div class="col-xs-4">
							<label for="confirm" class="cols-sm-2 control-label">รหัสยืนยันเพื่อสมัครสมาชิก</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" required></i></span>
									<input type="password" class="form-control" name="txtCheck"  placeholder="กรุณาใส่ยืนยันเพื่้อสมัครสมาชิก"/>
								</div>
							</div>
</div>
						


<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary  login-button">Register</button>
						</div>
			
					</form>
				</div>         
 </div></div>

<script>
    function yesnoCheck(that) {
        if (that.value == "other") {
            document.getElementById("ifYes").style.display = "block";
			document.getElementById("ifYes3").style.display = "none";
        } else {
            document.getElementById("ifYes").style.display = "none";
			document.getElementById("ifYes3").style.display = "block";
        }
    }

</script>