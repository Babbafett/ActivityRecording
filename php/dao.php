<?php
abstract class DAO {
	public function connect() {
		global $conn;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "dbActivityRecording";
		$conn = new mysqli($servername, $username, $password, $database);
		if ($conn -> connect_error) {
			die("Connection failed: " . $conn -> connect_error);
			return false;
		} else {
			/* change character set to utf8 */
			if (!$conn -> set_charset("utf8")) {
				printf("Error loading character set utf8: %s\n", $conn -> error);
			}
			return true;
		}
	}

	public abstract function close();
	public abstract function getAllEntrys();
	public abstract function getEntry($id);
	public abstract function insertEntry($data);
	public abstract function deleteEntry($id);
}

class ProjectDAO extends DAO {
	public function close() {
		if ($GLOBALS['conn'] != null) {
			$GLOBALS['conn'] -> close();
		}
	}

	public function getAllEntrys() {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_project")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function getEntry($id) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_project WHERE p_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}
	
	public function getProjectsFromCustomer($k_id) {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_project where k_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $k_id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function insertEntry($data) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("INSERT INTO t_project(k_id,description) VALUES(?,?)")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("is", $data[0], $data[1])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

	public function deleteEntry($id) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("DELETE FROM t_project WHERE p_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $data)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

}

class CustomerDAO extends DAO {
	public function close() {
		if ($GLOBALS['conn'] != null) {
			$GLOBALS['conn'] -> close();
		}
	}

	public function getAllEntrys() {
		$entrys = null;

		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_customer")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function getEntry($id) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_customer WHERE k_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}

	public function insertEntry($data) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("INSERT INTO t_customer(name) VALUES(?)")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("s", $data[0])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

	public function deleteEntry($id) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("DELETE FROM t_customer WHERE k_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $data)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

}

class EmployerDAO extends DAO {
	public function close() {
		if ($GLOBALS['conn'] != null) {
			$GLOBALS['conn'] -> close();
		}
	}

	public function getAllEntrys() {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_employer")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function getEntry($id) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_employer WHERE pernr = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}

	public function insertEntry($data) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("INSERT INTO t_customer(forname, lastname) VALUES(?,?)")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("ss", $data[0], $data[1])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

	public function deleteEntry($id) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("DELETE FROM t_customer WHERE pernr = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $data)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

}

class SubProjectDAO extends DAO {
	public function close() {
		if ($GLOBALS['conn'] != null) {
			$GLOBALS['conn'] -> close();
		}
	}

	public function getAllEntrys() {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_sub_project")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function getEntry($id) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_sub_project WHERE sp_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}
	
	public function getJobsFromProject($p_id) {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_sub_project WHERE p_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $p_id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function insertEntry($data) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("INSERT INTO t_sub_project(p_id, position, description) VALUES(?,?,?)")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("iss", $data[0], $data[1], $data[2])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

	public function deleteEntry($id) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("DELETE FROM t_sub_project WHERE sp_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $data)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

}

class EntryDAO extends DAO {
	public function close() {
		if ($GLOBALS['conn'] != null) {
			$GLOBALS['conn'] -> close();
		}
	}

	public function getAllEntrys() {
		$entrys = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_entry")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entrys[] = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entrys;
	}

	public function getEntry($id) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_entry WHERE e_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $id)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}

	public function getMonth($data) {
		$entry = null;
		if (!$stmt = $GLOBALS['conn'] -> prepare("SELECT * FROM t_entry WHERE MONTH(date) = ? and YEAR(date) = ? ")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("ii", $data[0], $data[1])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		$res = $stmt -> get_result();
		if ($res -> num_rows > 0) {
			while ($row = $res -> fetch_assoc()) {
				$entry = $row;
			}
		} else {
			echo "No Data";
			return false;
		}
		return $entry;
	}

	public function insertEntry($data) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("INSERT INTO t_sub_project(pernr, commentary, sp_id, date, hours, cost_type) VALUES(?,?,?,?,?,?)")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("isisdd", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5])) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

	public function deleteEntry($id) {
		if (!$stmt = $GLOBALS['conn'] -> prepare("DELETE FROM t_entry WHERE e_id = ?")) {
			echo "Prepare failed: (" . $GLOBALS['conn'] -> errno . ") " . $GLOBALS['conn'] -> error;
		}
		if (!$stmt -> bind_param("i", $data)) {
			echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
		}
		if (!$stmt -> execute()) {
			echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
			return false;
		} else {
			return true;
		}
	}

}
?>
