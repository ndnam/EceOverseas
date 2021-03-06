<?php 
/* @var $project Project */
/* @var $profileIncomplete boolean */
?>
<div class="box">

        <?php echo CHtml::link(CHtml::encode($project->title), array('/project/'.$project->id)); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($project->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($project->getAttributeLabel('deadline')); ?>:</b>
        <span class="<?= $project->deadlinePassed ? 'error':''?>"><?php echo CHtml::encode($project->deadline); ?></span>
	<br />
        
        <?php 
        if (!$profileIncomplete && !$project->status != Project::STATUS_NEW)
            $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Apply',
                'type'=>'primary',
                'url'=>$this->createUrl('/student/apply/'.$project->id),
                'htmlOptions'=>array(
                    'class'=>'btn-apply-project',
                ),
            )); 
        ?>
</div>
