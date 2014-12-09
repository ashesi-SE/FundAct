<?php
  include("header.html");
?>
<!-- <script type="text/javascript">$('.ui.video').video();</script> -->
<div ng-app="" ng-controller="projectsController">
	<!-- <div class="container bootcards-container"> -->
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
					<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>Project Title</th>
					            <th>Social Entrepreneur</th>
					            <th>Category</th>
					            <th>Target Amount</th>
					            <th>Description</th>
					        </tr>
					    </thead>
					    <tbody  ng-repeat="project in projects">
					        <tr>
					            <td>{{ project.title }}</td>
					            <td>{{ project.firstname + ' ' + project.lastname }}</td>
					            <td>{{ project.category }}</td>
					            <td>{{ project.target_amount }}</td>
					            <td>{{ project.description }}</td>
					        </tr>
					    </tbody>
					</table>
				</div>
				<div class="col-lg-1"></div>
			</div>
		<!-- </div> -->

	<!-- </div> -->
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