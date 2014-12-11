<?php
if (isset($_POST['changeCustomer'])) {
	include 'dao.php';
	$customers= new CustomerDAO;
	$customers->connect();
	$data[]=$_POST['name'];
	$data[]=$_POST['k_id'];
	$customers->changeEntry($data);
	header("Location: ../html/customers.html");
}
?>