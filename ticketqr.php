<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Ticper - 顧客用" />
		<title>Home - Ticper</title>
		<meta property="og:type" content="website" />
		<meta property="og:description" content="Ticper - 顧客用" />
		<meta property="og:site_name" content="Ticper" />
		<meta property="og:title" content="Home" />
		<meta name="robots" content="noindex,nofollow" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<nav>
			<div class="container">
				<div class="nav-wrapper">
					<a href="#!" class="brand-logo">Ticper</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="menu.php">メニュー</a></li>
						<li><a href="cart.php" class="btn">カートを見る</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<br>
					<a href="menu.php" class="btn">更新</a>
					<a href="cart.php" class="btn">カートを見る</a>
					<h3>QRコード・領収書</h3>
					<ul>
						<li>この画面は、全ての食券を使い切るまで絶対に消さないようにしてください。</li>
						<li>食券の払い戻しは、団体側のトラブルで食品と食券を交換できなかった際に行います。その際はこの画面をお見せください。</li>
					</ul>
				</div>
			</div>
			<?php
				$ima = 0;
				$gokei = 0;
				$rcode = $_GET['rcode'];
				require_once('config/config.php');
				$sql = mysqli_query($link, "SELECT acode, food FROM tickets WHERE rcode = '$rcode'");
				print('<div class="row">');
				while($result = mysqli_fetch_assoc($sql)) {
					print('<div class="col s12 m4">');
					print('<center>');
					print('<img src="https://api.qrserver.com/v1/create-qr-code/?data='.$result['acode'].'&size=300x300" alt="QRコード" />');
					print('</center>');
					$food = $result['food'];
					$sql2 = mysqli_query($link, "SELECT org, name, price FROM food WHERE id = '$food'");
					$result2 = mysqli_fetch_assoc($sql2);
					$org = $result2['org'];
					$sql3 = mysqli_query($link, "SELECT name, place FROM org WHERE id = '$org'");
					$result3 = mysqli_fetch_assoc($sql3);
					print('<b>団体：</b>'.$result3['name'].'<br>');
					print('<b>食品：</b>'.$result2['name'].'(<b>'.$result2['price'].'</b>円)<br>');
					print('このQRコードを<b>'.$result3['place'].'</b>で見せてください。<br>');
					print('<b>AC</b>：'.$result['acode']);
					print('</div>');
					$gokei = $gokei + $result2['price'];
					$ima = $ima + 1;
					if ($ima == 3) {
						print('</div><div class="row">');
						$ima = 0;
					} else {

					}
					$_SESSION['rcode2'] = '';
				}
			?>
		</div>
		<div class="row">
			<div class="col s12">
				<div align="right">
					<p>合計：　<b><?php print($gokei); ?>円</b></p>
					上記、文化祭食品購入代金として、正に領収いたしました。
				</div>
			</div>
		</div>
		<br><br><br>
	</body>
</html>
