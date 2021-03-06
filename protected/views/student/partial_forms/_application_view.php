<?php 
/* @var $application Application */
$project = $application->project;
?>
<div class="box">

        <?php echo CHtml::link(CHtml::encode($project->title), array('/project/'.$project->id)); ?>
	<br />

	<b>Project status:</b>
	<?php echo Dictionary::item(Dictionary::TYPE_PROJECT_STATUS,$project->status); ?>
	<br />
        
	<b>Using PSEA:</b>
	<?= $application->usingPsea ? 'Yes' : 'No' ?>
	<br />
        
	<b>Support Statement:</b>
	<?= $application->support ?>
	<br />
        
	<b>Application Status:</b>
	<?= Dictionary::item(Dictionary::TYPE_APPLICATION_STATUS,$application->status) ?>
	<br />
        
        <?php 
        if ($project->status == Project::STATUS_PUBLIC) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Delete',
                'type'=>'danger',
                'size'=>'mini',
                'htmlOptions'=>array(
                    'class'=>'btn-del-app',
                    'appid'=>$application->id,
                ),
            )); 
        }?>
</div>
