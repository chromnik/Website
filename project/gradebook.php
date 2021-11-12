<!DOCTYPE html>
<html>
<body>
<style>

table
{
	background-color: CornflowerBlue;
	width: 800px;
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
<ul>
 <li><a href="profile.php">Profile</a></li>
    <li><a href="quizselection.php">Quizes</a></li>
    <li><a href="study.php">Study</a></li>
</ul>
<?php
  include("dbconnection.php");
  $SQL2 = "SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";//select statement variable that stores conditions for a query
   $res2 = mysqli_query($conn, $SQL2);//plugs select statement variable into a mysqli query specifying the conn database as the source

while($row2 = mysqli_fetch_array($res2)) {//while a row/rows carrying the proper conditions applied in the select statement exists $row will be equal to an array of those row values
     $userID =  $row2['userID'] . "<br />";//setting a variable equal to a specific row in the array by specifying it's name
   }
   $query2 = "INSERT INTO gradebook (userID) values ('$userID')";
   mysqli_query($conn, $query2);
//if ('progress' >= 1) {$Avg = ($q1g + $q2g + $q3g) / $progress;} 
//else{$Avg = 0};
  echo "<table>
 <tr>
  <th>Quiz 1</th>
  <th>Quiz 2</th>
  <th>Quiz 3</th>
  <th>Progress</th>
  <th>Average</th>
 </tr>";
/* while($row2 = mysql_fetch_array($query2))
{echo "<tr>";
 echo "<td>" . $row2["q1g"] . "</td>";
 echo "<td>" . $row2["q2g"] . "</td>";
 echo "<td>" . $row2["q3g"] . "</td>";
 echo "<td>" . $row2["progress"] . "</td>";
 //echo "<td>" . '$Avg' "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

echo "<table>
 <tr>
  <th>Quiz 1</th>
  <th>Quiz 2</th>
  <th>Quiz 3</th>
  <th>Progress</th>
  <th>Average</th>
 </tr>";
 while($row2 = mysql_fetch_array($query2))
{echo "<tr>";
 echo{$row2['q1g']";
 echo{$row2['q2g']";
 echo{$row2['q3g']";
 echo{$row2['progress']";
 //echo <td>$Avg</td>;
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
*/
?>

</body>
</html>