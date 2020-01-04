<?php
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href='https://fonts.googleapis.com/css?family=Eater' rel='stylesheet'>
	<title>AUSLANDER</title>
	<style>body{background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/usa.jpeg);
	height: 100vh;
	background-size: cover;
	background-position: center;}</style>
</head>

	<body>
		<header>
			<div class="container">
				<h1 style="font-family:'Eater';color: #fff;font-size: 60px; text-align:center;">&nbsp&nbsp&nbspAUSLANDER</h1>
				<h3 style="color: #fff;font-size: 20px;text-align:center; "> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b> It's closer than you think!</b></h3>
			</div>
		</header>

		<main>
			<div class="container">
				<p style="color:white;font-size:40px;">Instructions</p>
				<ul style="color:white;">
				    <li><strong>Number of parts : </strong><?php echo $total; ?></li>
				    <li><strong>Type: </strong></li>
				    <li><strong>Estimated time : </strong> seconds</li>
				     <li><strong>Score: </strong>   &nbsp; +1 point for each correct answer</li>
				</ul>
				<br>
				<a href="question.php?n=1" class="start" style="font-size:30px;" >Start</a>&nbsp&nbsp&nbsp&nbsp
				<a href="exit.php" class="add" style="font-size:30px;">Exit</a>

			</div>
		</main>
	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>
