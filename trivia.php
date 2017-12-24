<?php include('includes/header.php');

  $_SESSION['grade'.$_SESSION['user']]=0;
  $_SESSION['level'.$_SESSION['user']]=1;
  $_SESSION['question'.$_SESSION['user']]=1;
  $_SESSION['userAnswers'.$_SESSION['user']]=array();
  $_SESSION['used'.$_SESSION['user']]=array();

?>

<div class="row justify-content-md-center">
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
        <!-- Center Column -->
        <div class="col-md-auto text-center">
        <?php if(!(isset($_SESSION['user']))):?>
        <h4 class="text-danger">עליך להתחבר</h4>
<?php else:?>
        <a href="play.php?ques=1">התחל בטריוויה</a>
<?php endif;?>
        </div>
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
</div>
        <?php include('includes/footer.php');?>
