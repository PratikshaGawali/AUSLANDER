<?php

<?php

	$hobbies="hdshhshuG";
	?>
	<?php

	echo "ho".$_GET['hobbies'];
	?>



session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}
	if ($_POST) {
		$qno = $_POST['number'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		$selected_choice = $_POST['Hint'];
		$query = "SELECT correct_answer FROM questions WHERE qno= '$qno' ";
        $run = mysqli_query($conn , $query);
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['correct_answer'];
        }
        if ($correct_answer == $selected_choice) {
        	$_SESSION['score']++;
          //echo "$qno";
          $nextqno=$qno+1;
        }
        $query1 = "SELECT * FROM questions ";
        $run = mysqli_query($conn , $query1);
        $totalqn = mysqli_num_rows($run);
      if($correct_answer == $selected_choice) {
          $nextlink = "question.php?n=".$nextqno;
        	?><script> window.location.replace('<?php $nextlink ?>')</script><?php
        }
        else{
          $link = "question.php?n=".$qno;
						?><script> window.location.replace('<?php $link ?>')</script><?php

        /*header("location: question.php?n=".$qno);*/

        }
        if ($qno == $totalqn) {
          ?><script> window.location.replace("./results.php")</script><?php
        }
}
else {
    ?><script> window.location.replace("./home.php")</script><?php
}
}
else {
	?><script> window.location.replace("./home.php")</script><?php
}
?>
