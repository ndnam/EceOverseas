<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Location', 'url'=>array('index')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h2>Create Location</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>