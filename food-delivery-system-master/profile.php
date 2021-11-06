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
  <title>profile</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
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
    <h1 class="mt-4">Account Setting</h1>
    <form>
      <legend>Account</legend>
      <div class="form-group">
        <label class="form-control-label">Username</label>
        <input class="form-control" type="text" id="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" disabled>
      </div>
      <div class="form-group">
        <label class="form-control-label">Email</label>
        <input class="form-control" type="email" id="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" disabled>
      </div>
      <div class="form-group">
        <label class="form-control-label">Change Password</label>
        <input class="form-control" type="password" id="password" value="" placeholder="Enter new password">
      </div>


      <br>

      <legend>Profile</legend>
      <div class="form-group">
        <label class="form-control-label">First Name</label>
        <input class="form-control" type="text" id="firstname" placeholder="First Name" value="<?php echo $_SESSION['firstname']; ?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Last Name</label>
        <input class="form-control" type="text" id="lastname" placeholder="Last Name" value="<?php echo $_SESSION['lastname']; ?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Phone Number</label>
        <input class="form-control" type="tel" id="phonenumber" placeholder="Phone Number" value="<?php echo $_SESSION['contactno']; ?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Addresses</label>
        <input class="form-control" type="text" id="address" placeholder="Your Address" value="<?php echo $_SESSION['address']; ?>">
      </div>

      <button class="btn btn-success" type="submit" id="update_account_submit" style="margin-bottom:30px;">Update</button>
    </form>

  </div><!-- content container -->
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $("#update_account_submit").on('click', function(event) {
      event.preventDefault();
      var user_id = "<?php echo $_SESSION['user_id']; ?>";
      var password = document.getElementById('password').value;
      var firstname = document.getElementById('firstname').value;
      var lastname = document.getElementById('lastname').value;
      var phonenumber = document.getElementById('phonenumber').value;
      var address = document.getElementById('address').value;

      var form_data = new FormData();
      form_data.append("user_id", user_id);
      if (password != "") {
        form_data.append("password", password);
      }
      form_data.append("firstname", firstname);
      form_data.append("lastname", lastname);
      form_data.append("phonenumber", phonenumber);
      form_data.append("address", address);

      $.ajax({
        url: './includes/user_edit_account.php',
        method: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          alert(response);
          window.location = "./profile.php";
        }
      });
    })
  });
</script>