<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu = array(
    array('label'=>'Manage Project Locations','icon'=>'list','url'=>Yii::app()->baseUrl.'/location/admin'),
);
if (Yii::app()->user->staff->validate()) {
    array_push($this->menu, array('label'=>'Create Project','icon'=>'plus','url'=>Yii::app()->baseUrl.'/project/create'));
}
?>

<h3>My projects</h3>

<?php 
if (count($relatedProjects) > 0) {
    foreach ($relatedProjects as $relatedProject) {
        $this->renderPartial('_project_view',array(
            'project'=>$relatedProject,
        ));
    }
} else {
    echo 'You are currently not involved in any project';
}
?>

<?php 
if (count($otherProjects) > 0) {
    echo '<h3>Other projects</h3>';
    foreach ($otherProjects as $otherProject) {
        $this->renderPartial('_project_view',array(
            'project'=>$otherProject,
        ));
    }
}
?>