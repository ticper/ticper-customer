<?php
	session_start();
	if (isset($_SESSION['rcode2']) == '') {
		$rand = rand(100000, 999999);
		$_SESSION['rcode2'] = $rand;
	} else {

	}
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
					<h3>メニュー</h3>
				</div>
			</div>
			<?php
				$ima = 0;
				require_once('config/config.php');
				$sql = mysqli_query($link, "SELECT * FROM food");
				print('<div class="row">');
				while($result = mysqli_fetch_assoc($sql)) {
					print('<div class="col s12 m4">');
					print('<div class="card">');
					print('<div class="card-image">');
					print('<img src="img/'.$result['id'].'.jpg">');
					print('</div>');
					print('<div class="card-content">');
					print('<span class="card-title">'.$result['name'].'<span class="new badge" data-badge-caption="枚"><font size="5">'.$result['stock'].'</font></span></span>');
					print('<p>'.$result['description'].'</p>');
					print('</div>');
					print('<div class="card-action">');
					if($result['stock'] != 0) {
						print('<form action="addcart.php" method="POST">');
						print('<input type="hidden" name="id" value="'.$result['id'].'">');
						print('<input placeholder="注文する枚数を入力" type="number" name="maisu" max="'.$result['stock'].'">');
						print('<input class="btn" type="submit" value="送信">');
						print('</form>');
					} else {
						print("<p>売り切れ</p>");
					}
					print('</div>');
					print('</div>');
					print('</div>');
					$ima = $ima + 1;
					if ($ima == 3) {
						print('</div>');
						$ima = 0;
						print('<div class="row">');
					} else {
					}
				}
			?>
		</div>
	</body>
</html>