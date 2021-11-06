<?php
session_start();
?>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>orders</title>
  <meta name="viewport" content="width device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e3787d7554.js" crossorigin="anonymous"></script>

</head>

<body>
  <!--Navbar -->
  <?php
  require "./includes/load_navbar.php";
  ?>

  <div class="container">

    <h2 class="mt-4">My Orders</h2>

    <table class="table table-hover table table-responsive-md table-bordered ">
      <thead>
        <tr>
          <th scope="col">Status</th>
          <th scope="col">Order ID</th>
          <th scope="col">Ordered Item(s)</th>
          <th scope="col">Total Amount</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
        </tr>
      </thead>
      <tbody id="load_user_orders">
        <?php
        require "./includes/load_user_orders.php";
        ?>
      </tbody>
    </table>

  </div><!-- content container -->

</body>

</html>