<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'srms');

if(isset($_POST['insert']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password =$_POST['password'];
    $query = "INSERT INTO proflogintable(`professor_id,``username`,`password`) VALUES ('$id','$username','$password')";
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

                    <h2> Adding Faculty </h2>
                    <hr>
                    <form action="" method="post">
                      <div class="form-group">
                          <label for=""> Professor Id </label>
                          <input type="text" name="id" class="form-control" placeholder="Enter Professor Id" required>
                      </div>
                        <div class="form-group">
                            <label for=""> Professor name </label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Professor Name" required>
                        </div>
                        <div class="form-group">
                            <label for="">password </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="adminfacdashboard.php" class="btn btn-danger"> BACK </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
