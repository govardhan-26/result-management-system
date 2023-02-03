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
    <title>Professor Dashboard</title>
</head>
<body>
  <style>
    th{
      text-align: center;
    }
  </style>
	<div class="container">
			<div class="jumbotron">
					<div class="row">
							<div class="col-md-6">
									<h2>Dashboard</h2>
							</div>
							<div class="col-md-6">
									<a href="profchangepass.php" class="btn btn-success" style="margin-left: 80%;"> edit password </a>
							</div>
							<div class="col-md-12">
									<hr>
							</div>
					</div>
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'srms');


                $query = "SELECT * FROM studentwisemarks";
                $query_run = mysqli_query($connection, $query);
                $proname = $_SESSION['username'];               // something like this is optional, of course
                $proid = substr($proname,4);
            ?>

            <div class="row">
                <div class="col-md-12">
                  <h3>Name: <?php echo $proname ?></h3>
                  <br>
                  <h3 class="proid">Subject Code: <?php echo 'IT'.(2200+$proid) ?></h3>
                  <div class="col-md-12">
                      <hr>
                  </div>
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> ID </th>
                                <th> Student Name </th>
                                <th>GPA</th>
                                <th> EDIT </th>
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
                                        <th> <?php echo $row['id']; ?> </th>
                                        <th> <?php echo $row['student_name']; ?> </th>
                                        <th> <?php echo $row['sub'.$proid.'_gpa']; ?> </th>
                                        <th>
                                            <form action="updatedata.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form>
                                        </th>

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
            </div>
						<center>
							<div class="col-md-6">
									<a href="download.php" class="btn btn-success" style="margin-top:5%;"> download </a>
							</div>
						<div class="col-md-6">
								<a href="logout.php" class="btn btn-danger" style=" margin-top: 5%;"> Logout </a>
						</div>

					</center>
        </div>
    </div>
</body>
</html>
