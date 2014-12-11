<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_POST)) {
	if (isset($_POST["password"])) {
		include 'dao.php';
		$employer = new EmployerDAO();
		$employer -> connect();
		$result = $employer -> getPW($_POST['email']);
		if ($result['pw'] = $_POST['password']) {
			$_SESSION['Login'] = 1;
			$_SESSION['Mail'] = $_POST['email'];
			$_SESSION['pernr'] = $result['pernr'];
		}

	}
}
if (isset($_SESSION['Login'])) {
	if ($_SESSION['Login'] == 1) {
		header("Location: ../html/home.html");
	} else {

	}
} else {
	echo '<form id="login" class ="form-signin" role="form" action="login.html" method="POST">';
	echo "\n";
	echo '<input name="email" class="form-control" type="email" placeholder="Email address" required="" autofocus="">';
	echo "\n";
	echo '<input name="password" type="password" class="form-control" placeholder="Password" required="">';
	echo "\n";
	echo '<input type="submit" class="btn btn-lg btn-primary btn-block" name="login">';
	echo "\n";
	echo "</form>";
}
?>