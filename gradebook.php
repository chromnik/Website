<?php
  session_start();
  include("dbconnection.php");
  $SQL2 = "SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";//select statement variable that stores conditions for a query
   $res2 = mysqli_query($conn, $SQL2);//plugs select statement variable into a mysqli query specifying the conn database as the source

while($row2 = mysqli_fetch_array($res2)) {//while a row/rows carrying the proper conditions applied in the select statement exists $row will be equal to an array of those row values
     $userID =  $row2['userID'] . "<br />";//setting a variable equal to a specific row in the array by specifying it's name
   }

   $SQL2 = "SELECT * FROM gradebook WHERE userID = '$userID'";

   $res2 = mysqli_query($conn, $SQL2);

   while($row2 = mysqli_fetch_array($res2)) {

     $q1g =  $row2['q1g'] . "<br />";
	 $q2g = $row2['q4g'] . "<br />";
	 $q3g = $row2['q3g'] . "<br />";
	 $progress = $row2['progress'] . "<br />";
   }

   $avgGrade = (($q1g + $q2g + $q3g)/3/5)*100;
   $query = "UPDATE `gradebook` SET `avgGrade`='$avgGrade' WHERE `userID` = '$userID'";
   mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<style>

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

table
{
	width: 600px;
	height: 100px;
	position: absolute;
	text-align: center;
	top: 60%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -50%);
	border: 1px solid black;
}

th
{
	font-size: 2em;
	padding: 7px 20px;
	border: 1px solid black;
}

td
{
	font-size: 1.5em;
	border: 1px solid black;
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
<body>
<div class=contents>
<ul>
 <li><a href="profile.php">Profile</a></li>
    <li><a href="quizselection.php">Quizes</a></li>
    <li><a href="study.php">Study</a></li>
</ul>
<table>
 <tr>
  <th>Quiz 1</th>
  <th>Quiz 2</th>
  <th>Quiz 3</th>
  <th>Progress</th>
  <th>Average</th>
 </tr>

<tr>
 <td><?php echo $q1g; ?></td>
 <td><?php echo $q2g; ?></td>
 <td><?php echo $q3g; ?></td>
 <td><?php echo $progress; ?></td>
 <td><?php echo $avgGrade; ?></td>
</tr>
</table>
</div>
</body>
</html>