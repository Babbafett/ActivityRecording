<?php
if (isset($_POST['changeProject'])) {
	include_once 'dao.php';
	$project= new ProjectDAO;
	$project->connect();
	$data[]=$_POST['description'];
	$data[]=$_POST['p_id'];
	$project->changeEntry($data);
	header("Location: ../html/projects.html");
}
?>