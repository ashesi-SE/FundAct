<?php
	include_once("adb.php");
	
	class fundact extends adb{
		function fundact(){
			adb::adb();
		}

		function get_all_projects(){
			$query = "SELECT * FROM projects";
			return $this->query($query);
		}
	}
?>

