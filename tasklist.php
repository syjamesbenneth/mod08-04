<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


<h1>My Tasklist</h1>
Create task: 
<input type="text" name="task" id="task"></input> <br>
Task at hand:
<br>
<span id="result"></span>
<ul>

	<?php 
	require_once "./partials/connection.php";
	//list all the tasks in our DB
	//1. Prepare the SQL query that we need
	$sql_query = "SELECT * FROM tasklist;";
	//2. Send the query to the database.
	$result = mysqli_query($conn, $sql_query);
	//3. Convert the result to an associative array and run through the rows.
	while($row = mysqli_fetch_assoc($result)){
		echo "<li>" .$row['task'] . "</li>";
	}
	mysqli_close($conn);
	 ?>

<!-- 	 <script type="text/javascript">
	 	
	 	if(keyboard.which==13){
	 		$.ajax({
				"url":"./partials/process_add_task.php",
				"data": {"task":task},
				"type": "POST",
				"success": showAvailability
			});
	 	}

	 </script>

 -->
</ul>

<script type="text/javascript">
	$("#task").keypress((keyboard)=> {
		if (keyboard.which==13) {
			let task = $("#task").val();
			if(task != ""){
				$.ajax({
				"url":"./partials/process_add_task.php",
				"data": {"task":task},
				"type": "GET",
				"success": (dataFromPHP)=> {
					$("ul").append("<li>" + task + "</li>");
					$("#result").html(dataFromPHP);
					}
				});
			}
		}
	})


</script>
