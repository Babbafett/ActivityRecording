<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_POST)) {
	if (isset($_POST["password"])) {
		require_once ('getConnectionAuth.php');
		$stmt = $connect -> stmt_init();
		$query = "SELECT pw FROM t_login where email = ?";
		if (!($stmt -> prepare($query))) {
			echo "Prepare failed: " . $connect -> errno . $connect -> error;
		}
		if (!($stmt -> bind_param("s", $_POST["email"]))) {
			echo "Bind failed: " . $connect -> errno . $connect -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $connect -> errno . ") " . $connect -> error;
		}
		if (!($result = $stmt -> get_result())) {
			echo "Result failed: (" . $connect -> errno . ") " . $connect -> error;
		}
		while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
			$auth = $row;
		}
		$stmt -> close();
		if (!empty($auth)) {
			$password = $auth['pw'];
			/*if ($password == hash('sha256', $_POST['password'])) {
				$_SESSION['Login'] = 1;
			}*/
			if ($password = $_POST['password']) {
				$_SESSION['Login'] = 1;
			}
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
	echo '<a href="home.html" class="btn btn-lg btn-danger btn-block"> Quick sign in</a>';
	echo "\n";
	echo "</form>";
}
?>