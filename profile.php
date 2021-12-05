<?php
session_start();
    include('dbconnection.php');

   $SQL2 = "SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";//select statement variable that stores conditions for a query

   $res2 = mysqli_query($conn, $SQL2);//plugs select statement variable into a mysqli query specifying the conn database as the source

   while($row2 = mysqli_fetch_array($res2)) {//while a row/rows carrying the proper conditions applied in the select statement exists $row will be equal be equal to an array of those row values

     $userID =  $row2['userID'] . "<br />";//setting a variable equal to a specific row in the array by specifying it's name
   }

   $query2 = "INSERT INTO gradebook (userID) values ('$userID')";

   mysqli_query($conn, $query2);

	$gender;
	$date;
	$progress;
	$avgGrade;

    $SQL = "SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";

    $res = mysqli_query($conn, $SQL);

    while($row = mysqli_fetch_array($res)) {

      $gender =  $row['gender'] . "<br />";
      $date = $row['date'] . "<br />";
    }

	$SQL2 = "SELECT * FROM gradebook WHERE userID = '$userID'";

   $res2 = mysqli_query($conn, $SQL2);

   while($row2 = mysqli_fetch_array($res2)) {

     $progress =  $row2['progress'] . "<br />";
	 $avgGrade = $row2['avgGrade'] . "<br />";
   }



?>
<!DOCTYPE html>
<html>
<html>
<head>
<style>

body
{
	background-color: Bisque;
}

.grid-container{
	display: grid;
	grid-template-columns: auto auto auto;
}

div.grid-container.one{
	width: 500px;
	height: 300px;
	position: absolute;
	top: 75%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

div.grid-container.two{
	width: 500px;
	height: 300px;
	position: absolute;
	top: 92.5%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

div.grid-item{
	padding: 14px 50px;
	text-align: center;
}

div.contents{
	background-color: CornflowerBlue;
	width: 1000px;
	height: 600px;
	position: absolute;
	text-align: center;
	top: 50%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}

section{
	width: 500px;
	height: 300px;
	position: absolute;
	top: 87.25%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

ul {
	width: 750px;
	height: 50px;
    position: absolute;
	text-align: center;
	top: 25%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: left;
  position: relative;
  text-align: center;
  top: 20%;
  margin-left: 12%;
}

li a {
  display: block;
  color: blue;
  text-align: center;
  padding: 14px 25px;
  font-size: 20px;
  text-decoration: none;
}
li a:hover:not(.active) {
  background-color: grey;
}
div.a {
  background-color: Bisque;
	width: 100px;
	height: 25px;
	position: absolute;
	text-align: center;
	top: 95%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
}
</style>
</head>
<body>
<div class=contents>
<ul>
 <li><a href="study.php">Study</a></li>
    <li><a href="quizselection.php">Quizzes</a></li>
    <li><a href="gradebook.php">GradeBook</a></li>
</ul>
<h1>Welcome!

  <?php if(isset($_SESSION["uname"]))
  {
    echo $_SESSION['uname'];
  }
  else
  {
    echo "Please log in first";
  }
  ?>

</h1>

<div class="grid-container one">
	<div class=grid-item>Grade: 
	<?php
	  echo $avgGrade;
	?>
	</div>
	<div class=grid-item> </div>
	<div class=grid-item>Progress: 
	<?php
	  echo $progress;
	?>
	</div>
</div>

<section><div><h2>User Registration Info</h2></div><section>
<div class="grid-container two">
	<div class=grid-item>Gender:
	<?php
	  echo $gender;
	?>
	</div>
	<div class=grid-item> </div>
	<div class=grid-item>Registration Date: 
	<?php
	  echo $date;
	?>
	</div>
</div>
<div class="a">
<a href="logout.php">Logout</a>
</div>

</div>
</body>
<?php include("tracker.php"); ?>
</html>
