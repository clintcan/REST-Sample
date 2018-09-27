<?php
switch ($_GET['action']) {
	case 'view':
		$action = "view";
		break;
	case 'add':
		$action = "add";
		break;
	case 'edit':
		$action = "view";
		break;
	case 'delete':
		$action = "delete";
		break;
	
	default:
		header('Content-Type: application/json');
		echo "{\"error\":\"function not found\"}";
		break;
}

include "$action.php";
