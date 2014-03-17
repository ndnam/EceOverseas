<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Admin'=>array('index'),
    'Index',
);

$this->menu = array(
    array('label'=>'Manage Staffs','url'=>'Staff/index'),
);

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_project_view',
)); 





?>