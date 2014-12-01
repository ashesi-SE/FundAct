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

		function add_projects($owner_firstname, $owner_lastname, $title, $description, $category, $target_amount, $video){
			$query = "INSERT INTO projects SET owner_fn ='$owner_firstname', owner_ln='$owner_lastname', title='$title',
			 description='$description', category='$category', target_amount='$target_amount', video='$video'";
		return $this->query($query);
		}

	}
?>

