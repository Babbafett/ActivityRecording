<?php
include_once 'dao.php';
$job = new SubProjectDAO ();

$job->connect ();

$customer = new CustomerDAO();

$customer->connect();

$project = new ProjectDAO();

$project->connect();

$result = $job->getAllEntrys ();

echo "<table class='table table-hover table-condensed'>";
// echo "<caption>Manage your customers</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>Customer</th>";
echo "<th>Project</th>";
echo "<th>Position</th>";
echo "<th>Job description</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

foreach ( $result as $row ) {
	
	echo "<tr>";
	$resultProject = $project->getEntry($row['p_id']);
	$resultCust = $customer->getEntry($resultProject['k_id']);
	echo "<td>" . $resultCust ['name'] . "</td>";
	echo "<td>" . $resultProject ['description'] . "</td>";
	echo "<td>" . $row ['position'] . "</td>";
	echo "<td>" . $row ['description'] . "</td>";	
	
	echo "<td>";
	
	// button: edit job
	if (isset ( $row ['sp_id'] )) {
		$params = '../html/jobs_form.html?sp_id=' . $row['sp_id'] . '&p_id=' . $row['p_id'] . '&mode=1';
		echo "<a class='btn btn-warning' href='".$params."'><i class='glyphicon glyphicon-pencil'></i> Edit</a>";
		echo "	";
	}
	
	// button: delete job
	if (isset ( $row ['sp_id'] )) {
		$params = '../html/jobs_form.html?sp_id=' . $row['sp_id'] . '&p_id=' . $row['p_id'] . '&mode=2';
		echo "<a class='btn btn-danger' href='".$params."'><i class='glyphicon glyphicon-remove'></i> Delete</a>";
		echo "	";
	}
	
	echo "</td>";
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// button: add job
$params = '../html/addJob.html';
echo "<a class='btn btn-success' href='".$params."'><i class='glyphicon glyphicon-plus'></i> Add job</a>";

?>