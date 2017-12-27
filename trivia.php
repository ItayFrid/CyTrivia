<?php include('includes/header.php');
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
  $_SESSION['questions'.$_SESSION['user']]=generateQuestions(); // Random Question Array By lvl
  $_SESSION['userAnswers'.$_SESSION['user']]=array();   //Array Of User's Answers
  $_SESSION['correctAnswers'.$_SESSION['user']]=array();//Array Of correct Answers
  $_SESSION['ScorePerAnswer'.$_SESSION['user']]=array();//Array Of Score Per Answer
  $_SESSION['TimePerAnswer'.$_SESSION['user']]=array();
  //Get Question From DB By ID
$query = 'SELECT * FROM users WHERE id = '.$_SESSION['user'];
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
<div class="container text-center">
        <?php if(!(isset($_SESSION['user']))):?>
        <h4 class="text-danger">עליך להתחבר</h4>
        <?php else:?>
                <?php if($user['score']==-1):?>
                <br>
                <h1>גאוני סייבר יקרים,</h1><br><br>
<h7>
ברוכים הבאים לחידון הסייבר הגדול של אומת הסטרטאפ הישראלי! <br>
כחלק מיוזמה לקידום ועידוד חינוך טכנולוגי החלטנו לערוך תחרות בניכם , גאוני הסייבר. <br>
המטרה שלכם היא כמובן לקבל תוצאה מושלמת ואל תחשבו שזה הולך להיות קל ופשוט. <br>
לפניכם 10 שאלות ידע בנושא סייבר שיבדקו מה אתם באמת יודעים! <br>
המטרה שלנו היא לבחור את הטובים מבניכם שיצטרפו אלינו כחברים באומה ויזכו במלגה שווה במיוחד!
 <br>
 <br>
 <br>
 
במהלך המשחק יוצגו לכם 10 שאלות ברמת קושי שתתחיל מהרמה הבסיסית ביותר<br>
ושתעלה לאחר מענה נכון ברמה הנוכחית או לאחר מענה תשובות לא נכונות על כל השאלות מהרמה הנוכחית. <br>
קיימות 10 רמות קושי שונות , ניקוד של תשובה נכונה עולה בהתאם לרמה ויחס לזמן המענה. <br>
כל חבר יכול להשתתף בתחרות פעם אחת בלבד ! <br>
<b> בהצלחה!</b>
                </h7><br><br>
                <a href="play.php" class="btn btn-primary">התחל בטריוויה</a>

                <?php else:?>
                <h3 class="text-danger">כבר השתתפת בטריוויה</h3>
                <?php endif;?>
        <?php endif;?>
</div>
        <?php include('includes/footer.php');?>
