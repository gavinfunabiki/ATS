$(document).ready(function(){

	setTimeout(function() {
		var obj = $('.colfil');
		$('.colfilters').slideUp(0, function() {
			obj.css('background-position', 'right');
			obj.removeClass('toggle_button');
		});
	}, 2000);
	
	$('.catsandflags').hide();

    $.validator.setDefaults({

        ignore: null,

        wrapper: 'div',

        errorPlacement: function(error, element) {

            if(element.hasClass('chzn-done')) {

                var id = element.attr("id");

                $("#"+id+"_chzn a").addClass("error");

            }



            if(element.attr('type')=='checkbox') {

                error.addClass('alert alert-error')

                element.closest('.controls').find('.help-block').append(error);
				
            }
			
        },

        submitHandler: function(form) {

            var f=$(form);
			
			var f_beforesubmit;
			var f_aftersubmit;
			
			if(f.data('beforesubmit') == '') {
				f_beforesubmit = beforesubmit_default;
			} else {
				f_beforesubmit = f.data('beforesubmit');
			}
			
			if(f.data('aftersubmit') == '') {
				f_aftersubmit = aftersubmit_default;
			} else {
				f_aftersubmit = f.data('aftersubmit');
			}

            submitform(f,f_beforesubmit,f_aftersubmit,onError);

            return false;

        }

    })



    bootbox.consume_jsdialogs();

		

    $('.catpopover').popover();

		

    $('.country-selectbox').change(function(){

        if ( $(this).val() == "1"){	//1 is id of United States

            $('.us-privacy').show();

            $('.non-us-privacy').hide();

        }else{

            $('.us-privacy').hide();

            $('.non-us-privacy').show();

        }

    })

    $('.non-us-privacy').hide();



    $('input.matstyled').stylize({
        width:'100%', 
        height:22
    });

    $('input.styled').stylize({
        width:14, 
        height:14
    });

    if($('#uploader').length>0) createUploader ('#uploader');

    $('form.validate').validate();

    $('.selectpicker').chosen({
        disable_search_threshold: 10
    })

    .change(function () {

        var id = $(this).attr('id');

        if($(this).valid())

            $('#'+id+'_chzn a').removeClass('error');

        else

            $("#"+id+"_chzn a").addClass("error");

    });

    /* toggle to solide */

    $('.colfil').on('click', function(){
		var obj = $('.colfil');
        if (obj.hasClass('toggle_button')) {
            $('.colfilters').slideUp(0, function() {
				obj.css('background-position', 'right');
                obj.removeClass('toggle_button');
            });
        } else {
            $('.colfilters').slideDown(0, function(){
				obj.css('background-position', 'left');
                obj.addClass('toggle_button');
            });
        }
    });

    $('div.date-picker').each(function () {

        $(this).datepicker({
            startView:$(this).data('start-view'), 
            autoclose:true
        });

    });
	
    updCatContainer();
	
	var oTable = $('#tableint').dataTable({
		"bStateSave": false,
        "bPaginate": false,
		"bSortClasses": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
		"sDom": 'lrtip<"bottomtools"T>',
		"aoColumnDefs": [
							{ 
								"bSortable": false, "aTargets": [ -1 ]
							}
						],
		"oTableTools": {
            "sSwfPath": "/assets/bs-datatables/swf/copy_csv_xls_pdf.swf",
			"aButtons": [ 
							{
								"sExtends": "copy",
								"sButtonText": "Copy"
							},
							{
								"sExtends": "pdf",
								"sButtonText": "Save as PDF"
							},
							{
								"sExtends": "xls",
								"sButtonText": "Save for Excel"
							},
							{
								"sExtends": "print",
								"sButtonText": "Print view"
							}
			 			]
        }
    }).columnFilter({
		sPlaceHolder: "head:after",
		aoColumns: [{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					null
				    ]});
					
	$('.flagicon, .expandicon').click(function() {
		var nTr = $(this).closest('tr')[0];
		var html = $(nTr).find('.'+$(this).attr('rel')).html();
		
		if (oTable.fnIsOpen(nTr)) {
			oTable.fnClose(nTr);
		} else {
			oTable.fnOpen(nTr, html, 'details');
		}
	});
	
	$('.accordion').on('show hide', function (n) {
    	$(n.target).siblings('.accordion-heading').find('.accordion-toggle i').toggleClass('icon-chevron-right icon-chevron-down');
	});
	
});

function listsubcats(output, parentid) {
	$.ajax({
        url:  "lib/dotask.php?task=listsubcats&parentid="+parentid,
        type: 'get',
        dataType : 'json',
        success: function(response) {	
            $('.continue').html(response.success);
        },

        error:function(response) {	
             $('.continue').html(response.error);
        }
    });
}


function updCatContainer() {

    if ( $(window).innerWidth() < 480  ){

        var top = ($(window).innerWidth() - 320)/5;

        console.log( top );

        top = parseInt(top);

        top = 26 - top;

        $("a.logo img").css("marginTop", top+"px");

    }else if (  $(window).innerWidth() >= 350 ) {

        $("a.logo img").css("marginTop", "4px");

    }

		

    if($('.categories-container').height() > 56){

        $('.categories-container').parent().addClass("categories");

    } else {

        $('.categories-container').parent().removeClass("categories");

    }

}



$(window).on('resize', function(){

    updCatContainer();

});

	

//WARNING: changed prototype!!;

$.fn.popover.Constructor.prototype.show = function () {

    var $tip

    , pos

    , actualWidth

    , actualHeight

    , placement

    , tp

    , e = $.Event('show');

	

    if (this.hasContent() && this.enabled) {

        this.$element.trigger(e);

        if (e.isDefaultPrevented()) return;

        $tip = this.tip();

        this.setContent();

			

        if (this.options.animation) {

            $tip.addClass('fade');

        }

		

        placement = typeof this.options.placement == 'function' ?

        this.options.placement.call(this, $tip[0], this.$element[0]) :

        this.options.placement

		

        $tip

        .detach()

        .css({

            top: 0, 

            left: 0, 

            display: 'block'

        })

		

        this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element);

		

        pos = this.getPosition();

		

        actualWidth = $tip[0].offsetWidth;

        actualHeight = $tip[0].offsetHeight;

			

        switch (placement) {

            case 'bottom':

                tp = {

                    top: pos.top + pos.height, 

                    left: pos.left + pos.width / 2 - actualWidth / 2

                }

                break

            case 'top':

                tp = {

                    top: pos.top - actualHeight, 

                    left: pos.left + pos.width / 2 - actualWidth / 2

                }

                break

            case 'left':

                tp = {

                    top: pos.top + pos.height / 2 - actualHeight / 2, 

                    left: pos.left - actualWidth

                }

                break

            case 'right':

                //Changed here to calculate correct tooltip top position

                tp = {

                    top: pos.top + 33 / 2 - 33 / 2 , 

                    left: pos.left + pos.width

                }

                break;

        }

		

        this.applyPlacement(tp, placement);

        this.$element.trigger('shown');

    }

}

	

function submitform(form, beforesubmit, callback, errcallback) {

    $.ajax({

        url:  form.attr('action'),

        type: 'post',

        data:  form.serialize(),

        dataType : 'json',

        beforeSend : function() { 
						
						if(jQuery.isFunction(beforesubmit)) { 
					
							beforesubmit; 
					
						} else { 
					
							window[beforesubmit](); 
					
						}
					},

        success: function(response) {	

            if(response.success) {
					
					if(jQuery.isFunction(callback)) { 
					
						callback(response.success, form);
						
					} else { 
					
						window[callback](response.success, form); 
						
					}   

            } else if(response.error) {
					
				if(jQuery.isFunction(errcallback)) { 
					
					errcallback;;
					
				} else { 
				
					window[errcallback](response.error); 
					
				}

            }

				

        },

        error:function(response) {	

            if (typeof errcallback == 'function') 

                errcallback(response);

        }

    });

}

	

function showsubcats(parentid) {

    dialog(

        //url

        "lib/dotask.php?task=showsubcats&parentid="+parentid, 

        //array of buttons

        [			

        {	//cancel button

            label : "Cancel",

            class : "btn-link pull-right"

        },

        {	//save button

            label : "Save",

            class : "pull-right btn btn-primary confirm",

            callback: onsavecatclick

        },

        ],

        //other options

        {

            type:'url', 

            width:640,

            aftercreate: function() {

                $('.modalpopover').popover();

                $("input.styled").stylize({
                    width:14, 
                    height:14
                });

            }

        });

}

	

function onsavecatclick(modaldiv) {

    $form = $('#frmsubcats', modaldiv);

    submitform($form,beforesubmit_default, 

        //success callback

        function() { 

            $(modaldiv).modal('hide');



            $checkboxes = $('input[type=checkbox]', $form);

				

            $checkboxes.map(function () {

                var $categoriesContainer = $('.categories-container');

                var $this = $(this);

                var $items = $categoriesContainer.find('[data-item="' + this.value + '"]');

					

                if($this.is(':checked')){

                    if($items.length == 0){

                        $categoriesContainer.append('<div style="display:none" data-trigger="hover" rel="popover" data-placement="bottom" data-content="' +	$this.parent().data("content") + '" title="" data-toggle="popover" data-original-title="' + $this.parent().data("original-title")+ '" class="well well-small pull-left current_label selected-category catpopover" data-item="' + this.value + '"><label class="cstyle">'

                            + $(this).attr('title') + '</label><i class="icon-remove" onclick="removeusercat(' + this.value + ', this)"></i></div>');

                        $('.selected-category').fadeIn('fast');

						

                        $('.catpopover').popover({

                            trigger: 'hover'

                        });

								

                    }

                } else {

                    if($items.length != 0)

                        $items.each( function() {

                            collapseOut($(this).find('.icon-remove'));

                        });

                }

            }).get();

				

        }, 

        //error callback

        function (error) {

            alert(error);

            $(modaldiv).modal('removeLoading');

        }

        );

    return false;

}

	

function collapseOut(el) {

    el.prev().animate({

        width:0,

    },'slow', function(){

        el.parent().animate({

            width:0,

            paddingRight:0,

            paddingLeft:0

        },'fast', function(){

            el.parent().remove()

        });

    });

}



function removeusercat(catid, el) {



    confirm('Don\'t want to apply in this category?<br /><br />', "Cancel", "Remove Category", 

        function (result) {

            if(result) {

                $.ajax({

                    url:  'lib/dotask.php?task=delusercat',

                    type: 'post',

                    data:  {
                        catid:catid
                    },

                    dataType : 'json',

                    success: function(response) {	

                        if(response.success) {

                            collapseOut($(el));

                        } else if(response.error) {

                            alert(response.error);

                        }

							

                    },

                    error:function(error) {	

                        alert(error);

                    }

                });





            }

        });

}

	

function showhide(id, el, v) {

    if($(el).val()==v)

        $('#'+id).slideDown('fast');

    else

        $('#'+id).slideUp('fast');

}

	

function toggleclass(id, el, v) {

    if($(el).val()==v)

        $('#'+id).addClass('required');

    else

        $('#'+id).removeClass('required');

}



function redirect_personalinfo() {

    if($('.categories-container div').length<1) {

        alert('Please select at least one category from the list below <br /><br />');
		
	} else	{
		
		$('body').modalmanager('loading');
		
        window.location.href = 'personal-information';
		
	}

}

	

var errorHandler = function(event, id, fileName, reason) {

    if(reason!==undefined) $('ul.qq-upload-list').html('<li class="alert alert-error">'+reason+'</li>');

};



function openfiledial() {

    $('[type=file][name=file]').trigger('click');

}



function createUploader (elm) {

    var el = $(elm);

    var frm=el.closest('form');

    var objfn=$('input.filename', frm);

    var btnupdate = $('.btnupdate', frm);

		

    uploader = new $(elm).fineUploader({

        debug: false,

        multiple: false,

        request: {

            endpoint: "assets/jq-fileuploader/"

        },

        text: {

            uploadButton: '<div>Choose File</div>',

            cancelButton: '&times', 

            waitingForResponse:''

        },

        template: '<div class="qq-uploader clearfix">' +

        '<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +

        '<span class="qq-drop-processing"><span>{dropProcessingText}</span><span class="qq-drop-processing-spinner"></span></span>' +

        '<div class="align-right pull-left upbtn" style="width: 140px;"><div onkeyup="if(event.keyCode==32 || event.keyCode==13) openfiledial();" class="qq-upload-button btn btn-primary" style="width: auto;"><div>{uploadButtonText}</div></div></div>' +

        '<ul class="qq-upload-list pull-left"></ul>' +

        '</div>',

        fileTemplate: '<li>' +

        '<div class="progress progress-success pull-left"><div class="qq-progress-bar bar"></div></div>' +

        '<button class="qq-upload-cancel close pull-left">{cancelButtonText}</button>' +

        '<span class="qq-upload-spinner"></span>' +

        '<span class="qq-upload-finished"></span>' +

        '<div class="upfile"><span class="qq-upload-file"></span> (' +

        '<span class="qq-upload-size"></span>)</div>' +

        '<a class="qq-upload-retry" href="#">{retryButtonText}</a>' +

        '<span class="qq-upload-status-text"></span>' +

        '</li>',

				

        showMessage: errorHandler,

											

        classes: {

            progressBar: 'bar',

            success: 'alert alert-success',

            fail: 'alert alert-error'

        },

        validation: {

            allowedExtensions: globaljsvars.allowedExtensions , 

            sizeLimit: globaljsvars.sizeLimit

        }

		

    })

    .on('error', errorHandler)

    .on('submit', function(event, id, fileName){

        if(objfn.val()) $.get('lib/dotask.php?task=delfile',{

            nm: objfn.val()

        }); 

        objfn.val('');

        $('#uploadtext', frm).html('Uploading....');

        el.find('.qq-upload-button').hide();

        el.find('.upfile').hide();

			

        el.find('.qq-upload-list').empty();

        btnupdate.attr('disabled', 'disabled');

    }).on('cancel', function(event, id, fileName) {

        objfn.val('');

        $('#uploadtext').html('Upload a resume or CV&nbsp;');

        createUploader ('#uploader');

			

    }).on('complete', function(event, id, fileName, response) {

        el.find('.progress').hide();

        el.find('.qq-upload-button').show();

        el.find('.upfile').hide();

        btnupdate.removeAttr('disabled');

        if (response.success){

            objfn.val(response.fullname);

            $('#uploadtext', frm).html(fileName + ' (' + $('.qq-upload-size').html() + ')');

            el.find('.qq-upload-button div').html('Change File');

        } else {

            el.find('.upbtn').show();

            alert(response.error);

        }

    });



    $(elm).find('[type=file]').prop('tabindex', '-1');					

}

	

function updatetimezones(value, target) {
	
	$('#'+target+'_chzn').find('li').hide();
	
	$('#'+target+'_chzn').find('.country_'+value).show();
	
}



function DeleteProfInfo(table, id, elid) {

    confirm('Are you sure you want to remove this '+table+'?', "Close", "Confirm", 

        function (result) {

            if(result) {

                $.ajax({

                    url:  'lib/dotask.php?task=delprofinfo',

                    type: 'post',

                    data:  {
                        table:table, 
                        id:id
                    },

                    dataType : 'json',

                    success: function(response) {	

                        if(response.success) {

                            $('#'+elid).slideUp('slow', function () {
                                $(this).remove();
                            });

                        } else if(response.error) {

                            alert(response.error);

                        }

							

                    },

                    error:function(error) {	

                        alert(error);

                    }

                });

            }

        });

}


function beforesubmit_default() {
	$('body').modalmanager('loading');
}

function aftersubmit_default(response, form) {
	var redir = form.data('redirect'); 
	if(redir) window.location.href = redir;
}

function onSuccess(response, form) {
	if(form.find('input[name=id]').val()=='') {		//new entry
		form.parent('div').replaceWith(response);
	} else {		//edit
		form.closest('.full_row').replaceWith(response);
	}
}

function onError(error) {
	alert(error)
}

function cancelform(form) {
	if(form.find('input[name=id]').val()=='') {
		form.slideUp(function() {form.parent('div').remove();});
	} else {
		form.slideUp(function() {form.parent('div').prev('ul').show();form.parent('div').remove();});
	}
}
	

function AddEditDialog(table, id, elid) {
	var isnew=(id===undefined);
   $.ajax({
        url:  'lib/dotask.php?task=addedit&table='+table+(isnew?'':'&id='+id),
        type: 'post',
        dataType : 'json',
        success: function(response) { 
            if(response.success) {
				if(isnew)
					$('#'+table+'wrap').append(response.success);
				else {
					$('#'+elid).append(response.success);
					$('#'+elid).find('.col_black').html('');
					$('#'+elid).find('ul').hide();
				}
                
				$('#'+table+'wrap form').slideDown();
				$('.selectpicker').chosen({disable_search_threshold: 10});
				$('input.styled').stylize({
					width:14, 
					height:14
				});
				$('form.validate').validate();
            } else if(response.error) {
                alert(response.error);
            }
            
        },
        error:function(error) { 
            alert(error);
        }
    });
}


function PersonalInfo_submit() {
	if($('#filename').val() != '')
		$('#wait').modal();
	else
		$('body').modalmanager('loading');
}

function PersonalInfo_success(response, form) {
	window.location.href = form.attr('data-redirect');
}

function NetIDMe_inprogress() {
	$('#secure').modal();
}

function NetIDMe_success(response, form) {
	$('#secure').modal('hide');
	
	if(response == 'Failed Verification One') {
		
		$('#wait').modal();
		
	} else if(response == 'Failed Verification Two') {
		
		$('#unable').modal();
		
		$('input[type=radio]').each(function() {
			
            $(this).attr('checked', false);
			
        });
		
	} else if(response == 'Successful Verification') {
		
		$('#success').modal();
		
		$('#success').find('button').attr('onClick', '$(\'#success\').modal(\'hide\'); window.location.href = \''+ form.data('redirect') +'\' ');
		
	} else {
		
		$('#secure').modal('hide');
		
		form.load('pages/personal-verification.php', {q:response});
		form.attr('action', 'lib/dotask.php?task=verifynetidmequestions');
		
		$('body, html').animate({ scrollTop: '0px' },'slow');
		
//		window.location.href = form.data('redirect');
		
	}
}

$(document).ready(function(){
    $('.professional-information .edit_info, .professional-information .add').click(function(){
        $(".modal-wrapper input.styled").stylize({
            width:14, 
            height:14
        });
    })
    $('.chzn-container, .chzn-drop, .chzn-search input').each(function(){
        $(this).outerWidth($('input.text').outerWidth());
        $('.chzn-search input').outerWidth($('input.text').outerWidth()-12);
    });
    $('.btn-link').click(function(){
        if($('body > .modal-scrollable').length > 0){
            $('.chzn-container, .chzn-drop, .chzn-search input').each(function(){
                $(this).outerWidth($('input.text').outerWidth());
                $('.chzn-search input').outerWidth($('input.text').outerWidth()-12);
            });
        }
    })
})
$(window).resize(function(){
    $('.chzn-container, .chzn-drop, .chzn-search input').each(function(){
        $(this).outerWidth($('input.text').outerWidth());
        $('.chzn-search input').outerWidth($('input.text').outerWidth()-12);
    });
})
