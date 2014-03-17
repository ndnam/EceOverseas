<?php
/* @var $this StudentCcaController */
/* @var $studentCcas StudentCca */
/* @var $pastTrips PastTrip */
/* @var $form CActiveForm */
?>

<h1>Application - step 3 - Co-Curriculum Activities of Applicant</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-cca-step3-form',
	'enableAjaxValidation'=>true,
));?>
        <div class="ccas">
            
            <h2>Past or present CCA records</h2>
        
            <div class='row'>
                <?= CHtml::checkBox('noCCA', $noCCA == 1 ? true : false);?> 
                <label for="noCCA" style="text-align: left; margin-left: 10px;">I don't have any record</label>
            </div>
            
            <?php 
                if (count($studentCcas)) {
                    foreach ($studentCcas as $id=>$studentCca) {
                        $this->renderPartial('partial_forms/_student_cca', array('id' => $id, 'studentCca' => $studentCca, 'form' => $form, 'this' => $this));
                    }
                } else 
                    $this->renderPartial('partial_forms/_student_cca', array('id' => 0, 'studentCca' => new StudentCca, 'form' => $form, 'this' => $this));
            ?>
            
            <div class="buttons">
                <script>
                    var lastStudentCca = 0;
                    var trStudentCca = <?= CJSON::encode($this->renderPartial('partial_forms/_student_cca', array('id'=>'idRep','studentCca'=>new StudentCca,'form'=>$form,'this'=>$this), true, false))?>;
                    function addCCA(button) {
                        lastStudentCca++;
                        button.parents('form').find('div.ccas .buttons').before(trStudentCca.replace(/idRep/g, 'newRow' + lastStudentCca));
                    }
                    function deleteCCA(button) {
                        button.parents('div.cca').detach();
                    }
                </script>
                <?php echo CHtml::button('Add CCA',array('onClick'=>'addCCA($(this))')); ?>
            </div>
        </div>
        
        <div class='row'>
            <?= CHtml::checkBox('havePastTrip', count($pastTrips) ? true : false);?> 
            <label for="havePastTrip" style="text-align: left; margin-left: 10px; width: 400px;">
                I attended other overseas program(s) by Ngee Ann Polytechnic
            </label>
        </div>

        <div class="pasttrips <?= count($pastTrips) ? '' : 'hide'?>">
            <div class='row'>
                <h2>Other overseas programs organized by Ngee Ann polytechnic</h2>
            </div>
            
            <?php
                if (count($pastTrips)) {
                    foreach ($pastTrips as $id=>$pastTrip) {
                        $this->renderPartial('partial_forms/_past_trip', array('id'=>$id, 'pastTrip'=>$pastTrip, 'form'=>$form, 'this'=>$this));
                    }
                } else
                    $this->renderPartial('partial_forms/_past_trip', array('id'=>0, 'pastTrip'=>new PastTrip, 'form'=>$form, 'this'=>$this));
            ?>
            
            <div class="buttons">
                <script>
                    var lastPastTrip = 0;
                    var trPastTrip = <?= CJSON::encode($this->renderPartial('partial_forms/_past_trip', array('id'=>'idRep','pastTrip'=> new PastTrip,'form'=>$form,'this'=>$this), true, false))?>;
                    function addPastTrip(button) {
                        lastPastTrip++;
                        button.parents('form').find('div.pasttrips .buttons').before(trPastTrip.replace(/idRep/g, 'newRow' + lastPastTrip));
                    }
                    function deletePastTrip(button) {
                        button.parents('div.pasttrip').detach();
                    }
                </script>
                <?php echo CHtml::button('Add Past Trip',array('onClick'=>'addPastTrip($(this))')); ?>
            </div>
        </div>
        <?= $this->renderPartial('partial_forms/_apply_form_buttons',array('step'=>3))?>

<?php $this->endWidget(); ?>

</div><!-- form -->