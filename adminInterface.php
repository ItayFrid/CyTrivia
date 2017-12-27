<?php
include('includes/header.php');
if(isset($_SESSION['admin']))
{
  // Getting All Users
  $query = 'SELECT * FROM users ORDER BY score DESC';
	$result = mysqli_query($con, $query);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);

  $resAdmin=mysqli_query($con, "SELECT * FROM admins_editors WHERE id=".$_SESSION['admin']);
   $adminRow=mysqli_fetch_assoc($resAdmin);
   mysqli_free_result($resAdmin);
}
  ?>
<?php if(!(isset($_SESSION['admin']) &&
 isset($adminRow['admin_or_editor']) &&
  $adminRow['admin_or_editor']==1)):?>
  <!-- User is not Admin Or Not Logged In -->
  <div class="text-center">
    <h3 class="text-danger">אין לך גישה לדף זה</h3>
  </div>
<?php else:?>
<!-- User Is Admin -->
<div class="container text-center">
        <h1 class="display-3">ממשק מנהל</h1>
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col-sm-3"></div>
            <div class="col-lg">
                <h3 class="text-success">10 המשתתפים הטובים ביותר</h3>
                <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <td scope="row">#</td>
                      <td>שם</td>
                      <td>תאריך</td>
                      <td>תוצאה</td>
                    </tr>
                  </thead>
                  <?php $i = 1;?>
                  <?php foreach($users as $user):?>
                  <?php $played = false;?>
                  <?php if($i<=10 && $user['score']!=-1) {$played = true;} ?>
                  <?php if($played == true):?>
                  <tr class="<?php if($i==1){echo 'table-success';}
                  elseif($i==2){echo 'table-warning';}
                  elseif($i==3){echo 'table-danger';}?>">
                    <th scope="row"><?php echo $i;?></td>
                        <td><?php echo $user['full_name']; ?></td>
                        <td><?php $d=date("d/m/Y", strtotime($user['date_played']));
                        echo $d; ?></td>
                        <td><?php echo $user['score'];?></td>
                  </tr>
                  <?php endif;?>
                  <?php $i++;endforeach;?>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
<?php endif;?>