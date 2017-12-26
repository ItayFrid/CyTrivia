<?php
include('includes/header.php');
if(isset($_POST['submit'])){
    $level = mysqli_real_escape_string($con, $_POST['level']);
    $body = mysqli_real_escape_string($con, $_POST['body']);
    $correct = mysqli_real_escape_string($con, $_POST['correct']);
    $wrong1 = mysqli_real_escape_string($con, $_POST['wrong1']);
    $wrong2 = mysqli_real_escape_string($con, $_POST['wrong2']);
    $wrong3 = mysqli_real_escape_string($con, $_POST['wrong3']);

    $user = mysqli_real_escape_string($con, $_POST['author']);
	$res=mysqli_query($con, "SELECT * FROM admins_editors WHERE id='$user'");
    $row=mysqli_fetch_array($res);
    $author= $row['full_name'];
    $query = "INSERT INTO questions(lev, body, correct, wrong1, wrong2, wrong3, author)
            VALUES('$level', '$body', '$correct', '$wrong1', '$wrong2', '$wrong3', '$author')";

    if(mysqli_query($con, $query)){
        header('Location: qinterface.php');
    }
    else{
        echo 'ERROR: '. mysqli_error($con);
    }
}
?>

		<div class="container text-center">
            <h1>הוסף שאלה</h1>
            <hr>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="needs-validation" novalidate>
                <div class="form-group">
                    <label>רמת שאלה:</label>
                    <select name ="level" class="custom-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                </div>

                <div class="form-group">
                    <label>גוף השאלה</label>
                    <textarea name="body" name="body" class="form-control text-left" required></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-success">תשובה נכונה</label>
                    <textarea name="correct" name="correct" class="form-control text-left" required></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 1</label>
                    <textarea name="wrong1" name="wrong1" class="form-control text-left" required></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 2</label>
                    <textarea name="wrong2" name="wrong2" class="form-control text-left" required></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>

                <div class="form-group">
                    <label class="text-danger">תשובה שגויה 3</label>
                    <textarea name="wrong3" name="wrong3" class="form-control text-left" required></textarea>
                    <div class="invalid-feedback">שדה חובה</div>
                </div>
                <input type ="hidden" name = "author" value = "<?php echo $_SESSION['user']; ?>">
                <input type ="submit" name="submit" value="הוסף שאלה" class="btn btn-success">
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