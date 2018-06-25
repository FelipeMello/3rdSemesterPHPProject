<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
<?php
	include 'index.php';
?>
<!-- ====================IF THE USER PRESS SUBMIT THIS HAPPENS -->
<?php
	if($_POST){
		$username = $_POST['username']; //Username Var
		$password = $_POST['password'];//Password Var
		$cpassword = $_POST['cpassword'];//confirm password var
		$email = $_POST['email'];// email var

		include 'db.php';

		$q =$DBH->prepare("select * from LoginDetails where username =:username"); //We are preparing the database to do a query on username and password and to check for just one and only 1 match
	
		$message=""; //setting message to null

		$reg = $DBH->prepare("INSERT INTO LoginDetails (username, password, email) VALUES ('$username', '$password', '$email')");
		$reg->bindValue(':username' , $username);
		$reg->bindValue(':password' , $password);
		$reg->bindValue(':email' , $email);
		$checkUp = $reg->fetch(PDO::FETCH_ASSOC);

		$q->bindValue(':username',$username);
		$q->execute();
		$check = $q->fetch(PDO::FETCH_ASSOC);

		$message=""; //setting message to null
		if(!empty($check)){
			$username = $check['username'];
			$message = 'Username Already Exist Please choose another username';

		}elseif($password != $cpassword){
			$message  = 'password does not match';
			// INSERT INTO `test`.`LoginDetails` (`username`, `password`, `email`) VALUES ('Felipe', '12345678', 'felipe.silva.mello@gmail.com');

		}
		else{
			echo "<script type='text/javascript'>alert('Register Sucesfully! Please Login')</script>";
			$username = $checkUp['username'];
			$password = $checkUp['password'];
			$email = $checkUp['email'];

			$message = 'Register Sucesfully';
			
		}
	}

?>
<!-- ==================FORM CONTAINER==================== -->
<div class="container">
<form action="signup.php" method="post" class="form-signin">
 
<h2> Sign Up!</h2>

<!-- ==================USERNAME==================== -->
    <div class="form-group">
	    <label for="username"> UserName </label>
	    <input type="text" class="form-control" name="username"
	    placeholder="User Name">
  	</div>

  <!-- ================PASSWORD==================== -->
	<div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="password" " placeholder="Password">
	</div>

	<!-- ================CONFIRM PASSWORD==================== -->
	<div class="form-group">
	    <label for="exampleInputPassword1">Confirm Password</label>
	    <input type="password" class="form-control" name="cpassword" " placeholder="Confirm Password">
	</div>

	<!-- ================EMAIL==================== -->
	<div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input type="text" class="form-control" name="email" " placeholder="Email">
	</div>
	

    <!-- ==========SUBMIT BUTTON===================== -->

  <button type="Submit" class="btn btn-default">Register!</button>
<!-- 
	Username <input type="text" name="username">
	Password<input type="password" name="password">
	<input type="Submit">
	
 -->
 <!-- =============MESSAGE================ -->
 	<?php
	if(!empty($message)){
		echo '<br>';
		echo $message;
	}
	?>
</form>
</div>

</body>
</html>