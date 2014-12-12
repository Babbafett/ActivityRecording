<?php
if (isset($_POST['changeJob'])) {
	include_once 'dao.php';
	$job= new SubProjectDAO;
	$job->connect();
	$data[]=$_POST['position'];
	$data[]=$_POST['description'];
	$data[]=$_POST['sp_id'];
	$job->changeEntry($data);
	header("Location: ../html/jobs.html");
}
?>