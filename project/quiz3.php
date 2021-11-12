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
<h1>Quiz 3</h1>
<form action="quiz3.php" method="post">
  <label for="q1">Question 1: What is not a symptom of a DDoS attack?</label>
  <select name="q1">
    <option value="answer1">crashes</option>
    <option value="answer2">slow down</option>
    <option value="answer3">files are deleted</option>
  </select><br>

  <label for="q2">Question 2: Which one does not usually involve email?</label>
  <select name="q2">
    <option value="answer1">MitM</option>
    <option value="answer2">phishing</option>
    <option value="answer3">DDoS</option>
  </select><br>

  <label for="q3">Question 3: Which wifi is most likely not a MitM?</label>
  <select name="q3">
    <option value="answer1">1840832</option>
    <option value="answer2">WorkWif1</option>
    <option value="answer3">WorkWifi</option>
  </select><br>

  <label for="q4">Question 4: What is a MitM attack?</label>
  <select name="q4">
    <option value="answer1">data is syphoned by the attacker during transit</option>
    <option value="answer2">the system is locked intill the attacker recieves a payment</option>
    <option value="answer3">the system is spammed with data till it crashes</option>
  </select><br>

  <label for="q5">Question 5: What does DDoS stand for?</label><br>
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

  $ra1 = "answer3";
  $ra2 = "answer1";
  $ra3 = "answer3";
  $ra4 = "answer1";
  $ra5 = "distributed denial-of-service";

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

     $q3Done =  $row3['q3Done'] . "<br />";
   }
   echo $q3Done;

   if($q3Done == 0){
	   if (isset($_POST["submit"]))  {
		$q3Done = 1;
		$progress += 1;
		$q3Done = mysqli_real_escape_string($conn, $q3Done);
		$q3g = mysqli_real_escape_string($conn,$q3g);
		$progress = mysqli_real_escape_string($conn,$progress);
		$error = " ";

		if(strcmp($_POST["q1"], $ra1) == 0){
		$q3g++;
		  }
		  if(strcmp($_POST["q2"], $ra2) == 0){
				$q3g++;
		  }
		  if(strcmp($_POST["q3"], $ra3) == 0){
				$q3g++;
		  }
		  if(strcmp($_POST["q4"], $ra4) == 0){
				$q3g++;
		  }
		  if(strcmp($_POST["q5"], $ra5) == 0){
				$q3g++;
		  }

			$query = "UPDATE `gradebook` SET `q3Done`='$q3Done',`q3g`='$q3g',`progress`='$progress' WHERE `userID` = '$userID'";
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