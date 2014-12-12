<?php
if (isset ( $_GET ['p_id'] ) and isset ( $_GET ['mode'] )) {
	if ($_GET ['mode'] == 1) {
		include_once 'dao.php';
		$project = new ProjectDAO ();
		$project->connect ();
		$result = $project->getEntry ( $_GET ['p_id'] );
		
		echo '<form id="changeProject" class="form-horizontal" role="form" action="../php/changeProject.php" method="post">';
		
		echo "<div id='addProject'>";
		
		echo '<div class="form-group">';
		echo '<label for="inputProject" class="col-sm-2 control-label">Project name</label>';
		echo '<div class="col-sm-10">';
		echo '<input type="hidden" value ="' . $_GET ['p_id'] . '" name ="p_id">';
		echo "\n";
		echo '<input class="form-control" id="inputProject" placeholder="Project name" name="description" value=' . $result ['description'] . '>';
		echo '</div>';
		echo '</div>';
		echo '<input type="submit" class="btn btn-success" name="changeProject" value="Save">';
		echo '</div>';
		echo '</form>';
		echo "</div>";
	} elseif ($_GET ['mode'] == 2) {
		include_once 'dao.php';
		$project = new ProjectDAO ();
		$project->connect ();
		$project->deleteEntry ( $_GET ['p_id'] );
		header ( "Location: ../html/projects.html" );
	}
}
?>