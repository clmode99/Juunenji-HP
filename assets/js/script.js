// フォントの設定
WebFont.load({
	custom: {families: ['源ノ明朝']},
	active: function() {
		$('body').addClass('webfont');
	}
});

// jQuery
$(function () {
	/* 自作関数 */
	function MainGuideSliderNav(showNum) {
		$(`.main-guide-slider-nav-${showNum}`).slick({
			slidesToShow: showNum,
			slidesToScroll: 1,
			asNavFor: '.main-guide-slider-for',
			dots: false,
			centerMode: false,
			focusOnSelect: true,
		});	
	}

	/* プラグイン */
	// 動画再生
	// デバイス判定参考サイト：https://indoor-today.com/2230
	var ua = navigator.userAgent;
	if(!(ua.indexOf('iPhone') > -1 || 
		(ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1) ||
		ua.indexOf('iPad') > -1 || ua.indexOf('Android') > -1)) {
			$('.main-visual-inner').YTPlayer();
		}

	// スライドショー(トップページ)
	$('.main-slider-list').slick({
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,				// 画像の切り替わる時間(ms)
	});

	// スライドショー(年間行事)
	$('.main-event-slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.main-event-slider-nav',
	});
	$(".main-event-slider-nav").slick({
		slidesToShow: 8,
		slidesToScroll: 1,
		asNavFor: '.main-event-slider-for',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
	});
	$(".main-event-slider-tablet").slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,				// 画像の切り替わる時間(ms)
	});

	// スライドショー(十念寺のご案内)
	$('.main-guide-slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.main-guide-slider-nav',
	});
	MainGuideSliderNav(7);		// Id:1
	MainGuideSliderNav(6);		// Id:2
	MainGuideSliderNav(8);		// Id:3
	$(".main-guide-slider-tablet").slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,				// 画像の切り替わる時間(ms)
	});

	// ハンバーガーメニュー
	$('.button-header-hamburger').click(function() {
		$(this).blur();

		// アニメーション
		$('.header-inner-right-mb-hamburger-icon').toggleClass('active');

		if(!($('.header-inner-right-mb-hamburger-icon').hasClass('active'))) {
			$('.header-inner-right-mb-menu-list-outer').fadeOut();
			$('.header-inner-right-mb-menu-list-overlay').fadeOut(function() {
				$('.header-inner-right-mb-menu-list-overlay').remove();
			});
		}

		// // すでにメニュ＝表示してるなら、さようなら(重複させないようにする)
		if($('.header-inner-right-mb-menu-list-overlay')[0])
			return false;

		$('body').append('<div class="header-inner-right-mb-menu-list-overlay"></div>');
		$('.header-inner-right-mb-menu-list-overlay').fadeIn();
		$('.header-inner-right-mb-menu-list-outer').fadeIn();
	});

	// ハンバーガーメニューからの閉じるとき
	//$(".header-inner-right-mb-menu-list-close-button").unbind().click(function() {
	//	$('.header-inner-right-mb-menu-list-outer').fadeOut();
	//	$('.header-inner-right-mb-menu-list-overlay').fadeOut(function() {
	//		$('.header-inner-right-mb-menu-list-overlay').remove();
	//	});
	//});

});

