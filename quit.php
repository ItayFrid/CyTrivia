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
 <!-- aria-labelledby="myModalLabel" -->
<!-- <div class="modal fade" tabindex="-1" role="dialog" data-toggle="modal" data-target="#error" aria-hidden="false">
    			<div class="modal-dialog">
        		<div class="modal-content">
            	<div class="modal-header">
                <div class="modal-title">
                  שגיאה
                </div>
            	</div>
              <div class="modal-body">
                <p>יצאת באמצע החידון, ציונך יעודכן בהתאם לשאלות שענית עד כה</p>
              </div>
            	<div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">אישור</button>
            	</div>
        		</div>
    			</div>
					<script>
						$('#error').modal('show')
					</script> -->
					<hr>
					<h4 class="text-danger text-center">יצאת באמצע החידון, ציונך יעודכן בהתאם לשאלות שענית עד כה</h4>
					<hr>
<?php endif;?>
<?php endif;?>