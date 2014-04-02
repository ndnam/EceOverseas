<?php
/* @var $this Controller */ 
$this->menu = array(
    array('label'=>'Public Projects','url'=>Yii::app()->baseUrl.'/student/publicProjects'),
    array('label'=>'My Applications','url'=>Yii::app()->baseUrl.'/student/applications'),
);
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 first">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Projects',
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