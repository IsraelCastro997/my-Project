<?php
	require '../models/Comment.php';
	$comment = new Comment();
	$opc = $_GET['o'];
	switch ($opc) {
		case 1:
			$comment->apiShow();
			break;
		case 2:
			$id = $_GET['id'];
			$comment->showAPI($id);
			break;
		case 3:
			$id = $_GET['id'];
			echo $comment->countComments($id);
			break;
		case 4:
			$comment->addAPI(array(
									'id_project' => $_POST['id_project'],
									'student' => $_POST['student'],
									'comments_project' => $_POST['comments_project'],
									'owner' => $_POST['owner'],
								)
							);
			break;
		case 5:
			$id = $_GET['id'];
			echo $comment->isFavorite($id);
			break;
		case 6:
			$id = $_GET['id'];
			echo $comment->isApplicated($id);
			break;
		case 7:
			$comment->addFavorite(array(
									'user' => $_GET['user'],
									'project' => $_GET['project']
								)
							);
			break;
		case 8:
			$id = $_GET['id'];
			echo $comment->countFavorite($id);
			break;
		case 9:
			$id = $_GET['id'];
			$comment->showFavorite($id);
			break;
		default:
			# code...
			break;
	}
?>