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
		<script>
			$(document).ready(function(){
    			$('.sidenav').sidenav();
  			});
  		</script>
  		<div class="container">
  			<div class="row">
  				<div class="col s12">
  					<h3>Ticperチケットサイト</h3>
  					<p>文化祭で販売しているチケットの受付予約が可能です。</p>
  					<br>
  					<p><b>注意！</b><br>
  						このサイトは、食品を選ぶ際の参考として食券の残り枚数を表示しておりますが、この指標は受付で購入する際の枚数の指標ではありません。受付で購入する際に「売り切れ」の旨を販売員がお伝えさせていただくことがありますので、ご注意ください。
  					</p>
  					<s class="btn" href="menu.php">メニューを見る</s>
  					<a class="btn" href="cart.php">カートを見る</a>
  				</div>
  			</div>
  		</div>
  	</body>
</html>