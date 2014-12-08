<?php
if (isset($_POST['customer'])) {
	$customers= new CustomerDAO;
	$customers->connect();
	$data=$_POST['name'];
	$customers->addEntry($data);
	header("Location: ../html/customers.html");
}
?>