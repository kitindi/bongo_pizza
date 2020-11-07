<?php

//MySQLi or PDO{PHP Data Objects}
//connect to database using mysqli(databasehost, username,password, databasename)

$conn =mysqli_connect('localhost','bongo','bongo123','bongo_pizza');

//check the connection

if(!$conn){
 echo "Connection error: ".mysqli_connect_error();
}


?>