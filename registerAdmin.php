<?php
include('includes/header.php');
$msg='';
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $fullName = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $editor = mysqli_real_escape_string($con, $_POST['editor']);
    if(mysqli_query($con, "INSERT INTO admins_editors(username,full_name,password,admin_or_editor) VALUES('".$username."','".$fullName."','".$password."','".$editor."')"))
    {
        $msg = 'משתמש נוסף בהצלחה.';
    }
    else{
        $msg = 'בעיה בהרשמה';
    }
}

?>

<div class="container text-center">
    <h1 class="display-3">הוספת מנהל</h1>
    <br><br>
    <div class="row justify-content-md-center">
        <!-- Right Column -->
        <div class="col col-lg-4"></div>
        <!-- Center Column -->
        <div class="col-md-auto">
            <form action="" method="post" id="needs-validation" novalidate>
                <div class="form-group text-center">
                    <div class="input-group-md">
                        <label for="username" class="control-label">שם משתמש</label>
                        <input type="text" name="username" id="username" autocomplete="off" class="form-control" placeholder="שם משתמש" required>
                        <div class="invalid-feedback">
                           חובה להזין שם משתמש.
                        </div>
                    </div>
                    <div class="input-group-md">
                        <label for="password">סיסמא</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="סיסמא" required>
                        <div class="invalid-feedback">
                           חובה להזין סיסמא.
                        </div>
                    </div>
                    <div class="input-group-md">
                    <label for="name">שם פרטי ושם משפחה</label>
                        <input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="שם מלא" required>
                        <div class="invalid-feedback">
                           חובה להזין שם מלא.
                        </div>
                    </div>
                    <div class="input-group-md">
                    <label for="editor">בחירת סוג</label>
                      <select multiple class="form-control" name="editor" id="editor" required>
                        <option value="0">עורך תוכן</option>
                        <option value="1">מנהל</option>
                      </select>
                      <div class="invalid-feedback">
                           חובה לבחור סוג משתמש.
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary" value="register" name="register">הרשם</button>
            </form>
        </div>
        <!-- Left Column -->
        <div class="col col-lg-4 text-right">
            <p>
                <?php echo $msg;?>
            </p>
        </div>
    </div>
</div>
<script>
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
<?php include('includes/footer.php');?>


                    <!-- <div class="input-group-md">
                        <label for="password">סיסמא</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="סיסמא" aria-describedby="passHelp">
                        <small id="passHelp" class="form-text text-muted">נא להכניס לפחות 6 תווים</small>
                    </div>
                    <div class="input-group-md">
                        <label for="password_again">חזור על הסיסמא</label>
                        <input type="password" name="password_again" id="password_again" class="form-control" placeholder="חזור על הסיסמא">
                    </div> -->