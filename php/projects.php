<?php
include_once 'dao.php';
$project = new ProjectDAO ();

$project->connect ();

$customer = new CustomerDAO();

$customer->connect();

$result = $project->getAllEntrys ();

echo "<table class='table table-hover table-condensed'>";
// echo "<caption>Manage your customers</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>Customer</th>";
echo "<th>Project description</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

foreach ( $result as $row ) {
	
	echo "<tr>";
	$resultCust = $customer->getEntry($row['k_id']);
	echo "<td>" . $resultCust ['name'] . "</td>";
	echo "<td>" . $row ['description'] . "</td>";	
	
	echo "<td>";
	
	// button: edit project
	if (isset ( $row ['p_id'] )) {
		$params = '../html/projects_form.html?p_id=' . $row['p_id'] . '&k_id=' . $row['k_id'] . '&mode=1';
		echo "<a class='btn btn-warning' href='".$params."'><i class='glyphicon glyphicon-pencil'></i> Edit</a>";
		echo "	";
	}
	
	// button: delete project
	if (isset ( $row ['p_id'] )) {
		$params = '../html/projects_form.html?p_id=' . $row['p_id'] . '&k_id=' . $row['k_id'] . '&mode=2';
		echo "<a class='btn btn-danger' href='".$params."'><i class='glyphicon glyphicon-remove'></i> Delete</a>";
		echo "	";
	}
	
	echo "</td>";
	
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// button: add project
$params = '../html/addProject.html';
echo "<a class='btn btn-success' href='".$params."'><i class='glyphicon glyphicon-plus'></i> Add project</a>";

?>