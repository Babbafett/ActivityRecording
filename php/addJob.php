<?php
if (isset($_POST['job'])) {
	$project= new SubProjectDAO;
	$project->connect();
	$data[]=$_POST['p_id'];
	$data[]=$_POST['position'];
	$data[]=$_POST['description'];
	$project->addEntry($data);
	header("Location: ../html/jobs.html");
}
?>