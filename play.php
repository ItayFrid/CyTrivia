<?php include('includes/header.php');?>
<?php
// $_SESSION['grade'.$_SESSION['user']]=0;
// $_SESSION['level'.$_SESSION['user']]=1;
// $_SESSION['question'.$_SESSION['user']]=1;
// $_SESSION['userAnswers'.$_SESSION['user']]=array();
// $_SESSION['used'.$_SESSION['user']]=array();
if((isset($_SESSION['user']))){
  $query = 'SELECT * FROM questions ORDER BY lev ASC';
	$result = mysqli_query($con, $query);
	$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
}
if($_SESSION['question'.$_SESSION['user']]>=10){
  header('Location: finish.php');
}
function randomizeAnswers($question){
  $rand_arr = [];
  array_push($rand_arr, $question['correct']);
  array_push($rand_arr, $question['wrong1']);
  array_push($rand_arr, $question['wrong2']);
  array_push($rand_arr, $question['wrong3']);
  shuffle($rand_arr);
  return $rand_arr;
}
function getQuestion(&$level, $questions, &$used){
  $qlevel = [];
  $count = 0;
  while($count == 0){
    foreach($questions as $question){
        if($question['lev'] == $level && in_array($question['id'], $used) == false){    //If question is with given level and not used 
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

$tempLevel=$_SESSION['level'.$_SESSION['user']];
$currentID= getQuestion($tempLevel,$questions,$_SESSION['used'.$_SESSION['user']]);
array_push($_SESSION['used'.$_SESSION['user']],$currentID);
$_SESSION['level'.$_SESSION['user']] = $tempLevel;

//Get Question By ID
$query = 'SELECT * FROM questions WHERE id = '.$currentID;
$result = mysqli_query($con, $query);
$question = mysqli_fetch_assoc($result);
mysqli_free_result($result);

//Increment Number Of Question
$_SESSION['question'.$_SESSION['user']]++;
$answerArray=randomizeAnswers($question);
if(isset($_POST['submit'])){
  array_push($_SESSION['userAnswers'.$_SESSION['user']],$_POST['Answer']);
  if($_POST['Answer']==$question['correct']){
    $tempGrade = $_SESSION['grade'.$_SESSION['user']];
    $tempGrade+=$_SESSION['level'.$_SESSION['user']]*10;
    $_SESSION['grade'.$_SESSION['user']]=$tempGrade;
    $_SESSION['level'.$_SESSION['user']]++;
    header('Location: play.php?ques='.$_SESSION['question'.$_SESSION['user']]);
  }
}
?>
<div class="row justify-content-md-center">
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
        <!-- Center Column -->
        <div class="col-md-auto text-center">
          <h3><?php echo $question['body'];?></h3>
          <form method="POST">
          <div class="custom-controls-stacked">
              <?php foreach($answerArray as $answer):?>
              <label class="custom-control custom-radio">
                <input value="<?php echo $answer;?>" name="Answer" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"><?php echo $answer;?></span>
                </label>
              <?php endforeach;?>
            </div>
            <button type="submit" class="btn btn-outline-primary" value="submit" name="submit">הזן תשובה</button>
          </form>
        </div>
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
</div>
<?php include('includes/footer.php');?>