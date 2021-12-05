<?php
  session_start();
  include("dbconnection.php");

  if(isset($_SESSION["uname"])) {
    echo $_SESSION['uname'];
  }
  else {
    header("Location: adminredirect.php");
  }

  $q1g = 0.0;
  $q2g = 0.0;
  $q3g = 0.0;
  $progress = 0.0;
  $avgGrade = 0.0;
  $SQL2 = "SELECT * FROM users WHERE uname IS NOT NULL";//select statement variable that stores conditions for a query
   $res2 = mysqli_query($conn, $SQL2);//plugs select statement variable into a mysqli query specifying the conn database as the source

while($row2 = mysqli_fetch_array($res2)) {//while a row/rows carrying the proper conditions applied in the select statement exists $row will be equal to an array of those row values
     $userID[] =  $row2['userID'] . "<br />";//setting a variable equal to a specific row in the array by specifying it's name
	 $fname[] = $row2['fname'] . "<br />";
	 $lname[] = $row2['lname'] . "<br />";
   }

   for($j = 0; $j < count($userID); $j++){
		$compiled[$j] = $fname[$j] . $lname[$j];
   }

   for($n = 0; $n < count($compiled); $n++){
		  $nameNum[$compiled[$n]] = $userID[$n];//I used the compiled name array to set the string values for the associate array and the userID array to set the numeric values
   }

   selectionSort($compiled, count($compiled));


   if (isset($_POST["submit"]))  {
		$specStudent = $_POST["student"];
		$SQL2 = "SELECT * FROM gradebook WHERE userID = '$specStudent'";

	    $res2 = mysqli_query($conn, $SQL2);

	    while($row2 = mysqli_fetch_array($res2)) {

		  $q1g =  $row2['q1g'] . "<br />";
		  $q2g = $row2['q4g'] . "<br />";
		  $q3g = $row2['q3g'] . "<br />";
		  $progress = $row2['progress'] . "<br />";
	    }

	    $avgGrade = (($q1g + $q2g + $q3g)/3/5)*100;
   }

   function selectionSort(&$array, $count){
		for($k = 0; $k < $count - 1; $k++)//this for loop moves the internal for loop that compares each string across the list of values for each individual value in the list
		{//it's count-1 because your comparing each value with the values in front of it
			$mindex = $k; //this stores the current index in the final list used for comparison in the internal for loop
			$mins = $array[$k]; // this stores the string value associated with the above stored index value

			for($l = $k + 1; $l < $count; $l++) //it's k+1 because you want values other than the current index in the list
			{
				if (strcmp($array[$l], $mins) < 0)//for each index in the array the stored string value (mins) is compared to the current indexed string.
				{
					$mins = $array[$l]; //mins is set to the currently smallest valued string in the array
					$mindex = $l; //mindex stores the index where that smallest string was
				}
			}
			if ($mindex != $k)// basically if you actually found a different index value
			{
				$temp = $array[$mindex];//using mindex we can temporarily store the smallest string value
				$array[$mindex] = $array[$k]; //this places the current string value in where the smallest string value was
				$array[$k] = $temp; //this places the smallest string value where the prior current string value was
			}
		}
   }
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

form{
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
	top: 70%;
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
 <li><a href="stats.php">Statistics</a></li>
    <li><a href="IP_Tracker.php">IP Tracker</a></li>
    <li><a href="adminGradebook.php">Gradebook</a></li>
</ul>

<form action="adminGradebook.php" method="post">
  <label for="student">Whose Grade would you like to see?</label>
  <select name="student">
	<?php
	for($i = 0; $i < count($userID); $i++){
		echo "<option>" . $nameNum[$compiled[$i]] . " " . $compiled[$i] . " " . "</option>";//I needed the first value in the echo statement to be the userID so I used an associative array to get it
	}
	?>
  </select><br>

  <button type="submit" name="submit">Submit</button>
</form>
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
