<?php
	require '../models/User.php';
	$user = new User();
	$opc = $_GET['o'];
	switch ($opc) {
		case 1:$user->addAPI(array(
							'user' => $_POST['user'],
							'password' => $_POST['password']
					));
			break;
		case 2:
			$user->loginAPI(array(
							'user' => $_POST['user'],
							'password' => $_POST['password']
					));
			break;
		case 3:
			$id = $_GET['i'];
			$user->logoutAPI($id);
			break;
		case 19:
			$user->deleteUserAPI(array(
				'id_user' => $_POST['id_user'],
			)
		);
		default:
			# code...
			break;
	}
?>