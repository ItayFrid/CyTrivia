<?php
if(!isset($_SESSION['user'])){
  header('Location: index.php');
}
if(isset($_SESSION['admin'])){
  header('Location: index.php');
}
session_start();
// User submitted answer
if(isset($_POST['submit'])){
  // Adding user's Answer to userAnswers Array
  $_SESSION['userAnswers'.$_SESSION['user']][]=$_POST['Answer'];
  // User Answered Correct
  $tempGrade=0;
  $start_time=$_SESSION['time'.$_SESSION['user']];
  $current_time=mktime();
  $end_time=$current_time - $start_time;
  if($end_time==0){
    $end_time=1;
  }
  $_SESSION['TimePerAnswer'.$_SESSION['user']][]=$end_time;
  unset($_SESSION['time'.$_SESSION['user']]);
  if($_POST['Answer']==end($_SESSION['correctAnswers'.$_SESSION['user']])){
    // Update Grade
    $tempGrade = (int)($_SESSION['level'.$_SESSION['user']]*100/$end_time);
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