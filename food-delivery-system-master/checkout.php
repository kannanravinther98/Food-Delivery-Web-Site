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
    <form>
      <div class="py-4 text-center">
        <h2>Checkout</h2>
      </div>

      <div class="row">
        <div class="col-lg-8 order-lg-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your Cart</span>
            <span class="badge badge-secondary badge-pill" id="checkout_form_item_number"></span>
          </h4>
          <ul class="list-group mb-3">
            <div id="cart_item_list_html">

            </div>
          </ul>
        </div>

        <div class="col-lg-4 order-lg-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your Info</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h5 class="my-0">Name</h5>
                <p class="text-muted"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h5 class="my-0">Address</h5>
                <p class="text-muted"><?php echo $_SESSION['address']; ?></p>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h5 class="my-0">Phone Number</h5>
                <p class="text-muted"><?php echo $_SESSION['contactno']; ?></p>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h5 class="my-0">Payment</h5>
                <div class="custom-control custom-radio">
                  <input id="credit" type="radio" class="custom-control-input" checked>
                  <label class="custom-control-label" for="credit">
                    <p class="text-muted">Cash</p>
                  </label>
                </div>

              </div>
            </li>
          </ul>
        </div>
      </div>

      <button class="btn btn-primary btn-lg btn-block" id="checkout_button" type="submit" style="margin-bottom:50px;">Confirm Checkout</button>
    </form>
  </div>

  <script src="./js/cookies.js"></script>
  <script type="text/javascript">
    function loadCheckoutItems() {
      if (getCookie("number_of_items_in_cart") > 0) {
        var checkout_form_item_number = document.getElementById('checkout_form_item_number');
        checkout_form_item_number.innerText = getCookie("number_of_items_in_cart");

        document.getElementById("checkout_button").disabled = false;
      } else {
        document.getElementById("checkout_button").disabled = true;
      }

      var cart_item_json = JSON.parse(getCookie("cart_items"));
      var cart_item_num = Object.keys(cart_item_json["Items"]).length;
      var cart_item_list_html = document.getElementById('cart_item_list_html');
      var load_item_code = "";
      var total_price = 0;

      for (i = 0; i < cart_item_num; i++) {
        var current_item = JSON.parse(cart_item_json["Items"][i]);
        var item_id = current_item["Item_ID"];
        var item_name = current_item["Item_Name"];
        var item_description = current_item["Item_Description"];
        var item_price = current_item["Item_Price"];
        var item_image = current_item["Item_Image"];

        total_price = parseFloat(total_price) + parseFloat(item_price);

        var current_item_code =
          '<li class="list-group-item d-flex justify-content-between lh-condensed">' +
          '<div>' +
          '<div style="float:left;">' +
          '<p class="json_item_index" style="display:none">' + i + '</p>' +
          '<p class="added_item_id" style="display:none">' + item_id + '</p>' +
          '<img src="' + item_image + '" class="form_item_image">' +
          '</div>' +

          '<div style="float:right;">' +
          '<h6 class="my-0">' + item_name + '</h6>' +
          '<small class="text-muted">' + item_description + '</small>' +
          '<br><br>' +
          '<button class="delete_cart_item_button">Delete</button>' +
          '</div>' +
          '</div>' +
          '<span class="text-muted">' + item_price + '</span>' +
          '</li>';

        load_item_code = load_item_code + current_item_code;
      }

      var total_price_code =
        '<li class="list-group-item d-flex justify-content-between">' +
        '<span>Total</span>' +
        '<strong>' + 'RM ' + parseFloat(total_price).toFixed(2) + '</strong>' +
        '</li>';

      load_item_code = load_item_code + total_price_code;
      document.getElementById('cart_item_list_html').innerHTML = load_item_code;
    }

    loadCheckoutItems();
  </script>

  <script type="text/javascript">
    $(".delete_cart_item_button").on('click', function() {
      event.preventDefault();
      if (confirm('Are you sure you want to remove item?')) {
        var item_json_index = this.parentElement.parentElement.getElementsByClassName('json_item_index')[0].innerText;
        console.log("index: " + item_json_index);
        var cart_item_json = JSON.parse(getCookie("cart_items"));
        delete cart_item_json.Items[item_json_index];
        console.log("json: " + cart_item_json);
        var json_cart_items_string = JSON.stringify(cart_item_json);
        json_cart_items_string = json_cart_items_string.replace(",null", "");
        json_cart_items_string = json_cart_items_string.replace("null,", "");
        json_cart_items_string = json_cart_items_string.replace("null", "");
        console.log(json_cart_items_string);
        setCookie("cart_items", json_cart_items_string, 1);
        setCookie("number_of_items_in_cart", parseInt(getCookie("number_of_items_in_cart")) - 1, 1);

        //update navbar cart item number
        var navbar_cart_number = document.getElementById('navbar_cart_number');
        navbar_cart_number.innerText = getCookie("number_of_items_in_cart");

        //update cart item list number
        var cart_item_list_number = document.getElementById('checkout_form_item_number');
        var cart_item_list_number = getCookie("number_of_items_in_cart");

        //update cart item list
        loadCheckoutItems();
        if (getCookie("number_of_items_in_cart") == null || getCookie("number_of_items_in_cart") == "" || getCookie("number_of_items_in_cart") == undefined)
          window.location = "./checkout.php";
      } else {

      }


    })
  </script>

  <script type="text/javascript">
    $(document).on('click', '#checkout_button', function(event) {
      event.preventDefault();

      //Get user_id from Session
      var user_id = "<?php echo $_SESSION['user_id']; ?>";

      //Get total price
      var total_price = parseFloat(document.querySelector("strong").innerText.replace("RM ", ""));
      console.log("Total price:" + total_price);

      //Get each item's ID, and store it in an array
      var all_cart_items = JSON.parse(getCookie("cart_items"));
      console.log(all_cart_items);
      var cart_items_len = Object.keys(all_cart_items["Items"]).length;

      var all_cart_items_id = [];
      for (i = 0; i < cart_items_len; i++) {
        var current_item_id = JSON.parse(all_cart_items.Items[i]);
        all_cart_items_id.push(current_item_id);
      }

      //From the item's ID array, get each item's ID and their number of occurence in hashtable, and then store the ID and their number of occurence in 2 arrays
      var items_id_hashtable = {};

      for (j = 0; j < all_cart_items_id.length; j++) {
        if (!(all_cart_items_id[j]["Item_ID"] in items_id_hashtable)) {
          items_id_hashtable[all_cart_items_id[j]["Item_ID"]] = 1;
        } else {
          items_id_hashtable[all_cart_items_id[j]["Item_ID"]] = items_id_hashtable[all_cart_items_id[j]["Item_ID"]] + 1;
        }
      }

      var item_id_keys = new Array();
      var item_id_count = new Array();

      for (var key in items_id_hashtable) {
        item_id_keys.push(key);
        item_id_count.push(items_id_hashtable[key]);
      }

      //Get date and time in string format
      var datetime = new Date();
      var dateString = datetime.getFullYear() + "-" + (datetime.getMonth() + 1) + "-" + datetime.getDate();
      var timeString = datetime.getHours() + ":" + (datetime.getMinutes() + 1) + ":" + datetime.getSeconds();

      var form_data = new FormData();
      form_data.append("user_id", user_id);
      form_data.append("total_price", total_price);
      form_data.append("order_date", dateString);
      form_data.append("order_time", timeString);
      form_data.append("order_status", "In Preperation");
      form_data.append("item_id_keys", item_id_keys);
      form_data.append("item_id_count", item_id_count);

      $.ajax({
        url: './includes/user_add_order.php',
        method: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          //Clear cookies
          eraseCookie("number_of_items_in_cart");
          eraseCookie("cart_items");
          //Direct to successful
          window.location = "./checkout_success.php";

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(response);
        }
      });

    });
  </script>
</body>