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
	//echo "<td>" . $row ['k_id'] . "</td>";
	echo "<td>" . $row ['name'] . "</td>";
	
	$params = "\"name=". $row ['name'] . "&edit=1\"";
	
	// parameters for overlay
	$site = "\"/user_sites/dozent/klausurtermine_overlay.php\""; // TODO: Site hinzufügen
	
	echo "<td>";
	
	// button: edit customer
	if (isset ( $row ['k_id'] )) {
		$params = "\"name=". $row ['name'] . "&edit=1\"";
		echo "<a class='btn btn-warning' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-pencil'></i> edit</a>";
		echo "	";
	}
	
	// button: delete customer
	if (isset ( $row ['k_id'] )) {
		$params = "\"name=" . "&name=" . $row ['name'] . "&delete=1\"";
		echo "<a class='btn btn-danger' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-remove'></i> delete</a>";
		echo "	";
	}
	
	echo "</td>";
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// button: add customer
$params = "\"name" . $row ['k_id'] . "&name=" . $row ['name'] . "&add=1\"";
echo "<a class='btn btn-success' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-plus'></i> add customer</a>";
$customers->close();

?>