<?php
  include("header.html");
?>

<div ng-app="" ng-controller="projectsController">
	<div class="container"> 
		<div ng-repeat="project in projects">
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
					<!-- <iframe width="560" height="315" src="//www.youtube.com/embed/eY_mrU8MPfI?list=RDhbnPkK76Ask" frameborder="0" allowfullscreen></iframe> -->
					<iframe width="560" height="315" src="//www.youtube.com/embed/{{project.video}}" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function projectsController($scope,$http) {
    $http.get("fundact_action.php?function=get-all_projects")
    .success(function(response) {$scope.projects = response;});
}

var app = angular.module('youtube-videos', []);

angular.module('youtube-videos').directive('youtube', function(){
	return {
		scope: 'E',
		template: 
	}
});

</script>

<?php
include("footer.html")
?>