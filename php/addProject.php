<?php
if (isset($_POST['project'])) {
	include_once 'dao.php';
	$project= new ProjectDAO;
	$project->connect();
	$data[]=$_POST['k_id'];
	$data[]=$_POST['description'];
	$project->insertEntry($data);
 	header("Location: ../html/projects.html");
}
?>