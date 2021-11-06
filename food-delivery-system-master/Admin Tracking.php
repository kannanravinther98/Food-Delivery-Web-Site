<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>
  <link href="css\bootstrap.min.css" rel="stylesheet">
  <link href="css\adminpage.css" rel="stylesheet">
  <link href="css\admintracking.css" rel="stylesheet">
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
      <h5>Please enter the Order ID to track the location of the order.</h5>
      <form>
        <div class="form-group">
          <label>Order ID:</label>
          <input type="text" class="form-control" id="orderid">
        </div>
      </form>
      <br>
      <h5>Here's the location of the order: </h5>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</body>

</html>