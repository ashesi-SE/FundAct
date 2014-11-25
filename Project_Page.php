<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" np-app="">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.html">
                        FundAct
                    </a>
                </li>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">FundAct logo goes here
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div>
                    <div class="col-lg-6 text-right">
                        <!-- <p class="text-right"> -->
                            login/ sign up goes here 
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> <input type="text" ng-model="searchItem" placeholder="Search projects">
                        <!-- </p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title">
                            <h1>FundAct</h1>
                        </div>
                        <p>A crowd-source fundraising platform which gives hopes to poorly funded, yet brilliant entrepreneural ideas.</p>
                    </div>
                </div>
<?php
    include_once("fundact.php");
    include_once("gen.php");

    $obj = new fundact();

    $obj->get_all_projects();

    $row = $obj->fetch();

    if(!$row){
        echo "{";
        echo jsonn("result",0). ",";
        echo jsons("message","unknown command");
        echo "}";
    }

    while ($row) {
        echo '<div class="row">';
        echo '<div class="col-lg-2">';
        echo "</div>";
        echo '<div class="col-lg-8">';


        echo "<p><b>First name:</b> $row[owner_fn]</p>";
        echo "<p><b>Last name:</b> $row[owner_ln]</p>";
        echo "<p><b>Title:</b> $row[title]</p>";
        echo "<p><b>Description:</b> $row[description]</p>";
        echo "<p><b>category:</b> $row[category]</p>";
        echo "<p><b>Target amount:</b> $row[target_amount]</p>";
        echo "<p><b>Video link:</b> $row[video]</p><br>";

        echo "</div>";
        echo '<div class="col-lg-2">';
        echo "</div>";
        echo "</div>";
        $row = $obj->fetch();

    }

?>



                <div class="row">

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Angular.js addition -->
    <script src="js/angular.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
