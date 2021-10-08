<?php
session_start();
  include("dbconnection.php");

  if (isset($_POST["submit"]))
{
      $uname = $_POST["uname"];
      $password = $_POST["password"];


      if(!empty($uname) && !empty($password))
      {
        $query = "SELECT * FROM users WHERE uname = '$uname' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

          if(mysqli_num_rows($result))
          {
            $_SESSION['uname'] = $uname;
            header("Location: profile.php");
          }
          else {
            echo "Error Invalid User Name or Password Input";
          }
      }
}

?>




<!DOCTYPE html>
<html>
<body>

<h1>Log In</h1>
<form action="index.php" method="post">

  <label for="uname">User Name: </label><br>
  <input type="text" name="uname" required><br>

  <label for="password">Password:</label><br>
  <input type="password" name="password" required><br>


  <button type="submit" name="submit">Submit</button>
</form>

<p>If you have not registered an account yet, please click <a href="registration.php">here</a> to be redirected to the registration page<p>

</body>
</html>
