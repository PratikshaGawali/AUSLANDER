<?php
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        }
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
			}
?>
<?php
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);
?>
<?php
function cnt()
{
print "<br><br><br><br><h2>PHP is Fun!</h2>";
} ?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<link href='https://fonts.googleapis.com/css?family=Jolly Lodger' rel='stylesheet'>
	<title>AUSLANDER</title>
	<style>body{background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/usa.jpeg);
	height: 100vh;
	background-size: cover;
	background-position: center;}

</style>
</head>
	<body>
		<header>
			<div class="container">
				<h1 style="color: #fff;font-size: 60px; text-align:center;font-family: 'Jolly Lodger';">&nbsp&nbsp&nbspAUSLANDER</h1>
				<h3 style="color: #fff;font-size: 15px;text-align:center; ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b> It's closer than you think!</b></h3>
			</div>
		</header>
		<main>
			<script>
			var countDownDate = new Date("Oct 7, 2019 19:00:00").getTime();
			var x = setInterval(function() {
			  var now = new Date().getTime();
			  var distance = countDownDate - now;
			  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			  document.getElementById("clock").innerHTML =  hours + "h " + minutes + "m " + seconds + "s ";

			  if (distance < 0) {
			    clearInterval(x);
			    document.getElementById("clock").innerHTML = "EXPIRED";

			  }
			}, 1000);
			</script>
			<p id="clock" style="font-size:15px;margin-left:72%;color:white;"></p>
			<div class= "container">
				<div class= "current"style="color: #fff;font-size: 20px;text-align:left; ">Part <?php echo $qno; ?> of <?php echo $totalqn; ?></div>
				<p class="question"style="color: #fff;font-size: 20px;text-align:left; "><?php echo $question; ?></p>
				<form method="post" action="process.php">
					<input type="text" name="Hint" style="color:white;"></input>

					<button type="submit" value="Submit">Submit</button>
					<input type="hidden" name="number" value="<?php echo $qno;?>">

				</form>

				<form method="post">

					<button type="submit"  name="reveal">Reveal Answer</button>


				</form>
				<form method="post" action="results.php">

					<input type="submit"  value="Exit"></input>
				</form>



<?php
  if(isset($_POST['reveal']))
	{

		$id1=$_SESSION['id'];
		$query="update users set reveals= reveals+1 where id =$id1";
		$query1 = "SELECT * FROM questions WHERE qno = '$qno'" ;

		$run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0)
		{
			$row = mysqli_fetch_array($run);
							 $correct_answer = $row['correct_answer'];
		}
		echo "<h3 style='color:white; font-size:30px;'>".$correct_answer."</h3>";
		if(mysqli_query($conn , $query))
		{

		}

	}
?>

</div>
</main>
</body>
</html>
<?php }
else {
	header("location: home.php");
}
?>
