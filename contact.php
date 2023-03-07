<?php
	session_start();
	session_regenerate_id(true);

	require 'assets/php/check_input.php';

	$name = $_SESSION['name'] ?? NULL;
	$ruby = $_SESSION['ruby'] ?? NULL;
	$mail = $_SESSION['mail'] ?? NULL;
	$mail_check = $_SESSION['mail_check'] ?? NULL;
	$zipcode = $_SESSION['zipcode'] ?? NULL;
	$address = $_SESSION['address'] ?? NULL;
	$tel = $_SESSION['tel'] ?? NULL;
	$contents = $_SESSION['contents'] ?? NULL;

	$error_name = $error['name'] ?? NULL;
	$error_ruby = $error['ruby'] ?? NULL;
	$error_mail = $error['mail'] ?? NULL;
	$error_mail_check = $error['mail_check'] ?? NULL;
	$error_zipcode = $error['zipcode'] ?? NULL;
	$error_address = $error['address'] ?? NULL;
	$error_tel = $error['tel'] ?? NULL;
	$error_contents = $error['contents'] ?? NULL;

	if(!isset($_SESSION['ticket'])) {
		$_SESSION['ticket'] = bin2hex(random_bytes(32));
	}
	$ticket = $_SESSION['ticket'];
?>

<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>十念寺 - お問い合わせ</title>
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
							<li class="header-inner-right-menu-normal-item"><a href="about.html">十念寺について</a></li>
							<li class="header-inner-right-menu-normal-item"><a href="guide.html">十念寺のご案内</a></li>
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
				<div class="main-about main-about-contact">
					<div class="main-about-contents">
						<h2 class="main-about-contents-title main-about-contact-title">お電話</h2><!-- /.main-about-contents-title -->
						<p class="main-about-contact-tel">
							TEL：0566-21-0854
						</p><!-- /.main-about-conract-tel -->
						<p class="main-about-contact-text">
							受付時間：午前10時〜午後5時まで<br>
							日曜日定休
						</p><!-- /.main-about-contact-text -->
					</div><!-- /.main-about-contents -->
				</div><!-- /.main-about -->
			</div><!-- /.main-contents -->
		</div><!-- /.main-bg -->
		<div class="main-bg3">
			<div class="main-contents">
				<div class="main-line">
					<h2 class="main-line-title">LINE公式から</h2><!-- /.main-line-title -->
					<p class="main-line-text">お問い合わせやご相談を十念寺の公式LINEからも承っております。また、お寺の情報やイベントなども配信いたします。下記より「友だち追加」することができます。</p><!-- /.main-line-text -->
					<a class="main-line-button" href="https://s.lmes.jp/landing-qr/1657796689-qP12wvKj?uLand=5Qvb5j" target="_blank"><img src="assets/images/line-add-button.png"></a>
					<p class="main-line-text main-line-text-center">※スマートフォン、タブレット端末、PCなど、LINEアプリを起動できる環境をご用意ください。</p><!-- /.main-line-text -->
					<div class="main-line-add">
						<h3 class="main-line-add-title">友だち追加方法</h3><!-- /.main-line-add-title -->
						<div class="main-line-add-list">
							<div class="main-line-add-item">
								<h4 class="main-line-add-item-title"><img src="assets/images/list-icon.png">QRコード（二次元バーコード）</h4><!-- /.main-line-add-item-title -->
								<img class="main-line-add-item-qr" src="assets/images/line-qr-code.png">
								<p class="main-line-add-item-text">LINEアプリやカメラアプリでQRコードを読み取る</p><!-- /.main-line-add-item-text -->
							</div><!-- /.main-line-add-item -->
							<div class="main-line-add-item main-line-add-item-id">
								<h4 class="main-line-add-item-title"><img src="assets/images/list-icon.png">ID検索</h4><!-- /.main-line-add-item-title -->
								<p class="main-line-add-item-text main-line-add-item-text-id">LINEアプリ「ホーム」から、検索欄に「＠keikokuji」で検索</p><!-- /.main-line-add-item-text -->
							</div><!-- /.main-line-add-item -->
							<div class="main-line-add-item main-line-add-item-button">
								<h4 class="main-line-add-item-title"><img src="assets/images/list-icon.png">友だち追加ボタンから</h4><!-- /.main-line-add-item-title -->
								<a class="main-line-button" href="https://s.lmes.jp/landing-qr/1657796689-qP12wvKj?uLand=5Qvb5j" target="_blank"><img src="assets/images/line-add-button.png"></a>
							</div><!-- /.main-line-add-item -->
						</div><!-- /.main-line-add-list -->
					</div><!-- /.main-line-add -->
				</div><!-- /.main-line -->
			</div><!-- /.main-contents -->
		</div><!-- /.main-bg3 -->
		<div class="main-bg">
			<div class="main-contents">
				<div class="main-form">
					<h2 class="main-form-title">フォームからメール</h2><!-- /.main-form-title -->
					<form class="main-form-form" action="contact-confirmation.php" method="post" novalidate>
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">お名前(必須)<span class="error-php"><?php echo Escape($error_name); ?></span></label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input required" type="text" name="name" value="<?php echo Escape($name); ?>">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">ふりがな</label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input" type="text" name="ruby" value="">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">メールアドレス(必須)<span class="error-php"><?php echo Escape($error_mail); ?></label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input required pattern" data-pattern="mail" type="email" name="mail" id="mail" value="<?php echo Escape($mail); ?>" data-error-pattern="メールアドレスの形式が正しくありません">
								<input class="main-form-form-item-input main-form-form-item-input-confirmation required equal-to" data-equal-to="mail" data-error-equal-to="メールアドレスが異なります" type="email" name="mail-confirmation" value="<?php echo Escape($mail_check); ?>" placeholder="確認用">	
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">郵便番号</label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input" type="text" name="zipcode" value="">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">住所</label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input" type="text" name="address" value="">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">電話番号(必須)</label>
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input required pattern" data-pattern="tel" type="text" name="tel" value="<?php echo Escape($tel) ?>" data-error-pattern="電話番号の形式が正しくありません">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<label class="main-form-form-item-text">お問い合わせ内容(必須)<span class="error-php"><?php echo Escape($error_contents); ?></span></label>
							<div class="main-form-form-item-input-list">
								<textarea class="main-form-form-item-input-textarea required" rows="10" name="contents" data-error-required=""></textarea>
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<div class="main-form-form-item">
							<div class="main-form-form-item-input-list">
								<input class="main-form-form-item-input" type="hidden" name="ticket" value="<?php echo Escape($ticket); ?>">
							</div><!-- /.main-form-form-item-input-list -->
						</div><!-- /.main-form-form-item -->
						<input class="main-form-form-submit" type="submit" value="ご送信内容確認">
					</form><!-- /.main-form-form -->
				</div><!-- /.main-form -->
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
	<script type="text/javascript" src="assets/js/formValidation.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>