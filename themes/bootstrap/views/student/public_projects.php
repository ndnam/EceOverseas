<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
/* @var $projects Project[]*/
/* @var $profileIncomplete boolean */

$this->breadcrumbs=array(
	'Projects',
);
?>
<?php
if ($profileIncomplete) {
    echo "<p>You have to compelete your profile before you can apply for a project<p>";
}
if (count($projects)) {
    foreach ($projects as $project) {
        $this->renderPartial('partial_forms/_public_project_view',array(
            'project'=>$project,
            'profileIncomplete' => $profileIncomplete,
        ));
    }
} else {
    echo "<p>There is currently no project you can apply</p>";
}

