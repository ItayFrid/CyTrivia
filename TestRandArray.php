<?php

require_once 'functions/triviaFunctions.php';

function Test_if_TestrandomizeAnswers_returnrs_4_ans( $arr= (array("test1", "test2", "test3", "test4"))) {
  $testarr = randomizeAnswers ($arr);
  echo "check if the function return the same nummber of the elment its get\n";
  echo count(&testarr) == count($arr);
  print"\n"

}

function Test_if_TestrandomizeAnswers_contain_all_the_values_he_get($arr= (array("test1", "test2", "test3", "test4"))) {
  $testarr = randomizeAnswers($arr);
  echo "check if the function returns the same value its get\n";
  foreach (&arr as $val) {
    echo in_array($val);
  }

  print"\n"
}

function Test_if_generateQuestions_returns_10_levels( $testarr = generateQuestions() ){
  echo "check if the function returns an array with 10 elements \n";
  echo (in_array ($testarr,"test1") and in_array ($testarr,"test2") and in_array ($testarr,"test3") and in_array ($testarr,"test4"))
  print"\n"
}


?>