<?php
include('includes/header.php');
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
if(isset($_POST['submit'])){
    $update_id = mysqli_real_escape_string($con, $_POST['update_id']);
    $level = mysqli_real_escape_string($con, $_POST['level']);
    $body = mysqli_real_escape_string($con, $_POST['body']);
    $correct = mysqli_real_escape_string($con, $_POST['correct']);
    $wrong1 = mysqli_real_escape_string($con, $_POST['wrong1']);
    $wrong2 = mysqli_real_escape_string($con, $_POST['wrong2']);
    $wrong3 = mysqli_real_escape_string($con, $_POST['wrong3']);

    $user = mysqli_real_escape_string($con, $_POST['editor']);
	$res=mysqli_query($con, "SELECT * FROM admins_editors WHERE id='$user'");
    $row=mysqli_fetch_array($res);
    $editor= $row['full_name'];
    $query = "UPDATE questions SET
                lev = '$level',
                body = '$body',
                correct = '$correct',
                wrong1 = '$wrong1',
                wrong2 = '$wrong2',
                wrong3 = '$wrong3',
                edit  = '$editor'
                WHERE id = {$update_id}";

    if(mysqli_query($con, $query)){
        header('Location: qinterface.php');
    }
    else{
        echo 'ERROR: '. mysqli_error($con);
    }


}
$id = mysqli_real_escape_string($con, $_GET['id']);
$query = 'SELECT * FROM questions WHERE id = '.$id;
$result = mysqli_query($con, $query);
$question = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
		<div class="container text-center">
            <h1>ערוך שאלה מס' <?php echo $question['id']?></h1>
            <hr>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="needs-validation" novalidate>
                <div class="form-group">
                    <label>רמת שאלה:</label>
                        <select name ="level" class="custom-select">
                            <?php for($i=1;$i<=10;$i++):?>
                            <option value="<?php echo $i;?>" <?php if($question['lev']==$i){echo 'selected';} ?>><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                </div>

                <div class="form-group">
                    <label>גוף השאלה</label>
                    <textarea name="body" name="body" class="form-control text-left" required><?php echo $question['body'];?></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-success">תשובה נכונה</label>
                    <textarea name="correct" name="correct" class="form-control text-left" required><?php echo $question['correct'];?></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 1</label>
                    <textarea name="wrong1" name="wrong1" class="form-control text-left" required><?php echo $question['wrong1'];?></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 2</label>
                    <textarea name="wrong2" name="wrong2" class="form-control text-left" required><?php echo $question['wrong2'];?></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 3</label>
                    <textarea name="wrong3" name="wrong3" class="form-control text-left" required><?php echo $question['wrong3'];?></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>
                <input type ="hidden" name = "update_id" value = "<?php echo $question['id']; ?>">
                <input type ="hidden" name = "editor" value = "<?php echo $_SESSION['admin']; ?>">
                <input type ="submit" name="submit" value="שנה שאלה" class="btn btn-success">
                <a href="qinterface.php" class = "btn btn-danger">חזרה</a>
                <br></br>
            </form>
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
<?php include('includes/footer.php'); ?>