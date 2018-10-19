<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<form action="./partials/register_user.php" method="POST">
<label>Username:</label>
<input type="text"name="username" id="username"></input><br>
<label>Password:</label>
<input type="password"name="password" id="password"></input><br>
<button type="submit" id="submit">Submit</button>
<span id="result"></span><br>
<span id="result2"></span>
</form>
<script type="text/javascript">	
	let user_check_flag =false; //check if there are errors in username, set to true if no errors, if there are set to false
	let pw_check_flag =false; //check if there are errors in password, set to true if no errors, if there are set to false
	$('#username').focusout(()=>{
		//mouseout,blur
		// if(keyboard.which==13){
			let username = $('#username').val();			
			if(username!=""){

			$.ajax({
				"url":"./partials/process_check_username.php",
				"data": {"username":username},
				"type": "POST",
				"success": showAvailability
			});
		// }
		}else{
			$("#result").html("");
		}
		
	});
	$('#password').focusout(()=>{
		let password = $('#password').val();
		if(password.length<6){
			$('#result2').html("Password should be more than 6 char!");
			pw_check_flag =false;
			$('#submit').prop("disabled",true);//disables the element
		}else{
			$("#result2").html("Password okay");
				pw_check_flag =true;
				if(user_check_flag && pw_check_flag){
					$('#submit').prop("disabled",false);
				}else{
					$("#submit").prop('disabled',true);
				}
		}
		});	
	const showAvailability =(datafromPHP)=>{		
		$("#result").html(datafromPHP);
		if(datafromPHP=="Username still available"){
			user_check_flag=true;
			if(user_check_flag && pw_check_flag){
				$("#submit").prop("disabled", false);
			}else{
				$("#submit").prop("disabled",true);
			}
		}else{
			user_check_flag=false;
			$("#submit").prop("disabled",true);
		}
	}

</script>