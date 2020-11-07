<?php 
 include('config/db_connect.php');

$email='';
$title='';
$ingredients='';

$errors=['email'=>'','title'=>'','ingredients'=>''];

 if(isset($_POST['submit'])){
 	// echo htmlspecialchars($_POST['email']);
 	// echo htmlspecialchars($_POST['title']);
 	// echo htmlspecialchars($_POST['ingridients']);

 	#Check email
  if(empty($_POST['email'])){
  	$errors['email']= "An email is required! <br>";
  }else{
  	$email=$_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    	$errors['email']= "Email must be a valid email address";
    }
  };

 #Check Title field
if(empty($_POST['title'])){
  $errors['title']="A title is required! <br>";
  }else{
  	$title= $_POST['title'];
  	if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
  		$errors['title']='Title must be letters and spaces only.';
  	}
  };

 #Check Ingiridients
if(empty($_POST['ingredients'])){
  $errors['ingredients']="Ingredients are required separated by comma! <br>";
  }else{
  	$ingredients=$_POST['ingredients'];
  	if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
  		$errors['ingredients']='Ingredients must be a comma separated list';
  	}
  }


#check if there are any errors before redirecting

  if(array_filter($errors)){
  	// echo "THere are errors in a form";
  }else{

    // escaping mysql injection attacks
   // $email =mysqli_real_escape_string($conn,$_POST['email']);
   // $title =mysqli_real_escape_string($conn,$_POST['title']);
   // $ingredients =mysqli_real_escape_string($conn,$_POST['ingredients']);

   // //create sql string

   // $sql ='INSERT INTO pizzas(title, email, ingredients) VALUES($)';

   // // save to db and check

   // if(mysqli_query($conn,$sql)){
   //  // success and redirect user back to the home page
   //    header('location:index.php');
   // }else{
   //  //error

   //  echo "query error".mysqli_error($conn);
   // }

    // Escape user inputs for security
$email = mysqli_real_escape_string($conn, $_POST['email']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
 
// Attempt insert query execution
$sql = "INSERT INTO pizzas (email, title, ingredients) VALUES ('$email', '$title', '$ingredients')";

if(mysqli_query($conn, $sql)){
    //echo "Records added successfully.";
  header('location:index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

  	// echo 'form is valid';
#code to redirect user to the different page
  
  }

 }// End of POST check

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>

 <section class="container grey-text">
 	<h4 class="center">Add a Pizza</h4>
 	<form class="white" action="add.php" method="POST">
 		<label>Your Email</label>
 		<input type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
 		<div class="red-text">
 		 <?php echo $errors['email']?>
 		</div>
 		<label>Pizza Title</label>
 		<input type="text" name="title" value="<?php echo htmlspecialchars($title);?>">
 		<div class="red-text">
 		<?php echo $errors['title']?>
 		</div>
 		<label>Ingredients(comma separated)</label>
 		<input type="text" name="ingredients"  value="<?php echo htmlspecialchars($ingredients);?>">
 		<div class="red-text">
 		<?php echo $errors['ingredients']?>
 		</div>
 		<div class="center">
 			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
 		</div>
 	</form>
 </section>



<?php include('templates/footer.php');?>

</html>

