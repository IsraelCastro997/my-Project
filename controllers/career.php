<?php
	require '../models/Career.php';
	$career = new Career();
	$opc = $_GET['o'];
	switch ($opc) {
		case 1:
			$career->apiShow();
			break;
		case 2:
			$id = $_GET['id'];
			$career->apishowAll($id);
			break;
		default:
			# code...
			break;
	}
?>