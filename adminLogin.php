<?php include('includes/header.php');
$err='';    

if(isset($_POST['adminLogin']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$res=mysqli_query($con, "SELECT * FROM admins_editors WHERE username='$username'");
	$row=mysqli_fetch_array($res);
	if($row['password']== $password)
	{
		$_SESSION['admin'] = $row['id'];
		header("Location: index.php");
	}
	else
	{
        $err = "שם משתמש או סיסמא שגויים";
	}
}
?>
<div class="container text-center">
    <h1 class="display-3">התחברות מנהלים</h1>
    <br><br>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <form method="post">
                <div class="form-group text-center">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="username-addon">
                            <i class="far fa-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="שם משתמש" aria-describedby="username-addon" autocomplete="off">
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="password-addon">
                            <i class="fas fa-key" aria-hidden="true"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="סיסמא" aria-describedby="password-addon">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary" name="adminLogin">התחבר</button><br>
                <small class="text-danger"><?php echo $err; ?></small>
            </form>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
<?php include('includes/footer.php');?>