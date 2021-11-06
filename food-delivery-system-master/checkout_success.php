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
  <title>Checkout</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e3787d7554.js" crossorigin="anonymous"></script>
  <style>
    .form_item_image {
      width: 100px;
      height: 100px;
      margin-right: 20px;
    }

    .delete_cart_item_button {
      padding: 0px;
      background: none;
      border: none;
      color: red;
    }
  </style>

</head>

<body>
  <!--Navbar -->
  <?php
  require "./includes/load_navbar.php";
  ?>
  <div class="container">
    <h1>Success</h1>
  </div>