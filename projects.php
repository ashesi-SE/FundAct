<?php
  include("header.html");
?>

<div ng-app="" ng-controller="projectsController">
	<div class="container bootcards-container">
		<div class="row">
            <div class="col-lg-12">
                <div class="title" style="text-align: center">
                    <h1>Projects</h1>
                    <span></span>
                </div>
            </div>
        </div>
<?php

	include("fundact.php");

	$obj = new fundact();

	if (!$obj->get_all_projects()){
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
				?>

				<div class="panel panel-default">
				  	<div class="panel-heading clearfix">
				    	<h3 class="panel-title pull-left"><b><?php echo '<div>'.$row["title"].'</div>'; ?></b></h3>
				      	<!-- <a class="btn btn-primary pull-right" href="#">
				        <i class="fa fa-pencil"></i>
				        Details
				      	</a> -->
				    </div>
				    <?php 
				    if ($row["pictures"] != null) {
				    	echo "<img src='".$row["pictures"]."' class=\"img-responsive\"/>"; 
				    }else{
				    	echo "<img src='./images/defaultProjectPicture.jpg' class=\"img-responsive\"/>";
				    }
				    
				    ?>
				    
				    <div class="list-group">
				    	<!-- <div class="list-group-item"> -->
					        <!-- <p class="list-group-item-text">Project Owner</p> -->
					        <!-- <h4 class="list-group-item-heading"><b><?php //echo $row["fname"].' '.$row["lname"]; ?></b></h4> -->
				      	<!-- </div> -->
						<div class="list-group-item">
							<p class="list-group-item-text">Category</p>
							<h4 class="list-group-item-heading"><b><?php echo $row["category"]; ?></b></h4>
						</div>
						<div class="list-group-item">
							<p class="list-group-item-text">Target Amount</p>
							<h4 class="list-group-item-heading"><i class="glyphicon glyphicon-usd"></i><b><?php echo $row["target_amount"]; ?></b></h4>
						</div>
							<div class="list-group-item">
							<p class="list-group-item-text"><?php echo $row["description"]; ?></p>
						</div>
				    </div>
				    <div class="panel-footer">
					    <!-- <small>Built with Bootcards - Base Card</small> -->
					    <div class="btn-group btn-group-justified">
							<div class="btn-group">
								<a href="" data-toggle="modal" data-target="#donateModal">
									<button class="btn btn-default">
											<i class="glyphicon glyphicon-usd"></i>
											Donate
									</button>
								</a>
							</div>
							<!-- <div class="btn-group">
								<button class="btn btn-default">
									<i class="fa fa-star"></i>
									Favorite
								</button>
							</div> -->
							<div class="btn-group">
								<a href="" data-toggle="modal" data-target="#shareModal">
									<button class="btn btn-default">
										<i class="glyphicon glyphicon-share-alt"></i>
										Share
									</button>
								</a>
							</div>
					    </div>
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

<script>
	function projectsController($scope,$http) {
	    $http.get("fundact_action.php?function=get-all_projects")
	    .success(function(response) {$scope.projects = response;});
	}
</script>

<?php
include("footer.html")
?>;