<?php
include_once 'dao.php';

$job = new SubProjectDAO ();

$job->connect ();

if (isset ( $_POST ['p_id'] )) {
	
	$result = $job->getJobsFromProject ( $_POST ['p_id'] );
	
	if (! empty ( $result )) {
		
		echo "<select id='selectJob' class='form-control' name='sp_id'>";
		echo "<option selected disabled>Choose job</option>";
		
		foreach ( $result as $row ) {
			
			echo "<option value='" . $row ['sp_id'] . "'>" . $row ['description'] . "</option>";
		}
		
		echo "</select>";
	}
} 

else
	echo "Fehler";

$job->close ();

?>