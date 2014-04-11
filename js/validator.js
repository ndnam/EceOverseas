$(document).ready(function(){
    $('#Project_startDate').change(function(){
        $('#Project_endDate').change();
    });
});

var modified = false;
function markAsModified(){
    if (!modified) {
        $(window).bind('beforeunload', function(){ 
            return 'You are navigating away. Make sure you have saved you data first.';
        });
        modified = true;
    }
}

function initSaveFormConfirmation(){
    $(document).ready(function(){
        $('input, textarea, select').change(markAsModified);
        $('.btn:not(.file-upload)').click(markAsModified);
        $('button[type="submit"]').click(function(e){
            $(window).unbind('beforeunload')
        });
    });
}

function initTabularItem(parent) {
    parent.find('input.required, textarea.required').focusout(validateRequired);
    parent.find('input.number').focusout(validateNumber);
    parent.find('input.required, textarea.required, input.number').focusout(function(){
        if (!$(this).hasClass('error1') && !$(this).hasClass('error2')) {
            $(this).removeAttr('title');
        }
    });
    parent.find('.btn').click(markAsModified);
}

function validateRequired() {
    if ($(this).val().trim().length == 0) {
        $(this).attr('title','This field is required');
        $(this).addClass('error1');
    } else {
//        $(this).removeAttr('title');
        $(this).removeClass('error1');
    }
}

function validateNumber() {
    var pattern = /^\d*$/;
    if (!pattern.test($(this).val().trim())) {
        $(this).attr('title','Invalid number');
        $(this).addClass('error2');
    } else {
//        $(this).removeAttr('title');
        $(this).removeClass('error2');
    }
}