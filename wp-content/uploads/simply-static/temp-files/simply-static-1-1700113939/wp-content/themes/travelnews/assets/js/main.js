jQuery(document).ready(function() {
	var tnsCarousel = jQuery(".tiny-slider-inner");
	
	if (tnsCarousel.length) {
		tnsCarousel.each(function(index) {
			var slider = jQuery(this);
			var sliderMode = slider.attr("data-mode") ? slider.attr("data-mode") : "carousel";
			var sliderAxis = slider.attr("data-axis") ? slider.attr("data-axis") : "horizontal";
			var sliderSpace = slider.attr("data-gutter") ? slider.attr("data-gutter") : 30;
			var sliderEdge = slider.attr("data-edge") ? slider.attr("data-edge") : 0;
			
			var sliderItems = slider.attr("data-items") ? slider.attr("data-items") : 4; //option: number (items in all device)
			var sliderItemsXl = slider.attr("data-items-xl") ? slider.attr("data-items-xl") : Number(sliderItems); //option: number (items in 1200 to end )
			var sliderItemsLg = slider.attr("data-items-lg") ? slider.attr("data-items-lg") : Number(sliderItemsXl); //option: number (items in 992 to 1199 )
			var sliderItemsMd = slider.attr("data-items-md") ? slider.attr("data-items-md") : Number(sliderItemsLg); //option: number (items in 768 to 991 )
			var sliderItemsSm = slider.attr("data-items-sm") ? slider.attr("data-items-sm") : Number(sliderItemsMd); //option: number (items in 576 to 767 )
			var sliderItemsXs = slider.attr("data-items-xs") ? slider.attr("data-items-xs") : Number(sliderItemsSm); //option: number (items in start to 575 )
			
			var sliderSpeed = slider.attr("data-speed") ? slider.attr("data-speed") : 500;
			var sliderautoWidth = slider.attr("data-autowidth") === "true"; //option: true or false
			var sliderArrow = slider.attr("data-arrow") !== "false"; //option: true or false
			var sliderDots = slider.attr("data-dots") !== "false"; //option: true or false
			
			var sliderAutoPlay = slider.attr("data-autoplay") !== "false"; //option: true or false
			var sliderAutoPlayTime = slider.attr("data-autoplaytime") ? slider.attr("data-autoplaytime") : 5000;
			var sliderHoverPause = slider.attr("data-hoverpause") === "true"; //option: true or false
			var sliderLoop = slider.attr("data-loop") !== "false"; //option: true or false
			var sliderRewind = slider.attr("data-rewind") === "true"; //option: true or false
			var sliderAutoHeight = slider.attr("data-autoheight") === "true"; //option: true or false
			var sliderfixedWidth = slider.attr("data-fixedwidth") === "true"; //option: true or false
			var sliderTouch = slider.attr("data-touch") !== "false"; //option: true or false
			var sliderDrag = slider.attr("data-drag") !== "false"; //option: true or false
			var sliderDirection;
			
			var tnsSlider = tns({
				container: this,
				mode: sliderMode,
				axis: sliderAxis,
				gutter: sliderSpace,
				edgePadding: sliderEdge,
				speed: sliderSpeed,
				autoWidth: sliderautoWidth,
				controls: sliderArrow,
				nav: sliderDots,
				autoplay: sliderAutoPlay,
				autoplayTimeout: sliderAutoPlayTime,
				autoplayHoverPause: sliderHoverPause,
				autoplayButton: false,
				autoplayButtonOutput: false,
				controlsPosition: top,
				navPosition: top,
				autoplayPosition: top,
				controlsText: [
							   '<i class="fal fa-chevron-left"></i>',
							   '<i class="fal fa-chevron-right"></i>'
				],
				loop: sliderLoop,
				rewind: sliderRewind,
				autoHeight: sliderAutoHeight,
				fixedWidth: sliderfixedWidth,
				touch: sliderTouch,
				mouseDrag: sliderDrag,
				arrowKeys: true,
				items: sliderItems,
				textDirection: sliderDirection,
				responsive: {
					0: {
						items: Number(sliderItemsXs)
					},
					576: {
						items: Number(sliderItemsSm)
					},
					768: {
						items: Number(sliderItemsMd)
					},
					992: {
						items: Number(sliderItemsLg)
					},
					1200: {
						items: Number(sliderItemsXl)
					}
				}
			});
		});
	}
});