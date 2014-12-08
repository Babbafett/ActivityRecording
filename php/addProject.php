<?php
if (isset($_POST['project'])) {
	$project= new ProjectDAO;
	$project->connect();
	$data[]=$_POST['k_id'];
	$data[]=$_POST['description'];
	$project->addEntry($data);
	header("Location: ../html/project.html");
}
?>