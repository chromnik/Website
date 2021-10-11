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

<style>
div
{
	background-color: powderblue;
	width: 500px;
	height: 400px;
	position: absolute;
	text-align: center;
	top: 50%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

body
{
	background-color: blue;
}

form
{
	position: absolute;
	top: 50%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}


a
{
	position: absolute;
	top: 75%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);	
}

lable, input
{
	display: block;
}

lable
{
	margin-bottom: 50px;
}

button
{
	background-color: DeepSkyBlue;
}

</style>

<div>
<h1>Log In</h1>
<form action="index.php" method="post">

  <label for="uname">User Name: </label><br>
  <input type="text" name="uname" required><br>

  <label for="password">Password:</label><br>
  <input type="password" name="password" required><br>


  <button type="submit" name="submit">Submit</button>
</form>

<a href="registration.php">Register For An Account</a>
</div>

</body>
</html>
