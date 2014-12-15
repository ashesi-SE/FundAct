<?php
  include("header.html");
?>
<!-- <script type="text/javascript">$('.ui.video').video();</script> -->
<div ng-app="" ng-controller="projectsController">
	<div class="container">
		<div class="row">
            <div class="col-lg-12">
                <div class="title" style="text-align: center">
                    <h1>Projects</h1>
                    <span></span>
                </div>
            </div>
        </div>
		<!-- commentin out angular portions for emergency client presentation -->
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
  	$row = $obj->get_all_projects();
  	$row = $obj->fetch();

	while ($row) {
		echo '<div class="">';
			echo '<div class="row">';
				echo '<div>'.$row["title"].' by '.$row["owner_fn"].' '.$row["owner_ln"].'</div>';
			echo '</div>';
			echo '<div class="">';
				echo '<div class="">';
					echo '<div>';
						echo '<b>Category: </b>'.$row["category"].'</br>';
						echo '<b>Target Amount: </b>'.$row["target_amount"].'</br>';
						echo '<b>Description: </b>'.$row["description"].'</br></br>';
					echo '</div>';
				echo '</div>';
				echo '<div class="">';
					echo '<div class="ui video" data-source="youtube" data-id="i_mKY2CQ9Kk" data-image="/images/cat.jpg"></div>';
					// echo '<iframe width="560" height="315" src="//www.youtube.com/embed/eY_mrU8MPfI?list=RDhbnPkK76Ask" frameborder="0" allowfullscreen></iframe>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		$row = $obj->fetch();
	}

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