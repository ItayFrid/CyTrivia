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
	$query = 'SELECT * FROM questions';

	$result = mysqli_query($conn, $query);

	$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
        <hr>
        <a href="addq.php"class = "btn btn-default">Add Question</a>
		<?php foreach($questions as $question) : ?>
			<div class="well">
				<h3><?php echo $question['id']; ?></h3>
				<small>Created on <?php echo $question['created']; ?> by
				<?php echo $question['author']; ?></small>
				<p><?php echo $question['body']; ?></p>
                <hr>
				<a href="question.php?id=<?php echo $question['id']; ?>"class = "btn btn-default">Read More</a>
			</div>
		<?php endforeach; ?>
	</body>
</html>