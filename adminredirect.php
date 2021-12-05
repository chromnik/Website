<?php if(isset($_SESSION["uname"]))
{
  echo $_SESSION['uname'];
}
else
{
  echo "Please log in first<br>";
}
?>

<a href="admin.php">Go Back to Administrator Login page</a>
