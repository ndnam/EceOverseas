<?php
/* @var $this StudentController */
/* @var $project Project */

$this->breadcrumbs=array(
	'Projects'=>array('/student/publicProjects'),
        'Download Declaration form'
);
?>

<div class="hero-unit">
    <p>You have successfully applied for <a href="<?=$project->url?>"><?=$project->title?></a> project. Now you need to download the <a href="<?=Yii::app()->baseUrl?>/site/download?fname=YEP Declaration and Idemnity Form.pdf">declaration form</a> and submit it to our office.</p>
</div>