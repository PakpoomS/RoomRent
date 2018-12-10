<?php
 if(isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = '';
}
switch ($menu) {
	case "home":
			$src_page = 'home.php';
			break;	

	case "register":
			$src_page = 'register.php';
			break;

	case "main":
			$src_page = 'main.php';
			break;	

	case "tables":
			$src_page = 'tables.php';
			break;	

	case "room":
			$src_page = 'room.php';
			break;							
											
	case "add":
			$src_page = 'Room-form.php';
			break;	
						
	case "edit":
			$src_page = 'Room-edit.php';
			break;	

	case "insert":
			$src_page = 'Room-insert.php';
			break;	

	case "delete":
			$src_page = 'Room-del.php';
			break;
				
	case "1edituser":
			$src_page = 'edit-user.php';
			break;	
			
	case "Meet":
			$src_page = 'MeetAdmin-edit.php';
			break;	

	case "2editroom":
			$src_page = 'RoomAdmin-edit.php';
			break;
	
	case "3edituser":
			$src_page = 'UserAdmin-edit.php';
			break;

	case "FeditPassCheck":
			$src_page = 'Passcheck.php';
			break;

	case "5editGroup":
			$src_page = 'editGroupAdmin.php';
			break;
			
	default:
			$src_page = 'home.php';
			}
		
		
?>