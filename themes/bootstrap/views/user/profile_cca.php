<?php
/* @var $this UserController */
/* @var $studentCcas StudentCca[] */
/* @var $pastTrips PastTrip[] */
/* @var $form CActiveForm */


$this->breadcrumbs=array(
    'Profile',
);

$form=$this->beginWidget('CActiveForm', array(
        'id'=>'cca-form',
        'htmlOptions'=>array(
            'class'=>'grid-form',
        ),
));
?>
<fieldset style="margin-bottom: 40px;">
 
    <legend>Co-Curriculum Activities</legend>

    <table class="table table-condensed" id="table-cca">
        <thead class="<?= count($studentCcas) > 0 ? '' : 'hide'?>">
            <tr>
                <th style="width: 55px;">Is in NP</th>
                <th>Period <span class="required">*</span></th>
                <th>Organization <span class="required">*</span></th>
                <th>Position <span class="required">*</span></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($studentCcas) > 0) { 
            foreach($studentCcas as $studentCca ) {
                $this->renderPartial('partial/_item_cca',array(
                    'studentCca'=>$studentCca,
                    'form'=>$form,
                    'id'=>$studentCca->id,
                ));
            }
        } else {?>
                <tr id="no-cca-notice">
                    <td colspan="4" style="border:none">You haven't input any co-curriculum activity</td>
                </tr>
        <?php } ?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-cca" onclick="addCCA()">Add CCA</a>
    <script>
        var lastStudentCca = 0;
        $('.cca-item').each(function(){
            var id = $(this).attr('id').substr(9,20);
            if (id.match(/^newRow\d+$/)) {
                var temp = parseInt(id.substr(6,10));
                if (temp > lastStudentCca) {
                    lastStudentCca = temp;
                }
            }
        });
        var trStudentCca = <?= CJSON::encode($this->renderPartial('partial/_item_cca', array('id'=>'idRep','studentCca'=>new StudentCca,'form'=>$form,'this'=>$this), true, false))?>;
        function addCCA() {
            lastStudentCca++;
            $('#table-cca tbody').append(trStudentCca.replace(/idRep/g, 'newRow' + lastStudentCca));
            $('table#table-cca thead').show();
            $('#no-cca-notice').hide();
        }
        function deleteCCA(button) {
            button.parents('tr.cca-item').detach();
        }
    </script>
    
</fieldset>

<fieldset style="margin-bottom: 40px;">
 
    <legend>Past Trips</legend>

    <table class="table table-condensed" id="table-pasttrip">
        <thead class="<?= count($pastTrips) > 0 ? '' : 'hide'?>">
            <tr>
                <th>Program Name <span class="required">*</span></th>
                <th>Country</th>
                <th>Duration <span class="required">*</span></th>
                <th>Capacity <span class="required">*</span></th>
                <th>Subsidized</th>
                <th style="width: 55px;">Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($pastTrips) > 0) {
            foreach($pastTrips as $pastTrip ) {
                $this->renderPartial('partial/_item_pasttrip',array(
                    'pastTrip'=>$pastTrip,
                    'form'=>$form,
                    'id'=>$pastTrip->id,
                ));
            }
        } else {?>
            <tr id="no-pasttrip-notice">
                <td colspan="4" style="border:none">You haven't input any past trip</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-pasttrip" onclick="addPastTrip()">Add Past Trip</a>
    <script>
        var lastPastTrip = 0;
        $('.pasttrip-item').each(function(){
            var id = $(this).attr('id').substr(14,20);
            if (id.match(/^newRow\d+$/)) {
                var temp = parseInt(id.substr(6,10));
                if (temp > lastPastTrip) {
                    lastPastTrip = temp;
                }
            }
        });
        var trPastTrip = <?= CJSON::encode($this->renderPartial('partial/_item_pasttrip', array('id'=>'idRep','pastTrip'=>new PastTrip,'form'=>$form,'this'=>$this), true, false))?>;
        function addPastTrip() {
            lastPastTrip++;
            $('#table-pasttrip tbody').append(trPastTrip.replace(/idRep/g, 'newRow' + lastPastTrip));
            $('table#table-pasttrip thead').show();
            $('#no-pasttrip-notice').hide();
        }
        function deletePastTrip(button) {
            button.parents('tr.pasttrip-item').detach();
        }
    </script>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
    </div>
    
<?php $this->endWidget(); ?>

<script>
    $(document).ready(function(){
        $('input.required, textarea.required, input.number').focusout();
    });
</script>