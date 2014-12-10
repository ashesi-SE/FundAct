<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FundAct</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/fundact.css">

    <!-- BootCards -->
    <link rel="stylesheet" type="text/css" href="css/bootcards.css">
    <script src="js/bootcards.js"></script>

    <!-- Angular -->
    <script src="js/angular.js"></script>

    <!-- Social media sharing using sharethis.com -->
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-a9d72796-c930-dd9a-e572-cbfa27149373", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    <!-- DataTables CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
      
    <!-- DataTables -->
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>

  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php"><i class="fa fa-home fa-lg"></i><!-- <img src="./images/FundAct_logo.png" class="img-responsive"/> --></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="./projects.php">Donate to a project</a></li>
            <li><a href="./start_a_project.php">Start a project</a></li>
            <li><a href="./howitworks.php">How it works</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search projects">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form> -->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="" data-toggle="modal" data-target="#signUpModal">Sign up</a></li>
            <li><a href="" data-toggle="modal" data-target="#logInModal">Log in</a></li>
            <li>
              <a href="" data-toggle="#" data-target="#"><span class="glyphicon glyphicon-search" aria-hidden="true">
                </span> <input type="text" ng-model="searchItem" placeholder="Search projects">
              </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

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
						<table id="dataTable" class="table table-striped table-hover table-bordered">
						    <thead>
						        <tr>
						            <th>Project Title</th>
						            <th>Social Entrepreneur</th>
						            <th>Category</th>
						            <th>Target Amount</th>
						            <th>Description</th>
						            <th>Project Status</th>
						        </tr>
						    </thead>
						    <tbody>
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


	</script>
		<!-- login modal for authenticating the work of social entreprenerus -->
	<div class="modal fade" id="frontEndDisplayModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Front-End Display Option</h4>
				</div>
				<form action="index.php" method="post">
					<div class="modal-body">
						<div class="center">
							<div class="input-group input-group-lg">
								<button type="button" id="remove" class="btn btn-md btn-primary btn-block"  onclick="authenticate()">Remove</button>
							</div>
						</div></br></br>
					</div>
				</form>
			</div>
		</div>
	</div>
		<!-- login modal for social entrepreneurs -->
	<div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Log In</h4>
				</div>
				<form action="index.php" method="post">
					<div class="modal-body">
						<div class="input-group input-group-lg">
						  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
						  <input class="form-control" type="text" name="email" placeholder="Email address">
						</div></br></br>
						<div class="input-group input-group-lg">
						  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
						  <input class="form-control" type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="modal-footer">
						<div class="center">
							<button type="submit" class="btn btn-lg btn-primary btn-block">Log In</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Donate modal with payment option(s) -->
	<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Choose payment system</h4>
				</div>
				<div class="modal-body">
					<img src="./images/iWallet.png" class="img-responsive"/>
					<!-- <img src="./images/Fundact_logo.png" class="img-responsive"/> -->
				</div>
				<div class="modal-footer">
					<div class="center">
						<button type="submit" class="btn btn-md btn-primary btn-block">Proceed to enter details</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Social media sharing modal -->
	<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Share</h4>
				</div>
				<div class="modal-body">
					<span class='st__hcount' displayText=''></span>
					<span class='st_facebook_hcount' displayText='Facebook'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
				</div>
				<div class="modal-footer">
					<div class="center">
						<!-- <button type="submit" class="btn btn-md btn-primary btn-block">Proceed to enter details</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footBanner">
		<i class="fa fa-copyright fa-lg"></i>&nbsp;2014 FundAct, Inc. All Rights Reserved
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="js/jquery.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>