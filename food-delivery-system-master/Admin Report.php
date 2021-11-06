<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Report</title>
	<link href="css\bootstrap.min.css" rel="stylesheet">
	<link href="css\adminpage.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
				<button id="button1">Revenue</button>
				<button id="button2">Sales</button>
				<canvas id="myChart"></canvas>
				<canvas id="myChart2"></canvas>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script>
	function revenuechart() {

		var myChart = document.getElementById('myChart').getContext('2d');


		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#777';

		var barChart = new Chart(myChart, {
			type: 'bar',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: 'Revenue',
					data: [
						70, 10, 5, 2, 20, 30, 45, 40, 90, 65, 55, 15
					],
					backgroundColor: [
						'rgb(255, 0, 0)',
						'rgb(255, 191, 0)',
						'rgb(255, 255, 0)',
						'rgb(64, 255, 0)',
						'rgb(0, 191, 255)',
						'rgb(128, 0, 255)',
						'rgb(191, 0, 255)',
						'rgb(255, 0, 191)',
						'rgb(255, 0, 64)',
						'rgb(0, 255, 128)',
						'rgb(0, 255, 255)',
						'rgb(0, 0, 255)',
					],
					hoverBorderWidth: 2,
					hoverBorderColor: '#000'
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Total Revenue Per Month of The Disaster Cafe (RM)'
				},

				legend: {
					display: false,
				},

				layout: {
					padding: {
						left: 0,
						right: 0,
						bottom: 50,
						top: 0
					}
				}
			}
		});




		var myChart2 = document.getElementById('myChart2').getContext('2d');


		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#777';

		var lineChart = new Chart(myChart2, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: 'Revenue',
					data: [
						70, 10, 5, 2, 20, 30, 45, 40, 90, 65, 55, 15
					],
					fill: false,
					pointBackgroundColor: [
						'rgb(255, 0, 0)',
						'rgb(255, 191, 0)',
						'rgb(255, 255, 0)',
						'rgb(64, 255, 0)',
						'rgb(0, 191, 255)',
						'rgb(128, 0, 255)',
						'rgb(191, 0, 255)',
						'rgb(255, 0, 191)',
						'rgb(255, 0, 64)',
						'rgb(0, 255, 128)',
						'rgb(0, 255, 255)',
						'rgb(0, 0, 255)',
					],
					pointBorderWidth: 10,
					hoverBorderWidth: 2,
					hoverBorderColor: '#000'
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Total Revenue Per Month of The Disaster Cafe (RM)'
				},

				legend: {
					display: false,
				}
			}
		});
	}

	var button1 = document.getElementById("button1");
	button1.addEventListener("click", revenuechart);
</script>

<script>
	function saleschart() {

		var myChart = document.getElementById('myChart').getContext('2d');


		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#777';

		var barChart = new Chart(myChart, {
			type: 'bar',
			data: {
				labels: ['HAHA', 'BABA', 'TATA'],
				datasets: [{
					label: 'sALES',
					data: [
						70, 10, 5
					],
					backgroundColor: [
						'rgb(255, 0, 0)',
						'rgb(255, 191, 0)',
						'rgb(255, 255, 0)',
					],
					hoverBorderWidth: 2,
					hoverBorderColor: '#000'
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Total Sales Per Month of The Disaster Cafe (RM)'
				},

				legend: {
					display: false,
				},

				layout: {
					padding: {
						left: 0,
						right: 0,
						bottom: 50,
						top: 0
					}
				}
			}
		});




		var myChart2 = document.getElementById('myChart2').getContext('2d');


		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#777';

		var lineChart = new Chart(myChart2, {
			type: 'line',
			data: {
				labels: ['HAHA', 'BABA', 'TATA'],
				datasets: [{
					label: 'sALES',
					data: [
						70, 10, 5
					],
					backgroundColor: [
						'rgb(255, 0, 0)',
						'rgb(255, 191, 0)',
						'rgb(255, 255, 0)',
					],
					hoverBorderWidth: 2,
					hoverBorderColor: '#000'
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Total Sales Per Month of The Disaster Cafe (RM)'
				},

				legend: {
					display: false,
				}
			}
		});
	}
	var button2 = document.getElementById("button2");
	button2.addEventListener("click", saleschart);
</script>
</body>

</html>