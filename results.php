<?php
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
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
				<h1 style="color: #fff;font-size: 60px; text-align:center;font-family:'Eater';">&nbsp&nbsp&nbspAUSLANDER</h1>
				<h3 style="color: #fff;font-size: 20px;text-align:center; "> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>It's closer than you think!</b></h3>

			</div>
		</header>

		<main>
			<div class= "container">
			<h2 style="color: #fff;font-size: 40px;text-align:center; ">Congratulations!</h2>
				<p style="color: #fff;font-size: 20px;text-align:center; ">You have successfully completed the test</p>
				<form method="post" action="exit.php">

									<input type="submit"  value="Logout"></input>
								</form>
				<!--location.reload();-->
		</div>
		</main>
		</body>
		</html>

		<?php
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>
