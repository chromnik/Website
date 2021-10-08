<?php
session_start();
    include('dbconnection.php');

?>
<!DOCTYPE html>
<html>
<body>
<h3>Welcome!

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
<a href="logout.php">Logout</a>
</body>
</html>
