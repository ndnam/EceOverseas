<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu = array(
    array('label'=>'Manage Project Locations','url'=>Yii::app()->baseUrl.'/location/admin'),
);
if (Yii::app()->user->staff->validate()) {
    array_push($this->menu, array('label'=>'Create Project','url'=>Yii::app()->baseUrl.'/project/create'));
}
?>

<h2>My projects</h2>

<?php 
foreach ($relatedProjects as $relatedProject) {
    $this->renderPartial('_project_view',array(
        'data'=>$relatedProject,
    ));
}
?>

<h2>Other projects</h2>

<?php 
foreach ($otherProjects as $otherProject) {
    $this->renderPartial('_project_view',array(
        'data'=>$otherProject,
    ));
}
?>