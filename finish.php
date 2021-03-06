<?php include('includes/header.php');?>
<?php
$grade=$_SESSION['grade'.$_SESSION['user']];
$level=$_SESSION['level'.$_SESSION['user']];
$numQues=$_SESSION['question'.$_SESSION['user']];
$answerArrays=$_SESSION['userAnswers'.$_SESSION['user']];
$correctAnswers = $_SESSION['correctAnswers'.$_SESSION['user']];
$scoreArray=$_SESSION['ScorePerAnswer'.$_SESSION['user']];

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
?>
<br>
  <h1 class="text-success text-center">סיימת את הטריוויה!</h1>
  <br>
  <div class="container text-center">
    <div class="row">
      <!-- Right Column -->
      <div class="col-sm">
        <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th colspan="2" class="text-center">פירוט הניקוד:</th>
          </tr>
        </thead>
          <thead class="thead-light">
            <tr>
              <th>מספר שאלה</th>
              <th>ניקוד</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1;foreach($scoreArray as $score):?>
          <tr class="table-<?php if($score){echo 'success';}else{echo 'danger';} ?>">
              <th><?php echo $i;?></th>
              <th><?php echo $score;?></th>
            </tr>
          <?php $i++;endforeach;?>
          </tbody>
          <thead class="thead-light">
            <tr>
              <th>סה"כ</th>
              <th><?php echo $grade;?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- Center Column -->
      <div class="col-sm">
        <h4>
          לכניסה לטבלת הזוכים היומיים לחץ
          <a href="winners.php">כאן</a>
        </h4>
      </div>
      <!-- Left Column -->
      <div class="col-sm">
        <h4>ציונך הסופי הוא:</h4>
        <h4 class="text-success"><?php echo $grade;?></h4>
      </div>
  </div>
</div>
<?php include('includes/footer.php');?>
