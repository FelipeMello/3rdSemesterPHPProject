<?php
$id  = $_GET['id'];


echo $id;

$_SESSION['cart'] = $_SESSION['cart'] . ' ' . $id;

echo 'Current Items: ';
echo $_SESSION['cart'];

echo "<script> history.go(-1); </script>";

?>


