<?php 
/* @var $project Project */
?>
<div class="view">

        <?php echo CHtml::link(CHtml::encode($project->title), array('project', 'id'=>$project->id)); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($project->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($project->deadline); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('status')); ?>:</b>
	<?php echo Dictionary::item(Dictionary::TYPE_PROJECT_STATUS,$project->status); ?>
	<br />
</div>
