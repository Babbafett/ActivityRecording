<?php

include_once 'dao.php';

$customer = new CustomerDAO ();
$customer->connect ();
$result = $customer->getAllEntrys ();

echo "<select id='selectCustomer' class='form-control' name='k_id'>";
echo "<option selected disabled>Choose customer</option>";

foreach ( $result as $row ) {	

	echo "<option value='" . $row['k_id'] . "'>" . $row['name'] . "</option>";

}

echo "</select>";

?>