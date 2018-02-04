<?php
	session_start();
	$id = $_GET['id'];
	$id = $id;
	require_once('config/config.php');
	$sql = mysqli_query($link, "DELETE FROM reserve WHERE id = '$id'");
	print('<script>location.href = "cart.php";</script>');
?>