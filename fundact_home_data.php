<?php
	include("gen.php");
    include_once("fundact.php");
	
	$obj = new fundact();

	if (isset($_REQUEST["function"]) == "get_all_projects"){

      	$row = $obj->get_all_projects();
      	$row = $obj->fetch();

        if(!$row){
          echo "{";
          echo jsonn("result",0). ",";
          echo jsons("message","unknown command");
          echo "}";
        }else{

            echo "{";
            echo jsonn("result",1).",";
            echo '"projects":[';
            while ($row) {
                echo "{";
                echo jsons("firstname", $row['owner_fn']).",";
                echo jsons("lastname", $row['owner_ln']).",";
                echo jsons("title", $row['title']).",";
                echo jsons("description", $row['description']).",";
                echo jsons("description", $row['description']).",";
                echo jsonn("target_amount", $row['target_amount']).",";
                echo jsons("video", $row['video']);
                echo "}";

                $row = $obj->fetch();

                if ($row){
                    echo (",");
                }
            }
            echo "]";
            echo "}";

        }
	}
?>

