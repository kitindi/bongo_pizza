<?php
//check GET request id param
include('config/db_connect.php');

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
<?php else: ?>
	<h5>There is no such pizza</h5>
<?php endif; ?>

</div>
<?php include('templates/footer.php'); ?>
</body>
</html>