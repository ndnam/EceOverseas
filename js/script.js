/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
//    $('#btnBack').click(function(){
//        console.log('btnBack clicked');
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
    $('#noCCA').change(function(){
       if ($(this).prop('checked') == true)  {
           $('.cca').find('input, textarea').prop('disabled',true);
       } else {
           $('.cca').find('input, textarea').removeAttr('disabled');
       }
    });
    
    if ($('#noCCA').prop('checked'))
        $('.cca').find('input, textarea').prop('disabled',true);
    
    
    // No Past Trip checkbox
    $('#havePastTrip').change(function(){
       if ($(this).prop('checked') == true)  {
           $('.pasttrips').show();
       } else {
           $('.pasttrips').hide();
       }
    });
    
    // Project selecting page - step 5
    $('.cbSelectPrj').change(function(){
        if ($(this).prop('checked') == true)  {
            $(this).parents('tr').find('.cbPsea, .taSupport').removeAttr('disabled');
        } else {
            $(this).parents('tr').find('.cbPsea, .taSupport').prop('disabled',true);
        }
    });
    
    // Project create form
    $('#btnNewLocation').click(function(){
        $('.locationForm').show();
        $('.locationForm input').removeAttr('disabled');
        $('#Project_locationId').prop('disabled',true);
        $('#btnCancel').show();
    });
    
    $('#btnCancel').click(function(){
        $('.locationForm input').prop('disabled',true);
        $('.locationForm').hide();
        $('#Project_locationId').removeAttr('disabled');
        $(this).hide();
    });
    
    if (hasValue('#Location_name') || hasValue('#Location_city') || hasValue('#Location_country')) {
        $('#btnNewLocation').click();
    }
    
    function hasValue(selector) {
        if ($(selector).length > 0 && $(selector).val().length > 0) 
            return true;
        return false;
    }
    
    // Project edit form
    $('#btn-edit-project').click(function(){
        $(this).parents('form').find('input[type="text"], select, textarea').show();
        $(this).parents('form').find('p.attr-value').hide();
        $('#btn-update-project, #btn-cancel').show();
        $(this).hide();
    });
    
    $('#btn-update-project').click(function(){
        $this = $(this);
        //Perform ajax update here
        $.post('',$('#project-edit-form').serialize(),function(data){
            if (data.status == 1) {
                $this.parents('form').find('input, textarea').each(function(){
                    $(this).parents('.controls').find('p.attr-value').text($(this).val());
                });
                $this.parents('form').find('select').each(function(){
                    var select = $(this);
                    $(this).parents('.controls').find('p.attr-value').each(function(){
                        $(this).text(select.find('option:selected').text());
                        $(this).attr('initial-value',select.val()); 
                    });
                });
                $this.parents('form').find('input[type="text"], select, textarea').hide();
                $this.parents('form').find('p.attr-value').show();
                $('#btn-update-project, #btn-cancel').hide();
                $('#btn-edit-project').show();
                $('h2#project-title').text($('#Project_title').val());
                
                // Toggle the Delete Project button when project status is changed
                if ($('#Project_status').val() == 1) {
                    $('#btn-delete-project').show();
                } else {
                    $('#btn-delete-project').hide();
                }
            } else {
                alert('Cannot save changes');
            }
        },'json');
    });
    
    $('#btn-cancel').click(function(){
        $form = $(this).parents('form');
        $form.find('input, select, textarea').hide();
        $form.find('p.attr-value').show();
        // Repopulate the form with initial values
        $(this).parents('form').find('p.attr-value').each(function(){
            var $input = $(this).parents('.controls').find('input, textarea');
            var initialValue;
            if ($input.length > 0) {
                initialValue = $(this).html();
            } else {
                $input = $(this).parents('.controls').find('select');
                initialValue = $input.attr('initial-value');
            }
            $input.val(initialValue);
            $(this).show();
        });
        // Remove the error messages
        $form.find('.error').removeClass('error');
        $form.find('.help-inline').html('').hide();
        
        $('#btn-update-project, #btn-cancel').hide();
        $('#btn-edit-project').show();
    });
    
    // Student application list
    $('#btnSelectAllApps').click(function(){
        $('.cbStdApp').prop('checked',true);
    });
    
    $('#btnClearApps').click(function(){
        $('.cbStdApp').prop('checked',false);
    });
    
    $('.btnChangeAppStt').click(function(){
        var stdAppIds = new Array();
        var checkedBoxes = $('.cbStdApp:checked');
        var newStatus = $(this).attr('id').substr(1,20);
        if (checkedBoxes.length == 0) {
            return;
        }
        checkedBoxes.each(function(){
            stdAppIds.push($(this).attr('id'));
        });
        $.post('/EceOverseas/project/changeApplicationStatus',
            {stdAppIds:stdAppIds, status:$(this).attr('id').charAt(0)},
            function(data){
                console.log(data);
                if (data.status == 1) {
                    checkedBoxes.each(function(){
                        $(this).parents('tr').find('.app-status').text(newStatus);
                    });
                } else {
                    alert(response.message);
                }
            }
        );
    });
    
    // Staff list
    $('#btnAddStaff').click(function(){
        if ($('#staffSelect').val() > 0) {
            $.post('/EceOverseas/project/addStaff',
                {projectId:$('#projectId').val(), staffId:$('#staffSelect').val(), role:$('#roleSelect').val()},
                function(data){
                    console.log(data);
                    if (data.status == 1) {
                        $('.groupAddStaff').before(data.staff);
                        initStaffEditBtns(data.staffId);
                        resetStaffListIndex();
                        $('.btn-changerole').show();
                    } else 
                        if (data.message) alert(data.message);
                    reloadStaffSelect();
            });
        }
    });
    initStaffEditBtns();
    
    // Delete student application
    $('.btn-del-app').click(function(){
        $this = $(this);
        js:bootbox.confirm('Do you want to delete your application for this project?',function(confirmed) {
            if (confirmed) 
                window.location.href = '/EceOverseas/student/deleteApp/' + $this.attr('appId');
        });
    });
    
    
    
});

function initStaffEditBtns(staffId) {
    
    $(staffId ? '#btnEditStaff' + staffId : '.btnEditStaff').click(function(){
        $(this).parents('tr').find('span.staffRole').hide();
        $(this).parents('tr').find('select.roleSelect, .btnDoneEditStaff').show();
        $(this).hide();
    });
    
    $(staffId ? '#btnDoneEditStaff' + staffId : '.btnDoneEditStaff').click(function(){
        var btnDoneTr = $(this).parents('tr');
        var roleSelect = btnDoneTr.find('select.roleSelect');
        $.post('/EceOverseas/project/changeStaffRole',
            {projectStaffId:roleSelect.attr('projectStaffId'), role:roleSelect.val()},
            function(data){
                console.log(data);
                if (data.status == 1) {
                    btnDoneTr.find('span.staffRole').text(roleSelect.find('option:selected').text());
                    btnDoneTr.find('span.staffRole, .btnEditStaff').show();
                    btnDoneTr.find('select.roleSelect, .btnDoneEditStaff').hide();
                    if (data.refresh) {
                        location.reload();
                    }
                } else {
                    alert(data.message);
                }
        });
    });
    
    $(staffId ? '#btnRemoveStaff' + staffId : '.btnRemoveStaff').click(function(){
        var btnRemoveStaff = $(this);
        js:bootbox.confirm('Do you want to remove this person?',function(confirmed){
            if (confirmed) {
                $.post('/EceOverseas/project/removeStaff',
                    {prjStaffId:btnRemoveStaff.attr('prjStaffId')},
                    function(data){
                        if (data.status == 1) {
                            if (data.refresh) {
                                location.reload();
                            }
                            btnRemoveStaff.parents('tr').detach();
                            resetStaffListIndex();
                            if ($('.listIndex').length == 1) {
                                $('.btn-changerole').hide();
                            }
                        } else 
                            alert(data.message);
                        reloadStaffSelect();
                });
            }
        });
    });
}

function reloadStaffSelect() {
    $.get('/EceOverseas/project/availableStaffs',{projectId:$('#projectId').val()},function(staffs){
        console.log(staffs);
        $('#staffSelect').html('<option value="0">Select staff</option>');
        for (var i=0;i<staffs.length;i++) {
            $('#staffSelect').append('<option value="' + staffs[i].id + '">' + staffs[i].fullName + '</option>');
        }
    });
}

function deleteProject(projectId) {
    js:bootbox.confirm('Are you sure you want to delete this project?',function(confirmed) {
        if (confirmed) {
            $.post('/EceOverseas/project/delete',{projectId:projectId},function(data){
                if (data.status == 1) {
                    window.location.href = '/EceOverseas/project';
                } else {
                    alert(data.message);
                }
            });
        }
    });
}

function resetStaffListIndex() {
    var i = 0;
    $('.listIndex').each(function(){
        i++;
        $(this).text(i + '.');
    })
}

function initPastTripForm(parent) { //parent is selector
    $(parent + ' .cbIsSubsidized').change(function(){
        var inputAmount = $('#' +  $(this).attr('id').replace('isSubsidized','amount'));
        if ($(this).prop('checked') == true) {
            inputAmount.removeAttr('disabled');
        } else {
            inputAmount.prop('disabled',true);
        }
    });
}

function setProfilePicHolderHeight(){
    var picHeight = $("#profile-pic").height();
    if (picHeight < 30) 
        picHeight = 360;
    // Set profile pic holder height
    $('.profile-pic-holder').height(picHeight + 60);
    // Set ajax loader height
    $('.profile-pic-holder .ajax-loader').height(picHeight);
    // Set warning position
    $('.profile-pic-holder .warning').attr('style','top:' + (picHeight + 10) + 'px');
    console.log(picHeight);
}