<?php
define('ROOT_URL', 'http://localhost:8080');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'ioigives2409');
define('DB_NAME', 'questionsdb');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()){
	echo 'Failed to connect to data base';
}	
if(isset($_POST['submit'])){
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $correct = mysqli_real_escape_string($conn, $_POST['correct']);
    $wrong1 = mysqli_real_escape_string($conn, $_POST['wrong1']);
    $wrong2 = mysqli_real_escape_string($conn, $_POST['wrong2']);
    $wrong3 = mysqli_real_escape_string($conn, $_POST['wrong3']);

    $query = "UPDATE questions SET
                lev = '$level',
                body = '$body',
                correct = '$correct',
                wrong1 = '$wrong1',
                wrong2 = '$wrong2',
                wrong3 = '$wrong3'
                WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)){
        header('Location: qinterface.php');
    }
    else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = 'SELECT * FROM questions WHERE id = '.$id;

$result = mysqli_query($conn, $query);

$question = mysqli_fetch_assoc($result);


mysqli_free_result($result);

mysqli_close($conn);


?>


<!DOCTYPE html>
	<html>
		<head>
			<title>Edit Question</title>
			<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
		</head>
	<body>
		<div class="container">
            <h1>Edit question #<?php echo $question['id']?></h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?> ">
                <div class="form-group">
                    <label>Level</label>
                        <select name ="level">
                            <option value=""><?php echo $question['lev'];?></option>
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
                    <textarea name="body" name="body" class="form-control"><?php echo $question['body'];?></textarea>
                </div>

                <div class="form-group">
                    <label>Correct answer</label>
                    <textarea name="correct" name="correct" class="form-control"> <?php echo $question['correct'];?></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 1</label>
                    <textarea name="wrong1" name="wrong1" class="form-control"><?php echo $question['wrong1'];?></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 2</label>
                    <textarea name="wrong2" name="wrong2" class="form-control"><?php echo $question['wrong2'];?></textarea>
                </div>

                <div class="form-group">
                    <label>Wrong answer 3</label>
                    <textarea name="wrong3" name="wrong3" class="form-control"><?php echo $question['wrong3'];?></textarea>
                </div>
                <input type ="hidden" name = "update_id" value = "<?php echo $question['id']; ?>">
                <input type ="submit" name="submit" value="Submit" class="btn btn-primary">
                <a href="qinterface.php" class = "btn btn-primary">Back</a>
                <br></br>
            </form>
        </div>
	</body>
</html>