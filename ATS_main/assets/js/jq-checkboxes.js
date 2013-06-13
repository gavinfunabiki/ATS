(function($) {
  $.fn.stylize = function(options) {
    // Create some defaults, extending them with any options that were provided
    var o = $.extend( {
      height : '7',
      width : '7'
    }, options);

    return this.each(function() {
		
		var span = document.createElement("span");
		span.className = 'styled-' + $(this).prop('type');
		if ($(this).prop('disabled')) span.className += " disabled";
		$(span).css({width : o.width, height : o.height}).data('rel', this);
				
		if($(this).is(':checked')) {
			$(span).css({backgroundPosition : 'center -' + (o.height) + 'px'}).addClass('checked');
		} else {
			$(span).removeClass('checked');
		}
		
		$(this).hide().parent().prepend(span);
		
		$(span).on('click', function(e) {
			e.preventDefault();
			
			var el=$(this).data('rel');
			
			if($(el).prop('type')=='radio') {
				$('[type=radio][name='+$(el).attr('name')+']').prev().css({backgroundPosition : 'center 0'});
				$(el).prop('checked', true).trigger('change');
			} else { 
				$(el).prop('checked', !$(el).prop('checked')).trigger('change');
			}
		});
		
		$(this).on('change', function(e) {

			if($(this).prop('type')=='radio') {
				$('[type=radio][name='+$(this).attr('name')+']').prev().css({backgroundPosition : 'center 0'}).removeClass('checked');
			}

			var checked=$(this).prop('checked');
			if(checked) {
				$(this).prev().css({backgroundPosition : "center -" + (o.height) + "px"}).addClass('checked');
			} else {
				$(this).prev().css({backgroundPosition : "0 0"}).removeClass('checked');
			}
			
			
		});

    });
  };
})(jQuery);
