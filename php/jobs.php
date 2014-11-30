<?php
include 'dao.php';
$dao = new SubProjectDAO ();

$dao->connect ();

$result = $dao->getAllEntrys ();

echo "<table class='table table-hover table-condensed'>";
// echo "<caption>Manage your customers</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Position</th>";
echo "<th>Description</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

foreach ( $result as $row ) {
	
	echo "<tr>";
	echo "<td>" . $row ['sp_id'] . "</td>";
	echo "<td>" . $row ['position'] . "</td>";
	echo "<td>" . $row ['description'] . "</td>";	
	
	// parameters for overlay
	$site = "\"/user_sites/dozent/klausurtermine_overlay.php\""; // TODO: Site hinzufügen
	
	echo "<td>";
	
	// button: edit customer
	if (isset ( $row ['sp_id'] )) {
		$params = "\"sp_id=" . $row ['sp_id'] . "&p_id=" . $row ['p_id'] . "&edit=1\"";
		echo "<a class='btn btn-warning' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-pencil'></i> edit</a>";
		echo "	";
	}
	
	// button: delete customer
	if (isset ( $row ['sp_id'] )) {
		$params = "\"sp_id=" . $row ['sp_id'] . "&p_id=" . $row ['p_id'] . "&delete=1\"";
		echo "<a class='btn btn-danger' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-remove'></i> delete</a>";
		echo "	";
	}
	
	echo "</td>";
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// button: add customer
$params = "\"sp_id=" . $row ['sp_id'] . "&p_id=" . $row ['p_id'] . "&add=1\"";
echo "<a class='btn btn-success' href='#' onclick='openOverlay($site,$params)'><i class='glyphicon glyphicon-plus'></i> add project</a>";

?>