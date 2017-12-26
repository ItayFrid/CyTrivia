<?php 
include('includes/header.php');
$query = 'SELECT * FROM users ORDER BY score DESC';
$result = mysqli_query($con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
$today = date('Y-m-d');
?>

<!-- Body -->

<div class="container text-center">
    <h1 class="display-3">הזוכים היומיים</h1>
    <hr>
    <div class="row">
    <!-- Right Column -->
        <div class="col-sm"></div>
        <!-- Center Column -->
        <div class="col-sm">
            <?php if(isset($_SESSION['user'])): ?>
            <table class="table table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="row">#</th>
                        <th>שם</th>
                        <th>תוצאה</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; $played = false; ?>
                    <?php foreach($users as $user): ?>
                    <?php if($user['date_played'] == $today) {$played = true;} ?>
                    <?php if($played == true): ?>
                    <tr class= <?php

                    if($i == 1){
                        echo "table-success";
                    }
                    elseif($i == 2){
                        echo "table-warning";
                    }
                    elseif($i == 3){
                        echo "table-danger";
                    }
                        ?>>
                        <?php ?>
                    <th scope="row"><?php echo $i; ?></td>
                        <td><?php if($played == true) {echo $user['full_name'];} ?></td>
                        <td><?php if($played == true) {echo $user['score'];} ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php
                    if($played == true) {
                    $i++;
                    }
                    $played = false;
                    ?>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else: ?>
            <h4 class="text-danger">לצפייה בזוכים היומיים עליך להתחבר</h3>
            <?php endif; ?>
        </div>
        <!-- Left Column -->
        <div class="col-sm"></div>
    </div>
</div>
<?php include('includes/footer.php');?>