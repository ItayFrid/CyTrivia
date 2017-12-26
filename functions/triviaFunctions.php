<?php
function randomizeAnswers($question){
  $rand_arr = [];
  array_push($rand_arr, $question['correct']);
  array_push($rand_arr, $question['wrong1']);
  array_push($rand_arr, $question['wrong2']);
  array_push($rand_arr, $question['wrong3']);
  shuffle($rand_arr);
  return $rand_arr;
}
function getQuestion(&$level,$questions,&$used){
  $qlevel = [];
  $count = 0;
  while($count == 0){
    foreach($questions as $question){
        if($question['lev'] == $level && in_array($question['id'], $used) == false){    
          //If question is with given level and not used 
            array_push($qlevel, $question['id']);
            $count++;
        }
    }
    if($count == 0){
      $level++;
    }
  }
  $rand = rand(0, $count - 1);
  return $qlevel[$rand];
}
function generateQuestions(){
  $con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  $query = 'SELECT * FROM questions ORDER BY lev ASC';
	$result = mysqli_query($con, $query);
	$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  $finalQuestions= array();
  for($i=0;$i<10;$i++){
    $finalQuestions[$i]=array();
  } 
  foreach($questions as $question){
    $finalQuestions[$question['lev']-1][]=$question['id'];
  }
  for($i=0;$i<10;$i++){
    shuffle($finalQuestions[$i]);
  } 
  return $finalQuestions;
}
function PrintQuestionsID(){
  $_SESSION['questions'.$_SESSION['user']];
  for($i=0;$i<10;$i++){
    foreach($_SESSION['questions'.$_SESSION['user']][$i] as $id){
      echo "{$id} ";
    }
    echo '<br>';
  }
}
?>