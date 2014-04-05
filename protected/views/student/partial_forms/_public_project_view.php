<?php 
/* @var $project Project */
?>
<div class="box">

        <?php echo CHtml::link(CHtml::encode($project->title), array('/project/'.$project->id)); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($project->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($project->deadline); ?>
	<br />

        <?php echo CHtml::link('Apply', array('/student/apply/'.$project->id)); ?>
</div>
