<?php
session_start();
  include("dbconnection.php");
  include("functions.php");

  if (isset($_POST["submit"]))  {
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $uname = mysqli_real_escape_string($conn,$_POST["uname"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password_2 = mysqli_real_escape_string($conn,$_POST["password_2"]);
    $gender = mysqli_real_escape_string($conn,$_POST["gender"]);
    $error = " ";

    $errors = array();

    if($_POST["password"] != $_POST["password_2"])
      {
        array_push($errors, "Passwords do not match");
        $perror = "ERROR: Passwords do not match";
      }


    $uquery = "SELECT * FROM users WHERE uname='$uname' ";
    $uresult = mysqli_query($conn, $uquery);
    if(mysqli_num_rows($uresult) > 0){
        array_push($errors, "Username already exists");
        $uerror = "ERROR: Username already exists";
      }

      if(count($errors) == 0)
      {
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
	background-color: CornflowerBlue;
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
	background-color: Bisque;
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
	top: 95%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

.errorMessageU
{
	position: absolute;
	top: 88%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

.errorMessageP
{
	position: absolute;
	top: 84%;
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
	background-color: Bisque;;
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


<p class="errorMessageU"><?php echo (isset($uerror)&&!empty($uerror)) ? $uerror : ''; ?></p>
<p class="errorMessageP"><?php echo (isset($perror)&&!empty($perror)) ? $perror : ''; ?></p>
<a href="index.php">Already Registered?</a>
</div>
</body>
</html>
