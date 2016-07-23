
var scrollElement = window;
$(function() {
	var navHandler = (function() {
		var scrollTop = 0;
		var switchPoint = ($("body").hasClass("home") || $("body").hasClass("page-template-template-case_studies_landing_page") || $("section").hasClass("blog"))? 50:0;
		var oldScrollTop = 0;
		var windowHeight = $(window).height();

		function scrollHandler(e) {
			oldScrollTop = scrollTop;
			scrollTop = $(scrollElement).scrollTop();
			if (oldScrollTop<scrollTop) {
				$(".nav-wrapper").removeClass("scroll-down");
				$(".nav-wrapper").addClass("scroll-up");
			} else {
				$(".nav-wrapper").removeClass("scroll-up");
				$(".nav-wrapper").addClass("scroll-down");
			}
			if (scrollTop>switchPoint) {
				$(".nav-wrapper").addClass("scrolled");
			} else {
				$(".nav-wrapper").removeClass("scrolled");
			}
		}
		function resizeHandler() {
			windowHeight = $(window).height();
			$(".page-template-template-optin .learn, .page-template-template-optin .cta").css("position","relative").css("position","static");
		}
		function setup() {
			$(window).bind("scroll",scrollHandler);

			$(".nav-wrapper ul").css("top",windowHeight/2);
			$(window).bind("resize",resizeHandler);
			resizeHandler();
			// $("nav.container ul").css("background-color",$("header.hero .background").css("background-color"));
			// $(".nav-wrapper",$("body").filter(":not(.home)")).css("background-color",$("header.hero .background").css("background-color"));
			// $("body.home nav.container ul").css("background-color","#f2f2f2");

		}
		return {
            Init : function() {
                setup();
                if ($("body").hasClass("page-template-template-case_studies_landing_page")) $(".nav-wrapper").addClass("always_open");
                $(".burger-wrapper").bind("click",function() {
                	resizeHandler();
                	$(".nav-wrapper").toggleClass("open");
                });
            }
        }
	}());
	var pageScrollHandler = (function() {
		var windowHeight = $(window).height();
		var scrollTop = 0;
		var scrollTimeout;
		var first = true;

		function pageScrollHandler(e) {
			// console.log(e);
			clearTimeout(scrollTimeout);
			if (typeof e != "undefined") { // real scroll --> set objects on whole pixels for sharper image rendering
				scrollTimeout = setTimeout(function() {
					$(".parallax").each(function(i,e) {
						var matrix = $(this).css("transform");
						matrix = matrix.split(",");
						var translateX = Math.round(matrix[12]);
						var translateY = Math.round(matrix[13]);
						$(this).css("transform","translate3d("+translateX+"px,"+translateY+"px,0.01px)");
						// $(this).css("-ms-transform","translateX("+translateX+"px) translateY("+translateY+"px)");
					});
				},200);
			} else {
				if (first) {
					first = false;
					$(".parallax").css("transition-duration","0.5s");
					setTimeout(function() {
						$(".parallax").css("transition-duration","0s");
					},500);
				}
			}
			
			scrollTop = $(scrollElement).scrollTop();
			$(".parallax").each(function(i,e) {
				var directionH=0.02;
				var directionV=0.15;
				if (Math.ceil(i/2)!=i/2) {
					directionH = directionH*-1;
					directionV = directionV*-1;
				}

				var offsetTop = $(this).attr("offsetTop");
				var targetX = directionH * (scrollTop-(offsetTop-windowHeight/2.3));
				var targetY = directionV * (scrollTop-(offsetTop-windowHeight/2.3))
				$(this).css("transform","translate3d("+targetX+"px,"+targetY+"px,0.01px)");
			});
		}
		function resizeHandler() {
			windowHeight = $(window).height();
		}
		return {
			Init : function() {
				$(scrollElement).bind("scroll",pageScrollHandler);
				setTimeout(pageScrollHandler,200);
				$(".parallax").each(function() {
					$(this).attr("offsetTop",$(this).offset().top);
				});
				$(window).bind("resize",resizeHandler);
			}
		}
	}());
	function pageStart() {
		$("img.hand, img.mockup").addClass("loaded");
		$(".hero h2, .hero h3, .hero small, article, button").addClass("loaded");
		$(".nav-wrapper").addClass("loaded");
		
		if (document.body.scrollWidth>$(window).width()) {

			// $(".page-wrapper").css("overflow-x","hidden").css("width","100%").css("position","relative").css("height","100%");
			// scrollElement = $(".page-wrapper")[0];
		} 
	}
	pageScrollHandler.Init();
	navHandler.Init();
	pageStart();
});