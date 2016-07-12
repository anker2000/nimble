var $ = jQuery;	
	var circleHandler = (function() {
		
		var load = new Object();
		var radius = 0;
		var theme = 1;
		var play = new Object();
		var position = 0;
		var duration = 0;
		var metaLoaded = false;
		var offCanvas = new Object();
		var firstTime = true;
		var unloading = false;
		var scrubbing = false;
		var waveform = new Object();
		var animation;
		var canvasVisible = false;

		var waveformColor = "#d0d0d0";
		var positionColor = "#3db891"
		TweenMax.ticker.fps(47);

		function setup() {
			offCanvas['.caniterate'] = null;
			load.progress	= 0;
			duration		= 0;
			position		= 0;
			firstTime		= true;
			unloading		= false;
			radius 			= document.querySelector("canvas.caniterate").getAttribute("width")/2;

			rotateCircle();
			
			drawCircle();
			
		}
		function rotateCircle() {
			TweenMax.to(load, 3, {progress: 1, ease:Power4.easeInOut, repeat:-1, onRepeat:function() { load.progress=0; }} );
			TweenMax.ticker.addEventListener("tick", drawWaveform);
		}
		function drawCircle() {
			var targetClass = ".iteratebg";

			var center=new Object();
			center.x=radius;
			center.y=radius;

			var canvas = document.querySelector(targetClass);
			
			var ctx = canvas.getContext('2d');

			ctx.clearRect(0,0,canvas.getAttribute("width"),canvas.getAttribute("height"));

			var mask_angle = (1.95*Math.PI);
			var start_angle = (0.05*Math.PI)
			var mask_radius = radius;

			mask_radius = radius-20;
	   		
			ctx.moveTo(center.x, center.y);
			ctx.beginPath();
			ctx.lineWidth="10";
			ctx.strokeStyle="#0f0f0f";
			ctx.arc(center.x, center.y, mask_radius, start_angle-1.57079633, mask_angle - 1.57079633, false);
			ctx.lineCap = 'round';
			ctx.stroke();
			ctx.closePath();

			
			ctx.beginPath();
			ctx.moveTo(center.x - 7, 10);
			ctx.lineWidth="10";
			ctx.strokeStyle="#0f0f0f";
			ctx.lineTo(center.x+7, 25);
			ctx.lineTo(center.x-7, 40);
			ctx.lineCap = 'round';
			ctx.stroke();
			ctx.closePath();
		}
		function drawWaveform() {
			var targetClass = ".caniterate";
			var canvas = document.querySelector(targetClass);
			if (canvasVisible) {
				var progress = load.progress;
				var cappedProgress = Math.reverseNumber(Math.abs(progress-0.5),0,0.5)*0.5;
				var startAngle = Math.radians(load.progress * 360);
				if (startAngle < (0.05*Math.PI)) {
					startAngle=0.05*Math.PI;
					animation = requestAnimationFrame(drawWaveform);
					return false;
				}
				if (startAngle>(1.95*Math.PI)) {
					startAngle = 1.95*Math.PI;
				}

				var center=new Object();
				center.x=radius;
				center.y=radius;

				
				var ctx = canvas.getContext('2d');

				ctx.clearRect(0,0,canvas.getAttribute("width"),canvas.getAttribute("height"));

				var mask_angle	= (2*Math.PI)*cappedProgress;
				var mask_radius = radius*progress;
				var endAngle	= startAngle+mask_angle;

				if (endAngle > (1.95*Math.PI)) {
					endAngle = 1.95 * Math.PI;
				}
				if (endAngle<(0.05*Math.PI)) {
					endAngle = 0.05 * Math.PI;
				}

				mask_radius = radius-20;
		   		
				ctx.moveTo(center.x, center.y);
				ctx.beginPath();
				ctx.lineWidth="10";
				ctx.strokeStyle="#e95e0c";
				ctx.shadowBlur = 20;
				ctx.shadowColor = "#fa967f";
				ctx.arc(center.x, center.y, mask_radius, startAngle-1.57079633, endAngle - 1.57079633, false);
				ctx.lineCap = 'round';
				ctx.stroke();
				ctx.closePath();

				ctx.moveTo(center.x, center.y);
				ctx.beginPath();
				ctx.lineWidth="1";
				ctx.strokeStyle="#fb947d";
				ctx.arc(center.x, center.y, mask_radius, startAngle-1.57079633, endAngle - 1.57079633, false);
				ctx.lineCap = 'round';
				ctx.stroke();
				ctx.closePath();
			} 
			// animation = requestAnimationFrame(drawWaveform);
		}
		function scrollHandler(e) {
			var targetClass = ".caniterate";
			var canvas = document.querySelector(targetClass);
			canvasVisible = isElementInViewport(canvas);
		}
		function isElementInViewport (el) {
		    if (typeof jQuery === "function" && el instanceof jQuery) el = el[0];
		    var rect = el.getBoundingClientRect();
		    return (rect.top <= (window.innerHeight || document.documentElement.clientHeight) && rect.bottom >= 0);
		}
		return {
            Init : function(track_url) {
                setup();
                $(window).bind("scroll",scrollHandler);
            }
        }
	}());
Math.radians = function(degrees) {
  return degrees * Math.PI / 180;
};
Math.reverseNumber = function(num, min, max) {
    return (max + min) - num;
};
$(function() {
	$("body.home").each(function() {
		circleHandler.Init();
	});
});