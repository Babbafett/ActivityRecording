<?php
if (isset($_POST['customer'])) {
	include_once 'dao.php';
	$customers= new CustomerDAO;
	$customers->connect();
	$data=$_POST['name'];
	$customers->insertEntry($data);
	header("Location: ../html/customers.html");
}
?>