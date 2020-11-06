<?php 
//MySQLi or PDO{PHP Data Objects}
//connect to database using mysqli(databasehost, username,password, databasename)

$conn =mysqli_connect('localhost','bongo','bongo123','bongo_pizza');

//check the connection

if(!$conn){
 echo "Connection error: ".mysqli_connect_error();
}

//write query for all pizzas

$sql ='SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

//make query and get results

$results =mysqli_query($conn, $sql);

//fetch the resulting rows as an array

$pizzas = mysqli_fetch_all($results,MYSQLI_ASSOC);

//free the results from memmory
mysqli_free_result($results);
//close the connection

mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>
 
 <h4 class="center grey-text">Pizzas</h4>
 <div class="container">
 	<div class="row">
 		<?php foreach ($pizzas as $key => $pizza) {?>

 			<div class="col s6 md3">
 				<div class="card z-depth-0">
 					<div class="card-content center">
 						<h6><?php echo htmlspecialchars($pizza['title']);?></h6>
 						<div><?php  echo htmlspecialchars($pizza['ingredients'])?></div>
 					</div>
 					<div class="card-action right-align">
 					<a href="#" class="brand-text">more info</a>
 				</div>
 				</div>
 				
 			</div>

 		<?php } ?>
 		
 	</div>
 </div>

<?php include('templates/footer.php');?>

</html>

