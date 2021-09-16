(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});


// product js
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("gl-column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");

if (btnContainer) {
	var btns = btnContainer.getElementsByClassName("btn");

	for (var i = 0; i < btns.length; i++) {
	  btns[i].addEventListener("click", function(){
	    var current = document.getElementsByClassName("active");
	    current[0].className = current[0].className.replace(" active", "");
	    this.className += " active";
	  });
	}
}










// logo slider-----

$(document).ready(function(){
      $('.customer-logos').slick({
          slidesToShow: 6,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
              breakpoint: 768,
              settings: {
                  slidesToShow: 4
              }
          }, {
              breakpoint: 520,
              settings: {
                  slidesToShow: 3
              }
          }]
      });
  });


// logo slider-----


// animation js-----

	var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();

// animation js-----


// button bottom to top-----

	var btn = $('#button-top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 900) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '900');
});

// button bottom to top-----


// mouse hover -------


$(".hotspot").on("mouseover", function(e){
		$(".hotspot-div").css("opacity","1");	
	});
	$(".hotspot").on("mouseout", function(e){
		$(".hotspot-div").css("opacity","0");	
	});


 // mouse hover ------


 // mouse hover ------

 $(".hotspot-two").on("mouseover", function(e){
		$(".hotspot-div-two").css("opacity","1");	
	});
	$(".hotspot-two").on("mouseout", function(e){
		$(".hotspot-div-two").css("opacity","0");	
	});

 // mouse hover ------


 // li active ------

 $(".common-class").on("click", function(e){
		$(".common-class").removeClass("li-active")
		$(this).addClass("li-active")
	});

  // li active ------


  // customize section -----

  $(document).ready(function(){
  $(".gl-close-icon i").click(function(){
    $(this).parents(".gl-close-icon").siblings("form").slideUp();
    $(this).hide();
    $(this).siblings('i').show();

    if ($(this).parents(".gl-close-icon").siblings("form").css('display') == 'none') {
    	$(this).parents(".gl-close-icon").siblings("form").slideDown();
    }

  });
});

  // customize section -----



  // heart icon jquery ----

  $(".heart-react").on("click", function(e){

		if ($(this).hasClass("heart-active")) {

			$(this).removeClass("heart-active")
		}else{
			$(this).addClass("heart-active")
		}
	});


  // heart icon  jquery ----



  // quantity -----
  		(function () {
  "use strict";
  var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
    return function (arg) {
      if (this.length > 1) {
        this.each(function () {
          var $this = $(this);

          if (!$this.data(ident)) {
            $this.data(ident, func($this, arg));
          }
        });

        return this;
      } else if (this.length === 1) {
        if (!this.data(ident)) {
          this.data(ident, func(this, arg));
        }

        return this.data(ident);
      }
    };
  });
})();

(function () {
  "use strict";
  function Guantity($root) {
    const element = $root;
    const quantity = $root.first("data-quantity");
    const quantity_target = $root.find("[data-quantity-target]");
    const quantity_minus = $root.find("[data-quantity-minus]");
    const quantity_plus = $root.find("[data-quantity-plus]");
    var quantity_ = quantity_target.val();
    $(quantity_minus).click(function () {
      quantity_target.val(--quantity_);
    });
    $(quantity_plus).click(function () {
      quantity_target.val(++quantity_);
    });
  }
  $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
  $("[data-quantity]").Guantity();
})();

  // quantity -----



  // size chart -------


    $(".sizess").on("click", function(e){
    	$(".sizess").removeClass("size-active")
			$(this).addClass("size-active")
	});

  // size chart -------



  // size chart -------


    $(".sizess-large").on("click", function(e){
    	$(".sizess-large").removeClass("size-active")
			$(this).addClass("size-active")
	});

  // size chart -------


  // gl-sub-img-parts


  $(".gl-sub-img-parts img").on("click", function(e){
  	let img_src = $(this).attr('src');
  	$(".gl-main-custom-img").attr("src",img_src)
  });

  // gl-sub-img-parts

      $(".gl-sub-img-parts").on("click", function(e){
    	$(".gl-sub-img-parts").removeClass("img-active")
			$(this).addClass("img-active")
	});

  // gl-sub-img-parts





    $(".tablink").on("click", function(e){
    	$(".tablink").removeClass("border-bottom")
			$(this).addClass("border-bottom")
	});


	// product-detail-slider

	jQuery(document).ready(function($) {

	var owl = $("#owl-demo-2");
  owl.owlCarousel({
      items : 3, 
      itemsDesktop : [992,3],
      itemsDesktopSmall : [768,2], 
      itemsTablet: [480,2], 
      itemsMobile : [320,1]
  });
  $(".next").click(function(){ owl.trigger('owl.next'); });
  $(".prev").click(function(){ owl.trigger('owl.prev'); });

$('.latest-blog-posts .thumbnail.item').matchHeight();
	
});
