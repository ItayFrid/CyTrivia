<?php
include('includes/header.php');
include('quit.php');
$query='';

if(isset($_SESSION['user'])){
  $res=mysqli_query($con, "SELECT * FROM users WHERE id=".$_SESSION['user']);
  $user=mysqli_fetch_assoc($res);
  mysqli_free_result($res);
  $id=$_SESSION['user'];
}
elseif(isset($_SESSION['admin'])){
  $res=mysqli_query($con, "SELECT * FROM admins_editors WHERE id=".$_SESSION['admin']);
  $user=mysqli_fetch_assoc($res);
  mysqli_free_result($res);
  $id=$_SESSION['admin'];
} else{
  header("Location: index.php");
}
if(isset($_POST['change'])){
  $newName = $_POST['fullName'];
  if(isset($_SESSION['user'])){
    $query = "UPDATE users SET full_name = '$newName' WHERE id = {$id}";
  }
  if(isset($_SESSION['admin'])){
    $query = "UPDATE admins_editors SET full_name = '$newName' WHERE id = {$id}";
  }
}
?>
<?php if((isset($_SESSION['user']) || isset($_SESSION['admin'])) && isset($_POST['change'])):?>
<?php if(mysqli_query($con, $query)):?>
<div class="alert alert-success alert-dismissible fade show" role="alert" id="scoreAlert">
	<div class="row">
		<div class="col text-right">
		הפרטים עודכנו <strong>בהצלחה</strong>.
		</div>
		<div class="col text-left">
		<a href="" class="alert-link" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
		</div>
	</div>
</div>
<?php endif;?>
<?php endif;?>
<div class="container text-center">
  <h1 class="display-4">עריכת פרופיל</h1>
  <hr>
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <form action="" method="post" id="needs-validation" novalidate>
        <div class="form-group">
          <div class="input-group input-group-lg">
            <span class="input-group-addon" id="username-addon">
              <i class="far fa-user" aria-hidden="true"></i>
            </span>
            <input type="text" name="username" class="form-control" placeholder="<?php echo $user['username'];?>" aria-describedby="username-addon" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group input-group-lg">
            <span class="input-group-addon" id="fullName-addon">
              <i class="fas fa-user-circle" aria-hidden="true"></i>
            </span>
            <input type="text" name="fullName" class="form-control" value ="<?php echo $user['full_name'];?>" aria-describedby="fullName-addon" autocomplete="off" required> 
          </div>
        </div>
        <button type="submit" class="btn btn-outline-info" value="change" name="change">שנה פרטים</button>
      </form>
    </div>
    <div class="col"></div>
  </div>  <!-- End Row -->
</div>    <!--End Container -->
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