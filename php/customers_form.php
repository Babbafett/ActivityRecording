<?php
if (isset($_GET['k_id']) and isset($_GET['mode'])) {
	if ($_GET['mode'] == 1) {
		include 'dao.php';
		$customer = new CustomerDAO();
		$customer -> connect();
		$result = $customer -> getEntry($_GET['k_id']);

		echo '<form id="changeCustomer" class="form-horizontal" role="form" action="../php/changeCustomer.php" method="post">';

		echo "<div id='addCustomer'>";

		echo '<div class="form-group">';
		echo '<label for="inputCustomer" class="col-sm-2 control-label">Name</label>';
		echo '<div class="col-sm-10">';
		echo '<input type="hidden" value ="' . $_GET['k_id'] . '" name ="k_id">';
		echo "\n";
		echo '<input class="form-control" id="inputCustomer" placeholder="Name" name="name" value=' . $result['name'] . '>';
		echo '</div>';
		echo '</div>';
		echo '<input type="submit" class="btn btn-success" name="changeCustomer" value="Save">';
		echo '</div>';
		echo '</form>';
		echo "</div>";
	} elseif ($_GET['mode'] == 2) {
		include 'dao.php';
		$customer = new CustomerDAO();
		$customer -> connect();
		$customer -> deleteEntry($_GET['k_id']);
		header("Location: ../html/customers.html");
	} elseif ($_GET['mode'] == 3) {
		echo '<form id="customer" class="form-horizontal" role="form" action="../php/addCustomer.php" method="post">';

		echo "<div id='addCustomer'>";

		echo '<div class="form-group">';
		echo '<label for="inputCustomer" class="col-sm-2 control-label">Name</label>';
		echo '<div class="col-sm-10">';
		echo '<input class="form-control" id="inputCustomer" placeholder="Customer name" name="name">';
		echo '</div>';
		echo '</div>';
		echo '<input type="submit" class="btn btn-success" name="customer" value="Save">';
		echo '</div>';
		echo '</form>';
		echo "</div>";
	}
}
?>