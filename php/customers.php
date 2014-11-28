<?php
include 'dao.php';
$customers = new CustomerDAO();

$customers->connect();

$connected = $customers->connect();
echo $connected;

$rs = $customers->getAllEntrys();
?>