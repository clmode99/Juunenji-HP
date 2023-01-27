$(window).on('load', function(){
	$(".youtube-area").addClass('appear');
	$(".loading").addClass('disappear');
});

// YouTube API
let tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";

let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let ytPlayer;
function onYouTubeIframeAPIReady() {
	ytPlayer = new YT.Player('youtube', {
		videoId: 'BHyJIiuSros',		// YouTubeのID
		playerVars: {
			playsinline: 1,
			autoplay: 1,
			fs: 0,
			rel: 1,
			controls: 0,
			modestbranding: 1,
			iv_load_policy: 3,
			start: 0,
		},
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

function onPlayerReady(event) {
	event.target.mute();
	event.target.playVideo();
}

function onPlayerStateChange(event) {
	if(event.data == YT.PlayerState.ENDED) {
		event.target.playVideo();
	}
}

// jQuery
$(function () {
	$('.main-slider-list').slick({
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000,		// 画像の保持時間(ms)
		speed: 1000,					// 画像の切り替わる時間(ms)
	});
});