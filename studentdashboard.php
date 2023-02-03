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
    <title>Student Dashboard</title>
		<style type="text/css">
		th{
			text-align: center;
		}
		</style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <h2>Dashboard</h2>
                </div>
								<div class="col-md-6">
                    <a href="stdchangepass.php" class="btn btn-success" style="margin-left: 80%;"> Edit password </a>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'srms');


                $query = "SELECT * FROM studentwisemarks where id='$_SESSION[id]'";
                $query_run = mysqli_query($connection, $query);
								$proname = $_SESSION['username'];               // something like this is optional, of course
                $proid = substr($proname,7);

            ?>

            <div class="row">
                <div class="col-md-12">
									<h3>Name: <?php echo $proname ?></h3>
                  <br>
                  <h3 class="proid">Enrollement ID: <?php echo '2020ITB'.(100+$proid) ?></h3>
                  <div class="col-md-12">
                      <hr>
                  </div>
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> Subject Name</th>
                                <th> GPA</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        if($query_run)
                        {
                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>
                                    <tr>
																				<th>Subject1</th>
                                        <th> <?php echo $row['sub1_gpa']; ?> </th>
																		</tr>
																		<tr>
																					<th>Subject2</th>
	                                        <th> <?php echo $row['sub2_gpa']; ?> </th>
																		</tr>
																		<tr>
																			<th>Subject3</th>
																			<th> <?php echo $row['sub3_gpa']; ?> </th>
																		</tr>

																		<tr>
																				<th>Total CGPA</th>
                                        <th> <?php echo ($row['sub1_gpa']+$row['sub2_gpa']+$row['sub3_gpa'])/3; ?> </th>
                                    </tr>

                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <th colspan="6"> No Record Found </th>
                                    </th>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-success" style="margin-left: 80%;"> Logout </a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
