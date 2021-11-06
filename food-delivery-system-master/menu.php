<?php
session_start();
?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<?php
if (!isset($_SESSION['loggedIn'])) 
{
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <?php
    require "./includes/load_items.php";
    ?>
  </div>

  <script src="./js/cookies.js"></script>
  <script type="text/javascript">
    $(document).on('click', '.add_to_cart_button', function(event) {
      if (document.cookie.indexOf("number_of_items_in_cart") < 0 ) {
        setCookie("number_of_items_in_cart", "0", 1);
      }

      if (getCookie("number_of_items_in_cart") == null || getCookie("number_of_items_in_cart") == "" || getCookie("number_of_items_in_cart") == undefined) {
        setCookie("number_of_items_in_cart", "0", 1);
      }

      //TODO:if cart item > 21, stop
      setCookie("number_of_items_in_cart", parseInt(getCookie("number_of_items_in_cart")) + 1, 1)

      //set navbar_cart_number
      if (getCookie("number_of_items_in_cart") > 0) {
        var navbar_cart_number = document.getElementById('navbar_cart_number');
        navbar_cart_number.innerText = getCookie("number_of_items_in_cart");
      }

      var item_card = document.getElementById(this.id).parentElement; //get the parent of clicked button, which is the whole card/area for that item
      var added_item_id = this.id.slice(-8); //last 8 characters of this button's ID is the item_id
      var added_item_name = item_card.querySelector('h2').innerText;
      var added_item_description = item_card.querySelector('h6').innerText;
      var added_item_price = item_card.querySelector('p').innerText;
      var added_item_image_path = item_card.querySelector('img').src;

      //add selected items into cookies, which will be used later in shopping cart
      if (document.cookie.indexOf("cart_items") < 0) {
        setCookie("cart_items", '{"Items":[]}', 1);
      }

      var added_item = '{"Item_ID":"' + added_item_id + '", "Item_Name":"' + added_item_name + '", "Item_Description":"' + added_item_description + '","Item_Price":"' + added_item_price + '","Item_Image":"' + added_item_image_path + '"}';
      var cart_items_json = JSON.parse(getCookie("cart_items"));
      cart_items_json["Items"].push(added_item);
      console.log(cart_items_json);
      //Num of item: Object.keys(updated_cookie["Items"]).length
      var updated_cookie_string = JSON.stringify(cart_items_json);
      setCookie("cart_items", updated_cookie_string, 1);
    });
  </script>
</body>

</html>