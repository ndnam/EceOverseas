<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
/* @var $projects Project[]*/

$this->breadcrumbs=array(
	'Projects',
);
?>
<?php
if (count($projects)) {
    foreach ($projects as $project) {
        $this->renderPartial('partial_forms/_public_project_view',array(
            'project'=>$project,
        ));
    }
} else {
    echo "<p>There is currently no project you can apply</p>";
}

