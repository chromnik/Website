<?php
session_start();

if(isset($_SESSION["uname"]))
{
  session_destroy();
  unset($_SESSION["uname"]);
}
header("Location: index.php");

 ?>
