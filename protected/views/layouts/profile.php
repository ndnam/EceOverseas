<?php /* @var $this Controller */ 

$this->menu = array(
    array('label'=>'Student Info','url'=>Yii::app()->baseUrl.'/user/profile','itemOptions'=>array('class'=>'menu-student-info')),
    array('label'=>'Medical History','url'=>Yii::app()->baseUrl.'/user/profile?page=medical'),
    array('label'=>'Co-Curriculum activities','url'=>Yii::app()->baseUrl.'/user/profile?page=cca'),
    array('label'=>'Family Details','url'=>Yii::app()->baseUrl.'/user/profile?page=family'),
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
$(document).ajaxSuccess(function(event,request,options) {
    console.log(request);
});
$(document).ready(function(){
    var notModified = true;
    $('input, textarea, select').change(function(){
        if (notModified) {
            $(window).bind('beforeunload', function(){ 
                return 'You are navigating away. Make sure you have saved you data first.';
            });
            notModified = false;
        }
    });
    $('input[type="submit"]').click(function(e){
        $(window).unbind('beforeunload')
    })
});
</script>


