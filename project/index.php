<?php
session_start();
  include("dbconnection.php");

  if (isset($_POST["submit"]))
{
      $uname = mysqli_real_escape_string($conn,$_POST["uname"]);
      $password = mysqli_real_escape_string($conn,$_POST["password"]);
      $error = " ";


      if(!empty($uname) && !empty($password))
      {
        $query = "SELECT * FROM users WHERE uname = '$uname' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

          if(mysqli_num_rows($result))
          {
            $_SESSION['uname'] = $uname;
			$_SESSION['password'] = $password;
            header("Location: profile.php");
	    $error = " ";
          }
          else {
            $error =  "ERROR: Invalid User Name or Password Input";
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
	background-color: CornflowerBlue;
	width: 500px;
	height: 350px;
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
	top: 40%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}


a
{
	position: absolute;
	top: 85%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

.otherA
{
  position: absolute;
	top: 95%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

.errorMessage
{
	position: absolute;
	top: 66%;
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

button
{
	background-color: Bisque;
}

img {
  display:block;
  margin-left:auto;
  margin-right:auto;
  width: 200px;
  height: 200px;
}

</style>
<h1 style="text-align:center;">Workforce Security Training</h1>
<img src="cyber.jpg">
<div>
<h2>Log In</h2>
<form action="index.php" method="post">

  <label for="uname">User Name: </label><br>
  <input type="text" name="uname" required><br>

  <label for="password">Password:</label><br>
  <input type="password" name="password" required><br>


  <button type="submit" name="submit">Submit</button>
</form>

<a href="registration.php">Register For An Account</a>
<a class='otherA' href="admin.php">Login as Administrator</a>
<p class="errorMessage"><?php echo (isset($error)&&!empty($error)) ? $error : ''; ?></p>
</div>

</body>
<?php include("tracker.php"); ?>
</html>
