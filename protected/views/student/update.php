<?php
/* @var $this StudentController */
/* @var $studentCca Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$studentCca->id=>array('view','id'=>$studentCca->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'View Student', 'url'=>array('view', 'id'=>$studentCca->id)),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Update Student <?php echo $studentCca->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$studentCca)); ?>