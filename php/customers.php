<?php
include 'dao.php';
$customers = new CustomerDAO();

$customers->connect();

$rs = $customers->getAllEntrys();
?>