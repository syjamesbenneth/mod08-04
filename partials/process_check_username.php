<?php 
require_once "./connection.php";
$username =  $_POST['username'];
$sql_query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result)>0){
	//mysqli_num_rows->count the number of rows return by result.
	echo "Username already taken.";
}else{
	echo "Username still available";
}
mysqli_close($conn);
?>