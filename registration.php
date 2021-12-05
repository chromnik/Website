<?php
session_start();
  include("dbconnection.php"); //includes a script which connects to the MySQL database

  if (isset($_POST["submit"]))  {                                   //If a user presses the submit button, the following code executes
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $uname = mysqli_real_escape_string($conn,$_POST["uname"]);  //whatever content the user writes into the html input form labeled "uname" is stored into the corresponding php variable
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password_2 = mysqli_real_escape_string($conn,$_POST["password_2"]);
    $gender = mysqli_real_escape_string($conn,$_POST["gender"]); //"mysqli_real_escape_string function prevents some SQL injection by only allowing legal SQL strings"
    $error = " ";

    $errors = array(); //initializes errors array


    if(substr($fname, 0, 1) !== strtoupper(substr($fname, 0, 1))) {   //Error Handling: Ensures the user enters a capitalized first name by strictly comparing the first character to the capitalized version
      array_push($errors, "First name caps"); //if true, pushes array
        $ferror = "ERROR: First name must begin with capitalized character";
    }

    if(substr($lname, 0, 1) !== strtoupper(substr($lname, 0, 1))) { //Error Handling: Ensures that user enters a capitalized last name
        array_push($errors, "Last name caps");
          $lerror = "ERROR: Last name must begin with capitalized character";
    }

    if($_POST["password"] != $_POST["password_2"]) {  //Error Handling: Ensures passwords match by comparing the two strings
        array_push($errors, "Passwords do not match");
        $perror = "ERROR: Passwords do not match";
      }


    $uquery = "SELECT * FROM users WHERE uname='$uname' ";  //Error handling: Ensures duplicate username is not allowed
    $uresult = mysqli_query($conn, $uquery);
    if(mysqli_num_rows($uresult) > 0){    //if the previous query finds a row in the users table already containing the same username, pushes error
        array_push($errors, "Username already exists");
        $uerror = "ERROR: Username already exists";
      }

      if(count($errors) == 0)   //Registration process only continues if there are no errors
      {
        $query = "INSERT INTO users (fname, lname, uname, password, gender) values ('$fname', '$lname', '$uname', '$password', '$gender')";
        //^^this SQL statement inserts the contents from the input forms into the corresponding columns in the users table

        mysqli_query($conn, $query);

        header("Location: successful_registration.php");
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
	width: 600px;
	height: 650px;
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
	top: 99%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

.errorMessageU
{
	position: absolute;
	top: 84%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

.errorMessageP
{
	position: absolute;
	top: 80%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

.errorMessageF
{
	position: absolute;
	top: 88%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

.errorMessageL
{
	position: absolute;
	top: 92%;
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
<p>First and last name must begin with capital letters</p>
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
<p class="errorMessageF"><?php echo (isset($ferror)&&!empty($ferror)) ? $ferror : ''; ?></p>
<p class="errorMessageL"><?php echo (isset($lerror)&&!empty($lerror)) ? $lerror : ''; ?></p>
<a href="index.php">Already Registered?</a>
</div>
</body>
<?php include("tracker.php"); ?>
</html>
