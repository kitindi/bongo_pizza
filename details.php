<?php
//check GET request id param
include('config/db_connect.php');

if(isset($_POST['delete'])){
	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$sql ="DELETE FROM pizzas WHERE id=$id_to_delete";

	if(mysqli_query($conn, $sql)){
		header('Location:index.php');
		// echo "Success";
	}else{
		echo "query error".mysql_error($conn);
	}
}

if(isset($_GET['id'])){

	$id=mysqli_real_escape_string($conn,$_GET['id']);

	//make sql

	$sql = "SELECT * FROM pizzas WHERE id=$id";

	//get the query results

	$result = mysqli_query($conn, $sql);

	//fetch result in single assoc array

	$pizza =mysqli_fetch_assoc($result);

	// print_r($pizza);

}


?>
<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container center">
	
<?php if($pizza): ?>
	<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
	<p>Created by:<?php echo htmlspecialchars($pizza['email']); ?></p>
	<p><?php echo date($pizza['created_at']); ?></p>
	<h5>Ingredients</h5>
	<p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

	<!-- Delete Form -->
	<form action="details.php" method="POST">
		<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'];?>">
		<input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
	</form>
<?php else: ?>
	<h5>There is no such pizza</h5>
<?php endif; ?>

</div>
<?php include('templates/footer.php'); ?>
</body>
</html>