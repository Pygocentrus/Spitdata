function animateImage(Index) {
	    $("img.animated:eq(" + Index + ")").each(function (Index) {
	        if (!$(this).is(":visible")) {
	            var intervalID = parseInt($(this).attr("intervalid"));
	            clearInterval(intervalID);
	        } else {
	            var max = parseInt($(this).attr("max"));
	            var pattern = $(this).attr("pattern");
	            var index = parseInt($(this).attr("index"));
	            index++;
	            if (index > max) {
	                index = 66;
	                return;
	            }
	            var src = pattern.replace("#", index);
	            $(this).attr("index", index);
	            $(this).attr("src", src);
	        }
		});
	}

	function initialiseAnimatedImages() {
	    $("img.animated").each(function (Index) {
	        var interval = $(this).attr("interval");
	        $(this).attr("index", "0");
	        var intervalID = setInterval(function () { animateImage(Index); }, interval);
	        $(this).attr("intervalid", intervalID);
	    });
	}

	$(document).ready(function () {
		is_done=false;
				
			$(window).scroll(function() {
				var $div = $("#sectgenerator");
				var div_offset = $div.offset().top;
				if(!is_done){
					if((div_offset) - $(window).scrollTop() < 0){
					  	initialiseAnimatedImages();
					  	is_done = true;
					}
				}
			});
		
	});