<?php

include 'dao.php';

// select customer
$customers = new CustomerDAO ();
$customers->connect ();
$result = $customers->getAllEntrys ();

echo "<select id='selectCustomer' class='form-control' title='Select customer'>";
echo "<option selected disabled>Choose customer</option>";

foreach ( $result as $row ) {	

	echo "<option 'onchange=getProjects()'>" . $row ['name'] . "</option>";

}

echo "</select>";

?>