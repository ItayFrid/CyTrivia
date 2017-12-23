<?php
//require('qdb.php');
define('ROOT_URL', 'http://localhost:8080');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'ioigives2409');
define('DB_NAME', 'questionsdb');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()){
	echo 'Failed to connect to data base';
}	
if(isset($_POST['delete'])){
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM questions WHERE id = {$delete_id}";

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
			<title>Questions data base</title>
			<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
		</head>
	<body>
		<h1>Questions</h1>
			<div class="well">
				<h3><?php echo $question['id']; ?></h3>
				<small>Created on <?php echo $question['created']; ?> by
				<?php echo $question['author']; ?></small>
				<p><?php echo $question['body']; ?></p>
                <?php echo "Correct answer:"?>
                <p><?php echo $question['correct']; ?></p>
                <?php echo "Wrong answers:"?><br></br>
                <p><?php echo $question['wrong1']; ?></p>
                <p><?php echo $question['wrong2']; ?></p>
                <p><?php echo $question['wrong3']; ?></p>
                <hr>
                <a href="editq.php?id=<?php echo $question['id']; ?>"class = "btn btn-default">Edit</a>
                <hr>
                <form class = "pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="delete_id" value="<?php echo $question['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
                <a href="qinterface.php" class = "btn btn-default">Back</a>
			</div>
	</body>
</html>