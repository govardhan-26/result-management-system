<?php
session_start();
$username = $_SESSION["username"];/* userid of the user */
$con = mysqli_connect('localhost','root','','srms') or die('Unable To connect');
if(count($_POST)>0) {
    $result = mysqli_query($con,"SELECT *from adminlogintable WHERE username='" . $username . "'");
    $row=mysqli_fetch_array($result);
    if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
        mysqli_query($con,"UPDATE adminlogintable set password='" . $_POST["newPassword"] . "' WHERE username='" . $username . "'");
        ?>
        <script>alert("Password Changed Sucessfully");</script>;
        <?php
      }
    else{
      ?>
      <script>
        alert("Password is not correct");
        </script>
        <?php
      }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<h3 align="center"style="margin-top:15%;">CHANGE PASSWORD</h3>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<button type="submit" name="update"class="btn btn-primary">update</button>
<br><br>
<a href="admindashboard.php" class="btn btn-danger"> BACK </a>
</form>
<br>
<br>
</body>
</html>
