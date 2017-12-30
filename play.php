<?php include('includes/header.php');?>
<?php
include('functions/triviaFunctions.php');

// $_SESSION['question'.$_SESSION['user']]     - numOfQuestions
// $_SESSION['questions'.$_SESSION['user']]     - questions array by id
// $_SESSION['userAnswers'.$_SESSION['user']]
// $_SESSION['correctAnswers'.$_SESSION['user']]
// $_SESSION['used'.$_SESSION['user']]
$_SESSION['time'.$_SESSION['user']]=mktime();
// user Is Not Logged In
if(!isset($_SESSION['user'])){
  header('Location: index.php');
}
if(isset($_SESSION['admin'])){
  header('Location: index.php');
}

// User Answered 10 question, trivia finished
if($_SESSION['question'.$_SESSION['user']]==11){
  header('Location: finish.php');
}
// No More Questions In current level
if(empty($_SESSION['questions'.$_SESSION['user']][$_SESSION['level'.$_SESSION['user']]-1])){
  $_SESSION['level'.$_SESSION['user']]++;
}
// Getting CurrentID from questions Array
$currentID= array_shift($_SESSION['questions'.$_SESSION['user']][$_SESSION['level'.$_SESSION['user']]-1]);

//Get Question From DB By ID
$query = 'SELECT * FROM questions WHERE id = '.$currentID;
$result = mysqli_query($con, $query);
$question = mysqli_fetch_assoc($result);
mysqli_free_result($result);

// Adding Question's Correct Answer to correctAnswers Array
$_SESSION['correctAnswers'.$_SESSION['user']][]=$question['correct'];

// Randomize Answers Order
$answerArray=randomizeAnswers($question);
?>
<br><br>
<div class="container text-center">
  <div class="row">
    <!-- Right Column -->
    <div class="col-sm">
    <!-- For Testing Only, Delete Later -->
    <h4>זמן שעבר:</h4>
    <h4><label class="text-danger" id="seconds">00</label></h4>
      <script type="text/javascript">
          var minutesLabel = document.getElementById("minutes");
          var secondsLabel = document.getElementById("seconds");
          var totalSeconds = 0;
          setInterval(setTime, 1000);
  
          function setTime()
          {
              ++totalSeconds;
              secondsLabel.innerHTML = pad(totalSeconds);
              minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
          }
  
          function pad(val)
          {
              var valString = val + "";
              if(valString.length < 2)
              {
                  return "0" + valString;
              }
              else
              {
                  return valString;
              }
          }
      </script>
    </div>
    <!-- Center Column -->
    <div class="col-sm">
      <h3><?php echo $question['body'];?></h3>
      <form action="<?php echo 'proccess.php'; ?>" method="post" id="needs-validation" novalidate>
      <div class="custom-controls-stacked d-block">
          <?php foreach($answerArray as $answer):?>
          <label class="custom-control custom-radio">
            <input value="<?php echo $answer;?>" name="Answer" type="radio" class="custom-control-input" required>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description"><?php echo $answer;?></span>
          </label>
          <?php endforeach;?>
        </div>
        <button type="submit" class="btn btn-outline-primary" value="submit" name="submit">הזן תשובה</button>
      </form>
<br><br>
      <h4>התקדמות</h4>
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="<?php echo ($_SESSION['question'.$_SESSION['user']]-1)*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($_SESSION['question'.$_SESSION['user']]-1)*10;?>%"><?php echo ($_SESSION['question'.$_SESSION['user']]-1)*10;?>%</div>
      </div>

    </div>
    <!-- Right Column -->
    <div class="col-sm">
    <h4>ציון נוכחי:</h4>
    <h4 class="text-success">
      <?php echo $_SESSION['grade'.$_SESSION['user']]; ?>
    </h4>
    </div>
  </div>
</div>
<script>
// Form Validation Script
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      // form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script> 
<?php include('includes/footer.php');?>