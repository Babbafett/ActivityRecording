<?php
include 'dao.php';
$customers = new CustomerDAO ();

$customers->connect ();

$result = $customers->getAllEntrys ();

echo "<table class='table table-hover table-condensed'>";
// echo "<caption>Manage your customers</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

foreach ( $result as $row ) {
	
	echo "<tr>";
	echo "<td>" . $row ['name'] . "</td>";
	
	echo "<td>";
	
	// button: edit customer
	if (isset ( $row ['k_id'] )) {
		$params = '../html/customers_form.html?k_id='.$row['k_id'].'&mode=1';
		echo "<a class='btn btn-warning' href='".$params."'><i class='glyphicon glyphicon-pencil'></i> edit</a>";
		echo "	";
	}
	
	// button: delete customer
	if (isset ( $row ['k_id'] )) {
		$params = '../html/customers_form.html?k_id='.$row['k_id'].'&mode=2';
		echo "<a class='btn btn-danger' href='".$params."'><i class='glyphicon glyphicon-remove'></i> delete</a>";
		echo "	";
	}
	
	echo "</td>";
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// button: add customer
$params = '../html/customers_form.html?k_id='.$row['k_id'].'&mode=3';
echo "<a class='btn btn-success' href='".$params."'><i class='glyphicon glyphicon-plus'></i> add customer</a>";
$customers->close();

?>