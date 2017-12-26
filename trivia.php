<?php include('includes/header.php');
include('functions/triviaFunctions.php');
// Creating Session Variables
  $_SESSION['grade'.$_SESSION['user']]=0;               //The user's grade
  $_SESSION['level'.$_SESSION['user']]=1;               //current question level
  $_SESSION['question'.$_SESSION['user']]=1;            //Number Of Question player answered
  $_SESSION['questions'.$_SESSION['user']]=generateQuestions(); // Random Question Array By lvl
  $_SESSION['userAnswers'.$_SESSION['user']]=array();   //Array Of User's Answers
  $_SESSION['correctAnswers'.$_SESSION['user']]=array();//Array Of correct Answers
  $_SESSION['ScorePerAnswer'.$_SESSION['user']]=array();//Array Of Score Per Answer
  //Get Question From DB By ID
$query = 'SELECT * FROM users WHERE id = '.$_SESSION['user'];
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>

<div class="row justify-content-md-center">
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
        <!-- Center Column -->
        <div class="col-md-auto text-center">
        <?php if(!(isset($_SESSION['user']))):?>
        <h4 class="text-danger">עליך להתחבר</h4>
        <?php else:?>
                <?php if($user['score']==-1):?>
                <a href="play.php">התחל בטריוויה</a>
                <?php else:?>
                <h3 class="text-danger">כבר השתתפת בטריוויה</h3>
                <?php endif;?>
        <?php endif;?>

        </div>
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
</div>
        <?php include('includes/footer.php');?>
