<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6">
                    <a href="insertdata.php" class="btn btn-success" style="margin-left: 80%;"> ADD DATA </a>
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
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> ID </th>
                                <th> Student Name </th>
                                <th> SUBJECT1 </th>
                                <th>SUBJECT2</th>
                                <th>SUBJECT3</th>
                                <th>Total GPA</th>
                                <th> EDIT </th>
                                <th> DELETE </th>
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
                                        <th> <?php echo $row['sub1_gpa']; ?> </th>
                                        <th> <?php echo $row['sub2_gpa']; ?> </th>
                                        <th> <?php echo $row['sub3_gpa']; ?> </th>
                                        <th> <?php echo ($row['sub1_gpa']+$row['sub2_gpa']+$row['sub3_gpa'])/3; ?> </th>
                                        <th>
                                            <form action="adminupdatedata.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form>
                                        </th>
                                        <th>
                                            <form action="delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="delete" class="btn btn-danger" value="DELETE">
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
                <div class="col-md-6">
                    <a href="admindashboard.php" class="btn btn-success" style="margin-left: 80%;"> Back </a>
                    <a href="logout.php" class="btn btn-success" style=" margin-top: 5%;margin-left: 80%;"> Logout </a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
