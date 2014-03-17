/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
//    $("#btnBack").click(function(){
//        console.log("btnBack clicked");
//        window.location.href = location.href.replace(/step=\d/,'step=' + (parseInt($(this).attr('step')) - 1) );
//    });
    
    // No Food Restriction checkbox
    $('#MedicalInfo_noFoodRestriction').change(function(){
        if ($(this).prop('checked') == true) {
            $('#MedicalInfo_vegetarian, #MedicalInfo_halal, #MedicalInfo_noSeafood, #MedicalInfo_noBeef, #MedicalInfo_otherFoodRestrictions').prop('disabled', true);
        } else {
            $('#MedicalInfo_vegetarian, #MedicalInfo_halal, #MedicalInfo_noSeafood, #MedicalInfo_noBeef, #MedicalInfo_otherFoodRestrictions').removeAttr('disabled');
        } 
    });
    
    // No CCA Record checkbox
    $("#noCCA").change(function(){
       if ($(this).prop('checked') == true)  {
           $(".cca").find('input, textarea').prop('disabled',true);
       } else {
           $(".cca").find('input, textarea').removeAttr('disabled');
       }
    });
    
    if ($("#noCCA").prop('checked'))
        $(".cca").find('input, textarea').prop('disabled',true);
    
    
    // No Past Trip checkbox
    $("#havePastTrip").change(function(){
       if ($(this).prop('checked') == true)  {
           $(".pasttrips").show();
       } else {
           $(".pasttrips").hide();
       }
    });
    
    initPastTripForm();
    
});

function initPastTripForm() {
    $('.cbIsSubsidized').change(function(){
        var inputAmount = $('#' +  $(this).attr('id').replace('isSubsidized','amount'));
        console.log(inputAmount);
        if ($(this).prop('checked') == true) {
            inputAmount.removeAttr('disabled');
        } else {
            inputAmount.prop('disabled',true);
        }
    });
}