<?php
  include("dbconnection.php");

$curr_page = $_SERVER["PHP_SELF"];
$ip = $_SERVER["REMOTE_ADDR"];

$query = "INSERT INTO tracker (page, ip) VALUES ('$curr_page', '$ip')";
mysqli_query($conn, $query);

$query = "SELECT count(*) FROM tracker WHERE page = '$curr_page'";
$result = mysqli_query($conn, $query);
$views = mysqli_fetch_array($result, MYSQLI_ASSOC);


?>
