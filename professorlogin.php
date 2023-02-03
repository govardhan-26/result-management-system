<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Faculty Login</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
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
    <div class="img"> <img src="faculty.png" class="avatar"></div>
     <h2>Faculty Login</h2>
     <hr>
     <form method="post" action="professorloginvalidation.php">
       <p><strong>User Name:</strong></p>
       <input type="text" name="username" placeholder="Enter Username" required="required">
       <p><strong>Password:</strong></p>
       <input type="password" name="password" placeholder="Enter Password" required="required"><br><hr>
       <button type="submit" name="button">Login</button>
     </form>
     <hr>
     <a href="index.html" class="back">Back</a>
   </div>
     </div>
 </body>
</html>
