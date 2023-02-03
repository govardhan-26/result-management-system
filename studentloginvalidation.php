<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'srms';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// isset() will check if the data exists.
if (!isset($_POST['username'])){
	// Could not get the data that should have been sent.
	exit('Please fill email and password fields!');
}
else if (!isset($_POST['password'])){
	// Could not get the data that should have been sent.
	exit('Please fill email and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM studentlogintable WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // $_POST['password'] = md5($password);
        $mypassword=$_POST['password'];
        //$mypassword = md5($mypassword);
        if ($mypassword === $password){

            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location:studentdashboard.php');

        }
        else {
            // Incorrect password
            echo "Incorrect Details";
        }
    }
    else {
        // Incorrect username
        echo 'Incorrect info';
    }
    $stmt->close();
}
?>
