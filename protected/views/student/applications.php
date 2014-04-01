<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
/* @var $applications Application[]*/

$this->breadcrumbs=array(
	'Projects',
);
?>
<p><i>Your applications are considered invalid if you profile is not complete.</i></p>
<?php
if (count($applications) > 0) {
    foreach ($applications as $application) {
        $this->renderPartial('partial_forms/_application_view',array(
            'application'=>$application,
        ));
    }
} else {
    echo "<p>You have not applied for any project</p>";
}

