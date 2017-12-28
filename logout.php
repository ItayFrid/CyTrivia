<?php 
include('includes/header.php');
include('quit.php');
if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
  unset($_SESSION['user']);
  unset($_SESSION['admin']);
}
 ?>
    <div class="container text-center">
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col col-lg-2"></div>
            <div class="col-md-auto">
              <h4 class="text-success">התנתקת בהצלחה</h4>
              לחזרה לדף הבית לחץ <a href="index.php">כאן</a>
            </div>
            <div class="col col-lg-2"></div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>