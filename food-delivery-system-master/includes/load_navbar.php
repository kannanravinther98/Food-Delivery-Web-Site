<?php
session_start();
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">

      <!--Logo Here -->
      <div class="navbar-header">
        <a href="Homepage.php" class="navbar-brand">THE DISASTER CAFE</a>
      </div>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">
              <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-danger" id="navbar_cart_number"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<script src="./js/cookies.js"></script>
<script type="text/javascript">
    var navbar_cart_number = document.getElementById('navbar_cart_number');
    navbar_cart_number.innerText = getCookie("number_of_items_in_cart");
</script>