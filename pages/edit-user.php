<?php

include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
$sql = "Select * from `group`";
$result = $mysqli->query($sql);
$sql2 = "Select * from `login` WHERE id_Login = '".$_SESSION['idlogin']."'";
$result2 = $mysqli->query($sql2);
$rs2=$result2->fetch_object()
?>

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header alert btn-info"><i class="fa fa-user" aria-hidden="true"></i></i>แก้ไขข้อมูลส่วนตัว</h3>
                </div>
                <!-- /.col-lg-12 -->
          </div>					
<div class="row">
<div class="col-lg-12">
<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="update-edit.php" target="iframe_target">
					<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">แก้ไขชื่อ</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtName"  placeholder="กรุณาใส่ชื่อ" value="<?php echo $rs2->Fname?>" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">แก้ไขนามสกุล</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtSurname"  placeholder="กรุณาใส่นามสกุล" value="<?php echo $rs2->Lname?>" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">แก้ไข Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="txtPassword"   placeholder="กรุณาใส่ Password" value="<?php echo $rs2->Pass?>" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">ยืนยันแก้ไข Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="txtConPassword"  placeholder="กรุณาใส่ยืนยัน Password" value="<?php echo $rs2->Pass?>" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">แก้ไขเบอร์โทรศัพท์</label>
						<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtTel" placeholder="กรุณาใส่เบอร์โทรศัพท์" value="<?php echo $rs2->Telephone?>" required/>
								</div>
							</div>
						</div>





						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">แก้ไขข้อมูล</button>
						</div>
			
					</form>
				</div>         
 </div></div>