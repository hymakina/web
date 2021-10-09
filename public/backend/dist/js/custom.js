
$(document).on("click", ".ajax-link", function(){

    event.preventDefault();

    var targetDiv = $(this).data("targetdiv");
    var url = $(this).data("url");
    var type = $(this).data("type");

    $.blockUI({
        keyboard: false,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });

    if(type == 'POST' || type == 'post'  || type == 'Post'){
        $.ajax({
            type: "POST",
            url: url,
            data: "target_div="+targetDiv,
            success:function(result){
                if(targetDiv){
                    $(targetDiv).html(result);
                }
                $.unblockUI();
            }
        });
    }else{
        $.ajax({
            type: "GET",
            url: url,
            data: "target_div="+targetDiv,
            success:function(result){
                if(targetDiv){
                    $(targetDiv).html(result);
                }
                $.unblockUI();
            }
        });
    }


});

$(document).on("click", ".custom-modal", function(event){

    event.preventDefault();

    $.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';

    $.blockUI({
        keyboard: false,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });

    var targetDiv = $(this).data("targetdiv");
    var url = $(this).data("url");
    var type = $(this).data("type");


    var $btn = jQuery(this);

    if(type == 'POST' || type == 'post'  || type == 'Post'){
        $.ajax({
            type:'POST',
            url:url,
            data: "target_div="+targetDiv,
            success:function(result){
                // $("\""+targetDiv+"\"").html(result);
                $("#modalContent").html(result);
                $.unblockUI();
                jQuery('#modal-fadein').modal('show');
            }
        });
    }else{
        $.ajax({
            type:'GET',
            url:url,
            data: "target_div="+targetDiv,
            success:function(result){
                // $("\""+targetDiv+"\"").html(result);
                $("#modalContent").html(result);
                $.unblockUI();
                jQuery('#modal-fadein').modal('show');
            }
        });
    }


});

openLoader = function() {
    $.blockUI({ css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
    } });
};

closeLoader = function() {
    $.unblockUI();
};

closeModal = function() {
    jQuery('#modal-fadein').modal('hide');
};
