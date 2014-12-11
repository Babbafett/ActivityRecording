<?php
if (isset ( $_GET ['sp_id'] ) and isset ( $_GET ['mode'] )) {
	if ($_GET ['mode'] == 1) {
		include 'dao.php';
		$job = new SubProjectDAO ();
		$job->connect ();
		$result = $job->getEntry ( $_GET ['sp_id'] );
		
		echo '<form id="changeJob" class="form-horizontal" role="form" action="../php/changeJob.php" method="post">';
		
		echo "<div id='addJob'>";
				
		echo '<div class="form-group">';
		echo '<label for="inputJob" class="col-sm-2 control-label">Job description</label>';
		echo '<div class="col-sm-10">';
		echo '<input type="hidden" value ="' . $_GET ['sp_id'] . '" name ="sp_id">';
		echo "\n";
		echo '<input class="form-control" id="inputJob" placeholder="Job description" name="description" value=' . $result ['description'] . '>';
		echo '</div>';
		echo '</div>';
		echo '<input type="submit" class="btn btn-success" name="changeJob" value="Save">';
		echo '</div>';
		echo '</form>';
		echo "</div>";
	} elseif ($_GET ['mode'] == 2) {
		include 'dao.php';
		$job = new SubProjectDAO ();
		$job->connect ();
		$job->deleteEntry ( $_GET ['sp_id'] );
		header ( "Location: ../html/Jobs.html" );
	}
}
?>