<?php
	require '../models/Student.php';
	$student = new Student();
	$opc = $_GET['o'];
	switch ($opc) {
		case 1:

			break;
		case 2:
			$student->showAPI();
			break;
		case 3:
			$string = $_GET['search'];
			$student->searchAPI($string);
			break;
		case 4:
			$string = $_GET['search'];
			$student->showOnlyAPI($string);
			break;
		case 5:
			$id = $_GET['id'];
			$student->existsAPI($id);
			break;
		case 6:
			$student->updateAPI(array(
								'id' => $_POST['id'], 
								'code' => $_POST['code'],
								'name' => $_POST['name'],
								'paternalSurname' => $_POST['paternalSurname'],
								'maternalSurname' => $_POST['maternalSurname'],
								'phone' => $_POST['phone'],
								'career' => $_POST['career'],
								'mail' => $_POST['mail']
							));
			break;
		case 7:
			$id = $_GET['id'];
			echo $student->getNameStudent($id);
			break;
		case 8:
			$id = $_GET['id'];
			echo $student->getCodeStudent($id);
			break;
		case 9:
			$id = $_GET['id'];
			echo $student->getpaternalSurnameStudent($id);
			break;
		case 10:
			$id = $_GET['id'];
			echo $student->getmaternalSurnameStudent($id);
			break;
		case 11:
			$id = $_GET['id'];
			echo $student->getEmailStudent($id);
			break;
		case 12:
			$id = $_GET['id'];
			echo $student->getPhoneStudent($id);
			break;
		case 13:
			$id = $_GET['id'];
			echo $student->getIdCareer($id);
			break;
		case 14:
			$id = $_POST['id'];
			$photo = $_FILES['photo']['name'];
			$student->update_photo($id, $photo);
			break;
		case 15:
			echo $student->count();
			break;
		default:
			
			break;
	}
?>