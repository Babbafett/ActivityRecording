<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['Login'])) {
	if ($_SESSION['Login'] == 1) {
			include('dao.php');
	$employer = new EmployerDAO();
	$employer->connect();
	$result=$employer->getEntry($_SESSION['pernr']);
		echo '<li>';
		echo '<p class="navbar-text">Signed in as '.$result['forname'].' '.$result['lastname'].'</p>';
		echo '</li>';
		echo '<li>';
		$click = '../php/logout.php';
		echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
		echo '<i class="glyphicon glyphicon-off"></i> Logout</button>';
	} else {

	}
} else {
	echo '<li>';
	echo '<p class="navbar-text">Not signed in</p>';
	echo '</li>';
	echo '<li>';
	$click = 'login.html';
	echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
	echo '<i class="glyphicon glyphicon-off"></i> Login</button>';
}
?>
