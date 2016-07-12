$(function() {
	var quoteHandler = (function() {
		var load = new Object();
		var activeQuote=0;
		var quoteCount = $("section.quotes .img-wrapper img").size();
		var timeout = 0;
		function setup() {
			for (i=0;i<quoteCount;i++) {
				var a = document.createElement("a");
				$(a).click(updateSlide);
				$("section.quotes nav").append(a);
			}
		}
		function nextSlide() {
			activeQuote++;
			if (activeQuote>quoteCount) {
				activeQuote=1;
			}
			updateSlide();
			timeout = setTimeout(nextSlide,10000);
		}
		function updateSlide(e) {
			if (typeof(e) != "undefined") {
				clearTimeout(timeout);
				activeQuote=$("section.quotes nav a").index($(e.target));
				nextSlide();
			}
			$("section.quotes").addClass("off");
			$("section.quotes nav a").removeClass("active");
			$("section.quotes nav a:nth-child("+activeQuote+")").addClass("active");

			var targetURL = $("section.quotes blockquote").removeClass("active");
			setTimeout(function() {
				var targetURL = $("section.quotes .img-wrapper img:nth-child("+activeQuote+")").attr("src");
				$("section.quotes blockquote:nth-child("+activeQuote+")").addClass("active");
				$("section.quotes .img-wrapper .img-container").css("background-image","url("+targetURL+")");
				setTimeout(function() {
					$("section.quotes").removeClass("off");
				},100);
			},750);
		}
		return {
	        Init : function() {
            	setup();
           		nextSlide();
	        }
	    }
	}());
	$("section.quotes").each(function() {
	 	quoteHandler.Init();
	});
});