<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['Login'])) {
	if ($_SESSION['Login'] == 1) {
		$click = '../php/logout.php';
		echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
		echo '<i class="glyphicon glyphicon-off"></i> Logout</button>';
	} else {

	}
} else {
	$click = 'login.html';
	echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
	echo '<i class="glyphicon glyphicon-off"></i> Login</button>';
}
?>
