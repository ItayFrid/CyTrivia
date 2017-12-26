<?php
include('includes/header.php');
$err='';

if(isset($_POST['userLogin'])){
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $res=mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
  $row=mysqli_fetch_array($res);
  if($row['username']==$username)
  {
    
    $_SESSION['user'] = $row['id'];
    header("Location: index.php");
  }
  else{
    $err='שם משתמש לא נכון';
}
}
?>
<div class="container text-center">
    <h1 class="display-3">התחברות לאתר</h1>
    <br><br>
    <div class="row">
        <br><br>
        <div class="col-sm"></div>
        <div class="col-sm">
            <form method="post">
                <div class="form-group text-center">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="שם משתמש" autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary" name="userLogin">התחבר</button><br>
                <small>אם אינך רשום לחץ <a href="register.php">כאן</a> כדי להירשם</small>
                <br>
                <small class="text-danger"><?php echo $err;?></small>
            </form>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
<?php include('includes/footer.php');?>