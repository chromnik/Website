<?php
  include("dbconnection.php");

$curr_page = $_SERVER["PHP_SELF"]; //When script executes, it records the name of the current web page
$ip = $_SERVER["REMOTE_ADDR"]; //When script executes, it records the current IP address of the user

$query = "INSERT INTO tracker (page, ip) VALUES ('$curr_page', '$ip')"; //Stores the previous 2 variables in the tracker table
mysqli_query($conn, $query);

$query = "SELECT count(*) FROM tracker WHERE page = '$curr_page'"; //Counts the number of entries of the current page in the tracker table
$result = mysqli_query($conn, $query);
$views = mysqli_fetch_array($result, MYSQLI_ASSOC); //fetches one row of data from the result and returns it as associative array


?>
