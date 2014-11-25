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

        function insert_project($firstName, $lastname, $title, $description, $category, $target_amount, $video){
            $query = "INSERT INTO projects (owner_fn,owner_ln,title,description,category,target_amount,video) VALUES ('$firstName', '$lastname', '$title', '$description', '$category', '$target_amount', '$video')";
            return $this->query($query);
        }
	}
?>

