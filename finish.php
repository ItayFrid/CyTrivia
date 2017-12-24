<?php include('includes/header.php');?>
<?php

$grade=$_SESSION['grade'.$_SESSION['user']];
$level=$_SESSION['level'.$_SESSION['user']];
$numQues=$_SESSION['question'.$_SESSION['user']];
$answerArrays=$_SESSION['userAnswers'.$_SESSION['user']];
$questionUsed=$_SESSION['used'.$_SESSION['user']];

// $query = 'SELECT * FROM users WHERE id='.$_SESSION['user'];
$query="UPDATE users SET score='$grade' date_played='date('Y-m-d')' WHERE id={$_SESSION['user']}";
$result = mysqli_query($con, $query);

unset($_SESSION['grade'.$_SESSION['user']]);
unset($_SESSION['level'.$_SESSION['user']]);
unset($_SESSION['question'.$_SESSION['user']]);
unset($_SESSION['userAnswers'.$_SESSION['user']]);
unset($_SESSION['used'.$_SESSION['user']]);
echo $grade.'<br>';
echo $level.'<br>';
echo $numQues.'<br><br>';
foreach($answerArrays as $a){
  echo $a.'<br>';
}
echo '<br><br>';
foreach($questionUsed as $a){
  echo $a.'<br>';
}
?>

<?php include('includes/footer.php');?>
