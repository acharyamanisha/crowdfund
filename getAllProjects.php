<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
session_start(); //starts the session
if ($_SESSION['email']) { //checks if name is logged in
} else {
    header("location:index.php"); // redirects if name is not logged in
}
$email = $_SESSION['email']; //assigns name value
?>
<body>
<?php require 'dbconn.php';
require 'navbar.php';
?>
<?php


$get_all_projects_query = "SELECT PROJECT.PROJECT_ID,PROJECT.PROJECT_TITLE,PROJECT.DESCRIPTION,PROJECT.PHOTO from PROJECT;";


$get_all_projects_result = $conn->query($get_all_projects_query);

if ($get_all_projects_result->num_rows === 0) {
    echo "<br>No Recipes Exists in the Database ";


} else {

    while ($row = $get_all_projects_result->fetch_assoc()) { ?>
        <center>
        <div class="col-sm-4">
            <div class="card">

                <!--Card image-->
                <?php
                if (is_null($row['PHOTO'])){?>
                    <img src='img/blank.png' alt='Project Pic' title='Project Pic'
                         style="width:200px;height:200px">
                    <?php
                }else{?>
                    <img src='data:image;base64,<?php echo $row['PHOTO']; ?>' alt='Project Pic' title='Project Pic'
                         style="width:200px;height:200px">
                    <?php
                }?>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->
                    <h4 class="card-title"><?php echo $row['PROJECT_TITLE'] ;?></h4>
                    <a href="viewProject.php?project_id=<?php echo $row['PROJECT_ID'] ;?>" class="btn btn-primary">View
                        Project</a>
                </div>
                <br><br>
                <!--/.Card content-->
            </div>
        </div>
        </center>
        <?php
    }
}

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="js/bootstrap.min.js"></script>-->
</body>
</html>
