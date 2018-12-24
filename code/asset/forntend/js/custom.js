$(document).ready(function(){
	  $('.collapsed').click(function(){
		$('body').toggleClass('body_h');
	});


    $(".dropdown_hover").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).hide();
            $(this).toggleClass('open');
        }
    );



var x = window.matchMedia("(max-width: 767px)")

if (x.matches) {
	  $(".select_dropdown").click(
        function() {
				/*	var classList = $('.dropdown-menu').attr('class').split(/\s+/);
					$.each(classList, function(index, item) {
						//	if (item === 'someClass') {
									//do something
							//}
							console.log(item);
					});
					//console.log(classList); */
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).toggle();
					$(this).toggleClass('open');
					$(this).toggleClass('open');


					//	$(".select_dropdown").toggleClass('open');
        }
    );
	$(".dropdown-menu").bind('click', function(){
		//	console.log("y");
		// $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
     $(this).toggle();
	});
}
else {
	$(".select_dropdown").hover(
			function() {
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
					$(this).toggleClass('open');
			},
			function() {
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).hide();
					$(this).toggleClass('open');
			}
	);
	$(".select_dropdown").bind('click', function(){
	// $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
			$(this).toggleClass('open');
	});

}



	$('.more_images').click(function(){
		$('.moreandless').slideDown("400");
		$('.more_images').slideUp("400");
	});
	$('.makePlain').hover(function(){
		$('option').show();
	});
});
$('#search_show').click(function(){
		$('#msearch_show').addClass('msearch_show');
	});



$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});


(function () {
	/* if($('input[type="range"]').val()!=undefined){
		$('input[type="range"]').val(0).change();
		var  selector = '[data-rangeSlider]';
		var  elements = document.querySelectorAll(selector);
		function valueOutput(element) {
			var value = element.value;
			var output = $("#re_rating").val(value);
		}

		for (var i = elements.length - 1; i >= 0; i--) {
			valueOutput(elements[i]);
		}

		Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
			el.addEventListener('input', function (e) {
				valueOutput(e.target);
			}, false);
		});
		rangeSlider.create(elements, { });
	} */
})();
