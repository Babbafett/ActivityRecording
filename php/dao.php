<?php
abstract class DAO{
	public $conn = null;
	public function connect(){
		$servername = "localhost";
		$username = "admin";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
			return false;
		}
		else{
			return true;
		}
	}
	public abstract function close();
	public abstract function getAllEntrys();
	public abstract function getEntry($id);
	public abstract function insertEntry($data)
	public abstract function deleteEntry($id);
}

class ProjectDAO extends DAO{
	public function close(){
		if($conn != null){
			$conn->close();
		}
	}
	public function getAllEntrys(){
		$entrys = null;
		if(!$stmt = $conn->prepare("SELECT * FROM tProject")){
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$res = $stmt->get_result();
		if($res->num_rows > 0){
			while($row = $res->fetch_assoc(){
			$entrys[] = $row;
			}
		}
		else{
			echo "No Data";
			return false;
		}
		return $entrys;
	}
	public function getEntry($id){
		$entry = null;
		if(!$stmt = $conn->prepare("SELECT * FROM tProject where p_id = ?")){
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
		}
		if(!$stmt->bind_param("i",$id){
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$res = $stmt->get_result();
		if($res->num_rows > 0){
			while($row = $res->fetch_assoc(){
			$entry = $row;
			}
		}
		else{
			echo "No Data";
			return false;
		}
		return $entry;
	}
	public function insertEntry($data){
		return true;
	}
	public function deleteEntry($id){
	}
}
?>