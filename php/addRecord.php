<?php
include 'dao.php';
if (isset($_POST['record'])) {
	if (!isset($_SESSION)) {
		session_start();
	}
	$entry = new EntryDAO;
	$entry -> connect();
	$data[] = $_SESSION['pernr'];
	$data[] = $_POST['commentary'];
	$data[] = $_POST['sp_id'];
	$dateSource = $_POST['date'];
	$date = new DateTime($dateSource);
	$data[] = $date->format('Y-m-d');
	$data[] = $_POST['hours'];
	$data[] = $_POST['cost_type'];
	$entry -> insertEntry($data);
	header("Location: ../html/addRecord.html");
}
?>