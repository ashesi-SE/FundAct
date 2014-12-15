<?php
	include("header.html");
?>

	<div ng-app="" ng-controller="projectsController">
		<div class="container bootcards-container">
			<div class="row">
	            <div class="col-lg-12">
	                <div class="title" style="text-align: center">
	                    <h1>Projects</h1>
	                </div>
	            </div>
	        </div>
			<!-- commented out angular portions for emergency client presentation -->

			<!-- <div ng-repeat="project in projects"> -->
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<table id="dataTable" class="table table-striped table-hover table-bordered">
						    <thead>
						        <tr>
						            <th>Project Title</th>
						            <!-- <th>Social Entrepreneur</th> -->
						            <th>Category</th>
						            <th>Target Amount</th>
						            <th>Description</th>
						            <th>Project Status</th>
						        </tr>
						    </thead>
						    <tbody>
<?php
include("fundact.php");

$projects = new fundact();

$projects->get_all_projects();

if (!$row = $projects->fetch()){
    echo "Error: could not display projects";
}
while ($row) {
	# code...

?>

        <tr>
            <td><?php echo $row["title"] ?></td>
            <!-- <td><?php echo $row["owner_fn"].' '.$row["owner_ln"]; ?></td> -->
            <td><?php echo $row["category"]; ?></td>
            <td><?php echo $row["target_amount"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td>
                <a href="" data-toggle="modal" data-target="#frontEndDisplayModal">
                    <button type="button" class="btn btn-success" id="verify">Authenticated</button>
                </a>
            </td>
        </tr>

<?php
	$row = $projects->fetch();
}
?>
<!--
								Angularjs table code
                                <tr  ng-repeat="project in projects">
						            <td>{{ project.title }}</td>
						            <td>{{ project.firstname + ' ' + project.lastname }}</td>
						            <td>{{ project.category }}</td>
						            <td>{{ project.target_amount }}</td>
						            <td>{{ project.description }}</td>
						            <td>
						            	<a href="" data-toggle="modal" data-target="#frontEndDisplayModal">
						            		<button type="button" class="btn btn-success" id="verify">Authenticated</button>
					            		</a>
						            </td>
						        </tr>
-->
						    </tbody>
						</table>
					</div>
					<div class="col-lg-1"></div>
				</div>
			<!-- </div> -->

		</div>
	</div>

	<script>
	function projectsController($scope,$http) {
	    $http.get("fundact_action.php?function=get-all_projects")
	    .success(function(response) {$scope.projects = response;});
	}

	$(document).ready( function () {
		$("#dataTable").DataTable();
	} );

	function authenticate(){
		// if document.getElementById("remove").value == "Remove" {
		// 	document.getElementById("remove").value = "authenticate";
		// };
		// $("#remove").prop("value", "removed");

		// if (document.getElementById("verify").value == "Authenticate") {
		// 	// document.getElementById("remove").value == "Remove"
		// 	$("verify").removeClass("btn btn-success").addClass("btn btn-warning");
		// }else{
		// 	$("verify").removeClass("btn btn-warning").addClass("btn btn-success");
		// };
		

		document.getElementById("verify").className = document.getElementById("verify").className.replace( "btn btn-success", 'btn btn-danger' );
		document.getElementById("verify").value == "Removed";

	}


<?php
	include("footer.html");
?>