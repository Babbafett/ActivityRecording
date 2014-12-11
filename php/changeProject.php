<?php
if (isset($_POST['changeProject'])) {
	include 'dao.php';
	$project= new ProjectDAO;
	$project->connect();
	$data[]=$_POST['p_id'];
	$data[]=$_POST['k_id'];
	$data[]=$_POST['description'];
	$project->changeEntry($data);
	header("Location: ../html/projects.html");
}
?>