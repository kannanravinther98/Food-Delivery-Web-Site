<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>
  <link href="css\bootstrap.min.css" rel="stylesheet">
  <link href="css\adminpage.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fanwood+Text&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <?php
  require "./includes/admin_navbar.php";
  ?>
  <!-- /#navbar-wrapper -->


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php
    require "./includes/admin_sidebar.php";
    ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">


      <div class="intro" style="background: url('./images/website-images/adminpage bg.jpg');">
        <div class="jumbotron jumbotron-fluid">
          <div class="img"> </div>
          <div class="words">
            <h1>Welcome to The Disaster Café's <br> <b>Admin Management Page! </b></h1>
            <div class="center-list">
              <ul>
                <li>To edit the menu: Click on <i>Menu</i> on the Dashboard</li>
                <li>To view the report/progress of the restaurant: Click on <i>Report</i> on the Dashboard</li>
                <li>To track the location of orders: Click on <i>Tracking</i> on the Dashboard</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>