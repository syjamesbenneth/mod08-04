<?php 
	require_once "./connection.php";
	$task = $_GET['task'];
	$sql_query = "INSERT INTO tasklist(task) VALUES ('$task')";
	$result = mysqli_query($conn, $sql_query);
	if($result){
		echo "Task successfully added";
	} else {
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
 ?>
