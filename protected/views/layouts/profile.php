<?php /* @var $this Controller */ 

$student = $this->eagerLoadStudent();
$username = Yii::app()->user->username;
$errors = $student->profileErrors;

$this->menu = array(
    array('label'=>'Student Info','url'=>Yii::app()->baseUrl.'/user/'.$username,'itemOptions'=>array('class'=>in_array('student',$errors)?'error':'')),
    array('label'=>'Medical History','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=medical','itemOptions'),
    array('label'=>'Co-Curriculum activities','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=cca','itemOptions'=>array('class'=>in_array('cca',$errors)?'error':'')),
    array('label'=>'Family Details','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=family','itemOptions'=>array('class'=>in_array('family',$errors)?'error':'')),
);
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 first">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Profile',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'profile-items'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-19 last">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>

<script>
initSaveFormConfirmation();
</script>


