
function initTabularItem(parent) {
    parent.find('input.required, textarea.required').focusout(validateRequired);
    parent.find('input.number').focusout(validateNumber);
    parent.find('input.required, textarea.required, input.number').focusout(function(){
        if (!$(this).hasClass('error1') && !$(this).hasClass('error2')) {
            $(this).removeAttr('title');
        }
    });
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