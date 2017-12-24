<?php
include('includes/header.php');
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
    $id = mysqli_real_escape_string($con, $_GET['id']);
	$query = 'SELECT * FROM questions WHERE id = '.$id;
	$result = mysqli_query($con, $query);
	$question = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
?>
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
include('includes/footer.php');