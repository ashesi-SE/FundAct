<?php
  include("header.html");
?>
<!-- <script type="text/javascript">$('.ui.video').video();</script> -->
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
		<!-- commented out angular portions for emergency client presentation -->

		<!-- <div ng-repeat="project in projects">
			<div class="row">
				<div>{{ project.title }} - By {{ project.firstname + " " + project.lastname}}</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div>
						<b>Category: </b>{{project.category}}</br>
						<b>Target Amount: </b>{{project.target_amount}}</br>
						<b>Description: </b>{{project.description}}</br></br>
					</div>
				</div>
				<div class="col-md-6">
					<div class="ui video" data-source="youtube" data-id="i_mKY2CQ9Kk" data-image="/images/cat.jpg"></div>
					<iframe width="560" height="315" src="//www.youtube.com/embed/eY_mrU8MPfI?list=RDhbnPkK76Ask" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div> -->
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
				    <img src="./images/Fundact_logo.png" class="img-responsive"/>
				    <div class="list-group">
				    	<div class="list-group-item">
					        <p class="list-group-item-text">Project Owner</p>
					        <h4 class="list-group-item-heading"><b><?php echo $row["owner_fn"].' '.$row["owner_ln"]; ?></b></h4>
				      	</div>
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
	$(document).ready( function () {
		$("#dataTable").DataTable();
	} );
	
	function projectsController($scope,$http) {
	    $http.get("fundact_action.php?function=get-all_projects")
	    .success(function(response) {$scope.projects = response;});
	}
</script>

<?php
include("footer.html")
?>;