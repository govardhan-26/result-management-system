<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Admin Login</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script>src="script.js"</script>
  <style>
    body{
      width:100vw;
      height:100vh;
      margin:0;
     background-image: linear-gradient(green,white);
    }
  </style>
 </head>
 <body>
   <div class="log-page">
   <div class="log-details">
    <div class="img"> <img src="admin.png" class="avatar"></div>
     <h2>Admin Login</h2>
     <hr>
     <form method="post" action="adminloginvalidation.php">
      <p><strong>User Name:</strong></p>
       <input type="text" name="username" placeholder="Enter Username" id="username"required="required">
       <p><strong>Password:</strong></p>
       <input type="password" name="password" placeholder="Enter Password" id="password" required="required"><br><hr>
       <button type="submit" name="Login">Login</button>
     </form><hr>
     <a href="index.html" class="back">Back</a>
   </div>
     </div>
 </body>
</html>
