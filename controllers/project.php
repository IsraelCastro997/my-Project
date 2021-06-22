<?php
	require '../models/Project.php';
	$project = new Project();
	$opc = $_GET['o'];
	switch ($opc) {
		case 1:
			$project->addAPI(array(
								'student' => $_POST['student'], 
								'namePostProject' => $_POST['namePostProject'], 
								'description' => $_POST['description'], 
								'career' => $_POST['career'], 
								'tags' => $_POST['tags'], 
								'degree' => $_POST['degree'], 
								'priority' => $_POST['priority'], 
								'schedule' => $_POST['schedule'], 
								'experience' => $_POST['experience'], 
								'area' => $_POST['area'], 
								'notes' => $_POST['notes']
							));
			break;
		case 2:
			$project->showAPI();
			break;
		case 3:
			$id = $_GET['id'];
			echo $project->getDescription($id);
			break;
		case 4:
			$id = $_GET['id'];
			echo $project->getNamePostProject($id);
			break;
		case 5:
			$id = $_GET['id'];
			echo $project->getTags($id);
			break;
		case 6:
			$id = $_GET['id'];
			echo $project->getCareer($id);
			break;
		case 7:
			$id = $_GET['id'];
			echo ucwords(str_replace("_", " ",$project->getDegree($id)));
			break;
		case 8:
			$id = $_GET['id'];
			echo ucwords($project->getPriority($id));
			break;
		case 9:
			$id = $_GET['id'];
			echo ucwords(str_replace("_", " ",$project->getSchedule($id)));
			break;
		case 10:
			$id = $_GET['id'];
			echo ucwords($project->getExperience($id));
			break;
		case 11:
			$id = $_GET['id'];
			echo ucwords(str_replace("_", " ",$project->getArea($id)));
			break;
		case 12:
			$id = $_GET['id'];
			echo $project->getNotes($id);
			break;
		case 13:
			$id = $_GET['id'];
			echo $project->getcreatedAt($id);
			break;
		case 14:
			$id = $_GET['id'];
			echo $project->showOnlyAPI($id);
			break;
		case 15:
			$id = $_GET['id'];
			$project->updateNotVisible($id);
			break;
		case 16:
			$id = $_GET['id'];
			$project->updateVisible($id);
			break;
		case 17:
			$id = $_POST['id'];
			$document = $_FILES['document']['name'];
			$project->update_document($id, $document);
			break;
		case 18:
			$id = $_GET['id'];
			echo $project->getOwner($id);
			break;
		case 19:
			$project->deleteAPI(array(
				'id_project' => $_POST['id_project'],
			)
		);
			break;
		default:
			# code...
			break;
	}
?>