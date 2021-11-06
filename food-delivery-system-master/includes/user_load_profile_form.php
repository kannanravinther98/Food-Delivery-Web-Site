<?php
session_start();
?>

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