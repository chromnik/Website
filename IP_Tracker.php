<?php
session_start();
?>

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

  <?php if(isset($_SESSION["uname"])) //shows if the current user (admin) is logged in
  {
    echo $_SESSION['uname'];
  }
  else
  {
    header("Location: adminredirect.php");
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




<?php
  include("dbconnection.php");
  include("functions.php");  //Includes a custom made mysqli version of the outdated mysql_result function
  include("tracker.php");



$query = "SELECT *, count(*) FROM tracker";     //Combines the count of all web pages to get a website-wide total of views
$result = mysqli_query($conn, $query);
$views = mysqli_result($result, 1, "count(*)"); //Retrieves the contents of the previous query
echo "<br>Website Total Views: $views<br>";


echo "<br>Total Views Per Page:<br>";
$query = "SELECT *, count(*) FROM tracker GROUP BY page"; //Selects the total number of views a specific web page has received
$result = mysqli_query($conn, $query);
for ($i = 0; $i < mysqli_num_rows($result); $i++) {       //Loops through all of the rows that $result returns
      $page = mysqli_result($result, $i, "page");         //Displays each row from the "page" column in the $query
      $views = mysqli_result($result, $i, "count(*)");    //count(*) is the number of times the particular page has appeared in the tracker table, since the table is updated each time a user visits a web page, it shows the total number of views that page has recieved
      echo  "$page ";
      echo "Total Views: $views<br>";
    }


$query = "SELECT * FROM tracker GROUP BY ip"; //Shows the number of unique users by counting the number of unique IPs stored in the tracker table
$result = mysqli_query($conn, $query);
$views = mysqli_num_rows($result);
echo "<br>" .$views. " Unique Users <br><br>";



echo "IP Views:<br>";
$query = "SELECT *, count(*) FROM tracker GROUP BY ip"; //Counts the total number of times a specific IP address has appeared in the tracker table
$result = mysqli_query($conn, $query);
for ($i = 0; $i < mysqli_num_rows($result); $i++){  //similar to the previous for loop, loops through all the rows in the query
      $ip = mysqli_result($result, $i, "ip");
      $views = mysqli_result($result, $i, "count(*)");
      echo '<a href="userIP_stats.php?IP='.$ip.'">'.$ip.'</a> ' ; //Displays a hyperlink for each IP address which redirects to a different page which shows what pages that specific user has viewed and when
      echo "views: $views<br>";
  }


?>
