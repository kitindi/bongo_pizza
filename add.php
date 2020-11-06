<?php 
  //check if form has data to be sent to the server

// if(isset($_GET['submit'])){
// 	echo $_GET['email'];
// 	echo $_GET['title'];
// 	echo $_GET['ingridients'];

// }
// using htmlspecialchars prevents XSS (Cross Sites Scripting) attacks!

if(isset($_POST['submit'])){
// 	echo htmlspecialchars($_POST['email']);
// 	echo htmlspecialchars($_POST['title']);
// 	echo htmlspecialchars($_POST['ingridients']);
// }

## Basic Validation_1
//check email 
	if(empty($_POST['email'])){
		echo "An email is required<br>";
	}else{
		echo htmlspecialchars($_POST['email']);
	}

	//check title

	if(empty($_POST['title'])){
		echo "A title is required <br>";
	}else{
		echo htmlspecialchars($_POST['email']);
	}
	// ckeck ingridients
	if(empty($_POST['ingridients'])){
		echo "At least one ingridient is required<br>";
	}else{
		echo htmlspecialchars($_POST['email']);
	}
//  end of POST checks
}

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>

 <section class="container grey-text">
 	<h4 class="center">Add a Pizza</h4>
 	<form class="white" action="add.php" method="POST">
 		<label>Your Email</label>
 		<input type="text" name="email">
 		<label>Pizza Title</label>
 		<input type="text" name="title">
 		<label>Ingridients(comma separated)</label>
 		<input type="text" name="ingridients">
 		<div class="center">
 			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
 		</div>
 	</form>
 </section>



<?php include('templates/footer.php');?>

</html>

