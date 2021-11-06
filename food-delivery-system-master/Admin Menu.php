<?php
session_start();
?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Menu</title>
	<link href="css\bootstrap.min.css" rel="stylesheet">
	<link href="css\adminpage.css" rel="stylesheet">
	<style>
		.file {
			visibility: hidden;
			position: absolute;
		}
	</style>
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
			<div class="container-fluid">

				<!-- Add Item Form -->
				<div class="modal fade" id="modalAddItemForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header text-center">
								<h4 class="modal-title w-100 font-weight-bold">Add Item
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</h4>
							</div>

							<div class="modal-body mx-3">
								<form id="add_item_form" style="padding-left: 20px; padding-right: 20px;">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Item Name</label>
											<input type="text" class="form-control" id="add_item_name" name="add_item_name" placeholder="eg: Costata Di Maiale Alla Brace">
										</div>

										<div class="form-group col-md-3">
											<label>Type</label>
											<select class="form-control" id="add_item_type">
												<option>Food</option>
												<option>Beverage</option>
											</select>
										</div>

										<div class="form-group col-md-3">
											<label>Price</label>
											<input type="text" class="form-control" id="add_item_price" name="add_item_price" type="number" placeholder="eg: 85.00">
										</div>

									</div>

									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" id="add_item_description" id="add_item_description" rows="3" placeholder="eg: peads & barnetts pork chop, roasted bartlett pears, chanterelles & sage"></textarea>
									</div>

									<div id="msg"></div>

									<label>Image</label>

									<input type="file" name="img[]" id="add_item_image" class="file" accept="image/*">
									<div class="input-group my-3">
										<input type="text" class="form-control" disabled placeholder="Upload File" id="additem-file">
										<div class="input-group-append">
											<button type="button" class="additem-browse btn btn-primary">Browse...</button>
										</div>
									</div>

									<div style="padding-left: 20px; padding-right: 20px;">
										<img id="add_item_image-preview" class="img-thumbnail" style="height:200px; display:none;">
									</div>

									<div style="padding-left: 20px; padding-right: 20px;">
										<button type="submit" id="additem_submit" name="additem_submit" class="btn btn-primary" data-dismiss="modal" style="width:100%; margin-top:20px;">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Add Item Form -->

				<!-- Edit Item Form -->
				<div class="modal fade" id="modalEditItemForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header text-center">
								<h4 class="modal-title w-100 font-weight-bold">Edit Item
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</h4>

							</div>

							<div class="modal-body mx-3">
								<form id="edit_item_form" style="padding-left: 20px; padding-right: 20px;">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Item Name</label>
											<input type="text" class="form-control" id="edit_item_name" placeholder="eg: Costata Di Maiale Alla Brace">
										</div>

										<div class="form-group col-md-3">
											<label>Type</label>
											<select class="form-control" id="edit_item_type">
												<option>Food</option>
												<option>Beverage</option>
											</select>
										</div>

										<div class="form-group col-md-3">
											<label>Price</label>
											<input type="text" class="form-control" id="edit_item_price" type="number" placeholder="eg: 85.00">
										</div>
									</div>

									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" id="edit_item_description" rows="3" placeholder="eg: peads & barnetts pork chop, roasted bartlett pears, chanterelles & sage"></textarea>
									</div>

									<div id="msg"></div>

									<label>Image</label>
									<form method="post" id="image-form">
										<input type="file" name="img[]" id="edit_item_image" class="file" accept="image/*">
										<div class="input-group my-3">
											<input type="text" class="form-control" disabled placeholder="Upload File" id="edititem-file">
											<div class="input-group-append">
												<button type="button" class="edititem-browse btn btn-primary">Browse...</button>
											</div>
										</div>
									</form>

									<div style="padding-left: 20px; padding-right: 20px;">
										<img id="edit_item_image-preview" class="img-thumbnail" style="height:200px; display:none;">
									</div>

									<div style="padding-left: 20px; padding-right: 20px;">
										<button type="submit" id="edititem_submit" name="edititem_submit" class="btn btn-primary" data-dismiss="modal" style="width:100%; margin-top:20px;">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Item Form -->

				<!-- Delete Confirmation Form -->
				<div class="modal fade" id="modalDeleteItemConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header text-center">
								<h4 class="modal-title w-100 font-weight-bold">Delete Item
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</h4>
							</div>

							<div class="modal-body mx-3 text-center">
								<p>Do you really want to delete this item?</p>
								<button type="button" id="confirm_delete_item_admin" class="btn btn-danger" data-dismiss="modal">Delete</button>
								<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!--  Delete Confirmation Form -->

				<div class="text-center">
					<button class="btn btn-secondary" data-toggle="modal" data-target="#modalAddItemForm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right; margin-top:20px; margin-bottom:20px;">
						Add Item
					</button>

					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th scope="col">Item ID</th>
								<th scope="col">Item Name</th>
								<th scope="col">Description</th>
								<th scope="col">Type</th>
								<th scope="col">Price</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody id="load_table_items">
							<?php
							require "./includes/load_table_items_admin.php";
							?>
						</tbody>
					</table>
				</div>
				<!-- /#page-content-wrapper -->
			</div>
			<!-- /#wrapper -->

			<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).on("click", ".additem-browse", function() {
					var file = $(this).parents().find("#add_item_image");
					file.trigger("click");
				});

				$('#add_item_image').change(function(e) {
					var fileName = e.target.files[0].name;
					$("#additem-file").val(fileName);
					var reader = new FileReader();
					reader.onload = function(e) {
						// get loaded data and render thumbnail.
						document.getElementById("add_item_image-preview").src = e.target.result;
					};
					// read the image file as a data URL.
					reader.readAsDataURL(this.files[0]);
					var img = document.getElementById('add_item_image-preview');
					img.style.display = 'block';
				});

				$(document).on("click", ".edititem-browse", function() {
					var file = $(this).parents().find("#edit_item_image");
					file.trigger("click");
				});

				$('#edit_item_image').change(function(e) {
					var fileName = e.target.files[0].name;
					$("#edit_item-file").val(fileName);
					var reader = new FileReader();
					reader.onload = function(e) {
						// get loaded data and render thumbnail.
						document.getElementById("edit_item_image-preview").src = e.target.result;
					};
					// read the image file as a data URL.
					reader.readAsDataURL(this.files[0]);
					var img = document.getElementById('edit_item_image-preview');
					img.style.display = 'block';
				});

				$(".close").on('click', function(event) {
					document.getElementById("add_item_form").reset();
					var additem_image_preview = document.getElementById('add_item_image-preview');
					var edititem_image_preview = document.getElementById('edit_item_image-preview');
					additem_image_preview.style.display = 'none';
					edititem_image_preview.style.display = 'none';
				});


				$("#additem_submit").on('click', function(event) {
					event.preventDefault();
					var add_item_name = $("#add_item_name").val();
					var add_item_description = $("#add_item_description").val();
					var add_item_type = $("#add_item_type").val();
					var add_item_price = $("#add_item_price").val();
					var add_item_image = document.getElementById("add_item_image").files[0];

					var form_data = new FormData();
					form_data.append("add_item_name", add_item_name);
					form_data.append("add_item_description", add_item_description);
					form_data.append("add_item_type", add_item_type);
					form_data.append("add_item_price", add_item_price);
					form_data.append("file", add_item_image);

					if (add_item_name == "" || add_item_description == "" || add_item_type == "" || add_item_price == "" || add_item_image == "") {
						alert("Please fill in the required fields");
					} else {
						$.ajax({
							url: './includes/admin_add_item.php',
							method: 'POST',
							data: form_data,
							cache: false,
							contentType: false,
							processData: false,
							success: function(response) {
								$('#load_table_items').load("./includes/load_table_items_admin.php");
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('An error has occured');
							}
						});
					}

					document.getElementById("add_item_form").reset();
					var additem_image_preview = document.getElementById('add_item_image-preview');
					var edititem_image_preview = document.getElementById('edit_item_image-preview');
					additem_image_preview.style.display = 'none';
					edititem_image_preview.style.display = 'none';
				});

				$(".editItemButton").on('click', function(event) {
					event.preventDefault();
					var selected_item_id = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[0].textContent
					var selected_item_name = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[1].textContent
					var selected_item_description = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[2].textContent
					var selected_item_type = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[3].textContent
					var selected_item_price = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[4].textContent
					var selected_item_image = document.getElementById(this.id).parentElement.parentElement.querySelectorAll('td')[5].querySelector('img').src;

					document.getElementById("edit_item_name").value = selected_item_name;
					document.getElementById("edit_item_description").value = selected_item_description;
					document.getElementById("edit_item_type").value = selected_item_type;
					document.getElementById("edit_item_price").value = selected_item_price;
					document.getElementById("edit_item_image-preview").src = selected_item_image;
					document.getElementById("edit_item_image-preview").style.display = "block";

					$("#edititem_submit").on('click', function(event) {
						event.preventDefault();
						var edit_item_id = selected_item_id;
						var edit_item_name = $("#edit_item_name").val();
						var edit_item_description = $("#edit_item_description").val();
						var edit_item_type = $("#edit_item_type").val();
						var edit_item_price = $("#edit_item_price").val();
						var edit_item_image = document.getElementById("edit_item_image").files[0];

						var form_data = new FormData();
						form_data.append("edit_item_id", edit_item_id);
						form_data.append("edit_item_name", edit_item_name);
						form_data.append("edit_item_description", edit_item_description);
						form_data.append("edit_item_type", edit_item_type);
						form_data.append("edit_item_price", edit_item_price);
						if (edit_item_image != undefined) {
							form_data.append("file", edit_item_image);
						}

						$.ajax({
							url: './includes/admin_edit_item.php',
							method: 'POST',
							data: form_data,
							cache: false,
							contentType: false,
							processData: false,
							success: function(response) {
								alert('Item updated successfully');
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('An error has occured');
							}
						});
					});
				});

				$(document).on('click', '.deleteItemButton', function(event) {
					event.preventDefault();
					var currentDeleteItemButtonId = this.id;
					$(document).one('click', '#confirm_delete_item_admin', function(event) {
						var selected_row = document.getElementById(currentDeleteItemButtonId).parentElement.parentElement;
						selected_row.style.display = "none";

						var delete_item_id = selected_row.querySelector('td').innerText;
						var form_data = new FormData();
						form_data.append("delete_item_id", delete_item_id);
						$.ajax({
							url: './includes/admin_delete_item.php',
							method: 'POST',
							data: form_data,
							cache: false,
							contentType: false,
							processData: false,
							success: function(response) {
								alert("Item deleted successfully");
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('An error has occured');
							}
						});
					})
				});
			</script>

</body>

</html>