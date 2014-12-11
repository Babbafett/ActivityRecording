<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['Login'])) {
	if ($_SESSION['Login'] == 1) {
		echo "<li>";
		echo "<p class='navbar-text'>Logged in as " . $_SESSION['Mail'] . "</p>";
		echo "</li>";
		echo "<li>";
		$click = '../php/logout.php';
		echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
		echo '<i class="glyphicon glyphicon-off"></i> Logout</button>';
		echo "</li>";
	}
} else {
	header("Location: ../html/login.html"); // not logged in --> always redirect to login page
// 	$click = 'login.html';
// 	echo '<butto class="btn btn-primary navbar-btn" onclick=location.href="' . $click . '">';
// 	echo '<i class="glyphicon glyphicon-off"></i> Login</button>';
}
?>
