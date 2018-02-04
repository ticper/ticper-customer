<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Ticper - 顧客用" />
		<title>カート - Ticper</title>
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
					<a href="menu.php" class="btn">メニューを見る</a>
					<a href="cart.php" class="btn">カートを更新</a>
					<h3>カート</h3>
					<table>
						<tr><th>商品名</th><th>価格</th><th></th></tr>
						<?php
							$gokei = 0;
							require_once('config/config.php');
							$rcode = $_SESSION['rcode2'];
							$sql = mysqli_query($link, "SELECT id, food FROM reserve WHERE rcode = '$rcode'");
							while($result = mysqli_fetch_assoc($sql)) {
								$foodid = $result['food'];
								$sql2 = mysqli_query($link, "SELECT name, price FROM food WHERE id = '$foodid'");
								$result2 = mysqli_fetch_assoc($sql2);
								print('<tr><td>'.$result2['name'].'</td><td>'.$result2['price'].'</td><td><a href="cartdelete.php?id='.$result['id'].'" class="btn">削除</a></td></tr>');
								$gokei = $gokei + $result2['price'];
							}
						?>
					</table>
					<div align="right">
						<p><b>合計:</b> <?php print($gokei); ?>円</p>
					</div>
					<h4>カートQR</h4>
					<p>以下のQRコードを受付で読み取ります。販売員にこのQRコードを表示した端末を渡してください。</p>
					<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php print($rcode); ?>&size=300x300" alt="QRコード" />
					<p>決済完了後、販売員がチケット番号をお教えしますので、以下のフォームに入力してください。</p>
					<form action="ticketqr.php" method="GET">
						<input type="number" name="rcode" class="validate" placeholder="チケット番号">
						<input type="submit" value="送信" class="btn">
						<br><br><br>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
				</div>
			</div>