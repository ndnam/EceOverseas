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
));
?>

<h2><center>Co-Curriculum Activities</center></h2>

<?php if (isset($studentCcas)) { ?>
    <div class="ccas list-module">
        <div class="module-title">Co-Curriculum Activities</div>
        <div class="module-list">
            <table class="module-table">
                <tr>
                    <th><?=CHtml::activeLabelEX(StudentCca::model(),'isInNP')?></th>
                    <th><?=CHtml::activeLabelEX(StudentCca::model(),'period')?></th>
                    <th><?=CHtml::activeLabelEX(StudentCca::model(),'organization')?></th>
                    <th><?=CHtml::activeLabelEX(StudentCca::model(),'position')?></th>
                    <th><?=CHtml::activeLabelEX(StudentCca::model(),'description')?></th>
                </tr>
                <?php foreach($studentCcas as $studentCca ) {
                    $this->renderPartial('partial/_item_cca',array(
                        'studentCca'=>$studentCca,
                        'form'=>$form,
                        'id'=>$studentCca->id,
                    ));
                }
                ?>
                <tr class="buttons">
                    <td colspan="3">
                        <script>
                            var lastStudentCca = 0;
                            var trStudentCca = <?= CJSON::encode($this->renderPartial('partial/_item_cca', array('id'=>'idRep','studentCca'=>new StudentCca,'form'=>$form,'this'=>$this), true, false))?>;
                            function addCCA(button) {
                                lastStudentCca++;
                                button.parents('table').find('.buttons').before(trStudentCca.replace(/idRep/g, 'newRow' + lastStudentCca));
                            }
                            function deleteCCA(button) {
                                button.parents('tr.cca-item').detach();
                            }
                        </script>
                        <a href="javascript:;" id="btn-add-cca" onclick="addCCA($(this))">Add CCA</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php 
}?>



<?php if (isset($pastTrips)) { ?>
    <div class="ccas list-module">
        <div class="module-title">Past Trips</div>
        <div class="module-list">
            <table class="module-table">
                <tr>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'programName')?></th>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'country')?></th>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'duration')?></th>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'capacity')?></th>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'isSubsidized')?></th>
                    <th><?=CHtml::activeLabelEX(PastTrip::model(),'amount')?></th>
                </tr>
                <?php foreach($pastTrips as $pastTrip ) {
                    $this->renderPartial('partial/_item_pasttrip',array(
                        'pastTrip'=>$pastTrip,
                        'form'=>$form,
                        'id'=>$pastTrip->id,
                    ));
                }
                ?>
                <tr class="buttons">
                    <td colspan="3">
                        <script>
                            var lastPastTrip = 0;
                            var trPastTrip = <?= CJSON::encode($this->renderPartial('partial/_item_pasttrip', array('id'=>'idRep','pastTrip'=>new PastTrip,'form'=>$form,'this'=>$this), true, false))?>;
                            function addPastTrip(button) {
                                lastPastTrip++;
                                button.parents('table').find('.buttons').before(trPastTrip.replace(/idRep/g, 'newRow' + lastPastTrip));
                            }
                            function deletePastTrip(button) {
                                button.parents('tr.pasttrip-item').detach();
                            }
                        </script>
                        <a href="javascript:;" id="btn-add-cca" onclick="addPastTrip($(this))">Add Past Trip</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php 
}?>


<input type="submit" value="Save" name="btnSave">
<?php
$this->endWidget();
?>

<script>
$(document).ready(function(){
    $('input.required, textarea.required, input.number').focusout();
});

</script>