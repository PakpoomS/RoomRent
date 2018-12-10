<?PHP
if($_POST){

require '../config/mysql.php';
require '../config/connect.php';
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

$user = $mysql->queryResult(
    "
    SELECT *  FROM `login` LEFT JOIN `group` on `login`.`id_Group` = `group`.`id_Group` LEFT JOIN `depart` on `login`.`id_depart` = `depart`.`id_Depart`
    WHERE `UserID` = %s[username]  and  `Pass` = %s[password] 
    ",
    array(
        'username' => $_POST['username'],	// แทนที่ %s[username]
        'password' => $_POST['password'],	// แทนที่ %s[password]
               
    )
);

$total=$user->numRows;
$rs = $user->fetch();
//echo $total;
if($total===1){
		$_SESSION['idlogin'] = $rs['id_Login'];
        $_SESSION['uname'] = $rs['Fname'];
        $_SESSION['lname'] = $rs['Lname'];
        $_SESSION['group'] = $rs['name_Group'];
        $_SESSION['depart'] = $rs['name_Depart'];
        $_SESSION['Permis'] = $rs['Login_status'];
		$_SESSION['login'] = "true";
			echo("<script>");
            echo("window.location='main.php?menu=add';");
            echo("</script>"); 


}else{
?>
 
  <div class="alert alert-danger">
    <a class="close" data-dismiss="alert" aria-hidden="true">×</a>
    <strong>คำเตือน!</strong> Username และ Password ของท่านไม่ถูกต้อง.
</div>
            <?php
}

$mysql->close();
}

	?>