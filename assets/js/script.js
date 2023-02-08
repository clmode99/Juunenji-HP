// jQuery
$(function () {
	// 動画再生
	// デバイス判定参考サイト：https://indoor-today.com/2230
	var ua = navigator.userAgent;
	if(!(ua.indexOf('iPhone') > -1 || 
		(ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1) ||
		ua.indexOf('iPad') > -1 || ua.indexOf('Android') > -1)) {
			$('.main-visual-inner').YTPlayer();
		}

	// スライドショー
	$('.main-slider-list').slick({
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,				// 画像の切り替わる時間(ms)
	});

	// ハンバーガーメニュー
	$('.button-header-hamburger').click(function() {
		$(this).blur();

		// すでにメニュ＝表示してるなら、さようなら(重複させないようにする)
		if($('.header-inner-right-mb-menu-list-overlay')[0])
			return false;

		$('body').append('<div class="header-inner-right-mb-menu-list-overlay"></div>');
		$('.header-inner-right-mb-menu-list-overlay').fadeIn();
		$('.header-inner-right-mb-menu-list-outer').fadeIn();
	});

	// ハンバーガーメニューからの閉じるとき
	$(".header-inner-right-mb-menu-list-close-button").unbind().click(function() {
		$('.header-inner-right-mb-menu-list-outer').fadeOut();
		$('.header-inner-right-mb-menu-list-overlay').fadeOut(function() {
			$('.header-inner-right-mb-menu-list-overlay').remove();
		});
	});
});

