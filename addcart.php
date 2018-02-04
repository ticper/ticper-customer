<?php
	session_start();
	$rcode = $_SESSION['rcode2'];
	$food = $_POST['id'];
	$maisu = $_POST['maisu'];
	require_once('config/config.php');
	for ($i = 0; $i < $maisu; $i++) {
		$sql = mysqli_query($link, "SELECT count(*) AS num FROM reserve");
		$result = mysqli_fetch_assoc($sql);
		$id = $result['num'] + 1;
		$sql = mysqli_query($link, "INSERT INTO reserve VALUES ('$id', '$rcode', '$food', '0')");
	}
	print("<script>location.href = 'cart.php';</script>");
?>