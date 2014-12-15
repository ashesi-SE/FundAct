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

		function add_projects($owner_firstname, $owner_lastname, $title, $description, $category, $target_amount, $image_path, $video){
			$query = "INSERT INTO projects SET fname ='$owner_firstname', lname='$owner_lastname', title='$title', description='$description', category='$category', target_amount='$target_amount', pictures='$image_path', video='$video'";
			return $this->query($query);
		}

		function get_project_owners($user_id){
			$query = "SELECT fname, lname FROM users, projects WHERE users.uid = projects.uid";
			return $this->$query($query);
		}

		function get_number_of_projects(){
			$query = "SELECT count(*) FROM projects";
			return $this->query($query);
		}

		function authenticate($project_id, $new_status){
			$query = "UPDATE projects SET status='$new_status' WHERE pid = '$project_id'";
			return $this->query($query);
		}

		function select_owner_projects($user_id){
			$query = "SELECT * FROM projects WHERE uid = '$user_id'";
			return $this->query($query);
		}
	}
?>

