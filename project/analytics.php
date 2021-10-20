
<?php
  include("dbconnection.php");
  include("functions.php");
  include("tracker.php");

$query = "SELECT * FROM tracker GROUP BY ip";
$result = mysqli_query($conn, $query);
$views = mysqli_num_rows($result);


echo "<br>" .$views. " Unique Users <br><br>";
echo "IP Views<br>";

$query = "SELECT *, count(*) FROM tracker GROUP BY ip";
$result = mysqli_query($conn, $query);

for ($i = 0; $i < mysqli_num_rows($result); $i++)
  {
      $ip = mysqli_result($result, $i, "ip");
      $views = mysqli_result($result, $i, "count(*)");

      echo '<a href="stats_ip.php?IP='.$ip.'">'.$ip.'</a> ' ;
      echo "views: $views<br>";
  }



echo "<br>Page Views:<br>";
$query = "SELECT *, count(*) FROM tracker GROUP BY page";
$result = mysqli_query($conn, $query);

for ($i = 0; $i < mysqli_num_rows($result); $i++)
  {
      $page = mysqli_result($result, $i, "page");
      $views = mysqli_result($result, $i, "count(*)");

      echo  "$page ";
      echo "Total Views: $views<br>";
  }




?>
