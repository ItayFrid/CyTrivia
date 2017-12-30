<?php
if(!isset($_SESSION['user'])){
        header("Location: index.php");
}
include('includes/header.php');
include('functions/triviaFunctions.php');
if(!isset($_SESSION['user'])){
        header('Location: index.php');
}
if(isset($_SESSION['admin'])){
        header('Location: index.php');
}
// Creating Session Variables
  $_SESSION['grade'.$_SESSION['user']]=0;               //The user's grade
  $_SESSION['level'.$_SESSION['user']]=1;               //current question level
  $_SESSION['question'.$_SESSION['user']]=1;            //Number Of Question player answered
  $_SESSION['questions'.$_SESSION['user']]=generateQuestions(); // Random Question 2D Array By lvl
  $_SESSION['userAnswers'.$_SESSION['user']]=array();   //Array Of User's Answers
  $_SESSION['correctAnswers'.$_SESSION['user']]=array();//Array Of correct Answers
  $_SESSION['ScorePerAnswer'.$_SESSION['user']]=array();//Array Of Score Per Answer
  $_SESSION['TimePerAnswer'.$_SESSION['user']]=array(); //time in seconds per answer
  $_SESSION['startPlay'.$_SESSION['user']]=true;        //User Started The Trivia
  //Get Question From DB By ID
$query = 'SELECT * FROM users WHERE id = '.$_SESSION['user'];
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
mysqli_free_result($result);
header('Location: play.php');
?>