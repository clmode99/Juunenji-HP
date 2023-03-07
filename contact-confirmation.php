<?php
	// POSTされた内容をSESSIONに入れる
	session_start();

	$_SESSION['name']     = $_POST["name"];
	$_SESSION['ruby']     = $_POST["ruby"];
	$_SESSION['mail']     = $_POST["mail"];
	$_SESSION['zipcode']  = $_POST["zipcode"];
	$_SESSION['address']  = $_POST["address"];
	$_SESSION['tel']      = $_POST["tel"];
	$_SESSION['contents'] = $_POST["contents"];
?>	

<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>十念寺 - お問い合わせ - 記入内容確認</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Old+Mincho:wght@400;500;600;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/libs/slick.css">
	<link rel="stylesheet" href="assets/libs/slick-theme.css">
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header">
		<div class="header-inner">
			<div class="header-inner-left">
				<a href="index.html" class="header-inner-left-logo-link"><img src="assets/images/junenji_logo_black.png" alt="" class="header-inner-left-logo-img"></a><!-- /.header-inner-left-logo-link -->
			</div><!-- /.header-inner-left -->
			<div class="header-inner-right tablet-hidden">
				<div class="header-inner-right-menu">
					<nav class="header-inner-right-menu-normal">
						<ol class="header-inner-right-menu-normal-list">
							<li class="header-inner-right-menu-normal-item"><a href="#">十念寺について</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="#">十念寺のご案内</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="memorial-service.html">法要</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="event.html">年間行事</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="grave.html">永代供養墓地</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="traffic.html">交通のご案内</a></li>
						</ol><!-- /.header-inner-right-menu-list -->
					</nav><!-- /.header-inner-right-menu-normal -->
					<button class="header-inner-right-menu-contact">お問い合わせ</button>
				</div><!-- /.header-inner-right-menu -->
			</div><!-- /.header-inner-right -->
			<div class="header-inner-right-mb">
				<a href="tel:0000000000" class="header-inner-right-mb-button button-header-tel"><img src="assets/images/tel.png">お電話</a><!-- /.header-inner-right-mb-tel -->
				<a href="#" class="header-inner-right-mb-button button-header-access"><img src="assets/images/mappin.png">アクセス</a><!-- /.header-inner-right-mb-button -->
				<!-- ハンバーガーメニュー参考サイト：https://hakenblog.com/hamburger-menu/、https://codepen.io/sakuragraphica/pen/PozLPBg、https://syncer.jp/jquery-modal-window -->
				<a class="header-inner-right-mb-button button-header-hamburger">
					<div class="header-inner-right-mb-hamburger-icon">
						<span></span>
						<span></span>
						<span></span>
					</div><!-- /.header-inner-right-mb-hamburger-icon -->
					メニュー
				</a><!-- /.header-inner-right-mb-menu -->
			</div><!-- /.header-inner-right-mb -->
			<nav class="header-inner-right-mb-menu-list-outer">
				<a class="header-inner-right-mb-menu-list-close-button">
					<div class="header-inner-right-mb-menu-list-close-button-icon">
						<span></span>
						<span></span>
						<span></span>	
					</div><!-- /.header-inner-right-mb-menu-list-close-button-icon -->
					閉じる
				</a>
				<img class="header-inner-right-mb-menu-list-logo" src="assets/images/junenji_logo_white.png">
				<ol class="header-inner-right-mb-menu-list">
					<li class="header-inner-right-mb-menu-item"><a href="index.html">トップページ</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="#">十念寺について</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="#">十念寺のご案内</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="memorial-service.html">法要</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="event.html">年間行事</a></li>
					<li class="header-inner-right-mb-menu-item"><a>永代供養墓地</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="traffic.html">交通のご案内</a></li>
					<li class="header-inner-right-mb-menu-item"><a href="#">お問い合わせ</a></li>
				</ol><!-- /.header-inner-right-mb-menu-list -->
			</nav><!-- /.header-inner-right-mb-menu-list-outer -->
		</div><!-- /.header-inner -->
	</header>
	<main class="main">
		<div class="main-visual">
			<div class="main-visual-inner-contact">
				<h1 class="main-visual-inner-memorial-title">お問い合わせ</h1>
			</div><!-- /.main-visual-inner-memorial -->
		</div><!-- /.main-visual -->
		<div class="main-bg">
			<div class="main-contents">
				<div class="main-about main-form">
					<div class="main-about-contents">
						<h2 class="main-about-contents-title main-about-contact-title">フォームからメール</h2><!-- /.main-about-contents-title -->
						<form class="main-confirmation-list" action="contact_complete.php" method="post">
						<div class="main-confirmation-item">
								<div class="main-confirmation-entry">お名前</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["name"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">ふりがな</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["ruby"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">メールアドレス</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["mail"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">郵便番号</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["zipcode"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">住所</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["address"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">電話番号</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["tel"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<div class="main-confirmation-item">
								<div class="main-confirmation-entry">お問い合わせ内容</div><!-- /.main-confirmation-entry -->
								<div class="main-confirmation-contents"><?php echo $_POST["contents"]; ?></div><!-- /.main-confirmation-contents -->
							</div><!-- /.main-confirmation-item -->
							<input class="main-form-form-back" type="button" onclick="history.back()" value="入力画面へ戻る">
							<input class="main-form-form-submit main-form-form-submit-confirmation" type="submit" value="上記の内容で送信">
						</form><!-- /.main-about-confirmation-list -->

					</div><!-- /.main-about-contents -->
				</div><!-- /.main-about -->
			</div><!-- /.main-contents -->
		</div><!-- /.main-bg -->
	</main>
	<footer class="footer">
		<div class="footer-inner">
			<div class="footer-inner-logo"><img class="footer-inner-logo-image" src="assets/images/footer-logo.png"></div><!-- /.footer-inner-logo -->
			<address class="footer-inner-address">
				<p class="footer-inner-address-text">〒448-0844　愛知県刈谷市広小路4-219</p><!-- /.footer-inner-address-text -->
				<p class="footer-inner-address-tel-text">TEL : 0566-21-0854</p><!-- /.footer-inner-address-tel-text -->
			</address><!-- /.footer-inner-address -->
			<div class="footer-inner-menu">
				<ol class="footer-inner-menu-list">
					<li class="footer-inner-menu-item"><a href="index.html">トップページ</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="#">十念寺について</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="#">十念寺のご案内</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="memorial-service.html">法要</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="event.html">年間行事</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="grave.html">永代供養墓地</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="traffic.html">交通のご案内</a></li><!-- /.footer-inner-menu-item -->
					<li class="footer-inner-menu-item"><a href="#">お問い合わせ</a></li><!-- /.footer-inner-menu-item -->
				</ol><!-- /.footer-inner-menu-list -->
			</div><!-- /.footer-inner-menu -->
			<div class="footer-inner-sns">
				<div class="footer-inner-sns-list">
					<div class="footer-inner-sns-line"><a href="#"><img src="assets/images/line-icon.png"></a></div><!-- /.footer-inner-sns-line -->
					<div class="footer-inner-sns-youtube"><a href="https://www.youtube.com/@user-yi7vt4pb1c" target="_black"><img src="assets/images/youtube-icon.png"></a></div><!-- /.footer-inner-sns-youtube -->	
				</div><!-- /.footer-inner-sns-list -->
			</div><!-- /.footer-inner-sns -->
			<div class="footer-inner-copyright">
				<small class="footer-inner-copyright-text">&copy; 2023 Junenji Temple</small><!-- /.footer-inner-copyright-text -->
			</div><!-- /.footer-inner-copyright -->
		</div><!-- /.footer-inner -->
		<div class="footer-inner-tablet">
			<ol class="footer-inner-menu-list">
				<li class="footer-inner-menu-item"><a href="index.html">トップページ</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="#">十念寺について</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="#">十念寺のご案内</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="memorial-service.html">法要</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="event.html">年間行事</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="grave.html">永代供養墓地</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="traffic.html">交通のご案内</a></li><!-- /.footer-inner-menu-item -->
				<li class="footer-inner-menu-item"><a href="#">お問い合わせ</a></li><!-- /.footer-inner-menu-item -->
			</ol><!-- /.footer-inner-menu-list -->
			<div class="footer-inner-logo"><img class="footer-inner-logo-image" src="assets/images/footer-logo.png"></div><!-- /.footer-inner-logo -->
			<address class="footer-inner-address">
				<p class="footer-inner-address-text">〒448-0844　愛知県刈谷市広小路4-219</p><!-- /.footer-inner-address-text -->
				<p class="footer-inner-address-tel-text">TEL : 0566-21-0854</p><!-- /.footer-inner-address-tel-text -->
			</address><!-- /.footer-inner-address -->
			<div class="footer-inner-sns">
				<div class="footer-inner-sns-list">
					<div class="footer-inner-sns-line"><a href="https://s.lmes.jp/landing-qr/1657796689-qP12wvKj?uLand=5Qvb5j" target="_blank"><img src="assets/images/line-icon.png"></a></div><!-- /.footer-inner-sns-line -->
					<div class="footer-inner-sns-youtube"><a href="https://www.youtube.com/@user-yi7vt4pb1c" target="_black"><img src="assets/images/youtube-icon.png"></a></div><!-- /.footer-inner-sns-youtube -->	
				</div><!-- /.footer-inner-sns-list -->
			</div><!-- /.footer-inner-sns -->
			<div class="footer-inner-copyright">
				<small class="footer-inner-copyright-text">&copy; 2023 Junenji Temple</small><!-- /.footer-inner-copyright-text -->
			</div><!-- /.footer-inner-copyright -->
		</div><!-- /.footer-inner-tablet -->
	</footer>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/libs/jquery.mb.YTPlayer.min.js"></script>
	<script type="text/javascript" src="assets/libs/slick.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>