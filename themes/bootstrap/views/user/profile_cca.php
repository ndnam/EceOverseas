<?php
/* @var $this UserController */
/* @var $studentCcas StudentCca[] */
/* @var $pastTrips PastTrip[] */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/validator.js');

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
        <thead>
            <tr>
                <th style="width: 55px;">Is in NP</th>
                <th>Period <span class="required">*</span></th>
                <th>Organization <span class="required">*</span></th>
                <th>Position <span class="required">*</span></th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            
<?php if (isset($studentCcas)) {
    foreach($studentCcas as $studentCca ) {
        $this->renderPartial('partial/_item_cca',array(
            'studentCca'=>$studentCca,
            'form'=>$form,
            'id'=>$studentCca->id,
        ));
    }
}?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-cca" onclick="addCCA()">Add CCA</a>
    <script>
            var lastStudentCca = 0;
            var trStudentCca = <?= CJSON::encode($this->renderPartial('partial/_item_cca', array('id'=>'idRep','studentCca'=>new StudentCca,'form'=>$form,'this'=>$this), true, false))?>;
            function addCCA() {
                lastStudentCca++;
                $('#table-cca tbody').append(trStudentCca.replace(/idRep/g, 'newRow' + lastStudentCca));
            }
            function deleteCCA(button) {
                button.parents('tr.cca-item').detach();
            }
    </script>
    
</fieldset>

<fieldset style="margin-bottom: 40px;">
 
    <legend>Past Trips</legend>

    <table class="table table-condensed" id="table-pasttrip">
        <thead>
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
<?php if (isset($pastTrips)) { 
    foreach($pastTrips as $pastTrip ) {
        $this->renderPartial('partial/_item_pasttrip',array(
            'pastTrip'=>$pastTrip,
            'form'=>$form,
            'id'=>$pastTrip->id,
        ));
    }
?>
                
<?php 
}?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-pasttrip" onclick="addPastTrip()">Add Past Trip</a>
    <script>
        var lastPastTrip = 0;
        var trPastTrip = <?= CJSON::encode($this->renderPartial('partial/_item_pasttrip', array('id'=>'idRep','pastTrip'=>new PastTrip,'form'=>$form,'this'=>$this), true, false))?>;
        function addPastTrip() {
            lastPastTrip++;
            $('#table-pasttrip tbody').append(trPastTrip.replace(/idRep/g, 'newRow' + lastPastTrip));
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