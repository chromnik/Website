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
<h1>Quiz 2</h1>
<form action="quiz2.php" method="post">
  <label for="q1">Question 1: What is not a type of malware?</label>
  <select name="q1">
    <option value="answer1">virus</option>
    <option value="answer2">phishing</option>
    <option value="answer3">trojan</option>
  </select><br>

  <label for="q2">Question 2: What is the main goal of ransomware?</label>
  <select name="q2">
    <option value="answer1">make money</option>
    <option value="answer2">steal data</option>
    <option value="answer3">delete data</option>
  </select><br>

  <label for="q3">Question 3: If you find a usb what should you do?</label>
  <select name="q3">
    <option value="answer1">plug it into my computer</option>
    <option value="answer2">nothing</option>
    <option value="answer3">plug it into someone elses computer</option>
  </select><br>

  <label for="q4">Question 4: What is one way to avoid getting malware?</label>
  <select name="q4">
    <option value="answer1">clicking every link I see link</option>
    <option value="answer2">downloading ram</option>
    <option value="answer3">staying off suspicious websites</option>
  </select><br>

  <label for="q5">Question 5: What is the a worm?</label><br>
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
  $ra2 = "answer1";
  $ra3 = "answer2";
  $ra4 = "answer3";
  $ra5 = "malware";

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

     $q2Done =  $row3['q2Done'] . "<br />";
   }
   echo $q2Done;

   if($q2Done == 0){
	   if (isset($_POST["submit"]))  {
		$q2Done = 1;
		$progress += 1;
		$q2Done = mysqli_real_escape_string($conn, $q2Done);
		$q2g = mysqli_real_escape_string($conn,$q2g);
		$progress = mysqli_real_escape_string($conn,$progress);
		$error = " ";

		if(strcmp($_POST["q1"], $ra1) == 0){
		$q2g++;
		  }
		  if(strcmp($_POST["q2"], $ra2) == 0){
				$q2g++;
		  }
		  if(strcmp($_POST["q3"], $ra3) == 0){
				$q2g++;
		  }
		  if(strcmp($_POST["q4"], $ra4) == 0){
				$q2g++;
		  }
		  if(strcmp($_POST["q5"], $ra5) == 0){
				$q2g++;
		  }

			$query = "UPDATE `gradebook` SET `q2Done`='$q2Done',`q2g`='$q2g',`progress`='$progress' WHERE `userID` = '$userID'";
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
