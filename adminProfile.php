<?php
session_start();
    include('dbconnection.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: left;
}

li a {
  display: block;
  color: blue;
  text-align: center;
  padding: 14px 50px;
  font-size: 40px;
  text-decoration: none;
}
li a:hover:not(.active) {
  background-color: grey;
}
div.a {
  position:relative; left:80px; bottom:2px;
}
</style>
</head>
<body>
<h3>Logged in as:

  <?php if(isset($_SESSION["uname"]))
  {
    echo $_SESSION['uname'];
  }
  else
  {
    echo "Please log in first";
  }
  ?>

</h3>
<ul>
    <li><a href="stats.php">Statistics</a></li>
    <li><a href="IP_Tracker.php">IP Tracker</a></li>
    <li><a href="adminGradebook.php">GradeBook</a></li>
</ul>
<div class="a">
<a href="logout.php">Logout<br></a>
</div>
</body>
<?php include("tracker.php"); ?>
</html>
