<?php
session_start();
// User submitted answer
if(isset($_POST['submit'])){
  // Adding user's Answer to userAnswers Array
  $_SESSION['userAnswers'.$_SESSION['user']][]=$_POST['Answer'];
  // User Answered Correct
  $tempGrade=0;
  if($_POST['Answer']==end($_SESSION['correctAnswers'.$_SESSION['user']])){
    // Update Grade
    $tempGrade = $_SESSION['level'.$_SESSION['user']]*10;
    $_SESSION['grade'.$_SESSION['user']]+=$tempGrade;
    
    // Increment Level
    $_SESSION['level'.$_SESSION['user']]++;
  }
  $_SESSION['ScorePerAnswer'.$_SESSION['user']][]=$tempGrade;
  //Increment Number Of Question
  $_SESSION['question'.$_SESSION['user']]++;

  // Next Question
  header('Location: play.php');
}

// header('Location: play.php');
?>