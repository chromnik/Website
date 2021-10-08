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

    if (pwdMatch($password, $password_2) == true)
    {
     echo("Oops! Password did not match! Try again. ");
    }

    $uquery = "SELECT * FROM users WHERE uname='$uname' ";
    $uresult = mysqli_query($conn, $uquery);
    if(mysqli_num_rows($uresult) > 0){
        echo "Username Already Taken";
    }

      else {
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

<p>If you have already registered an account yet, please click <a href="index.php">here</a> to be redirected to the login page<p>

</body>
</html>
