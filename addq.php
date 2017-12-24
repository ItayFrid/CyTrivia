<?php
include('includes/header.php');
if(isset($_POST['submit'])){
    $level = mysqli_real_escape_string($con, $_POST['level']);
    $body = mysqli_real_escape_string($con, $_POST['body']);
    $correct = mysqli_real_escape_string($con, $_POST['correct']);
    $wrong1 = mysqli_real_escape_string($con, $_POST['wrong1']);
    $wrong2 = mysqli_real_escape_string($con, $_POST['wrong2']);
    $wrong3 = mysqli_real_escape_string($con, $_POST['wrong3']);

    $query = "INSERT INTO questions(lev, body, correct, wrong1, wrong2, wrong3)
            VALUES('$level', '$body', '$correct', '$wrong1', '$wrong2', '$wrong3')";

    if(mysqli_query($con, $query)){
        header('Location: qinterface.php');
    }
    else{
        echo 'ERROR: '. mysqli_error($con);
    }
}
?>

		<div class="container">
            <h1>Add</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?> ">
                <div class="form-group">
                    <label>Level</label>
                        <select name ="level">
                            <option value="">Select level</option>
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
                    <label>Question</label>
                    <textarea name="body" name="body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Correct answer</label>
                    <textarea name="correct" name="correct" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 1</label>
                    <textarea name="wrong1" name="wrong1" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 2</label>
                    <textarea name="wrong2" name="wrong2" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 3</label>
                    <textarea name="wrong3" name="wrong3" class="form-control"></textarea>
                </div>

                <input type ="submit" name="submit" value="Add question" class="btn btn-primary">
                <a href="qinterface.php" class = "btn btn-primary">Back</a>
                <br></br>
            </form>
        </div>
        <?php include('includes/footer.php'); ?>