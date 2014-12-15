<?php
	include("header.html");
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title" style="text-align: center">
					<h1>My Dashboard</h1>
				</div>
			</div>
		</div>
		<div class="row">

			<!-- contians details of each owners projects -->
				<div class="bootcards-container">
					<div class="row">
			        </div>
<?php

	include("fundact.php");

	$obj = new fundact();

	if (isset($_REQUEST['uid'])) {
		$user_id = $_REQUEST['uid'];
	}

	if (!$obj->select_owner_projects($user_id)){
    echo"error";
		exit();
  	}

  	$row = $obj->fetch();

  	$column_count = 0;

		echo '<div class="bootcards-cards">';

		while ($row) {
			if ($column_count % 3 === 0) {
				echo '<div class="row">';
			}

  			$rowContent = 0;

			while ($rowContent < 3 && $row) {
				# code...
				echo '<div class="col-md-4">';
				if ($row["pictures"] != null) {
			    	echo "<img src='".$row["pictures"]."' class=\"img-responsive\"/>"; 
			    }else{
			    	echo "<img src='./images/defaultProjectPicture.jpg' class=\"img-responsive\"/>";
			    }
				echo "</div>";
				echo '<div class="col-md-8">';

				echo "<div class='panel panel-default'>";
					echo "<a href='project_page.php?uid=".$row["uid"]."'>";
				  	echo "<div class=\"panel-heading clearfix\">";
				    	echo "<h3 class=\"panel-title pull-left\"><b><div>".$row["title"]."</div></b></h3>";
				    echo "</div>";
				    echo "</a>";

				    ?>
				    <div class="list-group">
						<div class="list-group-item">
							<p class="list-group-item-text">Category</p>
							<h4 class="list-group-item-heading"><b><?php echo $row["category"]; ?></b></h4>
						<!-- </div>
						<div class="list-group-item"> -->
							<p class="list-group-item-text">Target Amount</p>
							<h4 class="list-group-item-heading"><i class="glyphicon glyphicon-usd"></i><b><?php echo $row["target_amount"]; ?></b></h4>
						</div>
							<div class="list-group-item">
							<p class="list-group-item-text"><?php echo $row["description"]; ?></p>
						</div>
				    </div>
				    <div class="panel-footer">
						<a href="" data-toggle="modal" data-target="#shareModal">
							<button class="btn btn-default pull-right">
								<i class="glyphicon glyphicon-share-alt"></i>
								Share
							</button>
						</a>
				    </div>
				</div>

				<?php

				echo '</div>';
				$row = $obj->fetch();
				$rowContent = $rowContent + 1;
			}

			if ($column_count % 3 === 0) {
				echo '</div>';
			}

			$column_count = $column_count + 3;
		}

		echo '</div>';

?>

				</div>
			</div>
	</div>

<?php
	include("footer.html");
?>