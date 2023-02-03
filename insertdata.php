<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'srms');

if(isset($_POST['insert']))
{
    $student_name = $_POST['student_name'];
    $sub1_gpa = $_POST['sub1_gpa'];
    $sub2_gpa = $_POST['sub2_gpa'];
    $sub3_gpa = $_POST['sub3_gpa'];
    $query = "INSERT INTO studentwisemarks(`student_name`,`sub1_gpa`,`sub2_gpa`,`sub3_gpa`) VALUES ('$student_name','$sub1_gpa','$sub2_gpa','$sub3_gpa')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Add student</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">

                    <h2> Adding student </h2>
                    <hr>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for=""> Student Name </label>
                            <input type="text" name="student_name" class="form-control" placeholder="Student Name" required>
                        </div>
                        <div class="form-group">
                            <label for=""> GPA </label>
                            <input type="number" name="sub1_gpa" class="form-control" placeholder="Subject1 GPA" required>
                        </div>
                        <div class="form-group">
                            <label for=""> GPA </label>
                            <input type="number" name="sub2_gpa" class="form-control" placeholder="Subject2 GPA" required>
                        </div>
                        <div class="form-group">
                            <label for=""> GPA </label>
                            <input type="number" name="sub3_gpa" class="form-control" placeholder="Subject3 GPA" required>
                        </div>
                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="adminstddashboard.php" class="btn btn-danger"> BACK </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
