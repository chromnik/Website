<?php
session_start();
  include("dbconnection.php");
  include("functions.php");

  if (isset($_POST["submit"]))  {
    $name = $_POST["submit"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];
    $gender = $_POST["gender"];
    $error = " ";

    if (pwdMatch($password, $password_2) == true)
    {
     $error = "Oops! Password did not match! Try again. "; //original: echo(error"Oops! Password did not match! Try again. ");
    }
    else
    {
     $error = " "
    }

    $uquery = "SELECT * FROM users WHERE uname='$uname' ";
    $uresult = mysqli_query($conn, $uquery);
    if(mysqli_num_rows($uresult) > 0){
        $error = "Username Already Taken";
    }

      else {
        $error = " ";
        $query = "INSERT INTO users (fname, lname, uname, password, gender) values ('$fname', '$lname', '$uname', '$password', '$gender')";

        mysqli_query($conn, $query);

        header("Location: successful_registration.html");
        die;
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
	height: 600px;
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
	top: 90%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);	
}

.errorMessage
{
	position: absolute;
	top: 100%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

lable, input
{
	display: block;
}

lable
{
	margin-bottom: 50px;
}

select, option 
{
	display: block;
	margin-left: 60px;
	
}

select
{
	margin-bottom: 10px;
}

button
{
	background-color: DeepSkyBlue;
}


</style>

<div>
<h1>Register</h1>
<form action="registration.php" method="post">
  <label for="fname">First Name: </label><br>
  <input type="text" name="fname" required><br>

  <label for="lname">Last Name: </label><br>
  <input type="text" name="lname" required><br>

  <label for="uname">User Name: </label><br>
  <input type="text" name="uname" required><br>

  <label for="password">Password:</label><br>
  <input type="password" name="password" required><br>

  <label for="password">Confirm Password:</label><br>
  <input type="password" name="password_2" required><br>

  <label for="gender">Choose a Gender:</label>
  <select name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select><br>

  <button type="submit" name="submit">Submit</button>
</form>

<a href="index.php">Already Registered?</a>
<p class="errorMessage"><?php echo $error?></p>
</div>
</body>
</html>
