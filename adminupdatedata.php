<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Update Data</title>
</head>
<body>
    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'srms');

    $id = $_POST['id'];
    $query = "SELECT * FROM studentwisemarks WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">

                            <h2>Update Data</h2>
                            <hr>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <div class="form-group">
                                    <label for=""> Student Name </label>
                                    <input type="text" name="student_name" class="form-control" value="<?php echo $row['student_name'] ?>" placeholder="Enter Student Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Subject1 GPA </label>
                                    <input type="number" name="sub1_gpa" class="form-control" value="<?php echo $row['sub1_gpa'] ?>" placeholder="Enter Subject1 GPA" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Subject2 GPA </label>
                                    <input type="number" name="sub2_gpa" class="form-control" value="<?php echo $row['sub2_gpa'] ?>" placeholder="Enter   Subject2 GPA" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Subject3 GPA </label>
                                    <input type="number" name="sub3_gpa" class="form-control" value="<?php echo $row['sub3_gpa'] ?>" placeholder="Enter Subject3 GPA" required>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="adminstddashboard.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>

                    <?php
                    if(isset($_POST['update']))
                    {
                        $student_name = $_POST['student_name'];
                        $sub1_gpa = $_POST['sub1_gpa'];
                        $sub2_gpa = $_POST['sub2_gpa'];
                        $sub3_gpa = $_POST['sub3_gpa'];
                        $query = "UPDATE studentwisemarks SET student_name='$student_name',sub1_gpa='$sub1_gpa',sub2_gpa='$sub2_gpa',sub3_gpa='$sub3_gpa' WHERE id='$id'  ";
                        $query_run = mysqli_query($connection, $query);

                        if($query_run)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:adminstddashboard.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
        }
    }
    else
    {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>
