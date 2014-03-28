<?php
/* @var $this UserController */
/* @var $studentCcas StudentCca[] */
/* @var $pastTrips PastTrip[] */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
    'Profile',
);
?>

<h2><center>Co-Curriculum Activities</center></h2>

<?php if (isset($pastTrips)) { ?>
    <div class="ccas list-module">
        <div class="module-title">Co-Curriculum Activities</div>
<!--        <div class="module-form cca-form">
        </div>-->
        <div class="module-list">
            <table class="module-table">
                <tr>
                    <th>Is in NP</th>
                    <th>Period</th>
                    <th>Organization</th>
                    <th>Position</th>
                    <th>Description</th>
                </tr>
                <?php foreach($pastTrips as $pastTrip ) {
                    $this->renderPartial('partial/_item_cca',array(
                        'pastTrip'=>$pastTrip,
                    ));
                }
                
                $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'cca-form',
                        'enableAjaxValidation'=>true,
                ));?>
                

                <?php $this->endWidget(); ?>
            </table>
        </div>
    </div>
<?php 
}?>
