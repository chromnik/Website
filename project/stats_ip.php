<?php
  include("dbconnection.php");
  include("functions.php");

  $curr_ip = $_GET["IP"];

  echo "Pages viewd by $curr_ip:<br>";
  $query = "SELECT * FROM tracker WHERE ip = '$curr_ip' ORDER BY date";
  $result = mysqli_query($conn, $query);

  for ($i = 0; $i < mysqli_num_rows($result); $i++)
    {
      $page = mysqli_result($result, $i, "page");
      $date = mysqli_result($result, $i, "date");

      echo "Page: $page    date: $date<br>";
    }
?>
