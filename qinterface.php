<?php
include('includes/header.php');
	$query = 'SELECT * FROM questions ORDER BY lev ASC';
	$result = mysqli_query($con, $query);
	$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	if(isset($_POST['delete'])){
		$delete_id = mysqli_real_escape_string($con, $_POST['delete_id']);
		$query = "DELETE FROM questions WHERE id = {$delete_id}";
		if(mysqli_query($con, $query)){
			header('Location: qinterface.php');
		}
		else{
			echo 'ERROR: '. mysqli_error($con);
		}
	}
?>
<div class="container text-center">
	<h1 class="display-3">ממשק עורכי אתר</h1>
		<hr>
		<p class="text-center">
			<a href="addq.php" class="btn btn-primary" rol="button">הוסף שאלה</a>
		</p>
	<div class="row">
		
		<table class="table table-dark table-hover">
			<thead class="thead-light"> 
				<tr>
					<th scope="col">רמת השאלה</th>
					<th scope="col">שאלה</th>
					<th scope="col">נוצר בתאריך</th>
					<th scope="col">מחבר</th>
					<th scope="col">נערך לאחרונה ע"י</th>
					<th scope="col">ערוך\מחק</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($questions as $question) : ?>
				<tr>
					<th scope="row"><?php echo $question['lev']; ?></td>
					<td><?php echo $question['body']; ?></td>
					<td><?php echo $question['created'];?></td>
					<td><?php echo $question['author']; ?></td>
					<td><?php if($question['edit']==null){echo '-';} else{echo $question['edit'];} ?></th>
					<td>
					<div clas="inline">
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<a href="editq.php?id=<?php echo $question['id']; ?>" class="btn btn-outline-warning btn-sm" role="button">ערוך</a>
							<input type="hidden" name="delete_id" value="<?php echo $question['id']; ?>">
							<input type="submit" name="delete" value="מחק" class="btn btn-outline-danger btn-sm">
						</form>
					</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
			
	</div>
	<a href="addq.php" class="btn btn-primary" rol="button">הוסף שאלה</a>
</div>

<?php include('includes/footer.php');?>