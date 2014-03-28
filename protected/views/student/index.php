<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);

if (is_array($projects)) {
    if (count($projects)) {
        foreach ($projects as $project) {
            $this->render('partial_forms/_project_view',array(
                'project'=>$project,
            ));
        }
    } else {
        echo "<p>There is currently no project you can apply</p>";
    }
} else {?>
<p>Your profile is incomplete. You need to <a href='<?= Yii::app()->baseUrl ?>/user/profile'>complete your profile</a> before you can apply for a project.</p>
<?php
} ?>

