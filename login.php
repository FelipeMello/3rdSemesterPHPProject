<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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

		include 'db.php';

		$q =$DBH->prepare("select * from LoginDetails where username =:username and password = :password LIMIT 1"); //We are preparing the database to do a query on username and password and to check for just one and only 1 match

// =================SANIIZING AND CHECKING IF THE USERNAME AND PASSWORD IS VALID WITH THE DATABASE==========

		$q->bindValue(':username',$username);
		$q->bindValue(':password',$password);
		$q->execute();
		$check = $q->fetch(PDO::FETCH_ASSOC);

		$message=""; //setting message to null
		
		header("Location:login.php");
		if(!empty($check)){
		
			$username = $check['username'];
			$password = $check['password'];
			
			$message = 'Loggin in !';
			

	header("Location:products.php");		
			$username = $_POST;
			die();
		}else{
			$message ='Sorry your password or username details are incorrect';
			header("Location:login.php");
		}
	}

?>

<!-- ==================FORM CONTAINER==================== -->
<div class="container">
<form action="login.php" method="post" class="form-signin">
 
<h2> Please Login!</h2>

<!-- ==================USERNAME==================== -->
    <div class="form-group">
	    <label for="username"> User Name </label>
	    <input type="text" class="form-control" name="username"
	    placeholder="User Name">
  	</div>

  <!-- ================PASSWORD==================== -->
	<div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="password" " placeholder="Password">
	</div>
    <!-- ==========LOGIN BUTTON===================== -->

  <button type="submit" class="btn btn-default">Login!</button>
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