<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS</title>

			<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="flawless.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php

	
	include 'index.php'; //connect with the database

	include 'db.php';// connect to the db

?>


<!-- PRODUCTS CONTAINER -->
<div class="container">
<div class="jumbotron">
<h2></h2>
<?php
$username=$_POST['username']; //access the post Object
	
	echo "</h2>$username</h2>";

?>
	<div class="container-fluid">
	<h3><i class="fa fa-star-half-o" aria-hidden="true"></i>
Products</h3>
	<?php 

		$sql = "SELECT * FROM Products"; //select all the tables from the entite products

		$sth = $DBH->prepare($sql);

		$sth->execute();

		echo '<table class = "table table-hover">';
		echo '<tr>
				<td> ID </td> 
				<td> <b>Title </b></td>
				<td> Description</td> 
				<td> 
Price <i class="fa fa-money" aria-hidden="true"></i></td>
			  
			  </tr>';
	
	
	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

			$id = $row['id'];
			$title = $row['title'];
			$desc = $row['desc'];
			$price = $row['price'];
	
			echo '<tr>';
			echo '<td>'. $id .  '</td>';
			echo '<td>'  . $title .'</td>';
			echo '<td>'. $desc . '</td>';
			echo '<td>'. $price .'</td>';
			echo '<td> <a href="addToCart.php?id='.$id.'"> Buy!</a> </td>';
			echo '<td> <a href="addToBasket.php?id = '.$id.'"> Add to Basket </a> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
 </td>';
			echo '</tr>';
		
	}


	 ?>
	 </div>
	</div>
</div>

</body>
</html>