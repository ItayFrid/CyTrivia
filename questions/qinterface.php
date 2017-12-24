<?php

include('includes/header.php');
if(mysqli_connect_errno()){
	echo 'Failed to connect to data base';
}	
	$query = 'SELECT * FROM questions';

	$result = mysqli_query($con, $query);

	$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);


	mysqli_free_result($result);

?>

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
<?php include('../includes/footer.php');?>