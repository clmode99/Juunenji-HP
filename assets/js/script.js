// jQuery
$(function () {
	$('.main-visual-inner').YTPlayer();

	$('.main-slider-list').slick({
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,				// 画像の切り替わる時間(ms)
	});
});