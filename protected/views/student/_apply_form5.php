<?php
/* @var $this StudentController */
/* @var $projects Project[] */
/* @var $form CActiveForm */
/* @var $selectedProjects array */
?>

<h1>Application - step 5 - Select Project</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-step5-form',
	'enableAjaxValidation'=>false,
)); ?>
    <table>
        <tr>
            <th>Select</th>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Team size</th>
            <th>Deadline</th>
        </tr>
        <?php foreach ($projects as $project) {
            $this->renderPartial('partial_forms/_project',array(
                'selectedProjects'=>$selectedProjects,
                'project'=>$project,
            ));
        }?>
    </table>
    <?= $this->renderPartial('partial_forms/_apply_form_buttons',array('step'=>4))?>
    
<?php $this->endWidget(); ?>