<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu = array(
    array('label'=>'Manage Staffs','url'=>'/EceOverseas/staff/index'),
    array('label'=>'Create Project','url'=>'/EceOverseas/project/create'),
);

?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_project_view',
)); ?>