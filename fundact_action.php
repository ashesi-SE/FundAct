<?php
  include("fundact.php");
  $obj = new fundact();
  if (!$obj->get_all_projects()){
    echo"error";
      exit();
  }
	if (isset($_REQUEST["function"]) == "get_all_projects"){
    echo ("[");
    $row = $obj->get_all_projects();
    $row = $obj->fetch();
    while($row){
      echo ("{");
      echo ("\"firstname\":\"".$row["owner_fn"]."\",");
    	echo ("\"lastname\":\"".$row["owner_ln"]."\",");
    	echo ("\"title\":\"".$row["title"]."\",");
    	echo ("\"description\":\"".$row["description"]."\",");
      echo ("\"category\":\"".$row["category"]."\",");
      echo ("\"target_amount\":\"".$row["target_amount"]."\",");
      $v = explode("=", $row["video"]);

      if (! isset($v[1])) {
        $v[1] = null;
      }

    	echo ("\"video\":\"".$v[1]."\"");
      // "//www.youtube.com/embed/".
    	echo("}");
    	$row = $obj->fetch();
      if ($row){
      	echo (",");
  		}
  	}
    echo ("]");
	}
?>