<?php
  include("dbconnection.php");
  include("functions.php");

  $curr_ip = $_GET["IP"]; //Gets the current IP we are looking at

  echo "Pages viewed by $curr_ip:<br>";
  $query = "SELECT * FROM tracker WHERE ip = '$curr_ip' ORDER BY date"; //Selects rows which equal to the current IP we are looking at, orders by the most recent date entry
  $result = mysqli_query($conn, $query);

  for ($i = 0; $i < mysqli_num_rows($result); $i++){            //Loops through all results
      $page = mysqli_result($result, $i, "page");
      $date = mysqli_result($result, $i, "date");

      echo "Page: $page    date: $date<br>";
    }
?>
