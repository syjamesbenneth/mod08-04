<?php 
require_once "./connection.php";
$username =$_POST['username'];
$password =$_POST['password'];
$sql_query ="INSERT INTO users(username,password)VALUES ('$username', '$password');";
$result =mysqli_query($conn,$sql_query);
if($result){
	echo "User successfully registered";
}else{
	die("Error in registration".mysqli_error($conn));
}
mysqli_close($conn);
?>