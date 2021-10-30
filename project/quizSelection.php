<?php
session_start();
    include('dbconnection.php');

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

div.grid-container{
	width: 500px;
	height: 300px;
	position: absolute;
	top: 75%;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%, -75%);
}

div.grid-item{
	padding: 20px 50px;
	text-align: center;
	font-size: 20px;
	background-color: white;
	outline: 5px solid black;
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
<h1>Quizzes

</h1>
<div class="a">
<a href="logout.php">Logout</a>
</div>

<div class="grid-container">
	<div class=grid-item><a href="quiz1.php">Quiz 1</a></div>
	<div class=grid-item><a href="quiz2.php">Quiz 2</a></div>
	<div class=grid-item><a href="quiz3.php">Quiz 3</a></div>
</div>

</div>
</body>
<?php include("tracker.php"); ?>
</html>
