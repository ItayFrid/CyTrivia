<?php
//require('qdb.php');
define('ROOT_URL', 'http://localhost:8080');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '12345');
define('DB_NAME', 'cytrivia');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()){
	echo 'Failed to connect to data base';
}	
if(isset($_POST['submit'])){
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $correct = mysqli_real_escape_string($conn, $_POST['correct']);
    $wrong1 = mysqli_real_escape_string($conn, $_POST['wrong1']);
    $wrong2 = mysqli_real_escape_string($conn, $_POST['wrong2']);
    $wrong3 = mysqli_real_escape_string($conn, $_POST['wrong3']);

    $query = "INSERT INTO questions(lev, body, correct, wrong1, wrong2, wrong3)
            VALUES('$level', '$body', '$correct', '$wrong1', '$wrong2', '$wrong3')";

    if(mysqli_query($conn, $query)){
        header('Location: qinterface.php');
    }
    else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}






?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Add new question</title>
			<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
		</head>
	<body>
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
	</body>
</html>