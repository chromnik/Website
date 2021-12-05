<?php
session_start();
  include("dbconnection.php");
  $query = "SELECT gender, count(*) as number FROM users GROUP BY gender";
  $result = mysqli_query($conn, $query);

  $query2 = "SELECT page, count(*) as number FROM tracker GROUP BY page";
  $result2 = mysqli_query($conn, $query2);
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

    <body>
      <h3>Logged in as:

        <?php if(isset($_SESSION["uname"]))
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
      <div id="Gpiechart" style="width: 900px; height: 500px;"></div>
      <div id="Ppiechart" style="width: 900px; height: 500px;"></div>
      </div>
    </body>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawGChart);
      google.charts.setOnLoadCallback(drawPChart);

      function drawGChart() {

        var data = google.visualization.arrayToDataTable([
          ['gender', 'number'],

          <?php
          while($row = mysqli_fetch_array($result))
          {
            echo "['".$row["gender"]."', ".$row["number"]."],";
          }
          ?>

        ]);

        var options = {
          title: 'Gender Distribution'

        };

        var chart = new google.visualization.PieChart(document.getElementById('Gpiechart'));

        chart.draw(data, options);
      }










      function drawPChart() {

        var data = google.visualization.arrayToDataTable([
          ['Page', 'Number of Views'],
          <?php
          while($row = mysqli_fetch_array($result2)){
            echo "['".$row["page"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Page Views'
        };

        var chart = new google.visualization.BarChart(document.getElementById('Ppiechart'));

        chart.draw(data, options);
      }
    </script>


  </head>
</html>
