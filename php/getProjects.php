<?php
include 'dao.php';

$project = new ProjectDAO ();

$project->connect ();

if (isset ( $_POST ['k_id'] )) {
	
	$result = $project->getProjectsFromCustomer($_POST ['k_id']);	
	
	echo "<select id='selectProject' class='form-control' name='p_id'>";
	echo "<option selected disabled>Choose project</option>";
	
	foreach ( $result as $row ) {
	
		echo "<option value='" . $row['p_id'] . "'>" . $row['description'] . "</option>";
	}
	
	echo "</select>";
}

$project->close ();

?>