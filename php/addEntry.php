<?php
include 'dao.php';
if (isset($_POST['entry'])) {
	$entry= new EntryDAO;
	$entry->connect();
	$data[]=$_POST['pernr'];
	$data[]=$_POST['commentary'];
	$data[]=$_POST['sp_id'];
	$data[]=$_POST['date'];
	$data[]=$_POST['hours'];
	$data[]=$_POST['cost_type'];
	$entry->insertEntry($data);
	header("Location: ../html/record.html");
}
?>