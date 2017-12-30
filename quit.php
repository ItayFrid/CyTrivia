<?php if(isset($_SESSION['user'])):?>
<?php if(isset($_SESSION['startPlay'.$_SESSION['user']])):?>
<?php
$grade=$_SESSION['grade'.$_SESSION['user']];
$level=$_SESSION['level'.$_SESSION['user']];
$numQues=$_SESSION['question'.$_SESSION['user']];
$answerArrays=$_SESSION['userAnswers'.$_SESSION['user']];
$correctAnswers = $_SESSION['correctAnswers'.$_SESSION['user']];
$scoreArray=$_SESSION['ScorePerAnswer'.$_SESSION['user']];
$timePerAnswer=$_SESSION['TimePerAnswer'.$_SESSION['user']];
$date=date('Y-m-d');
$query="UPDATE users SET score='$grade', date_played='$date' WHERE id={$_SESSION['user']}";
$result = mysqli_query($con, $query);
unset($_SESSION['grade'.$_SESSION['user']]);
unset($_SESSION['level'.$_SESSION['user']]);
unset($_SESSION['question'.$_SESSION['user']]);
unset($_SESSION['questions'.$_SESSION['user']]);
unset($_SESSION['userAnswers'.$_SESSION['user']]);
unset($_SESSION['correctAnswers'.$_SESSION['user']]);
unset($_SESSION['ScorePerAnswer'.$_SESSION['user']]);
unset($_SESSION['TimePerAnswer'.$_SESSION['user']]);
unset($_SESSION['startPlay'.$_SESSION['user']]);
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="scoreAlert">
	<div class="row">
		<div class="col text-right">
			<strong>יצאת באמצע החידון</strong>, ציונך יעודכן בהתאם לשאלות שענית עד כה.
		</div>
		<div class="col text-left">
		<a href="" class="alert-link" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
		</div>
	</div>
</div>
<?php endif;?>
<?php endif;?>
