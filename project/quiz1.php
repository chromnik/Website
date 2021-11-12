<!DOCTYPE html>
<html>
<body>

<style>
div.contents
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

<div class=contents>
<h1>Quiz 1</h1>
<form action="quiz1.php" method="post">
  <label for="q1">Question 1:Question 1: What is the proper way to store a password?</label>
  <select name="q1">
    <option value="A sticky note">A sticky note</option>
    <option value="answer2">An encrypted program that needs a password that you know</option>
    <option value="answer3">A file named passwords on your desktop</option>
  </select><br>

  <label for="q2">Question 2: Someone asks for your password in an email so that they copy a file that you have. What do you do?</label>
  <select name="q2">
    <option value="answer1">Yes</option>
    <option value="answer2">Only if I know them</option>
    <option value="answer3">No</option>
  </select><br>

  <label for="q3">Question 3: What is it called when someone pretends to be someone that you know in order to gain access.</label>
  <select name="q3">
    <option value="answer1">social engineering</option>
    <option value="answer2">social distancing</option>
    <option value="answer3">societal engineering</option>
  </select><br>

  <label for="q4">Question 4: You receive an email from someone claiming to be your boss with a suspicious link. What do you do?</label>
  <select name="q4">
    <option value="answer1">click the link</option>
    <option value="answer2">reply to it</option>
    <option value="answer3">dont open it</option>
  </select><br>

  <label for="q5">Question 5: What is it called when an attacker tries to gain access to your data through emails?</label><br>
  <input type="text" name="q5" required><br>

  <button type="submit" name="submit">Submit</button>
</form>


<p class="errorMessageU"><?php echo (isset($uerror)&&!empty($uerror)) ? $uerror : ''; ?></p>
<p class="errorMessageP"><?php echo (isset($perror)&&!empty($perror)) ? $perror : ''; ?></p>
<a href="logout.php">Logout</a>
</div>
</body>
<?php include("tracker.php"); ?>
</html>

<?php
  session_start();
  include("dbconnection.php");
  include("functions.php");

  $ra1 = "answer2";
  $ra2 = "answer3";
  $ra3 = "answer1";
  $ra4 = "answer3";
  $ra5 = "phishing";

  $SQL = "SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";//select statement variable that stores conditions for a query

   $res = mysqli_query($conn, $SQL);//plugs select statement variable into a mysqli query specifying the conn database as the source

   while($row = mysqli_fetch_array($res)) {//while a row/rows carrying the proper conditions applied in the select statement exists $row will be equal be equal to an array of those row values

     $userID =  $row['userID'] . "<br />";//setting a variable equal to a specific row in the array by specifying it's name
   }

   $SQL2 = "SELECT * FROM gradebook WHERE userID = '$userID'";

   $res2 = mysqli_query($conn, $SQL2);

   while($row2 = mysqli_fetch_array($res2)) {

     $progress =  $row2['progress'] . "<br />";
   }

   $SQL3 = "SELECT * FROM gradebook WHERE userID = '$userID'";

   $res3 = mysqli_query($conn, $SQL3);

   while($row3 = mysqli_fetch_array($res3)) {

     $q1Done =  $row3['q1Done'] . "<br />";
   }
   echo $q1Done;

   if($q1Done == 0){
	   if (isset($_POST["submit"]))  {
		$q1Done = 1;
		$progress += 1;
		$q1Done = mysqli_real_escape_string($conn, $q1Done);
		$q1g = mysqli_real_escape_string($conn,$q1g);
		$progress = mysqli_real_escape_string($conn,$progress);
		$error = " ";

		if(strcmp($_POST["q1"], $ra1) == 0){
		$q1g++;
		  }
		  if(strcmp($_POST["q2"], $ra2) == 0){
				$q1g++;
		  }
		  if(strcmp($_POST["q3"], $ra3) == 0){
				$q1g++;
		  }
		  if(strcmp($_POST["q4"], $ra4) == 0){
				$q1g++;
		  }
		  if(strcmp($_POST["q5"], $ra5) == 0){
				$q1g++;
		  }

			$query = "UPDATE `gradebook` SET `q1Done`='$q1Done',`q1g`='$q1g',`progress`='$progress' WHERE `userID` = '$userID'";
			mysqli_query($conn, $query);

			header("Location: gradebook.php");
			die;
	  }
  }
  else{
		if (isset($_POST["submit"]))  {
			header("Location: gradebook.php");
			die;
		}
  }
?>