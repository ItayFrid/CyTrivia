<?php
include('includes/header.php');
if(!isset($_SESSION['admin'])){
	header("Location: index.php");
}
	$query = 'SELECT * FROM admins_editors ORDER BY id ASC';
	$result = mysqli_query($con, $query);
	$admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	if(isset($_POST['delete'])){
		$delete_id = mysqli_real_escape_string($con, $_POST['delete_id']);
		$query = "DELETE FROM admins_editors WHERE id = {$delete_id}";
		if(mysqli_query($con, $query)){
			header('Location: showAdmin.php');
		}
		else{
			echo 'ERROR: '. mysqli_error($con);
		}
	}
?>
<div class="container text-center">
	<h1 class="display-3">תצוגת מנהלים</h1>
		<hr>
	<div class="row">
		<div class="col-sm-2"></div>
    <div class="col-sm-8">
      <table class="table table-dark table-hover">
        <thead class="thead-light"> 
          <tr>
            <th scope="col">#</th>
            <th scope="col">שם משתמש</th>
            <th scope="col">שם מלא</th>
            <th scope="col">מנהל\עורך</th>
            <th scope="col">ערוך\מחק</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($admins as $user) : ?>
          <tr>
            <th scope="row"><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['full_name'];?></td>
            <td><?php if(!$user['admin_or_editor']){echo 'עורך';} else {echo 'מנהל';} ?></td>
            <td>
              <input type="submit" value="מחק" class="btn btn-outline-danger btn-sm" data-target="#confirmDelete<?php echo $user['id']; ?>" data-toggle="modal">
            </td>
          </tr>

          <div class="modal fade" id="confirmDelete<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  אשר מחיקת מנהל
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-default" data-dismiss="modal">ביטול</button>
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
                    <input type="submit" name="delete" value="מחק" class="btn btn-danger bt-ok">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-sm-2"></div>
<?php include('includes/footer.php');?>