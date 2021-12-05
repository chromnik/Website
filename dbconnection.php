<?php
  $serverName = "localhost";
  $dbUsername = "root"; 
  $dbPassword = "";
  $dbName = "workforce";

  $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName); //Uses MySQLi Procedural syntax to connect to the workforce database

  if (!$conn) {
    die("Connection Failed:" .mysqli_connect_error());

  }
