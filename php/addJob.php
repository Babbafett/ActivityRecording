<?php
if (isset($_POST['addJob'])) {
	include_once 'dao.php';
	$job= new SubProjectDAO;
	$job->connect();
	$data[]=$_POST['p_id'];
	$data[]=$_POST['position'];
	$data[]=$_POST['description'];
	$job->insertEntry($data);
	header("Location: ../html/jobs.html");
}
?>