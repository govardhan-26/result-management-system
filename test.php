<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"srms");
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                  <img src="admindash.png" alt="admin photo">
                    <h2> Dashboard</h2>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-success" style="margin-left: 80%;"> Logout </a>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                  <div id="Faculty" class="box">
                    <a href="adminfacdashboard.php" class="log">Faculty</a>
                  </div>
                  <div id="Students" class="box">
                     <a href="adminstddashboard.php" class="log">Students</a>
                  </div>

            </div>


</body>
</html>
