<?php
require_once 'core/init.php';
require_once 'functions/triviaFunctions.php';

function Test_if_TestrandomizeAnswers_returns_4_ans( $arr= (array("test1", "test2", "test3", "test4"))) {
  $testarr = randomizeAnswers ($arr);
  echo "check if the function return the same nummber of the elment its get<br>";
  echo count($testarr) == count($arr);
  echo "<br><br>";

}

function Test_if_TestrandomizeAnswers_contain_all_the_values_he_get($arr= (array("test1", "test2", "test3", "test4"))) {
  $testarr = randomizeAnswers($arr);
  echo "check if the function returns the same value its get   ";
  foreach ($arr as $val) {
    echo in_array($val, $testarr);
  }
  echo "<br><br>";
}


function Test_if_generateQuestions_returns_10_levels($testArr){
  echo "check if the function returns an array with 10 elements <br>";
  echo count($testArr) == 10;
  echo "<br><br>";
}
Test_if_TestrandomizeAnswers_returns_4_ans();
Test_if_TestrandomizeAnswers_contain_all_the_values_he_get();
Test_if_generateQuestions_returns_10_levels($testArr = generateQuestions());
?>