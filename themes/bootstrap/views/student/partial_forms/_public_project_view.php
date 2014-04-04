<?php 
/* @var $project Project */
?>
<div class="view">

        <?php echo CHtml::link(CHtml::encode($project->title), array('/project/'.$project->id)); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($project->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($project->deadline); ?>
	<br />
        
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Apply',
            'type'=>'primary',
            'url'=>$this->createUrl('/student/apply/'.$project->id),
            'htmlOptions'=>array(
                'class'=>'btn-apply-project',
            ),
        )); ?>
</div>
