<?php
include 'chk_session.php';
?>
<div class="row">
<div class="col-lg-12">
<pre>
<?php

//print_r($_POST);
require '../config/mysql.php';
require '../config/connect.php';
require '../config/thai_date.php';

$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

//$typecar = array_filter($_POST['typecar']);
//$driver = array_filter($_POST['driver']);

$_POST['date-start']." --> ". thai9($_POST['date-start'])."<br>";
$_POST['date-end']." --> ". thai9($_POST['date-end'])."<br>";


$date_S = thai9($_POST['date-start']);
$date_F = thai9($_POST['date-end']);

$check = 1;

$mysql->query(
 "
 INSERT ignore  INTO `meeting`
(	`id_Login`, `id_Group`, `topics`, `id_Room`,`date_S`, `date_F` , status_M
)
VALUES
(	%s,%s,%s,%s,%s,%s,%s
)
",
    array(
		$_POST['idLogin'],
		$_POST['idGroup'],
		$_POST['topics'],
		$_POST['idroom'],
		$date_S,
		$date_F,
		"1"
    )
);



$mysql->close();
$message = "บันทึกข้อมูลเรียบร้อย";
echo "<script type='text/javascript'>alert('$message');</script>"; 
echo "<script type='text/javascript'>window.top.location='?menu=add';</script>";
exit();	
?>
</pre>
</div>
</div>