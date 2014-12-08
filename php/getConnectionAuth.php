<?php
$connect = new mysqli('localhost', 'root', '', 'dbActivityRecordingAuth');
if ($connect -> connect_errno) {
	echo "Failed to connect to MySQL: " . $connect -> connect_error;
}
?>