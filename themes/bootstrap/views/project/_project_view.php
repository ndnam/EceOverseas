<?php 
/* @var $project Project */
?>
<div class="box">

        <?php echo CHtml::link(CHtml::encode($project->title), array('view', 'id'=>$project->id)); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($project->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('deadline')); ?>:</b>
	<span class="<?= $project->deadlinePassed ? 'error':''?>"><?php echo CHtml::encode($project->deadline); ?></span>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('status')); ?>:</b>
	<?php echo Dictionary::item(Dictionary::TYPE_PROJECT_STATUS,$project->status); ?>
	<br />
</div>

