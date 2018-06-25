<!DOCTYPE html>
<html>
<head>
	<title>View Product</title>

</head>
<body>
<?php
	$pid= $_GET['id'];
	include 'index.php';
	include 'db.php';

?>

<?php

	$q = $DBH->prepare("SELECT * FROM Products WHERE id =:pid");
	$q->bindValue(':pid', $pid);
	$q

 ?>
</body>
</html>