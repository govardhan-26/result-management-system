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
		<style >
		.button{

			/*margin-top: 200px;
			margin-left:300px;
			margin-bottom: 40%;
			padding: 12%;
			background-color: rgb(164, 248, 164);*/
			margin: 20%;
				text-align: center;
				width: 200px;
				font-size: 16px;
				font-weight: 600;
				color: #fff;
				cursor: pointer;
				margin: 150px;
				margin-top: 50%;
				margin-bottom: 30%;
				height: 55px;
				text-align:center;
				border: none;
				background-size: 300% 100%;
				border-radius: 50px;
				moz-transition: all .4s ease-in-out;
				-o-transition: all .4s ease-in-out;
				-webkit-transition: all .4s ease-in-out;
				transition: all .4s ease-in-out;

		}
		.button:hover {
				background-position: 100% 0;
				moz-transition: all .4s ease-in-out;
				-o-transition: all .4s ease-in-out;
				-webkit-transition: all .4s ease-in-out;
				transition: all .4s ease-in-out;
		}

		.button:focus {
				outline: none;
		}
		.button {
				background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
				box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
		}
		</style>
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
								<div>
									<form action="adminfacdashboard.php">
										<button class="button"type="submit" name="Faculty">Faculty</button>
									</form>
								</div>
								<div>
									<form action="adminstddashboard.php" method="post">
										<button class="button" type="submit" name="Student">Student</button>
									</form>
								</div>
								<div class="col-md-6">
                    <a href="adminchangepass.php" class="btn btn-success" style="margin-left: 80%;"> Change password </a>
                </div>


            </div>


</body>
</html>
